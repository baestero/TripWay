<?php

use Migrations\AbstractSeed;
use Authentication\PasswordHasher\DefaultPasswordHasher;

class UsersSeed extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            [
                'name' => 'Admin',
                'email' => 'admin@tripway.com',
                'password' => (new DefaultPasswordHasher())->hash('1234'),
                'role' => 'admin',
                'status' => 'active',
            ]
        ];

        $table = $this->table('users');
        $table->insert($data)->saveData();
    }
}
