<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;

class AdminsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Authentication.Authentication');
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Allow login without being authenticated
        $this->Authentication->addUnauthenticatedActions(['login']);
    }

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        if ($result->isValid()) {
            // Optional: Check if user is admin here
            $user = $this->request->getAttribute('identity')->getOriginalData();
            if ($user->role !== 'manager') {
                $this->Flash->error('You are not authorized as admin.');
                $this->Authentication->logout();
                return $this->redirect('/admins/login');
            }

            $redirect = $this->request->getQuery('redirect', '/dashboard');
            return $this->redirect($redirect);
        }

        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Invalid username or password');
        }
    }

    public function dashboard()
    {
        // Protected page for admins
    }

    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect('/admin/login');
    }
}
