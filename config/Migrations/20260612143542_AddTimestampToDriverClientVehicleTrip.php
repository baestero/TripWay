<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class AddTimestampToDriverClientVehicleTrip extends AbstractMigration
{

    public function change(): void
    {
        $this->table('drivers')
            ->addTimestamps()
            ->update();
        $this->table('clients')
            ->addTimestamps()
            ->update();
        $this->table('vehicles')
            ->addTimestamps()
            ->update();
        $this->table('trips')
            ->addTimestamps()
            ->update();
    }
}
