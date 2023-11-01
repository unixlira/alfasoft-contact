<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Index\IndexController;
use App\Http\Controllers\Contacts\ContactController;

Route::get('/', [IndexController::class , 'index'])
     ->name('index');

Route::middleware('auth')->group(function () {
    Route::resource('contact', ContactController::class)
        ->only(['create','store', 'show', 'edit','update','destroy'])
        ->names('contact');
});

require __DIR__.'/auth.php';
