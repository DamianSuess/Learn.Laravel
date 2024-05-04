# Tests

## CRUD Test

1. Create new Laravel app
   1. `composer create-project laravel/laravel example-app`
2. Install Sanctum API
   1. `php artisan install:api`
3. Configure Sanctum
   1. Open `app/Models/User.php`
   2. Add code: `, HasApiTokens;`
4. Add Product Table and Model
   1. `php artisan make:migration create_products_table` - Create new migration script
   2. Add extra columns to `Products` table (path: `/database/migrations/...`)
   3. `php artisan migrate` - Run migration scripts
   4. `php artisan make:model Product` - Create new model
   5. Modify model: `app/Models/Product.php`, adding DB columns
5. Create API Routes
   1. Create API routes for login, register, and products REST API
   2. **Path:** `routes/api.php`
6. Create Controller Files
   1. `php artisan make:controller API/BaseController`
   2. `php artisan make:controller API/RegisterController`
   3. `php artisan make:controller API/ProductController`
   4. Edit controllers:
      1. **Path:** `app/Http/Controllers/API/BaseController.php`
      2. **Path:** `app/Http/Controllers/API/BaseController.php`
      3. **Path:** `app/Http/Controllers/API/BaseController.php`
7. Create Eloquent API Resources
   1. `php artisan make:resource ProductResource`
   2. Path: `app/Http/Resources/ProductResource.php`
8. Run Laravel
   1. `php artisan serve`
   2. Use Postman and check API

```json
'headers' => [
    'Accept' => 'application/json',
    'Authorization' => 'Bearer '.$accessToken,
]
```

## Test with Postman

### Register

* URL: `http://localhost:8000/api/register`
* Type: POST
* Body -> Form-Data
  * name        = "Some Name
  * email       = "some@email.com"
  * password    = "aaaa"
  * c_password  = "aaaa"

Response:

```json
{
    "success": true,
    "data": {
        "token": "1|ubgWOVrG8OSpra3bsJf5bS9hrZGY9SwWBbQJUjBV3a7f6e13",
        "name": "Samtha"
    },
    "message": "User register successfully."
}
```

## References

* https://www.itsolutionstuff.com/post/laravel-11-rest-api-authentication-using-sanctum-tutorialexample.html
* https://www.itsolutionstuff.com/post/laravel-11-crud-application-example-tutorialexample.html
