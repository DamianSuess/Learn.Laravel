# Laravel 11 - Sample using PHP-CS-Fixer for VS Code

This is a sample (base Laravel 11) project which implements PHP-CS-Fixer (PHP Coding Standards Fixer) to fix your code to follow custom standards.

> _The PHP Coding Standards Fixer (PHP CS Fixer) tool fixes your code to follow standards; whether you want to follow PHP coding standards as defined in the PSR-1, PSR-2, etc., or other community driven ones like the Symfony one. You can also define your (team's) style through configuration._

## VS Code Extensions

| Name | Extension ID |
|-|-|
| PHP | `DEVSENSE.phptools-vscode` |
| php cs fixer | `junstyle.php-cs-fixer` |
| PHP Debug | `xdebug.php-debug` |
| PHP IntelliSense | `zobo.php-intellisense` (optional) |

### Disabled (_if installed_)

| Name | Extension ID |
|-|-|
| PHP Intelephense | `bmewburn.vscode-intelephense-client` |

## Steps to Reproduce

This assumes you have installed the aforementioned VS Code Extensions

1. Install PHP-CS-Fixer (_**recommended Method 1**_)
   1. Method 1 - _use your main `vendor` folder_:
      1. `composer require --dev friendsofphp/php-cs-fixer`
   2. Method 2 - _Creates a separate `vendor` folder_:
      1. `mkdir -p tools/php-cs-fixer`
      2. `composer require --working-dir=tools/php-cs-fixer friendsofphp/php-cs-fixer`
2. Create new `.php-cs-fixer.php` rules file
3. Execute test manually
   1. `./vendor/bin/php-cs-fixer fix app`
   2. This perform `fix` for all files in the `/app/` directory.
   3. Notice, `.php-cs-fixer.cache` file was created. This needs ignored
4. Edit `.gitignore` and add line `.php-cs-fixer.cache`

### Optional Modifications

#### `composer.json` Scripts

```json
 "scripts": {
    "format": "vendor/bin/php-cs-fixer fix",
    "lint": "vendor/bin/php-cs-fixer fix --dry-run",
    ...
```

1. `"format"` allows you to fix with `composer format`
2. `"lint"` allows you to check for files `composer lint`

## Code Sample Highlights

### `.php-cs-fixer.php`

Specifying directories to include:

```php
$finder = Finder::create()
  ->in([
    __DIR__ . '/app',
    __DIR__ . '/config',
    __DIR__ . '/database',
    __DIR__ . '/resources',
    __DIR__ . '/routes',
    __DIR__ . '/tests',
  ])
  ->name('*.php')
  ->notName('*.blade.php')
  ->ignoreDotFiles(true)
  ->ignoreVCS(true);
```

Alternatively, this includes all directories except certain directories:

```php
$finder = Finder::create()
  ->in(__DIR__)
  ->exclude([
    "bootstrap",
    "storage",
    "vendor",
    "docker",
  ])
  ->name('*.php')
  ->notName('*.blade.php')
  ->notName("server.php");
  ->ignoreDotFiles(true)
  ->ignoreVCS(true);
```

## References

* [PHP-CS-Fixer (GitHub)](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer)
* [Another setup example](https://dev.to/ibrarturi/setup-php-cs-fixer-for-laravel-project-44nf)
