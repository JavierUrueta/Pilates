<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClasesController;
use App\Http\Controllers\InstructoresController;

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

Route::controller(InstructoresController::class)->group(function (){
    Route::get('/home', 'home');
    Route::get('/alumnos', 'alumnos');
    Route::get('/clases', 'clases');
    
    Route::post('/agregarInstructor', 'agregarInstructor');

    Route::post('/eliminarInstructor', 'eliminarInstructor');

    Route::get('/editar/{id}', 'muestraedicion');
    Route::post('/almacenar', 'update');

});

Route::controller(HomeController::class)->group(function (){

    Route::post('/agregarAlumno', 'agregarAlumno');

    Route::post('/eliminarAlumno', 'eliminarAlumno');

    Route::get('/editar/{id}', 'muestraedicion');
    Route::post('/almacenar1', 'update');

    //EXCEL
    Route::get('/exportarAlumnos', 'exportarAlumnos')->name('alumnos.export');
    Route::post('/importarAlumnos', 'importarAlumnos')->name('alumnos.import');

});

Route::controller(ClasesController::class)->group(function (){

    Route::post('/agregarClase', 'agregarClase');

    Route::post('/eliminarClase', 'eliminarClase');

    //INSCRIPCIONES

    Route::post('/inscribirAlumno', 'inscribirAlumno');

    Route::post('/eliminarAlumnoDeClase', 'eliminarAlumnoDeClase');

    //PDF
    Route::get('/creaPdf', 'creaPdf');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
