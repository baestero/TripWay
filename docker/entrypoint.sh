#!/bin/sh
set -e

cat > /var/www/html/config/app_local.php << 'PHPEOF'
<?php
return [
    'debug' => true,
    'Security' => [
        'salt' => env('SECURITY_SALT', 'default-salt-value'),
    ],
    'Datasources' => [
        'default' => [
            'className' => 'Cake\Database\Connection',
            'driver' => 'Cake\Database\Driver\Postgres',
            'host' => env('DB_HOST', 'localhost'),
            'username' => env('DB_USER', ''),
            'password' => env('DB_PASSWORD', ''),
            'database' => env('DB_DATABASE', ''),
            'port' => env('DB_PORT', '5432'),
            'encoding' => 'utf8',
            'timezone' => 'UTC',
            'cacheMetadata' => true,
        ],
    ],
];
PHPEOF

echo "==> app_local.php criadoV3!"
echo "==> Conteudo gerado:"
cat /var/www/html/config/app_local.php

echo "==> Running migrations..."
bin/cake migrations migrate -c default || true

echo "==> Starting Apache..."
apache2-foreground