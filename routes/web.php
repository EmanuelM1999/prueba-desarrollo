<?php

use Illuminate\Support\Facades\Route;

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


//Ruta principal
Route::get('/', 'EmpleadoController@index')->name('index');



//Ruta usada para hacer todas las solicitudes del CRUD de empleados.
Route::resource('/employees', 'EmpleadoController')->except(['index'])->names('employees');
