<?php

namespace App\Service;

use Cake\ORM\TableRegistry;
use RuntimeException;
use CAKE\Log\Log;

use function PHPUnit\Framework\throwException;

class TripService
{
  private $Trips;
  private $Vehicles;
  private $Drivers;
  private $Clients;

  public function __construct()
  {
    //usamos para acessar tabela sem precisar estar no model/controller
    $this->Trips = TableRegistry::getTableLocator()->get('Trips');
    $this->Vehicles = TableRegistry::getTableLocator()->get('Vehicles');
    $this->Drivers = TableRegistry::getTableLocator()->get('Drivers');
    $this->Clients = TableRegistry::getTableLocator()->get('Clients');
  }


  public function createTrip(array $data)
  //recebendo os dados do form, validamos e salvamos no banco.
  {
    //validando motorista

    $driver = $this->Drivers->get($data['driver_id']);

    if ($driver->status === 'inactive') {
      throw new RuntimeException('Não é possível criar viagem com motorista inativo, verifique o cadastro');
    }

    //procurando viagens ativas pra aquele motorista 

    $driverBusy = $this->Trips
      ->find()
      ->where([
        'driver_id' => $data['driver_id'],
        'status' => 'active'
      ])->count();

    if ($driverBusy > 0) {
      throw new RuntimeException('O Motorista já possui uma viagem em andamento');
    }

    //validando veículo


    $vehicle = $this->Vehicles->get($data['vehicle_id']);

    if ($vehicle->status === 'inactive') {
      throw new RuntimeException('Não é possível criar viagem com veículo inativo, verifique o cadastro');
    }

    //procurando viagens ativas pra aquele veículo 

    $vehicleBusy = $this->Trips
      ->find()
      ->where([
        'vehicle_id' => $data['vehicle_id'],
        'status' => 'active'
      ])->count();

    if ($vehicleBusy > 0) {
      throw new RuntimeException('O veiculo já possui uma viagem em andamento');
    }

    //validando vínculo - motorista/veiculo

    $vehicle = $this->Vehicles->get($data['vehicle_id']);

    if ((int)$vehicle->driver_id !== (int)$data['driver_id']) {
      throw new RuntimeException('Esse veículo não tem vínculo com esse motorista');
    }

    // Validando cliente 


    $client = $this->Clients->get($data['client_id']);

    if ($client->status === 'inactive') {
      throw new RuntimeException('Não é possível criar viagem com cliente inativo, verifique o cadastro');
    }

    //Criando entity

    $trip = $this->Trips->newEntity($data);

    //5salvar

    if (!$this->Trips->save($trip)) {
      throw new RuntimeException('Não foi possível criar a viagem');
    }

    return $trip;
  }

  //finalizar viagem

  public function finishTrip($tripId)
  {

    $trip = $this->Trips->get($tripId);

    if ($trip->status != 'active') {
      throw new RuntimeException('Viagem já está encerrada');
    }

    $trip->status = 'inactive';
    $trip->finished_at = date('Y-m-d H:i:s');

    if (!$this->Trips->save($trip)) {
      throw new RuntimeException('Não foi possível encerrar viagem');
    }

    return $trip;
  }
}
