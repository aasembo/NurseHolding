<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.3.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App;

use Cake\Core\Configure;
use Cake\Core\ContainerInterface;
use Cake\Datasource\FactoryLocator;
use Cake\Error\Middleware\ErrorHandlerMiddleware;
use Cake\Http\BaseApplication;
use Cake\Http\Middleware\BodyParserMiddleware;
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Http\MiddlewareQueue;
use Cake\ORM\Locator\TableLocator;
use Cake\Routing\Middleware\AssetMiddleware;
use Cake\Routing\Middleware\RoutingMiddleware;



// In src/Application.php add the following imports
use Authentication\AuthenticationService;
use Authentication\AuthenticationServiceInterface;
use Authentication\AuthenticationServiceProviderInterface;
use Authentication\Middleware\AuthenticationMiddleware;
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
public function middleware(MiddlewareQueue $middlewareQueue): MiddlewareQueue
     {
         $middlewareQueue
             // ... other middleware added before
             ->add(new RoutingMiddleware($this))
             ->add(new BodyParserMiddleware())
             // Add the AuthenticationMiddleware. It should be after routing and body parser.
             ->add(new AuthenticationMiddleware($this));
     
         return $middlewareQueue;
     }
     
 public function getAuthenticationService(ServerRequestInterface $request): AuthenticationServiceInterface
     {
         $authenticationService = new AuthenticationService([
             'unauthenticatedRedirect' => Router::url('/Users/login'),
             'queryParam' => 'redirect',
         ]);
     
         // Load identifiers, ensure we check email and password fields
         $authenticationService->loadIdentifier('Authentication.Password', [
             'fields' => [
                 'username' => 'username',
                 'password' => 'password',
             ]
         ]);
     
         // Load the authenticators, you want session first
         $authenticationService->loadAuthenticator('Authentication.Session');
         // Configure form data check to pick email and password
         $authenticationService->loadAuthenticator('Authentication.Form', [
             'fields' => [
                 'username' => 'username',
                 'password' => 'password',
             ],
             'loginUrl' => Router::url('/Users/login'),
         ]);
     
         return $authenticationService;

        }
 public function initialize(): void
{
    parent::initialize();
    $this->loadComponent('Flash');

    // Add this line to check authentication result and lock your site
    $this->loadComponent('Authentication.Authentication');
     }

    }
