#!/bin/bash

# Install PHP and Composer dependencies
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
composer install --no-dev --optimize-autoloader

# Generate Laravel key and cache
php artisan key:generate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache 