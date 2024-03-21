<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/estimation', function () {
    return view('pages.estimation');
})->name('estimer');
