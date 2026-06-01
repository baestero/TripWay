<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class Client extends AbstractMigration
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
        $table = $this->table('clients');

        $table->addColumn('name', 'string', [
            'limit' => 20,
            'null' => false
        ]);
        $table->addColumn('phone', 'string', [
            'limit' => 15,
            'null' => false
        ]);
        $table->addColumn('document', 'string', [
            'limit' => 30,
            'null' => false
        ]);
        $table->addColumn('zip_code', 'string', [
            'limit' => 9,
            'null' => false
        ]);
        $table->addColumn('street', 'string', [
            'limit' => 50,
            'null' => false
        ]);
        $table->addColumn('number', 'string', [
            'limit' => 10,
            'null' => false
        ]);
        $table->addColumn('city', 'string', [
            'limit' => 20,
            'null' => false
        ]);
        $table->addColumn('state', 'string', [
            'limit' => 2,
            'null' => false
        ]);
        $table->addColumn('status', 'string', [
            'default' => 'active',
            'null' => false
        ]);
        $table->addIndex('document', ['unique' => true]);
        $table->create();
    }
}
