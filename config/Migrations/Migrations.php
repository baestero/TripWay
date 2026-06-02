<?php

return [
  'paths' => [
    'migrations' => ROOT . '/db/migrations',
    'seeds' => ROOT . '/db/seeds',
  ],

  'environments' => [
    'default_migration_table' => 'phinxlog',

    'default_environment' => 'default',

    'default' => [
      'adapter' => 'pgsql',   // 🔥 ISSO AQUI É O PONTO CRÍTICO

      'host' => env('DB_HOST'),
      'name' => env('DB_NAME'),
      'user' => env('DB_USER'),
      'pass' => env('DB_PASS'),
      'port' => 5432,
    ],
  ],
];
