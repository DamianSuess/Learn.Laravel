# Laravel 11 REST API

This example bulids upon our RESTful API (Sanctum package) with user authentication and customer database naming conventions. That's right, not `snake_case`!

Using the [REST Client](https://marketplace.visualstudio.com/items?itemName=humao.rest-client) extension, you can perform manual tests with the project's [restTests.http](tests/restTests.http) file.

## Laravel Hard-Coded Crap

Most of this project's database uses `PascalCase`, however, some table are pluralized and have columns that are still `snake_case` due to Laravel hard-coding them. This project will be updated when a workaround can be made.

Those tables are:

* `Sessions`

## Steps to Reproduce

1. Copy the `3.0-RestApi-Login` sample project
   1. `composer install` - Install vendor packages
2. Import Custom DB base classes and seeders from `5.1-PascalCaseSeeder`
   1. Import: `app\Common\PascalBlueprint.php`
   2. Import: `app\Models\BaseModel.php`
   3. Import: `app\Models\BaseUser.php`
   4. Import stubs:
      1. `migration.create.stub`
      2. `migration.stub`
      3. `migration.update.stub`
      4. `model.stub`
   5. Update: `database\seeders\DatabaseSeeder.php`
      1. Renaming `name`->`Name` and  `email`->`Email`
   6. Update: `database\factories\UserFactory.php`
3. Cleanup database using `migrate:fresh`
   1. `php artisan migrate:fresh`

### Bearer Token Sample

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
