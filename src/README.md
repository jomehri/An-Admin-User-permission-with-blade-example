## Questioner

A simple web application with different user levels, simple blade files, and chunk upload to upload large pdfs, using
database transactions (commit/rollback) and a few simple automated tests.

## Author

- name: Ali Jomehri
- phone: 09352770177
- mail: ajomehri@gmail.com

## What's included:

- PHP 8.1
- Production Readiness (Dockerized)
- Strategy & Repository design patterns
- Using Laravel service container, binding of services & repositories
- Unit/Feature tests
- White/Black Box tests

## Installation:

- [install docker](https://docs.docker.com/get-docker/) based on your system environment
- cd project folder
- cd docker
- docker-compose up
- cd ../src
- cp .env.example .env
- cp .env.testing.example .env.testing
- composer install
- **Grant required permissions:** sudo chmod 777 storage/ -R
- cd ../docker
- **Database Migrations(Raw mysql statements):** sudo docker-compose exec alb-php-web php artisan migrate:fresh
- **Test Database Migrations(Raw mysql statements):** sudo docker-compose exec alb-php-web php artisan migrate:fresh
  --env=testing
- **To run the tests:** sudo docker-compose exec alb-php-web php artisan test
