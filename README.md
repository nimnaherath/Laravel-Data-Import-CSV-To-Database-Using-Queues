## Laravel Data Import CSV To Database Using Queues

"Laravel Data Import CSV To Database Using Queues" is a project that allows users to import large amounts of data from CSV files into a database using Laravel queue.

## Requirements 
- PHP 8.1.6 or higher
- Composer
- Node
- MySQL

## Installation instructions

You can clone the project using Git


```
$ git clone https://github.com/nimnaherath/Laravel-Data-Import-CSV-To-Database-Using-Queues.git
```

Change working  directory

```
$ cd Laravel-Data-Import-CSV-To-Database-Using-Queues/
```
Install dependencies 
```
$ composer install
```

Copy `.env.example` file to `.env` on the root folder.
```
$ cp .env.example .env
```

Generate app key
```
$ php artisan key:generate
```

Also change `DB_DATABASE, DB_USERNAME, DB_PASSWORD` in `.env`

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your db name
DB_USERNAME=your db username
DB_PASSWORD=your db password
```
Run Migration 
```
$ php artisan migrate
```

Finally, don't forget to instruct your application to use the database driver by updating the `QUEUE_CONNECTION` variable in your application's `.env` file:

```
QUEUE_CONNECTION=database
```

install node dependencies

```
$ npm install && npm run dev
```


Run application 
```
$ php artisan serve
```

start executing jobs
```
$ php artisan queue:work
```

## Usage 

Open Browser visit `http://127.0.0.1:8000/`

![Home Page](https://github.com/nimnaherath/Laravel-Data-Import-CSV-To-Database-Using-Queues/blob/master/img/1.jpg)

Select csv file in `csv` folder in the project file and upload

Then see Data importing process

![Importing](https://github.com/nimnaherath/Laravel-Data-Import-CSV-To-Database-Using-Queues/blob/master/img/3.jpg)
