<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TripsFixture
 */
class TripsFixture extends TestFixture
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
                'vehicle_id' => 1,
                'client_id' => 1,
                'origin_city' => 'Lorem ipsum dolor sit amet',
                'origin_state' => 'Lo',
                'destination_city' => 'Lorem ipsum dolor sit amet',
                'destination_state' => 'Lo',
                'start_at' => 1780067892,
                'finished_at' => 1780067892,
                'status' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
