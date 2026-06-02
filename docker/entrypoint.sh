#!/bin/sh
set -e

cat > /var/www/html/config/app_local.php << 'EOF'
<?php
return [
    'debug' => true,
    'Security' => [
        'salt' => env('SECURITY_SALT', 'algum-salt-longo-aqui'),
    ],
    'Datasources' => [
        'default' => [
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
EOF

echo "==> app_local.php criado!"
echo "==> Running migrations..."
bin/cake migrations migrate -c default || true

echo "==> Starting Apache..."
apache2-foreground