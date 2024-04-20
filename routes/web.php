<?php

use App\Http\Controllers\AppartementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChambreController;
use App\Http\Controllers\FavoritePropertyController;
use App\Http\Controllers\LocalcommerceController;
use App\Http\Controllers\MaisonvillaController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TerrainimmobilierController;
use Illuminate\Support\Facades\Route;

Route::get('/Acceuil', function () {
    return view('welcome');
})->name('welcome');



Route::get('/estimation', function () {return view('pages.estimation');})->name('estimer');
Route::get('/propertiess', [PropertyController::class, 'showProperties'])->name('properties');
Route::get('/property/{id}', [PropertyController::class,'show'])->name('property.showDetail');


Route::post('/properties/store/appartement-studio-bureau', [PropertyController::class, 'storeAppartement'])->name('store_appartement-studio-bureau');
Route::post('/properties/store/Maison-Villa-Riad', [PropertyController::class, 'storeMaison'])->name('store_Maison-Villa-Riad');
Route::post('/properties/store/Local-Commerce', [PropertyController::class, 'storeLocalCommerce'])->name('store_Local-Commerce');
Route::post('/properties/store/terrain-immobilier', [PropertyController::class, 'storeLocalCommerce'])->name('store_terrain-immobilier');

Route::get('/properties/create/maison-riad-villa', [PropertyController::class, 'createMaisonRiadVilla'])->name('create.maison-riad-villa');
Route::get('/properties/create/appartement-studio-bureau', [PropertyController::class, 'createAppartementStudioBureau'])->name('create.appartement-studio-bureau');
Route::get('/properties/create/local-commerce', [PropertyController::class, 'createLocalCommerce'])->name('create.local-commerce');
Route::get('/properties/create/terrain-immobilier', [PropertyController::class, 'createTerrainImmobilier'])->name('create.terrain-immobilier');

Route::put('/properties/update/appartement-studio-bureau/{id}', [PropertyController::class, 'StoreUpdateAppartement'])->name('update_appartement-studio-bureau');
Route::put('/properties/update/maison-villa-riad/{id}', [PropertyController::class, 'StoreUpdateMaison'])->name('update_maison-villa-riad');
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




Route::post('/localcommerces', [LocalcommerceController::class, 'store'])->name('localcommerces.store');
Route::get('/localcommerces/create', [LocalcommerceController::class, 'create'])->name('localcommerces.create');
Route::get('/localcommerces/{id}/edit', [LocalcommerceController::class, 'edit'])->name('localcommerces.update');
Route::put('/localcommerces/update/{id}', [LocalcommerceController::class, 'Update'])->name('localcommerces.StoreUpdate');
Route::delete('/localcommerces/{id}', [LocalcommerceController::class, 'destroy'])->name('localcommerces.destroy');


Route::get('/appartements/create', [AppartementController::class, 'create'])->name('appartements.create');
Route::post('/appartements', [AppartementController::class, 'store'])->name('appartements.store');
Route::get('/appartements/{id}/edit', [AppartementController::class, 'edit'])->name('appartements.edit');
Route::put('/appartements/{id}', [AppartementController::class, 'update'])->name('appartements.update');
Route::delete('/appartements/{id}', [AppartementController::class, 'destroy'])->name('appartements.destroy');

Route::get('/maisons-villa-riad/create', [MaisonvillaController::class, 'create'])->name('maisons.create');
Route::post('/maisons-villa-riad', [MaisonvillaController::class, 'store'])->name('maisons.store');
Route::get('/maisons-villa-riad/{id}/edit', [MaisonvillaController::class, 'edit'])->name('maisons.edit');
Route::put('/maisons-villa-riad/{id}', [MaisonvillaController::class, 'update'])->name('maisons.update');
Route::delete('/maisons-villa-riad/{id}', [MaisonvillaController::class, 'destroy'])->name('maisons.destroy');


Route::get('/chambres/create', [ChambreController::class, 'create'])->name('chambres.create');
Route::post('/chambre', [ChambreController::class, 'store'])->name('chambres.store');
Route::get('/chambres/{id}/edit', [ChambreController::class, 'edit'])->name('chambres.edit');
Route::put('/chambres/{id}', [ChambreController::class, 'update'])->name('chambres.update');
Route::delete('/chambres/{id}', [ChambreController::class, 'destroy'])->name('chambres.destroy');


Route::get('/terrains-immobiliers/create', [TerrainimmobilierController::class, 'create'])->name('terrains-immobiliers.create');
Route::post('/terrains-immobiliers', [TerrainimmobilierController::class, 'store'])->name('terrains-immobiliers.store');
Route::get('/terrains-immobiliers/{id}/edit', [TerrainimmobilierController::class, 'edit'])->name('terrains-immobiliers.edit');
Route::put('/terrains-immobiliers/{id}', [TerrainimmobilierController::class, 'update'])->name('terrains-immobiliers.update');
Route::delete('/terrains-immobiliers/{id}', [TerrainimmobilierController::class, 'destroy'])->name('terrains-immobiliers.destroy');



Route::post('/favorite-properties/{property}', [FavoritePropertyController::class, 'toggleFavoriteProperty'])->name('favorite-properties.toggle');
Route::get('/favorite-properties', [FavoritePropertyController::class, 'showFavoriteProperties'])->name('favorite-properties.index');