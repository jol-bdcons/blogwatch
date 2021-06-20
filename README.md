## Requirements

Blogwatch runs on the Laravel 8 framework and uses Jetstream/Inertia/Vue stack for the frontend.  Before installation make sure you have the correct requirements required to run Laravel 8:

https://laravel.com/docs/8.x/installation#server-requirements

## Installation

Clone the repo locally:

```
git clone https://github.com/jol-bdcons/blogwatch.git blogwatch
cd blogwatch
```

Install PHP dependencies:

```
composer install
```

Install NPM and build the assets:

```
npm install
npm run dev
```

Setup configuration:

```
cp .env.example .env
```

Ensure that the following values are set in the .env file:

```
ADMIN_EMAIL=<admin user email>
ADMIN_PASSWORD=<admin user password>

REMOTE_POST_URL=<remote blog post feeder url>
```

Generate application key:

```
php artisan key:generate
```

Create a MySQL database:

You will need to create a new MySQL database and add the database configuration details to your .env file.

Run database migrations:

```
php artisan migrate
```

Run database seeder:

```
php artisan db:seed
```

If a server is not already running then the dev server:

```
php artisan serve
```

You can log in as the Admin user using the details you defined or register as a new user.

Initiate the scheduled task watcher:

Note: If the Laravel cron instruction is already running on the server then the following instruction is not required.

```
php artisan schedule:work
```

The result of the scheduled task for this application is written to the /storage/logs/get_post_task_log.log directory.

## Running tests

To run the tests, run:

```
php artisan test
```

NOTE: The database is refreshed after the tests are run.
