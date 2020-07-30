## About The Application

This is an application designed to add currencies and link them to countries. Designed as a Proof of concept, and as a Test for Small World Financials.

## How To

First, clone the project. Once it's done, run the command

```
./dev.sh install
```

This command will install all the required composer packages, create a .env file and give the correct permissions to the `Storage` folder.

After that, you should edit the `.env` file and create a database. Done it, run the commend

```
./dev.sh migrate
```

This will install the migrations table, run all the migrations and seed the tables.

If you want to run the tests, you must add the `Database` and `Application` configuration values to a `.env.testing` file:

```
APP_NAME="Small World Financial"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=smallworld_test
DB_USERNAME=
DB_PASSWORD=
```

With this values, run the command:

```
php artisan test
```

## Answers to the Assessment:

[To see the answers to the assessment, click here](https://github.com/Garanaw/smallworld/blob/master/prueba-smallworldfinancials.pdf)
