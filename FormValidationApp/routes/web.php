<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get("users/create", [FormController::class, "create"]);
Route::post("users/create", [FormController::class, "store"])->name("users.store");

Route::get('/', function () {
  return redirect("users/create");
});

Route::get('users', function () {
  return redirect("users/create");
});
