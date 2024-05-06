# Laravel 11 - Project Name Here

## Steps to Reproduce

1. Create base project
2. Create new `BaseModel.php`
   1. `php artisan make:model BaseModel`
   2. Override the `const` for CreatedAt, etc.
   3. Override the `getTable()` method
3. Create `CustomBlueprint` for database commands
   1. `php artisan make:class Common/CustomBlueprint`
   2. Path: `app/Common/CustomBlueprint.php`
   3. Update class to extend `Blueprint` class' and replace methods referencing `snake_case` column names.
4. Create [stubs](https://laravel-news.com/customizing-stubs-in-laravel)
   1. `php artisan stub:publish`
   2. Edit `stubs/model.stub`, replacing `Model` with `BaseModel`
   3. Edit `stubs/migration.create.stub` to use our `CustomBlueprint` class
   4. Edit `stubs/migration.update.stub` to use our `CustomBlueprint` class

## Code Sample Highlights

...

## References

* Item-1
