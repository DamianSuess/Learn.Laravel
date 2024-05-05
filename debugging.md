# Debugging Tips

Each project has to ability to quickly "Debug" and "Run" in VS Code.

When debugging, the `launch.json` is configured to startup PHP's XDebug, launch Laravel, and open Chrome. This may not work on all user environments, however, this is the most common setup.

## Views (.blade.php)

### Step-Through Debugging

To debug your Views (`.blade.php`), you can insert `{{ @xdebug_break() }}` in your HTML to hit a breakpoint when that area of the code is reached.

When hit, you will start at the framework's `helpers.php`. From there, press F10 down through to the `return ...;` statement, it will then take you to your generated PHP/HTML code.

> Generated code can be found in `storage/framework/views/{GUID}.php`.

### Error Catching

There are multiple ways to report back Form errors found via the FormController.php

1. Using `@if ($errors->any()) ... @endif` to display a `Div` block at the top
2. Using `@error('fieldName') ... @enderror` to display a `Span` under the input box.
3. Using `@if ($errors->has('fieldName')) ... @endif` to display a `Span` under the input box
