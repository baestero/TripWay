#!/bin/sh
set -e

# Cria app_local.php se não existir
if [ ! -f config/app_local.php ]; then
  echo "==> Criando app_local.php..."
  cp config/app_local.example.php config/app_local.php
fi

echo "==> DATABASE_URL: $DATABASE_URL"
echo "==> Running migrations..."
bin/cake migrations migrate -c default || true

echo "==> Starting Apache..."
apache2-foreground