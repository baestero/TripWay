<?php

declare(strict_types=1);

namespace App\Controller;

class UsersController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->addUnauthenticatedActions([
            'login'
        ]);
    }

    public function login()
    {
        $this->viewBuilder()->setLayout('login');

        $result = $this->Authentication->getResult();

        if ($this->request->is('post')) {

            if ($result->isValid()) {
                return $this->redirect('/');
            }

            $this->Flash->error('E-mail ou senha inválidos.');
        }
    }
    public function logout()
    {
        $this->Authentication->logout();

        return $this->redirect([
            'action' => 'login'
        ]);
    }
}
