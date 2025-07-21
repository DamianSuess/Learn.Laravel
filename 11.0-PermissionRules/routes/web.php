<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});

// BELOW TESTING (Don't remember)
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route
