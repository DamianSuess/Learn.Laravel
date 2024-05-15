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

## Laravel Model and Seeder

When running the seed command via `php artisan migrate:fresh --seed` you may encounter a Laravel "magic" error where it attempts to automatically glue the parent model's name and the column using `snake_case`.

Consider the database's pseudo code as follows, noting that `Invoice` belongs to `Customer`, or in other words, there are many Invoices to a single Customer.

```json
Customer { Id, Name, ...};
Invoice { Id, CustomerId, Amount, ... };
```

To avoid this issue, in the parent model (`Customer`) we configure the `->hasMany($related, $foreignKey, $localKey)` as follows, `->hasMany(Invoice::class, "CustomerId", "Id")`.

And in the child model (`Invoice`) we configure the `->belongsTo($related, $foreignKey, $ownerKey)` as follows, `->belongsTo(Customer::class, "CustomerId")`

If these are not explicitly setup, Laravel "magic" will attempt to auto-glue in the child to the parent using `snake_case` or even worse, if if the "ownerKey" isn't set the the seeder fail to create the parent model first, and `CustomerId` will have a `null` value.

### Sample Code

The sample code below shows you how to correctly join the relationship between these two.

Remember:

* If the parent's `hasMany(...)` doesn't specify the child's column relationship to the parent, the seeder may fail.
* If the child's `belongsTo(..)` doesn't specify the ForeignKey column name, it will auto-glue using snake_case.

```php
// ==========
// = Models =
// ==========
class Customer extends BaseModel
{
  ...

  public function Invoice()
  {
    // Be sure to set the Invoice's FK (CustomerId) and this model's local key (Id)
    return $this->hasMany(Invoice::class, "CustomerId", "Id");
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

  // Same as above. This only works when the parent correctly links via `hasMany(..)` relationship.
  Customer::factory()
    ->count(25)
    // ->hasInvoice(10)                   // Magic method; same as below
    ->has(Invoice::factory()->count(10))  // Same as `->hasInvoice(10)`
    ->create();
}
```

In this snippet example, even when specifying the foreign key's name in the `belongsTo(..)` method causes a failure becase a customer hasn't been created yet.

```php
  public function Customer()
  {
    // Set the Foreign Key column name. Otherwise, seeder will fail
    return $this->belongsTo(
      Customer::class,
      "CustomerId",
      "FK_InvoiceCustomerId_CustomerId"
    );
  }
```

## References

* [Laravel: How can I change the default Auth Password field name?](https://stackoverflow.com/a/39375007/249492)
