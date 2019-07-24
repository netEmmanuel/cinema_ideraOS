# Cinema Ideros

This repo contains the basic implementation of a cinema app

---

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.7/installation#installation)

Clone the repository

    git clone git@github.com:netEmmanuel/cinema_ideraOS.git

Switch to the repo folder

    cd cinema_ideraOS

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Generate encryption keys for Passport

    php artisan passport:install

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone git@github.com:netEmmanuel/cinema_ideraOS.git
    cd cinema_ideraOS
    composer install
    cp .env.example .env
    php artisan key:generate

**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

---

# Code overview

## Dependencies

-   [laravel-passport](https://laravel.com/docs/master/passport) - For authentication
-   [laravel-cors](https://github.com/barryvdh/laravel-cors) - For handling Cross-Origin Resource Sharing (CORS)

## Folders

-   `app/Models` - Contains all the Eloquent models
-   `app/Http/Controllers/Api` - Contains all the api controllers
-   `app/Http/Requests` - Contains all the api form requests
-   `app/Repositories` - Contains the files implementing the repository logic
-   `app/Services` - Contains the files implementing the service logic
-   `app/Transformers` - Contains all the data transformers
-   `config` - Contains all the application configuration files
-   `database/factories` - Contains the model factory for all the models
-   `database/migrations` - Contains all the database migrations
-   `routes` - Contains all the api routes defined in api.php file
-   `tests` - Contains all the application tests
-   `tests/Feature` - Contains all the api tests

## Environment variables

-   `.env` - Environment variables can be set in this file

**_Note_** : You can quickly set the database information and other variables in this file and have the application fully working.

-   `.env.testing` - Environment variables for running umit/feature tests can be set in this file.

---

# Testing API

Run the laravel development server

    php artisan serve

The api can now be accessed at

    http://localhost:8000/api

Automated test can also be run via

    ./vendor/bin/phpunit

---

# Cross-Origin Resource Sharing (CORS)

This applications has CORS enabled by default on all API endpoints. The default configuration allows requests from all origins to help speed up your frontend testing. The CORS allowed origins can be changed by setting them in the config file.
