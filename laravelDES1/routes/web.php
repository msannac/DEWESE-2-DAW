<?php

use App\Http\Controllers\PantalonController;
use App\Http\Controllers\discotecaController;
use App\Http\Controllers\postController;
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
//Ruta que devuelve una cadena
Route::get('/buenosdias',function(){
return "Tenga usted";
});

//Ruta que carga un metodo de una clase
Route::get('/cargarPantalon/{idPantalon}', [PantalonController::class, 'index']);


Route::get('/prueba',[discotecaController::class,'pruebasModelo']);

//Ruta principal
Route::get('/', discotecaController::class . '@index')->name('discoteca.index');

//Ruta que con el id de discoteca carga los datos y se los pasa al formulario de edicino
Route::get('/discoteca/{id}/edit', discotecaController::class . '@edit')->name('discoteca.edit');

//Ruta para cargar la vista de creaccion
Route::get('/discoteca/create', discotecaController::class . '@create')->name('discoteca.create');

//guarda en bd los datos de la discote
Route::post('/discoteca', discotecaController::class . '@store')->name('discoteca.store');

//Ruta para que muestre los datos de una discoteque
Route::get('/discoteca/{id}', discotecaController::class . '@show')->name('discoteca.show');


//Ruta que guarda datos en la bd
Route::put('/discoteca/{id}', discotecaController::class . '@update')->name('discoteca.update');

//Eliminamos la discoteca con id que recibe
Route::delete('/discoteca/{id}', discotecaController::class . '@destroy')->name('discoteca.destroy');




