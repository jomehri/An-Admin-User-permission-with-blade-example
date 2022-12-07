## AliBaBa Task: A simple blade dashboard with user permission

A simple web application with different user levels, simple blade files, and chunk upload to upload large pdfs, using
database transactions (commit/rollback) and a few simple automated tests.

## Author

- name: Ali Jomehri
- phone: 09352770177
- mail: ajomehri@gmail.com

## What's included:

- [x] PHP 8.1
- [x] Production Readiness (Dockerized)
- [x] Strategy & Repository design patterns
- [x] Using Laravel service container, binding of services & repositories
- [x] Unit/Feature tests
- [x] White/Black Box tests

## Installation:

- [install docker](https://docs.docker.com/get-docker/) based on your system environment
- cd project folder
- cd docker
- `docker-compose up`
- cd ../src
- `cp .env.example .env`
- `cp .env.testing.example .env.testing`
- `composer install`
- `npm install`
- in a seperate terminam `npm run dev` and leave it open
- Grant required permissions: `sudo chmod 777 storage/ -R`
- cd ../docker
- Database Migrations(Raw mysql statements): `sudo docker-compose exec alb-php-web php artisan migrate:fresh --seed`
- Test Database Migrations(Raw mysql statements): `sudo docker-compose exec alb-php-web php artisan migrate:fresh
  --env=testing`

## Demo
- Login with `user@alibaba.ir` and password `123456` to see the user abilities
- Login with `admin@alibaba.ir` and password `123456` to see the admin abilities
- To run the tests: `sudo docker-compose exec alb-php-web php artisan test`
