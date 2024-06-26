# Laravel 11 - Sample using PHP-CS-Fixer for VS Code

This is a sample (base Laravel 11) project which implements PHP-CS-Fixer (PHP Coding Standards Fixer) to fix your code to follow custom standards.

> _The PHP Coding Standards Fixer (PHP CS Fixer) tool fixes your code to follow standards; whether you want to follow PHP coding standards as defined in the PSR-1, PSR-2, etc., or other community driven ones like the Symfony one. You can also define your (team's) style through configuration._

In our steps below, we'll be relying on the PHP-CS-Fixer VS Code extension to install the `php-cs-fixer.phar` for us. So you can skip that manual install step.

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

### Next, Install PHP-CS-Fixer VS Code Extension

In this step, we'll be configuring for both opening the project via the `xxx.code-workspace` file and also the directory as a whole. When using the "directory" method, the `.vscode/settings.json` file will be used for configuring PHP-CS-Fixer.

1. Install extension, `junstyle.php-cs-fixer`
   1. The extension includes `php-cs-fixer.phar` automatically.
   2. Optionally you can install php-cs-fixer globally, [Installation](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/installation.rst)
   3. Sample location: `C:\Users\USERNAME\.vscode\extensions\junstyle.php-cs-fixer-0.3.13\php-cs-fixer.phar`
2. Add following settings to your:
   1. `.code-workspace` - _When using a project workspace file_
   2. `.vscode/settings.json` - _When opening the whole folder_
   3. KEEP THESE IN-SYNC!

Sample settings:

```json
    "php-cs-fixer.executablePath": "${extensionPath}/php-cs-fixer.phar",
    //"php-cs-fixer.executablePathWindows": "", //eg: php-cs-fixer.bat
    "php-cs-fixer.onsave": false,
    "php-cs-fixer.rules": "@PSR12",
    "php-cs-fixer.config": ".php-cs-fixer.php;.php-cs-fixer.dist.php;.php_cs;.php_cs.dist",
    "php-cs-fixer.allowRisky": false,
    "php-cs-fixer.pathMode": "override",
    "php-cs-fixer.ignorePHPVersion": false,
    "php-cs-fixer.exclude": [],
    "php-cs-fixer.autoFixBySemicolon": false, // May cause lines to be deleted
    "php-cs-fixer.autoFixByBracket": true,
    "php-cs-fixer.formatHtml": false,
    "php-cs-fixer.documentFormattingProvider": true,
    "php.suggest.basic": false,
    "php.validate.enable": false,
```

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

## PHP-CS-Fixer Optional Modifications

### Indent with 2 Spaces and `\n`

To use 2 spaces instead of the default 4 spaces and end lines with `\n`:

```php
return $config->setFinder($finder)
  ...
  ->setIndent(str_pad('', 2))
  ->setLineEnding("\n")
  ...;
```

### Enforce trailing commas in multi line arrays

In the past, ending an array with a trailing `,` comma could be erroneous. However, it has become more lax due to source controls such as git. To include a trailing `,` set `trailing_comma_in_multiline` to `true`.  GCC even has a flag for `fugly-comma`.

```php
'trailing_comma_in_multiline' => true,
```

## Optional Modifications

### `composer.json` Scripts

```json
 "scripts": {
    "format": "vendor/bin/php-cs-fixer fix",
    "lint": "vendor/bin/php-cs-fixer fix --dry-run",
    ...
```

1. `"format"` allows you to fix with `composer format`
2. `"lint"` allows you to check for files `composer lint`

## References

* [PHP-CS-Fixer (GitHub)](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer)
* [PHP-CS-Fixer VS Code extension](https://github.com/junstyle/vscode-php-cs-fixer)
* Alternate guides:
  * [Alternate 1](https://dev.to/ibrarturi/setup-php-cs-fixer-for-laravel-project-44nf)
  * [Alternate 2](https://www.youtube.com/watch?v=0co_9kVcS38)
* Pint as an Alternatively
  * Pint uses PHP-CS-Fixer, however, it is geared towards Laravel. And does not require you perform extra install steps.
  * [Laravel Pint Extension](https://github.com/open-southeners/vscode-laravel-pint)
  * [Pint Install Guide](https://devinthewild.com/article/laravel-pint-formatting-vscode-phpstorm)
* [Indent 2 spaces (StackOverflow)](https://stackoverflow.com/questions/37193540/configure-php-cs-fixer-indentation-for-2-spaces-rather-than-4)
