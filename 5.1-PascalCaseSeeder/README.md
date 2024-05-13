# Laravel 11 - Custom DB Naming Conventions

No every organization uses the same database naming conventions, especially when there is a debate between singular vs plural, PascalCase/camelCase/snake_case.

> **Why PascalCase and not snake_case?**
>
> No every organization uses the same database naming conventions, especially when there is a debate between singular vs plural, PascalCase/camelCase/snake_case. >
>
> Frankly, my organization moved away from `snake_case` years ago. And most 3rd-party frameworks (_should_) allow you to pick and choose your own naming conventions.

This example replaces Laravel's database naming conventions with your own custom definitions. Now tables are singular (`Users` -> `User`) and columns use `PascalCase` instead of `snake_case`

This leverages the Stubs for class templates and overrides `Blueprint` class with our own `PascalBlueprint` class.

## Base Models for PascalCase

* `BaseModel` -
* `BaseUser` - Enforces the use of `BaseModel` for `CreatedAt` and `UpdatedAt` columns are used.

## Eloquent Seeder Bug

### Database Definition

### Invoice Model

```php
  public function Customer()
  {
    // Works only if column is named, `customer_id`
    // return $this->belongsTo(Customer::class);

    // Set the Foreign Key column name. Otherwise, seeder will fail
    return $this->belongsTo(
      Customer::class,
      "CustomerId"
    );
  }
```

### Customer and Invoice Factory

```php
class InvoiceFactory extends Factory
{
  protected $model = Invoice::class;

  public function definition(): array
  {
    // 1 = Billed, 2 = Paid, 3 = Void
    $statusTypeId = $this->faker->numberBetween(0, 3);

    return [
      "CustomerId" => Customer::factory(),             // TODO (2024-05-11 DJS): Make Eloquent use "CustomerId" (See, CreateWorksoutsTable migration)
      "Amount" => $this->faker->numberBetween(1, 5000),
      "PaidStatusId" => $statusTypeId,
      "BilledDttm" => $this->faker->dateTimeThisDecade(),
      "PaidDttm" => $statusTypeId == 1 ? $this->faker->dateTimeThisDecade() : null,
    ];
  }
}
```

### CustomerSeeder.php

Below, well create 25 `Customer` database entries with 3 Invoices each.

Implementation for using seeder and factory with PascalCase/camelCase column names.

```php
public function run(): void
{
  // Works with PascalCase foreign key column, `Inventory.CustomerId`
  for ($i = 1; $i <= 25; $i++)
  {
    $customer = Customer::factory()->create();
    $invoices = Invoice::factory()
      ->count(3)
      ->for($customer)
      ->create();
  }
}
```

Buggy Implementation:

```php
// Eloquent Bug: Create 25 customers with 3 invoices
Customer::factory()
  ->count(25)
  // ->hasInvoice(3)                   // Magic method; same as below
  ->has(Invoice::factory()->count(3))  // Same as `->hasInvoice(3)`
  ->create();
```

## Hard-Codded Warning

Though you can change the `Sessions` table name via `config/session.php`, you CANNOT change the `snake_case` column names. These are hardcoded into the framework's vendor package `laravel/framework/src/Illuminate/Session/DatabaseSessionHandler.php`

Hard coded column name references

* `id`
* `user_id`
* `ip_address`
* `user_agent`
* `last_activity`

## Steps to Reproduce

1. Create base project
2. Create new `BaseModel.php`
   1. `php artisan make:model BaseModel`
   2. Override the `const` for CreatedAt, etc.
   3. Override the `getTable()` method
3. Create custom `PascalBlueprint` for database commands
   1. `php artisan make:class Common/PascalBlueprint`
   2. Path: `app/Common/PascalBlueprint.php`
   3. Update class to extend `Blueprint` class' and replace methods referencing `snake_case` column names.
4. Create [stubs](https://laravel-news.com/customizing-stubs-in-laravel)
   1. `php artisan stub:publish`
   2. Edit `stubs/model.stub`, replacing `Model` with `BaseModel`
   3. Edit `stubs/migration.create.stub` to use our `PascalBlueprint` class
   4. Edit `stubs/migration.update.stub` to use our `PascalBlueprint` class
5. Updated table names in `config/*.php` folder

## Code Sample Highlights

### Tips for Creating Migration

* `php artisan make:migration CreateProductInventoryTable`
  * Use PascalCase
  * Begin with `Create` prefix and end with `Table` suffix
  * This will create a table using `snake_case` unfortunately (`product_inventory`)

### Sample Migration Script

Migration scripts now look like the following:

```php
  public function up(): void
  {
    $schema = PascalBlueprint::GetSchema();

    $schema->create("User", function (PascalBlueprint $table) {
      $table->id();
      $table->string('Name');
      $table->string('Email')->unique();
      $table->timestamp('EmailVerifiedAt')->nullable();
      $table->string('Password');
      $table->rememberToken();
      $table->timestamps();
    });
  }
```

## TO DO

1. Make `php artisan make:migration Create<TableName>Table` generate PascalCase not `snake_case`

```php
str_replace('_', '', ucwords($key, '_'));
```

## References
