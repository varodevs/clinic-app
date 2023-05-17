# Use the official PHP 8.0 image as the base image
FROM php:8.0-fpm-alpine

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get upgrade -y \
    && apt-get install -y git libzip-dev unzip \
    && docker-php-ext-install \
        pdo_mysql zip \
    && docker-php-ext-enable \
        pdo_mysql zip

RUN mkdir -p /var/www/html
WORKDIR /var/www/html

COPY composer.json composer.lock ./

RUN composer install \
    && bin/console make:migration

# Set the entrypoint command to run the Laravel application using PHP-FPM
CMD ["php-fpm"]