## About

Larassifieds is a classifieds app built with Laravel 5.4 and Vue.js.

## Cool Features

- Braintree payment integration for easy payments
- Favourite listings
- Draft listings for later publishing
- Share listings with multiple persons

## Installation

1. Download this repo.

2. Rename `.env.example` to `.env` and fill the options.

3. Run the following commands:
```
composer install
npm install
php artisan key:generate
php artisan migrate
php artisan db:seed
npm run dev
php artisan serve
```

If you are making changes to JavaScript or Styles, make sure you run `npm run watch`


## License

Larassifieds is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
