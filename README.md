# Coding Challenge - ATCS

## Setup

After the git clone execute on terminal:

```bash
composer install
cp .env.example .env
```


## Database Setup

After that you must configure your database credentials to your .env file

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=database_username
DB_PASSWORD=database_password
```

To install the database execute on terminal:

```bash
php artisan migrate
php artisan db:seed
```

## Running

Finally to run the project you must execute on terminal:

```bash
php -S localhost:8000 -t public/
```

To access the application you must open on your browser http://localhost:8000/
