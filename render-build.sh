#!/bin/bash

# Install PHP and required extensions
apt-get update && apt-get install -y \
    php8.3 \
    php8.3-curl \
    php8.3-mbstring \
    php8.3-xml \
    php8.3-mysql \
    php8.3-zip \
    php8.3-tokenizer \
    php8.3-pdo

# Install Composer
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install dependencies and optimize
composer install --no-dev --optimize-autoloader

# Generate Laravel key and cache
php artisan key:generate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache 