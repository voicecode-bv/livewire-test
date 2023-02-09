# Livewire 404 error reproduction

This application replicates the 404 error thrown when Livewire executes a POST request. 
For me it seems like it has something to do with the translation helper as a translation for routes in web.php.

```
Route::get(__('routes.favorites'), [TestController::class, 'index'])->name('test');
```

## Installation instructions

**Install composer dependencies**
```
composer install
```
**Copy example environment file and make sure your database credentials are present**
```
cp .env.example .env
```
**Generate application key**
```
php artisan key:generate
```
**Set database credentials in .env**
```
DB_DATABASE=database
DB_USERNAME=user
DB_PASSWORD=pass
```
**Build and seed database**
```
php artisan migrate:fresh --seed
```