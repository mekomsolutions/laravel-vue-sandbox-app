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

### Install Pest

[Pest](https://pestphp.com/) is a framework for PHP tests that allows writing simpler
tests as well as providing nicer default output than PHPUnit. We'll be using it to
keep things simple.

```
composer require pestphp/pest-plugin-laravel --dev
```

If you are prompted to allow the Composer plugin, please enter "y".

To confirm everything works, run Pest on the server container:

```
./vendor/bin/pest
```

You should get output like:

```
   PASS  Tests\Unit\ExampleTest
  ✓ example

   PASS  Tests\Feature\Auth\AuthenticationTest
  ✓ login screen can be rendered
  ✓ users can authenticate using the login screen
  ✓ users can not authenticate with invalid password

   PASS  Tests\Feature\Auth\EmailVerificationTest
  ✓ email verification screen can be rendered
  ✓ email can be verified
  ✓ email is not verified with invalid hash

   PASS  Tests\Feature\Auth\PasswordConfirmationTest
  ✓ confirm password screen can be rendered
  ✓ password can be confirmed
  ✓ password is not confirmed with invalid password

   PASS  Tests\Feature\Auth\PasswordResetTest
  ✓ reset password link screen can be rendered
  ✓ reset password link can be requested
  ✓ reset password screen can be rendered
  ✓ password can be reset with valid token

   PASS  Tests\Feature\Auth\RegistrationTest
  ✓ registration screen can be rendered
  ✓ new users can register

   PASS  Tests\Feature\ExampleTest
  ✓ example

  Tests:  17 passed
  Time:   2.41s

```
