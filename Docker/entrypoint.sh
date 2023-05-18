#!/bin/bash

docker-compose run --rm composer install --no-progress --no-interaction

if [ ! -f ".env" ]; then
    echo "Creating env file for env $APP_ENV"
    cp .env.example .env
else
    echo ".env file already exists."
fi

php artisan migrate
php artisan key:generate
php artisan cache:clear
php artisan config:clear
php artisan route:clear

php artisan serve --port=$PORT --host=0.0.0.0

php artisan migrate
exec docker-php-entrypoint "$@"