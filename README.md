# Laravel Vue Sandbox
This is a Laravel Vue Sandbox app with a docker powered dev env. It is Composed of a 2 services

## API server
This is based of of `php:8.1.0-fpm` and extended with the dependacies required for Laravel development we also introduce a none root user to be used for devlopment.

Setup PHP

```
composer install
chown -R www-data:www-data storage/
cp .env.example .env
php artisan key:generate
```

Add Database Configuration to `.env`

```
DB_HOST=db
DB_DATABASE=dev_db
DB_PASSWORD=root
```

## Client services

This based off of `node:16.10.0-buster` and extended with a none root user for development.
