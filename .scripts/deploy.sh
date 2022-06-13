#!/bin/bash
set -e

echo "Deployment started ..."

STAGE="staging"
if [[ "$1" == "production" ]]; then
    STAGE="production"
fi

# Enter maintenance mode or return true if already is in maintenance mode
#(php artisan down) || true

# Pull the latest version
git pull origin

# Install composer dependencies
if [[ "$STAGE" == "production" ]]; then
    composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader
else
    composer install
fi

# Clear the old cache
php artisan clear-compiled

# Recreate cache
php artisan optimize

# Compile npm assets
if [[ "$STAGE" == "production" ]]; then
    npm run prod
else
    npm run dev
fi

# Run database migrations
php artisan migrate --force

# Exit maintenance mode
php artisan up

echo "Deployment finished!"
