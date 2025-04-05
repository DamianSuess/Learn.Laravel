<?php

use App\Livewire\LifecycleView;
use App\Livewire\SampleView;
use Illuminate\Support\Facades\Route;

// Remove the default Laravel welcom page.
////Route::get('/', function () {
////    return view('welcome');
////});

// Wire-up to be a Livewire owned interface
// This automatically uses the "resources/views/components/layouts/app.blade.php" as the main page
// and allows you to handle multiple Livewire pages.
Route::get('/', SampleView::class);
Route::get('/counter', SampleView::class);
Route::get('/lifecycle', LifecycleView::class);
