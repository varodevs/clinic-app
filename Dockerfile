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

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy the application files to the container
COPY . /var/www/html

# Set permissions for the storage and bootstrap/cache directories
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Install application dependencies and generate the autoload files
RUN composer install --optimize-autoloader --no-dev

# Generate the application key
RUN php artisan key:generate

# Expose the container port
EXPOSE 9000

# Set the entrypoint command to run the Laravel application using PHP-FPM
CMD ["php-fpm"]