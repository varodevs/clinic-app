# Use the official PHP 8.0 image as the base image
FROM php:8.0 as php

RUN apt-get update -y
RUN apt-get install -y unzip libpq-dev libcurl14-gnutls-dev
RUN docker-php-ext-install pdo pdo_mysql bcmath

RUN pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis

WORKDIR /var/www/html


RUN mkdir -p /var/www/html

COPY . .

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

ENV PORT=443
ENTRYPOINT [ "docker/entrypoint.sh " ]