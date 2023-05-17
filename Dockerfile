# Use the official PHP 8.0 image as the base image
FROM php:8.0-fpm-alpine

RUN mkdir -p /var/www/html

WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Install system dependencies
RUN apk add --no-cache \
    curl \
    libpng-dev \
    libzip-dev \
    oniguruma-dev \
    zip \
    unzip

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

COPY . .

# Set the entrypoint command to run the Laravel application using PHP-FPM
CMD ["php-fpm"]