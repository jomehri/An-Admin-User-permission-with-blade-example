## Questioner

A simple web application to add requests by a user, and accept/reject them by an admin. Having the ability up upload
files in chunks.

## Author

- name: Ali Jomehri
- phone: 09352770177
- mail: ajomehri@gmail.com

## What's included:

- PHP 8
- Production Readiness (Dockerized)
- Strategy & Repository design patterns
- Using Laravel service container, binding of services & repositories
- Unit/Feature tests
- White/Black Box testing

## Installation:

- [install docker](https://docs.docker.com/get-docker/) based on your system environment
- cd project folder
- cd docker
- docker-compose up
- cd ../src
- cp .env.example .env
- cp .env.testing.example .env.testing
- composer install --ignore-platform-reqs
- **Grant required permissions:** sudo chmod 777 storage/ -R
- cd ../docker
- **Database Migrations(Raw mysql statements):** sudo docker-compose exec alb-php-web php artisan migrate:fresh
- **Test Database Migrations(Raw mysql statements):** sudo docker-compose exec alb-php-web php artisan migrate:fresh
  --env=testing
- **To run the tests:** sudo docker-compose exec alb-php-web php artisan test