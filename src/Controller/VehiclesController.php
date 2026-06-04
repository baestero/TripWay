<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Vehicles Controller
 *
 * @property \App\Model\Table\VehiclesTable $Vehicles
 * @method \App\Model\Entity\Vehicle[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VehiclesController extends AppController
{

    public function index()
    {
        $query = $this->Vehicles
            ->find()
            ->contain(['Drivers']);

        $vehicles = $this->paginate($query);

        $this->set(compact('vehicles'));
    }

    public function view($id = null)
    {
        $vehicle = $this->Vehicles->get($id, [
            'contain' => ['Drivers', 'Trips'],
        ]);

        $this->set(compact('vehicle'));
    }


    public function add()
    {
        $vehicle = $this->Vehicles->newEmptyEntity();
        if ($this->request->is('post')) {
            $vehicle = $this->Vehicles->patchEntity($vehicle, $this->request->getData());
            if ($this->Vehicles->save($vehicle)) {
                $this->Flash->success(__('Informações do veículo salvas com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vehicle could not be saved. Please, try again.'));
        }
        $drivers = $this->Vehicles->Drivers->find('list', ['limit' => 200])->all();
        $this->set(compact('vehicle', 'drivers'));
    }


    public function edit($id = null)
    {
        $vehicle = $this->Vehicles->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehicle = $this->Vehicles->patchEntity($vehicle, $this->request->getData());
            if ($this->Vehicles->save($vehicle)) {
                $this->Flash->success(__('Informações do veículo salvas com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vehicle could not be saved. Please, try again.'));
        }
        $drivers = $this->Vehicles->Drivers->find('list', ['limit' => 200])->all();
        $this->set(compact('vehicle', 'drivers'));
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vehicle = $this->Vehicles->get($id);
        if ($this->Vehicles->delete($vehicle)) {
            $this->Flash->success(__('The vehicle has been deleted.'));
        } else {
            $this->Flash->error(__('The vehicle could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
