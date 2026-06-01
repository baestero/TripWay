<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\TripService;
use RuntimeException;

class TripsController extends AppController
{

    public function index()
    {

        $query = $this->Trips
            ->find()
            ->contain(['Drivers', 'Vehicles', 'Clients']);

        $trips = $this->paginate($query);

        $this->set(compact('trips'));
    }


    public function view($id = null)
    {
        $trip = $this->Trips->get($id, [
            'contain' => ['Drivers', 'Vehicles', 'Clients'],
        ]);

        $this->set(compact('trip'));
    }


    public function add()
    {
        $trip = $this->Trips->newEmptyEntity();

        if ($this->request->is('post')) {

            $service = new TripService();

            try {

                $service->createTrip($this->request->getData());

                $this->Flash->success('Viagem gerada com sucesso');

                return $this->redirect(['action' => 'index']);
            } catch (RuntimeException $e) {
                $this->Flash->error($e->getMessage());
            }
        }

        $drivers = $this->Trips->Drivers->find('list', ['limit' => 200])->all();
        $vehicles = $this->Trips->Vehicles->find('list', ['limit' => 200])->all();
        $clients = $this->Trips->Clients->find('list', ['limit' => 200])->all();

        $this->set(compact('trip', 'drivers', 'vehicles', 'clients'));
    }


    public function edit($id = null)
    {

        $trip = $this->Trips->get($id, [
            'contain' => [],
        ]);


        if ($trip->status == 'inactive') {
            $this->Flash->error(__('Viagem encerrada não pode ser alterada.'));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $trip = $this->Trips->patchEntity($trip, $this->request->getData());

            if ($this->Trips->save($trip)) {
                $this->Flash->success(__('Itinerário salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar itinerário.'));
        }
        $drivers = $this->Trips->Drivers->find('list', ['limit' => 200])->all();
        $vehicles = $this->Trips->Vehicles->find('list', ['limit' => 200])->all();
        $clients = $this->Trips->Clients->find('list', ['limit' => 200])->all();
        $this->set(compact('trip', 'drivers', 'vehicles', 'clients'));
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trip = $this->Trips->get($id);
        if ($this->Trips->delete($trip)) {
            $this->Flash->success(__('The trip has been deleted.'));
        } else {
            $this->Flash->error(__('The trip could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function finishTrip($id)
    {
        $service = new TripService();

        try {
            $service->finishTrip($id);

            $this->Flash->success('Viagem encerrada com sucesso');
        } catch (RuntimeException $e) {
            $this->Flash->error($e->getMessage());
        }
        return $this->redirect(['action' => 'index']);
    }
}
