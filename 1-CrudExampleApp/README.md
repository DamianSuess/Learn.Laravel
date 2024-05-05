# Laravel 11 - CRUD Example App

## Steps to Reproduce

1. `composer create-project laravel/laravel CrudExampleApp`
2. Configure database in `.env` file
3. `php artisan make:migration create_products_table --create=products`
   1. `php artisan migrate`
4. Form Request Validation Classes
   1. Create
      1. `php artisan make:request ProductStoreRequest`
      2. Path: `app/Http/Requests/ProductStoreRequest`
   2. Update
      1. `php artisan make:request ProductUpdateRequest`
      2. Path: `app/Http/Requests/ProductStoreRequest`
5. Create Controller and Model
   1. `artisan make:controller ProductController --resource --model=Product`
   2. It will as, "Do you want to generate `App\Models\Product`"?  **YES**
   3. Path: `\app\Models\Product.php`
      1. Add fields, `Name` and `details`.
   4. Path: `app\Http\Controllers\ProductController.php` with 7 methods:
      1. `index()`
      2. `create()`
      3. `store()`
      4. `show()`
      5. `edit()`
      6. `update()`
      7. `destroy()`
6. Add Resource Route
   1. Path, `routes/web.php`
   2. Adding route, `Route::resource("products", ProductController::class);`
7. Update AppServiceProvider
   1. Use bootstrap 5 for pagination
   2. Path,`app/Provides/AppServiceProvider.php`
8. Add Blade Files
   1. `php artisan make:view products/layout` - `layout.blade.php`
   2. `php artisan make:view products/index` - `index.blade.php`
   3. `php artisan make:view products/create` - `create.blade.php`
   4. `php artisan make:view products/edit` - `edit.blade.php`
   5. `php artisan make:view products/show` - `show.blade.php`
9. Run Laravel App - `http://localhost:8000/products`

### Sample DB

> ```ini
> DB_CONNECTION=mysql
> DB_HOST=127.0.0.1
> DB_PORT=3306
> DB_DATABASE=here your database name(blog)
> DB_USERNAME=here database username(root)
> DB_PASSWORD=here database password(root)
> ```
