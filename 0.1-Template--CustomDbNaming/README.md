# Laravel 11 - Custom Database Naming Conventions Template

This example bulids upon our RESTful API (Sanctum package) with user authentication and customer database naming conventions. That's right, not `snake_case`!

> This project template uses singular PascalCase as an example for overriding Laravel's default naming conventions. In reality, most organizations have their own conventions whether it's camelCase, PascalCase, snake_case. In my previous organization, the tables were prefixed denoting `D` for dynamic, `S` for static enumerations, and `U` for user config tables; i.e. `DProduct`, `SProductType`, and `UPreference`.
>
> As a use case, your columns could be named differently such as: `passwd` vs. `password`, `userName` vs. `name`, or `rememberToken` instead of `remember_token`.
>
> The point is, a framework should be flexible and well documented to suit a customer's needs.

## Laravel Hard-Coded Crap

Most of this project's database uses `PascalCase`, however, some table are pluralized and have columns that are still `snake_case` due to Laravel hard-coding them. This project will be updated when a workaround can be made.

Untouched Tables:

* `Sessions`
* `personal_access_tokens`

## ATTENTION

_This does not include Sanctum API._

1. Models must override
   1. `$tableName` to make table name singular
   2. `$fillable` must match your DB column casing
2. Notable User model overrides:
   1. `protected $table = 'User';`
   2. `protected $authPasswordName = 'Password';`
   3. `protected $rememberTokenName = 'RememberToken';`
3. The `BaseUser` class is a copy/paste of `use Illuminate\Foundation\Auth\User`, except we extend `BaseModel`

## Laravel Factory and Seeder Bug

When running the seed command via `php artisan migrate:fresh --seed` you can encounter a Laravel "magic" bug.

There is a bug in Laravel "magic" where the Seeder and Factory classes will break attempting to auto-glue a database relationship. Most notably referencing the Foreign Key when you have one table dependent upon another.

This happens for a number of reasons, one being the model's usage of `belongsTo($related, $foreignKey)` method.

In the example of a `Customer` and `Invoice`. A customer can have many invoices, therefore the auto-glue in the `Invoice` model uses `belongsTo()` method to set the parent model and the column used as the foreign key.

```php
// ==========
// = Models =
// ==========
class Customer extends BaseModel
{
  ...

  public function Invoice()
  {
    return $this->hasMany(Invoice::class);
  }
}

class Invoice extends BaseModel
{
  ...

  public function Customer()
  {
    // Set the Foreign Key column name. Otherwise, seeder will fail
    return $this->belongsTo(
      Customer::class,
      "CustomerId"
    );
  }
}

// ==========
// = Seeder =
// ==========
class CustomerSeeder
{
   ...

  // Works with PascalCase foreign key column, `Inventory.CustomerId`
  for ($i = 1; $i <= 25; $i++)
  {
    $customer = Customer::factory()->create();
    $invoices = Invoice::factory()
      ->count(10)
      ->for($customer)
      ->create();
  }

  // Breaks:
  //  The following attempts to magically use, `customer_id` not `CustomerId`
  //  regardless of the predefined FK established in the database.
  //
  // Create 25 customers with 10 invoices
  Customer::factory()
    ->count(25)
    // ->hasInvoice(10)                   // Magic method; same as below
    ->has(Invoice::factory()->count(10))  // Same as `->hasInvoice(10)`
    ->create();
}
```

## References

* [Laravel: How can I change the default Auth Password field name?](https://stackoverflow.com/a/39375007/249492)
