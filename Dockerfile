# Use the official PHP 8.0 image as the base image
FROM php:8.0-fpm-alpine

RUN mkdir -p /var/www/html

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Set the entrypoint command to run the Laravel application using PHP-FPM
CMD ["php-fpm"]