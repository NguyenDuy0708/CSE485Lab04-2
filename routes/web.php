<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.layout');
});

Route::resource('customers', CustomerController::class);