#!/bin/sh
set -e

cat > config/app_local.php << 'EOF'
<?php
return [
    'debug' => true,
    'Security' => [
        'salt' => env('SECURITY_SALT', 'algum-salt-aqui-qualquer-string-longa'),
    ],
    'Datasources' => [
        'default' => [
            'driver' => 'Cake\Database\Driver\Postgres',
            'url' => env('DATABASE_URL', null),
        ],
    ],
];
EOF

echo "==> app_local.php criado!"
echo "==> DATABASE_URL: $DATABASE_URL"
echo "==> Running migrations..."
bin/cake migrations migrate -c default || true

echo "==> Starting Apache..."
apache2-foreground