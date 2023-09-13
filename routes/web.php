<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::resource('/animal', AnimalController::class)->names('animals');
Route::get('/animal', [AnimalController::class, 'index'])->name('animal.index');
Route::get('/animal/create', [AnimalController::class, 'create'])->name('animal.create');
Route::get('/animal/{id}/edit', [AnimalController::class, 'edit'])->name('animal.edit');
Route::get('/animal/{id}/show', [AnimalController::class, 'show'])->name('animal.show');
// Route::get('/animal', [AnimalController::class, 'index'])->name('animal');
Route::get('animal/dashboard', [AnimalController::class, 'dashboard'])->name('animal.dashboard');
Route::get('/animal/massage', [AnimalController::class, 'update'])->name('animal.massage');
Route::delete('/animal/{id}', [AnimalController::class, 'destroy'])->name('animal.destroy');
Route::get('animal/export', [AnimalController::class, 'collection'])->name('animal.export');
Route::post('/animal/importar',[AnimalController::class,'importar'])->name('animal.import');