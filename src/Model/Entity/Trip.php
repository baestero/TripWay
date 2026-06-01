<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Trip Entity
 *
 * @property int $id
 * @property int $driver_id
 * @property int $vehicle_id
 * @property int $client_id
 * @property string $origin_city
 * @property string $origin_state
 * @property string $destination_city
 * @property string $destination_state
 * @property \Cake\I18n\FrozenTime $start_at
 * @property \Cake\I18n\FrozenTime|null $finished_at
 * @property string $status
 *
 * @property \App\Model\Entity\Driver $driver
 * @property \App\Model\Entity\Vehicle $vehicle
 * @property \App\Model\Entity\Client $client
 */
class Trip extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'driver_id' => true,
        'vehicle_id' => true,
        'client_id' => true,
        'origin_city' => true,
        'origin_state' => true,
        'destination_city' => true,
        'destination_state' => true,
        'start_at' => true,
        'finished_at' => true,
        'status' => true,
        'driver' => true,
        'vehicle' => true,
        'client' => true,
    ];
}
