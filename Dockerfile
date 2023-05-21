FROM php:7.4-fpm

RUN apt-get update && apt-get install -y nginx libpng-dev libonig-dev libxml2-dev zip unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY /nginx/default.conf /etc/nginx/conf.d/default.conf

COPY . /var/www/html

WORKDIR /var/www/html

RUN composer install
RUN php artisan key:generate
RUN php artisan migrate

CMD ["php-fpm"]

EXPOSE 9000