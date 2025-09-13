<?php
declare(strict_types=1);

namespace App;

use Cake\ORM\Locator\LocatorFactory;
use Cake\ORM\Locator\TableLocator;

use Cake\Core\ContainerInterface;
use Cake\Core\Configure;
use Cake\Http\MiddlewareQueue;
use Cake\Http\BaseApplication;
use Cake\Routing\Middleware\AssetMiddleware;
use Cake\Routing\Middleware\RoutingMiddleware;
use Cake\Error\Middleware\ErrorHandlerMiddleware;
use Cake\Http\Middleware\BodyParserMiddleware;
use Cake\Http\Middleware\CsrfProtectionMiddleware;

use Authentication\Middleware\AuthenticationMiddleware;
use Authentication\AuthenticationService;
use Authentication\AuthenticationServiceInterface;
use Authentication\AuthenticationServiceProviderInterface;
use Authentication\Identifier\IdentifierInterface;
use Cake\Routing\Router;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Application setup class.
 *
 * This defines the bootstrapping logic and middleware layers you
 * want to use in your application.
 *
 * @extends \Cake\Http\BaseApplication<\App\Application>
 */
class Application extends BaseApplication implements AuthenticationServiceProviderInterface
{
    /**
     * Load all the application configuration and bootstrap logic.
     *
     * @return void
     */
    public function bootstrap(): void
    {
        // Call parent to load bootstrap from files.
        parent::bootstrap();

        $this->addPlugin('Authentication');
    }

    /**
     * Setup the middleware queue your application will use.
     *
     * @param \Cake\Http\MiddlewareQueue $middlewareQueue The middleware queue to setup.
     * @return \Cake\Http\MiddlewareQueue The updated middleware queue.
     */
    public function middleware(MiddlewareQueue $middlewareQueue): MiddlewareQueue
    {
        $middlewareQueue
            ->add(new ErrorHandlerMiddleware(Configure::read('Error'), $this))
            ->add(new AssetMiddleware([
                'cacheTime' => Configure::read('Asset.cacheTime'),
            ]))
            ->add(new RoutingMiddleware($this))
            ->add(new BodyParserMiddleware())
            ->add(new CsrfProtectionMiddleware([
                'httponly' => true,
            ]))
            ->add(new AuthenticationMiddleware($this)); // Now $this implements AuthenticationServiceProviderInterface

        return $middlewareQueue;
    }

    /**
     * Returns the authentication service.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request The request instance.
     * @return \Authentication\AuthenticationServiceInterface The authentication service.
     */
    public function getAuthenticationService(ServerRequestInterface $request): AuthenticationServiceInterface
    {
        $authDriver = (string)env('AUTH_DRIVER', 'local');
        $unauthRedirect = Router::url($authDriver === 'okta' ? '/auth/login' : '/users/login');
        $service = new AuthenticationService([
            'unauthenticatedRedirect' => $unauthRedirect,
            'queryParam' => 'redirect',
        ]);

        if ($authDriver === 'local') {
            // Load the identifier (password-based login)
            $service->loadIdentifier('Authentication.Password', [
                'fields' => [
                    'username' => 'username',
                    'password' => 'password',
                ],
            ]);
        }
        

        // Load authenticators: session first, then form
        $service->loadAuthenticator('Authentication.Session');
        if ($authDriver === 'local') {
            $service->loadAuthenticator('Authentication.Form', [
                'fields' => [
                    'username' => 'username',
                    'password' => 'password',
                ],
                'loginUrl' => '/users/login',
            ]);
        }

        // // Redirect URL after login
        // $service->setConfig([
        //     'unauthenticatedRedirect' => '/users/login',
        //     'queryParam' => 'redirect',
        // ]);

        return $service;
    }

    /**
     * Register application container services.
     *
     * @param \Cake\Core\ContainerInterface $container The Container to update.
     * @return void
     */
    public function services(ContainerInterface $container): void
    {
        // Register services if needed
    }
}
