<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClasesController;

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

Route::get('/', function () {return view('welcome');});

Route::controller(HomeController::class)->group(function (){
    Route::get('/home', 'home');
    Route::get('/alumnos', 'alumnos');
    Route::get('/clases', 'clases');
    Route::post('/agregarAlumno', 'agregarAlumno');

    Route::get('/eliminar/{id}', 'eliminar');
    Route::post('/eliminar', 'eliminar2');

    Route::get('/editar/{id}', 'muestraedicion');
    Route::post('/almacenar', 'update');

});

Route::controller(ClasesController::class)->group(function (){
    Route::get('/home', 'home');
    Route::get('/alumnos', 'alumnos');
    Route::get('/clases', 'clases');
    Route::post('/agregarClase', 'agregarClase');

    Route::get('/eliminar/{id}', 'eliminar');
    Route::post('/eliminar', 'eliminar2');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
