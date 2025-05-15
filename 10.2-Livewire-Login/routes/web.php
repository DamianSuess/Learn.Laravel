<?php

use App\Livewire\Dashboard;
use App\Livewire\Login;
use App\Livewire\Logout;
use App\Livewire\Register;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;

Route::get('/', fn (): RedirectResponse => redirect()->to('/login'));

//// Route::get('/', function (): RedirectResponse {
////   return redirect()->to('/login');
//// });

// Guest guarded routes
Route::group(['middleware' => 'guest'], function () {
  Route::get('/register', Register::class)->name('register');
  Route::get('/login', Login::class)->name('login');
});

// Authorized guarded routes
Route::group(['middleware' => 'auth'], function () {
  Route::get('/dashboard', Dashboard::class)->name('dashboard');
  Route::get('/logout', Logout::class)->name('logout');
});
