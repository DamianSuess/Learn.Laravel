# Laravel 11 - Custom Database Naming Conventions Template

This example bulids upon our RESTful API (Sanctum package) with user authentication and customer database naming conventions. That's right, not `snake_case`!

> This project uses PascalCase as an example for overriding Laravel's default naming conventions. In reality, most organizations have their own conventions. Whether it be `passwd` instead of `password`, `userName` vs `name`, or `rememberToken` instead of `remember_token`.
>
> The point is, a framework should be flexible and well documented to suit a customer's needs.

## Laravel Hard-Coded Crap

Most of this project's database uses `PascalCase`, however, some table are pluralized and have columns that are still `snake_case` due to Laravel hard-coding them. This project will be updated when a workaround can be made.

Untouched Tables:

* `Sessions`
* `personal_access_tokens`

## ATTENTION

1. Models must override
   1. `$tableName` to make table name singular
   2. `$fillable` must match your DB column casing
2. Notable User model overrides:
   1. `protected $table = 'User';`
   2. `protected $authPasswordName = 'Password';`
   3. `protected $rememberTokenName = 'RememberToken';`
3. The `BaseUser` class is a copy/paste of `use Illuminate\Foundation\Auth\User`, except we extend `BaseModel`

## References

* [Laravel: How can I change the default Auth Password field name?](https://stackoverflow.com/a/39375007/249492)
