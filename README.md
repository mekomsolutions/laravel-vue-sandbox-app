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



## Client services

This based off of `node:16.10.0-buster` and extended with a none root user for development.

Start Client

```
docker compose exec client /bin/bash
yarn
yarn dev
```
Access Demo

http://localhost:3000

`demo@example.com / demo@demo`