# Server Requirements

- PHP >= 7.1.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- BCMath PHP Extension

# Installation
- Clone Repository from GitHub
- Import **.env** in rootpath
- Create Data Bases declared in .env files
- Open terminal and run:

> npm install

> composer install

- Create Data Base for UDS Pizzaria (udspizzaria)

#Create Tables
> php artisan migrate --seed

- Edit **/config/database.php**: declare connection to the Project Data Base

        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'udspizzaria'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
        ],

- Open terminal and run:
> php artisan migrate

- Open terminal and run:
> php artisan db:seed

- Start server:
> php artisan server

- To run:
> npm run watch
