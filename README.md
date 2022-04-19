# Laravel Vue Sandbox
This is a Laravel Vue Sandbox app with a docker powered dev env. It is Composed of a 2 services

## API server
This is based of of `php:8.1.0-fpm` and extended with the dependacies required for Laravel development we also introduce a none root user to be used for devlopment.

Start the project

```
docker compose up -d
```

Setup Laravel

```
docker compose exec php /bin/bash
composer install
cp .env.example .env
```

Add Database Configuration to `server/.env`

```
DB_HOST=db
DB_DATABASE=dev_db
DB_PASSWORD=root
```

```
php artisan key:generate
php artisan migrate:refresh --seed
php artisan passport:keys
```
