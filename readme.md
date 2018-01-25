# TinyStore
Create and view items in stock.

## Getting started
To get up and  running execute the following commands:
```bash
git clone https://github.com/nvisser/TinyStore.git TinyStore
cd $_
cp .env.example .env # Fill APP_KEY with a random string of 32 characters
composer install
touch /tmp/database.sqlite
php artisan migrate --seed
php -S 127.0.0.1:9191 -t public
```
Open [http://127.0.0.1:9191](http://127.0.0.1:9191) in your browser

## Endpoints
* GET `/items` - Shows all items
* GET `/items/1` - Shows items by id
* POST `/items` - Adds an item *Required fields:* `name`, `price`, `api_token`

For development the API token is `devtoken`, which should be in the database after running the migration.

## License
The Lumen framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
