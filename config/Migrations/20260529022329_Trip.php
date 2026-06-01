<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class Trip extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('trips');

        $table->addColumn('driver_id', 'integer', [
            'null' => false
        ]);
        $table->addColumn('vehicle_id', 'integer', [
            'null' => false
        ]);
        $table->addColumn('client_id', 'integer', [
            'null' => false
        ]);
        $table->addColumn('origin_city', 'string', [
            'limit' => 50,
            'null' => false
        ]);
        $table->addColumn('origin_state', 'string', [
            'limit' => 2,
            'null' => false
        ]);

        $table->addColumn('destination_city', 'string', [
            'limit' => 50,
            'null' => false
        ]);
        $table->addColumn('destination_state', 'string', [
            'limit' => 2,
            'null' => false
        ]);

        $table->addColumn('start_at', 'timestamp', [
            'default' => 'CURRENT_TIMESTAMP',
            'null' => false
        ]);
        $table->addColumn('finished_at', 'timestamp', [
            'default' => NULL,
            'null' => true
        ]);

        $table->addColumn('status', 'string', [
            'default' => 'active',
            'null' => false
        ]);

        $table->addForeignKey('driver_id', 'drivers', 'id', [
            'delete' => 'RESTRICT'
        ]);
        $table->addForeignKey('vehicle_id', 'vehicles', 'id', [
            'delete' => 'RESTRICT'
        ]);
        $table->addForeignKey('client_id', 'clients', 'id', [
            'delete' => 'RESTRICT'
        ]);

        $table->create();
    }
}
