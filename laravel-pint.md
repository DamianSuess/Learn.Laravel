# Laravel Pint

## Overview

Pint is a PHP code style fixer built on top of [PHP CS Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) and you can use its rules.

Pint comes automatically installed with all new Laravel applications. You can use the `pint.json` file to configure the rules.

## Running Pint

```sh
./vendor/bin/pint

# Verbose
./vendor/bin/pint -v

# Specific folder/files
./vendor/bin/pint app/Models
./vendor/bin/pint app/Models/User.php

# Inspect
./vendor/bin/pint --test

# Modify the files that have uncommitted changes
./vendor/bin/pint --dirty

# Fix any files with code style errors but also exit with a non-zero exit code
./vendor/bin/pint --repair
```

## References

* [Laravel Pint](https://laravel.com/docs/12.x/pint)
