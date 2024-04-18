<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

Route::get('/Acceuil', function () {
    return view('welcome');
})->name('welcome');
Route::get('/estimation', function () {return view('pages.estimation');})->name('estimer');
Route::get('/propertiess', [PropertyController::class, 'showProperties'])->name('properties');

Route::post('/properties/store/appartement-studio-bureau', [PropertyController::class, 'storeAppartement'])->name('store_appartement-studio-bureau');
Route::post('/properties/store/Maison-Villa-Riad', [PropertyController::class, 'storeMaison'])->name('store_Maison-Villa-Riad');
Route::post('/properties/store/Chambre', [PropertyController::class, 'storeChambre'])->name('store_Chambre');
Route::post('/properties/store/Local-Commerce', [PropertyController::class, 'storeLocalCommerce'])->name('store_Local-Commerce');
Route::post('/properties/store/terrain-immobilier', [PropertyController::class, 'storeLocalCommerce'])->name('store_terrain-immobilier');

Route::get('/properties/create/maison-riad-villa', [PropertyController::class, 'createMaisonRiadVilla'])->name('create.maison-riad-villa');
Route::get('/properties/create/appartement-studio-bureau', [PropertyController::class, 'createAppartementStudioBureau'])->name('create.appartement-studio-bureau');
Route::get('/properties/create/local-commerce', [PropertyController::class, 'createLocalCommerce'])->name('create.local-commerce');
Route::get('/properties/create/terrain-immobilier', [PropertyController::class, 'createTerrainImmobilier'])->name('create.terrain-immobilier');
Route::get('/properties/create/Chambres', [PropertyController::class, 'createChambres'])->name('create.Chambres');

Route::put('/properties/update/appartement-studio-bureau/{id}', [PropertyController::class, 'StoreUpdateAppartement'])->name('update_appartement-studio-bureau');
Route::put('/properties/update/maison-villa-riad/{id}', [PropertyController::class, 'StoreUpdateMaison'])->name('update_maison-villa-riad');
Route::put('/properties/update/chambre/{id}', [PropertyController::class, 'StoreUpdateChambre'])->name('update_chambre');
Route::put('/properties/update/local-commerce/{id}', [PropertyController::class, 'StoreUpdateLocalCommerce'])->name('update_local-commerce');
Route::put('/properties/update/terrain-immobilier/{id}', [PropertyController::class, 'StoreUpdateTerrainImmobilier'])->name('update_terrain-immobilier');


Route::get('/properties/update/maison-riad-villa/{id}', [PropertyController::class, 'updateMaisonRiadVilla'])->name('Edit_maison-villa-riad');
Route::get('/properties/update/appartement-studio-bureau/{id}', [PropertyController::class, 'updateAppartementStudioBureau'])->name('Edit_appartement-studio-bureau');
Route::get('/properties/update/local-commerce/{id}', [PropertyController::class, 'updateLocalCommerce'])->name('Edit_local-commerce');
Route::get('/properties/update/terrain-immobilier/{id}', [PropertyController::class, 'updateTerrainImmobilier'])->name('Edit_terrain-immobilier');
Route::get('/properties/update/chambres/{id}', [PropertyController::class, 'updateChambres'])->name('Edit_chambre');

Route::post('/properties/filter', [PropertyController::class, 'filterProperties'])->name('properties.filter');
// Route::get('/properties/filter', [PropertyController::class, 'filterProperties'])->name('properties.filter');


Route::controller(AuthController::class)->group(function () {
    Route::get('/register',  'showRegister')->name('register');
    Route::post('/register',  'register');
    Route::get('/login',  'showLogin')->name('login');
    Route::post('/login',  'login');
    Route::post('/logout',  'logout')->middleware('auth')->name('logout');
});