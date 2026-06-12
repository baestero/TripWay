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
                'password' => (new DefaultPasswordHasher())->hash('9812'),
                'role' => 'admin',
                'status' => 'active',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ]
        ];

        $this->table('users')
            ->insert($data)
            ->saveData();
    }
}
