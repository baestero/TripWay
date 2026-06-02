#!/bin/sh
set -e

echo "==> Running migrations..."
bin/cake migrations migrate || true

echo "==> Starting Apache..."
apache2-foreground
