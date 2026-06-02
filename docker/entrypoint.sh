#!/bin/sh
set -e

echo "==> Running migrations..."
bin/cake migrations migrate -c default || true

echo "==> Starting Apache..."
apache2-foreground
