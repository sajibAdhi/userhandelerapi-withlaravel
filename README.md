<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Installation

1. Clone the repo and `cd` into it
2. Run `composer install`
3. Run `cp .env.example .env`
4. Configuration
   1. Open `.env` and change the following:
       - `DB_DATABASE` - Database name
       - `DB_USERNAME` - Database username
       - `DB_PASSWORD` - Database password
5. Run `php artisan key:generate`
6. Run `php artisan migrate`
7. Run `php artisan db:seed`
8. Run `php artisan serve`
9. Open `localhost:8000/docs` in your browser. You will see the API documentation.

## API Tests

[Public Postman Api Workspace](https://www.postman.com/sajibadhi/workspace/userhandeler/overview)

Admin:
- email: admin@example.com
- password: password

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
