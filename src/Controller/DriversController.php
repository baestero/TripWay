<?php

declare(strict_types=1);

namespace App\Controller;

class DriversController extends AppController
{

    public function index()
    {
        $drivers = $this->paginate($this->Drivers);

        $this->set(compact('drivers'));
    }


    public function view($id = null)
    {
        $driver = $this->Drivers->get($id, [
            'contain' => ['Trips', 'Vehicles'],
        ]);

        $this->set(compact('driver'));
    }


    public function add()
    {

        $driver = $this->Drivers->newEmptyEntity();
        if ($this->request->is('post')) {
            $driver = $this->Drivers->patchEntity($driver, $this->request->getData());

            if ($this->Drivers->save($driver)) {

                $this->Flash->success(__('O motorista foi salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível cadastrar motorista, verifique os erros abaixo.'));
        }
        $this->set(compact('driver'));
    }


    public function edit($id = null)
    {
        $driver = $this->Drivers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $driver = $this->Drivers->patchEntity($driver, $this->request->getData());
            if ($this->Drivers->save($driver)) {
                $this->Flash->success(__('O motorista foi salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The driver could not be saved. Please, try again.'));
        }
        $this->set(compact('driver'));
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $driver = $this->Drivers->get($id);
        if ($this->Drivers->delete($driver)) {
            $this->Flash->success(__('The driver has been deleted.'));
        } else {
            $this->Flash->error(__('The driver could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}