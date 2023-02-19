<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\ReferentielController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/candidat/create', [CandidatController::class, 'create'])->name('homepage');
Route::post('/stores', [CandidatController::class, 'store']);

Route::get('/candidat', [App\Http\Controllers\CandidatController::class, 'index'])->name('candidat.index');
Route::get('/candidat/edit/{id}', [App\Http\Controllers\CandidatController::class, 'show'])->name('candidat.show');

Route::get('/candidats/repartition', [CandidatController::class, 'candidatStats'])->name('candidatsRepartition');
Route::get('/candidats/form', [CandidatController::class, 'nbre'])->name('candidatsParFormation');
Route::get('/candidats/age', [CandidatController::class, 'showAgeDiagram'])->name('diagrammeAge');




Route::get('/formation/create', [FormationController::class, 'create'])->name('homepages');
Route::post('/storess', [FormationController::class, 'store']);

Route::get('/formation', [App\Http\Controllers\FormationController::class, 'index'])->name('formation.indexFormation');
Route::get('/formation/edit/{id}', [App\Http\Controllers\FormationController::class, 'show'])->name('formation.show');
Route::get('/formation/ref', [FormationController::class, 'formaReferentiel'])->name('formationsParReferentiel');
Route::get('/formation/type', [FormationController::class, 'formationType'])->name('formationsParType');
Route::get('/formation/statistique', [FormationController::class, 'showFormationStatus'])->name('diagrammeForma');





Route::get('/referentiel/create', [ReferentielController::class, 'create'])->name('homepagess');
Route::post('/storeReferentiel', [ReferentielController::class, 'store']);

Route::get('/referentiel', [App\Http\Controllers\ReferentielController::class, 'index'])->name('referentiel.indexReferentiel');
Route::get('/referentiel/edit/{id}', [App\Http\Controllers\ReferentielController::class, 'show'])->name('referentiel.show');



Route::get('/type/create', [TypeController::class, 'create'])->name('homepagesss');
Route::post('/storeType', [TypeController::class, 'store']);

Route::get('/type', [App\Http\Controllers\TypeController::class, 'index'])->name('type.indexType');
Route::get('/type/edit/{id}', [App\Http\Controllers\TypeController::class, 'show'])->name('type.show');