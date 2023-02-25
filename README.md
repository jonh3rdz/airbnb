# Airbnb Clone 

This is an Airbnb cloning thesis project in the UNIVO Web Programming Prespecialization, where this project uses Laravel technologies on the Back-end side.  


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Build Steps 

`Backend`

Basic Command Examples

API/V1/Countries

Is the location where the files are created.

API: Indicates that it is a resource of type api.

V1: Indicates the version.

Countries: Indicate the name of the resource.
- The model is declared in the singular and the migration will be created in the plural (English), the other resources are declared in the singular.
- Create a model with m for migration and f for factory and s for seeder -mfs  [php artisan make:model API/V1/Country -mfs](https://laravel.com/docs/9.x/eloquent#generating-model-classes).
- Create a controller  [php artisan make:controller API/V1/CountryController --api](https://laravel.com/docs/9.x/controllers#main-content) and --api for the [API resource controller](https://laravel.com/docs/9.x/controllers#api-resource-routes).

- Create a resource to transform individual models  [php artisan make:resource API/V1/Country/CountryResource](https://laravel.com/docs/9.x/eloquent-resources#generating-resources).
- Create a collection. If you want to customize the resource collection response  [php artisan make:resource API/V1/Country/CountryCollection](https://laravel.com/docs/9.x/eloquent-resources#resource-collections).
- create a "request form" for validation and authorization rules in the store to save data  [php artisan make:request API/V1/Country/StoreCountryRequest](https://laravel.com/docs/9.x/validation#creating-form-requests).
- create a "request form" for the validation and authorization rules in the store to update the data  [php artisan make:request API/V1/Country/UpdateCountryRequest](https://laravel.com/docs/9.x/validation#creating-form-requests).

```bash
php artisan make:model API/V1/Country -mfs
php artisan make:controller API/V1/CountryController --api
php artisan make:resource API/V1/Country/CountryResource
php artisan make:resource API/V1/Country/CountryCollection
php artisan make:request API/V1/Country/StoreCountryRequest
php artisan make:request API/V1/Country/UpdateCountryRequest
```


`Installation and execution`
```bash
git clone https://github.com/jmrz97/airbnb.git
cd airbnb
cp .env.example .env
composer install
npm install
```

create a local databse according to your prefer name, then 

```bash
database = airbnb
php artisan key:generate
php artisan migrate
php artisan storage:link
```

`Installation of the routes`
```bash
the paths in the aironb.postman_collection.json file will be updated very soon.
```

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
