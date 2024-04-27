<?php

use App\Http\Controllers\AgentRequestController;
use App\Http\Controllers\AppartementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChambreController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FavoritePropertyController;
use App\Http\Controllers\LocalcommerceController;
use App\Http\Controllers\MaisonvillaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TerrainimmobilierController;
use Illuminate\Support\Facades\Route;

Route::get('/Acceuil', function () {return view('welcome'); })->name('welcome');
Route::get('/', function () {return view('welcome'); })->name('welcome');



Route::get('/dashboard/users', [DashboardController::class, 'showUsers'])->name('showUsers')->middleware('auth');
Route::put('/dashboard/users/update/{id}', [DashboardController::class,'updateUsers'])->name('updateUsers');
Route::delete('/dashboard/users/delete/{id}', [DashboardController::class,'DeleteUsers'])->name('DeleteUsers');
Route::get('/dashboard/statistique', [DashboardController::class, 'Statistiques'])->name('statistics');
Route::get('/dashboard/properties', [DashboardController::class, 'showProperties'])->name('DashboardProperties');
Route::put('/dashboard/properties/{id}/update-status', [DashboardController::class, 'updatePropertyStatus'])->name('updatePropertyStatus');
Route::put('/dashboard/properties/{id}/update-publication', [DashboardController::class, 'updatePropertyPublication'])->name('updatePropertyPublication');



Route::get('devenir-agent-immobilier', [AgentRequestController::class, 'devenirAgent'])->name('demandeAgentPage')->middleware('auth');
Route::post('devenir-agent-immobilier', [AgentRequestController::class, 'demandeetreAgent'])->name('demandeetreAgent');
Route::get('/dashboard/user/demandes/étre-Agent', [AgentRequestController::class,'showAgentRequests'])->name('showAgentRequests');
Route::post('/dashboard/users-demande/{id}/accepté', [AgentRequestController::class,'acceptAgentRequest'])->name('acceptDemande');
Route::post('/dashboard/agent-requests/{id}/Refusé', [AgentRequestController::class,'rejectAgentRequest'])->name('refuseDemande');


Route::get('/profile', [ProfileController::class,'show'])->name('profile.show');
Route::put('/profile', [ProfileController::class,'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class,'destroy'])->name('profile.destroy');


Route::get('/estimation', function () {return view('pages.estimation');})->name('estimer');
Route::get('/propertiess', [PropertyController::class, 'showProperties'])->name('properties');
Route::get('/property/{id}', [PropertyController::class,'show'])->name('property.showDetail');
Route::post('/properties/filter', [PropertyController::class, 'filterProperties'])->name('properties.filter');
Route::delete('properties/{id}', [PropertyController::class, 'destroy'])->name('properties.destroy');

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



Route::get('/favorite-properties', [FavoritePropertyController::class, 'showFavoriteProperties'])->name('favorite-properties');
Route::post('/favorite-properties/{propertyId}', [FavoritePropertyController::class, 'toggleFavoriteProperty'])->name('favorite-properties.toggle');
