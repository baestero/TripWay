#!/bin/sh
set -e

cat > /var/www/html/config/app_local.php << EOF
<?php
return [
    'debug' => true,
    'Security' => [
        'salt' => '$(echo $SECURITY_SALT)',
    ],
    'Datasources' => [
        'default' => [
            'driver' => 'Cake\\Database\\Driver\\Postgres',
            'host' => '${DB_HOST}',
            'username' => '${DB_USER}',
            'password' => '${DB_PASSWORD}',
            'database' => '${DB_DATABASE}',
            'port' => '${DB_PORT}',
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