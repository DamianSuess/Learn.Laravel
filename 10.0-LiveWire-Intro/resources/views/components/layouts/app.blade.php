<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app.css" />
    <title>{{ $title ?? 'Livewire Samples Default Title' }}</title>
  </head>

  <body>
    <nav>
      <a wire:navigate href="/" @class(['current' => true])>Home</a>
      <a wire:navigate href="/counter">Counters</a>
      <a wire:navigate href="/lifecycle">Lifecycle</a>

      {{--
      <a href="/" @class(['current' => request()->is('/')])>Home</a>
      <a href="/counter" @class(['current' => request()->is('counter')])>Counters</a>
      <a href="/lifecycle" @class(['current' => request()->is('lifecycle')])>Lifecycle</a>
       --}}
    </nav>
    {{ $slot }}
  </body>

</html>
