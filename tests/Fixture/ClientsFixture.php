<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ClientsFixture
 */
class ClientsFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor ',
                'phone' => 'Lorem ipsum d',
                'document' => 'Lorem ipsum dolor sit amet',
                'zip_code' => 'Lorem i',
                'street' => 'Lorem ipsum dolor sit amet',
                'number' => 'Lorem ip',
                'city' => 'Lorem ipsum dolor ',
                'state' => 'Lo',
                'status' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
