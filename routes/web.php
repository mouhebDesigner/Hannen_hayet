<?php

use App\Models\Materiel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\MaterielController;
use App\Http\Controllers\CategorieController;

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
Route::get('/materiel_list/{categorie_id}', function($categorie_id){
    $materiels = Materiel::where('categorie_id', $categorie_id)->get();
    return response()->json($materiels);
});
Route::resource('categories', CategorieController::class);
Route::resource('materiels', MaterielController::class);
Route::resource('demandes', DemandeController::class);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
