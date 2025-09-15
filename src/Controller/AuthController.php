<?php
declare(strict_types=1);

namespace App\Controller;

use App\Service\OktaOidcService;
use Cake\Datasource\FactoryLocator;
use Cake\Routing\Router;
use Cake\Log\Log;
use Cake\I18n\FrozenTime;

class AuthController extends AppController {
    public function initialize(): void {
        parent::initialize();
        $this->Authentication->addUnauthenticatedActions(['login', 'callback', 'complete']);
    }

    /**
     * Initiate Login
     */
    public function login() {
        //Execute normal authentication if okta is disabled
        if ((string)env('AUTH_DRIVER', 'local') !== 'okta') {
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        $okta = new OktaOidcService();
        if (!$okta->isConfigured()) {
            $this->Flash->error('Single sign on is not configured. Please contact administrator.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $client = $okta->makeClient();
        $client->authenticate();
        return $this->redirect(['action' => 'callback']);
    }

    /**
     * After login
     */
    public function callback() {
        //Execute normal authentication if okta is disabled
        if ((string)env('AUTH_DRIVER', 'local') !== 'okta') {
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        $request = $this->request;
        $okta = new OktaOidcService();
        if (!$okta->isConfigured()) {
            $this->Flash->error('Single sign on is not configured.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        try {
            if (session_status() !== PHP_SESSION_ACTIVE) {
                @session_start();
            }
            $qsCode = (string)$this->request->getQuery('code');
            $qsState = (string)$this->request->getQuery('state');
            $storedState = $_SESSION['openid_connect_state'] ?? null;
            $storedCv = $_SESSION['openid_connect_code_verifier'] ?? null;
            $hasSessCookie = isset($_COOKIE[session_name()]);
            Log::debug('[OIDC callback] diag', [
                'has_code' => !empty($qsCode),
                'qs_state_len' => strlen($qsState),
                'stored_state_present' => $storedState ? true : false,
                'stored_cv_present' => $storedCv ? true : false,
                'has_session_cookie' => $hasSessCookie,
                'issuer' => (string)env('OKTA_ISSUER', ''),
                'redirect_uri' => (string)env('OKTA_REDIRECT_URI', ''),
                'pkce' => (string)env('OKTA_USE_PKCE', '1'),
            ]);

            //Basic sanity: ensure we have "code" param
            if (!$this->request->getQuery('code')) {
                $this->Flash->error('Missing authorization code. Please try logging in again.');
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
            $client = $okta->makeClient();
            $client->authenticate();
            $idToken = $client->getIdToken();
            $accessToken = $client->getAccessToken();
            $claims = (array)$client->getVerifiedClaims();

            $email = $claims['email'] ?? ($claims['preferred_username'] ?? null);
            $sub = $claims['sub'] ?? null;
            $name = $claims['name'] ?? ($claims['given_name'] ?? '');

            if (!$email && !$sub) {
                throw new \RuntimeException('Unable to determine user identity from Okta claims.');
            }

            //Upsert local user (by username = email or sub)
            $username = $email ?: $sub;
            $usersTable = FactoryLocator::get('Table')->get('Users');
            $user = $usersTable->find()->where(['username' => $username])->first();
            if (!$user) {
                $randomPassword = $this->generateStrongPassword();
                $user = $usersTable->newEntity([
                    'username' => $username,
                    'password' => $randomPassword,
                    'email' => $email ?: ($sub . 'company_email.com'),
                    'role' => 'nurse',
                    'created_at' => FrozenTime::now(),
                    'updated_at' => FrozenTime::now(),
                ], ['validate' => 'default']);
            } else {
                if (property_exists($user, 'updated_at')) {
                    $user->updated_at = FrozenTime::now();
                }
            }

            if (!$usersTable->save($user)) {
                Log::error('Okta login user save failed', [
                    'errors' => $user->getErrors(),
                ]);
                throw new \RuntimeException('Failed to persist user for single sign on login.');
            }

            $_SESSION['okta_tokens'] = [
                'id_token' => $idToken,
                'access_token' => $accessToken,
            ];

            $this->Authentication->setIdentity($user);

            $redirect = $this->request->getQuery('redirect') ?: Router::url(['controller' => 'Pages', 'action' => 'display', 'home']);
            return $this->redirect($redirect);
        } catch (\Throwable $e) {
            Log::error('Okta authentication failed', ['exception' => $e]);
            $this->Flash->error('Authentication failed: ' . $e->getMessage());
            return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
        }
    }

    /**
     * Initiating Logout
     */
    public function logout() {
        $okta = new OktaOidcService();
        $tokens = $_SESSION['okta_tokens'] ?? [];
        $idToken = $tokens['id_token'] ?? null;
        $logoutUrl = $okta->buildLogoutUrl($idToken);
        return $this->redirect($logoutUrl);
    }

    /**
     * After logout completes
     */
    public function complete() {
        $this->Authentication->logout();
        unset($_SESSION['okta_tokens'], $_SESSION['okta_oidc_state'], $_SESSION['okta_oidc_nonce']);
        return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
    }

    private function generateStrongPassword(int $length = 16): string {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+-={}[]|:;<>,.?/';
        $pass = '';
        $max = strlen($chars) - 1;
        for ($i = 0; $i < $length; $i++) {
            $pass .= $chars[random_int(0, $max)];
        }
        return $pass;
    }
}
