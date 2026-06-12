<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class User extends AbstractMigration
{

    public function change(): void
    {
        $table = $this->table('users');

        $table->addColumn('client_id', 'integer', [
            'null' => true
        ]);
        $table->addColumn('name', 'string', [
            'null' => false,
            'limit' => 100
        ]);
        $table->addColumn('email', 'string', [
            'null' => false,
            'limit' => 255
        ]);
        $table->addColumn('password', 'string', [
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('role', 'string', [
            'limit' => 20,
            'null' => false,
        ]);
        $table->addColumn('status', 'string', [
            'limit' => 20,
            'default' => 'active',
            'null' => false,
        ]);

        $table->addColumn('last_login', 'datetime', [
            'null' => true,
        ]);


        $table->addIndex('email', ['unique' => true]);
        $table->addForeignKey(
            'client_id',
            'clients',
            'id',
            [
                'delete' => 'RESTRICT'
            ]
        );
        $table->addTimestamps();
        $table->create();
    }
}
