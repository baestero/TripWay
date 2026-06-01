<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class Driver extends AbstractMigration
{

    public function change(): void
    {
        $table = $this->table('drivers');

        $table->addColumn('name', 'string', [
            'limit' => 50,
            'null' => false
        ]);
        $table->addColumn('cpf', 'string', [
            'limit' => 50,
            'null' => false
        ]);
        $table->addColumn('phone', 'string', [
            'limit' => 20,
            'null' => false
        ]);
        $table->addColumn('status', 'string', [
            'limit' => 20,
            'default' => 'active',
            'null' => false
        ]);

        $table->addIndex('cpf', ['unique' => true]);
        $table->create();
    }
}