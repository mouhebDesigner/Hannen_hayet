<?php

use App\Models\Materiel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\directeur\ChefController;
use App\Http\Controllers\chef\DemandeController;
use App\Http\Controllers\chef\IncidentController as IncidentController_chef;
use App\Http\Controllers\directeur\DemandeController as DemandeController_directeur;
use App\Http\Controllers\responsable\DemandeController as DemandeController_responsable;
use App\Http\Controllers\directeur\IncidentController as IncidentController_directeur;
use App\Http\Controllers\directeur\MaterielController;
use App\Http\Controllers\directeur\CategorieController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('responsable')->group(function () {
    Route::get('demandes/{demande_id}/accepter', [DemandeController_responsable::class, 'accepter']);
    Route::get('demandes/{demande_id}/refuser', [DemandeController_responsable::class, 'refuser']);
    Route::resource('demandes', DemandeController_responsable::class);
});
Route::prefix('directeur')->group(function () {
    Route::get('demandes/{demande_id}/accepter', [DemandeController_directeur::class, 'accepter']);
    Route::get('demandes/{demande_id}/refuser', [DemandeController_directeur::class, 'refuser']);
    Route::get('demandes/{demande_id}/transferer', [DemandeController_directeur::class, 'transferer']);
    Route::resource('materiels', MaterielController::class);
    Route::resource('chefs', ChefController::class);
    Route::resource('incidents', IncidentController_directeur::class);
    Route::resource('demandes', DemandeController_directeur::class);
});

Route::prefix('chef')->group(function () {
    Route::resource('demandes', DemandeController::class);
    Route::resource('incidents', IncidentController_chef::class);
    Route::resource('materiels', MaterielController::class);

});
Route::get('/materiel_list/{categorie}', function($categorie){
    $materiels = Materiel::where('categorie', $categorie)->get();
    return response()->json($materiels);
});

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
