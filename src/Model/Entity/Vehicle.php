<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vehicle Entity
 *
 * @property int $id
 * @property int $driver_id
 * @property string $license_plate
 * @property string $model
 * @property string $brand
 * @property int $year
 * @property string $status
 *
 * @property \App\Model\Entity\Driver $driver
 * @property \App\Model\Entity\Trip[] $trips
 */
class Vehicle extends Entity
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
        'license_plate' => true,
        'model' => true,
        'brand' => true,
        'year' => true,
        'status' => true,
        'driver' => true,
        'trips' => true,
    ];
}
