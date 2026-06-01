<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class Vehicle extends AbstractMigration
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
        $table = $this->table('vehicles');

        $table->addColumn('driver_id', 'integer', [
            'null' => false
        ]);
        $table->addColumn('license_plate', 'string', [
            'limit' => 15,
            'null' => false
        ]);
        $table->addColumn('model', 'string', [
            'limit' => 20,
            'null' => false
        ]);
        $table->addColumn('brand', 'string', [
            'limit' => 20,
            'null' => false
        ]);
        $table->addColumn('year', 'integer', [
            'null' => false
        ]);
        $table->addColumn('status', 'string', [
            'limit' => 20,
            'default' => 'active',
            'null' => false
        ]);

        $table->addIndex('license_plate', ['unique' => true]);
        $table->addForeignKey('driver_id', 'drivers', 'id', [
            'delete' => 'RESTRICT'
        ]);
        $table->create();
    }
}
