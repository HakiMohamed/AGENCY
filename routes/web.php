<?php

use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/estimation', function () {return view('pages.estimation');})->name('estimer');

Route::get('/properties/create/maison-riad-villa', [PropertyController::class, 'createMaisonRiadVilla'])->name('create.maison-riad-villa');
Route::get('/properties/create/appartement-studio-bureau', [PropertyController::class, 'createAppartementStudioBureau'])->name('create.appartement-studio-bureau');
Route::get('/properties/create/local-commerce', [PropertyController::class, 'createLocalCommerce'])->name('create.local-commerce');
Route::get('/properties/create/terrain-immobilier', [PropertyController::class, 'createTerrainImmobilier'])->name('create.terrain-immobilier');
Route::get('/properties/create/Chambres', [PropertyController::class, 'createChambres'])->name('create.Chambres');
Route::post('/properties/store/appartement-studio-bureau', [PropertyController::class, 'storeAppartement'])->name('store_appartement-studio-bureau');
Route::get('/properties', [PropertyController::class, 'showProperties'])->name('properties');
