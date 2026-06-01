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

  public function __construct()
  {
    //usamos para acessar tabela sem precisar estar no model/controller
    $this->Trips = TableRegistry::getTableLocator()->get('Trips');
    $this->Vehicles = TableRegistry::getTableLocator()->get('Vehicles');
  }


  public function createTrip(array $data)
  //recebendo os dados do form, validamos e salvamos no banco.
  {
    //1.validando motorista
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

    // 2.validando veículo

    $vehicleBusy = $this->Trips
      ->find()
      ->where([
        'vehicle_id' => $data['vehicle_id'],
        'status' => 'active'
      ])->count();

    if ($vehicleBusy > 0) {
      throw new RuntimeException('O veiculo já possui uma viagem em andamento');
    }

    //3. validando vínculo - motorista/veiculo

    $vehicle = $this->Vehicles->get($data['vehicle_id']);

    if ((int)$vehicle->driver_id !== (int)$data['driver_id']) {
      throw new RuntimeException('Esse veículo não tem vínculo com esse motorista');
    }

    //4. Criando entity

    $trip = $this->Trips->newEntity($data);

    //5. salvar

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
