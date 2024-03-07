## About This Repo

Basically, this is me trying out Laravel. Expect things to change, for the moment it's the chirper bootcamp from Laravel.

## Note to self

How to build this stuff
- Have a server with php, composer, npm and a DB (can be PostgreSQL, MySQL or SQlite)
- Clone this repo to said server
- Run `composer install`
- Copy `.env.example` to `.env` and modify the database path to link to a database
- Run `php artisan key:generate` and `php artisan migrate`
- Install Vite `npm install vite`
- Run vite `npm run dev`
- Either use the built-in server by running `php artisan serve` or point nginx to the build folder 