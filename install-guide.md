# Tools Required

## Tools

* VS Code (or something else)
* PHP v8.2 (minimum)
* [Xdebug](https://xdebug.org/docs/install)
* [Composer](https://getcomposer.org/Composer-Setup.exe)

## Install Xdebug

Follow the [Installation Wizard](https://xdebug.org/wizard) instructions.

Sample:

1. Download [php_xdebug-3.3.2-8.2-vs16-x86_64.dll](https://xdebug.org/files/php_xdebug-3.3.2-8.2-vs16-x86_64.dll)
2. Move the downloaded file to `ext`, and rename it to `php_xdebug.dll`
3. Update `C:\...\PHP\php.ini` and add the line after extensions list (before Module Settings)
   * `zend_extension = xdebug`

```ini
[PHP]
...
zend_extension = xdebug
```

## Installing Composer

1. Install [Composer](https://getcomposer.org/Composer-Setup.exe)
2. Terminal: `composer global require laravel/installer`

## PHP Configuration

```ini
[PHP]
...
extension=curl
extension=fileinfo
extension=mbstring
extension=pdo_sqlite
extension=zip
```

## XDebug
