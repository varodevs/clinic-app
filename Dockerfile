# Use the official PHP 8.0 image as the base image
FROM php:8.0-fpm-alpine

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN docker-php-ext-install pdo pdo_mysql

RUN mkdir -p /var/www/html
WORKDIR /var/www/html

COPY composer.json composer.lock ./

RUN composer install

# Set the entrypoint command to run the Laravel application using PHP-FPM
CMD ["php-fpm"]