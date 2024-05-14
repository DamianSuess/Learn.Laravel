# Laravel 11 REST API

This example uses the RESTful Sanctum API package with user authentication.

Using the [REST Client](https://marketplace.visualstudio.com/items?itemName=humao.rest-client) extension, you can perform manual tests with the project's [restTests.http](tests/restTests.http) file.

## Steps to Reproduce

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
      2. **Path:** `app/Http/Controllers/API/RegisterController.php`
      3. **Path:** `app/Http/Controllers/API/ProductController.php`
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

## Test with 'REST Client' VS Code Extension

This project uses REST API login authentication, returning a '_Bearer Token_'. In order to use the REST Client, you must first log in to the user created in this project to get your _Bearer Token_. Then you may continue onto performing your CRUD operations on the Products API, passing along your authentication token.

Below we'll explain each of the steps for recreating the tests

### Sample '.http' REST Client test

First we create a variable called `baseUrl` so we don't have to retype things.

```http
@baseUrl = http://localhost:8000
```

#### Create User

Aft then you may skip to the [Get Products](#Get-Products) section
If your user was already created in another session, you may skip to 'Login' section below.

The `// @name login` line stores the results in the variable `login`.

```http
// @name login
POST {{baseUrl}}/api/register HTTP/1.1
Content-Type: multipart/form-data; boundary=DummyFormData

--DummyFormData
Content-Disposition: form-data; name="name"

John5
--DummyFormData
Content-Disposition: form-data; name="email"

some@email.com
--DummyFormData
Content-Disposition: form-data; name="password"

aaaa2
--DummyFormData
Content-Disposition: form-data; name="c_password"

aaaa2
--DummyFormData--

```

Sample Response Body:

```json
{
  "success": true,
  "data": {
    "token": "16|AsNzBwAN1LhF6hog4ALWrzu4b76GtGLs9aWpxBDQ0b8be49a",
    "name": "John5"
  },
  "message": "User login successfully."
}
```

#### Login

The `// @name login` line stores the results in the variable `login`.

```http
// @name login
POST {{baseUrl}}/api/login HTTP/1.1
Content-Type: application/x-www-form-urlencoded

email=some@email.com&password=aaaa2
```

Sample Response Body:

```json
{
  "success": true,
  "data": {
    "token": "16|AsNzBwAN1LhF6hog4ALWrzu4b76GtGLs9aWpxBDQ0b8be49a",
    "name": "John5"
  },
  "message": "User login successfully."
}
```

#### POST - Create a New Product

This issues a post command and stores the JSON body results into the variable, `newProduct`.

```http
// @name newProduct
POST {{baseUrl}}/api/products HTTP/1.1
Authorization: Bearer {{login.response.body.$.data.token}}
Content-Type: application/json

{
    "name": "Ball",
    "detail": "Its round."
}
```

#### Get All Products

Get the list of products using the `login` body's JSON result.

```http
GET {{baseUrl}}/api/products HTTP/1.1
Authorization: Bearer {{login.response.body.$.data.token}}
```

Sample JSON Response:

```json
{
  "success": true,
  "data": [
    {
      "id": 2,
      "name": "Ball",
      "detail": "Its round.",
      "created_at": "08\/05\/2024",
      "updated_at": "08\/05\/2024"
    }
  ],
  "message": "Products retrieved successfully."
}
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

This example is based on [rest-api-authentication-using-sanctum-tutorial](https://www.itsolutionstuff.com/post/laravel-11-rest-api-authentication-using-sanctum-tutorialexample.html), extending functionality, fixing bugs, and added REST Client tests for VS Code.
