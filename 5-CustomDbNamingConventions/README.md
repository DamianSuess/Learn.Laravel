# Laravel 11 - Custom DB Naming Conventions

No every organization uses the same database naming conventions, especially when there is a debate between singular vs plural, PascalCase/camelCase/snake_case.

This example replaces Laravel's database naming conventions with your own custom definitions. Now tables are singular (`Users` -> `User`) and columns use `PascalCase` instead of `snake_case`

This leverages the Stubs for class templates and overrides `Blueprint` class with our own `PascalBlueprint` class.

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

## Code Sample Highlights

Migration scripts now look like the following:

```php
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
```

## References
