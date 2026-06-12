<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property int|null $client_id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $role
 * @property string $status
 * @property \Cake\I18n\FrozenTime|null $last_login
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 *
 * @property \App\Model\Entity\Client $client
 */
class User extends Entity
{

    protected $_accessible = [
        'client_id' => true,
        'name' => true,
        'email' => true,
        'password' => true,
        'role' => true,
        'status' => true,
        'last_login' => true,
        'created_at' => true,
        'updated_at' => true,
        'client' => true,
    ];


    protected $_hidden = [
        'password',
    ];

    protected function _setPassword(?string $password): ?string
    {
        if (empty($password)) {
            return $password;
        }

        return (new DefaultPasswordHasher())->hash($password);
    }
}
