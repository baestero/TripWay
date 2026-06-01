<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Client Entity
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $document
 * @property string $zip_code
 * @property string $street
 * @property string $number
 * @property string $city
 * @property string $state
 * @property string $status
 *
 * @property \App\Model\Entity\Trip[] $trips
 */
class Client extends Entity
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
        'name' => true,
        'phone' => true,
        'document' => true,
        'zip_code' => true,
        'street' => true,
        'number' => true,
        'city' => true,
        'state' => true,
        'status' => true,
        'trips' => true,
    ];
}
