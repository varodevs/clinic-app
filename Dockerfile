# Use the official PHP 8.0 image as the base image
FROM php:8.0-fpm-alpine

# Install system dependencies
RUN apk add --no-cache \
    curl \
    libpng-dev \
    libzip-dev \
    oniguruma-dev \
    zip \
    unzip

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl gd zip

# Expose the container port
EXPOSE 9000

# Set the entrypoint command to run the Laravel application using PHP-FPM
CMD ["php-fpm"]