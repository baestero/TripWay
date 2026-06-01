<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VehiclesFixture
 */
class VehiclesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'driver_id' => 1,
                'license_plate' => 'Lorem ipsum d',
                'model' => 'Lorem ipsum dolor ',
                'brand' => 'Lorem ipsum dolor ',
                'year' => 1,
                'status' => 'Lorem ipsum dolor ',
            ],
        ];
        parent::init();
    }
}
