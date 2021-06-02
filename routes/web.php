<?php

use App\Models\Materiel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\directeur\ChefController;
use App\Http\Controllers\chef\DemandeController;
use App\Http\Controllers\chef\IncidentController as IncidentController_chef;
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

Route::prefix('directeur')->group(function () {

    Route::get('/materiel_list/{categorie}', function($categorie){
        $materiels = Materiel::where('categorie', $categorie)->get();
        return response()->json($materiels);
    });
    Route::resource('materiels', MaterielController::class);
    Route::resource('chefs', ChefController::class);
    Route::resource('incidents', IncidentController_directeur::class);
});
Route::prefix('chef')->group(function () {
    Route::resource('demandes', DemandeController::class);
    Route::resource('incidents', IncidentController_chef::class);
});


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
