<?php

use Migrations\AbstractSeed;
use Authentication\PasswordHasher\DefaultPasswordHasher;

class UsersSeed extends AbstractSeed
{
    public function run(): void
    {

        $exists = $this->fetchRow("
            SELECT id 
            FROM users 
            WHERE email = 'admin@tripway.com' 
            LIMIT 1
        ");

        if ($exists) {
            return;
        }

        $data = [
            [
                'name' => 'Admin',
                'email' => 'admin@tripway.com',
                'password' => (new DefaultPasswordHasher())->hash('1234'),
                'role' => 'admin',
                'status' => 'active',
            ]
        ];

        $this->table('users')
            ->insert($data)
            ->saveData();
    }
}
