# Laravel 11 - REST API with CRUD Operations

There's a lot here in this example, some of which may seem unnecessary. However, it can serve as template structure for much larger enterprise applications.

## Supported RESTful CRUD operations

Check the file `tests/restTest.http` for more information.

* POST - **C**reate new product
* GET - **R**ead all available products
* PUT - **U**pdate products
* DELETE - **D**elete product

## Getting Started

1. `composer create-project laravel/laravel RestApiCrudExample`
2. Configure your Database (optional)
3. `php artisan make:model Product -a`
   1. Generate a migration, seeder, factory, policy, resource controller, and form request classes for the model
      * `app/Models/Product.php`
      * `database/factories/ProductFactory.php`
      * `database/migrations/..._create_products_table.php`
      * `database/seeders/ProductSeeder.php`
      * `app/Http/Requests/StoreProductRequest.php`
      * `app/Http/Requests/UpdateProductRequest.php`
      * `app/Http/Requests/Controllers/ProductController.php`
      * `app/Policies/ProductPolicy.php`
4. Update Database migration for `products` table, adding `name` and `details` column.
5. Create interface for Product, adding the basic CRUD methods.
   1. `php artisan make:interface /Interfaces/ProductRepositoryInterface`
   2. Path: `/app/Http/Interfaces/ProductRepositoryInterface`
6. Create class, ProductRepository for the Model
   1. `php artisan make:class /Repositories/ProductRepository`
   2. Path: `app/Repositories/ProductRepository.php`
   3. This will handle the methods defined in our interface
7. Create a Service Provider to bind interface and the implementation
   1. `php artisan make:provider RepositoryServiceProvider`
   2. Path: `app/Providers/RepositoryServiceProvider.php`
8. Update Request Validations classes
   1. This performs the validation of the form requests to Create/Update
   2. File: `StoreProductRequest.php`
   3. File: `UpdateProductRequest.php`
9. Create business logic class for API Responses
   1. `php artisan make:class /Classes/ApiResponse`
   2. Path: `app/Classes/ApiResponse.php`
   3. Handles, Rollback (database), Throw (exception) and SendResponse result.
10. Create Resource, **ProductResource** (`JsonResource`)
    1. `php artisan make:resource ProductResource`
    2. Path: `app/Http/Resources/ProductResource.php`
11. Update the Controller, **ProductController** to handle CRUD operations
    1. Path: `app/Http/Controllers/ProductController.php`
12. Install API package, Sanctum
    1. `php artisan install:api`
    2. Input `yes` to perform migrations
    3. Update `routes/api.php` to hook route, `/products` to the `ProductController`.
13. Run the app
    1. `php artisan serve`

## Testing the Code

After launching, open Postman and try out the following:

### POST

POST: "http://localhost:8000/api/products"
Raw:

```json
{
    "name": "Product 2",
    "details": "desc here"
}
```

Response:

```json
{
    "success": true,
    "data": {
        "id": 1,
        "name": "Product 2",
        "details": "desc here"
    },
    "message": "Product created successfully"
}
```

### GET

GET: "http://localhost:8000/api/products"

Results:

```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "name": "Product 2",
            "details": "desc here"
        },
        {
            "id": 2,
            "name": "Product 1",
            "details": "product 1a"
        }
    ]
}
```

### DELETE

DELETE: "http://localhost:8000/api/products"

## References

* Laravel 11 REST API CRUD found on Medium.com

My repository here fixes errors and missing chunks from the original article, adding verbose logging output.
