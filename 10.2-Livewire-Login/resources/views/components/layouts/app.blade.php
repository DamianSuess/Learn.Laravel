<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'User Registration and Login with Bootstrap' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  </head>

  <body>

    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container">
        <a class="navbar-brand" href="{{ URL('/dashboard') }}" wire:navigate>Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto">
            @guest
              <li class="nav-item">
                <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="/login" wire:navigate>Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('register') ? 'active' : '' }}" href="/register" wire:navigate>Register</a>
              </li>
            @else
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ Auth::user()->name }}
                </a>
                <livewire:logout />
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <h3 class="mb-5 mt-3 text-center">User Registration and Login</h3>

      @if (session()->has('message'))
        <div class="row justify-content-center mt-3 text-center">
          <div class="col-md-8">
            <div class="alert alert-success" role="alert">
              {{ session('message') }}
            </div>
          </div>
        </div>
      @endif

      {{ $slot }}

      <div class="row justify-content-center mt-3 text-center">
        <div class="col-md-12">
          <p>Laravel Login Example</p>
          <p>Check out the other Laravel samples in this repository.</p>
        </div>
      </div>

    </div>

    <script data-navigate-once src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>

</html>
