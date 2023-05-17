# Use the official PHP 8.0 image as the base image
FROM php:8.0-fpm-alpine

RUN mkdir -p /usr/local/apache2/htdocs/

WORKDIR /usr/local/apache2/htdocs/

COPY composer.json composer.lock ./

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN docker-php-ext-install pdo pdo_mysql

# Set the entrypoint command to run the Laravel application using PHP-FPM
CMD ["php-fpm", "-y"]