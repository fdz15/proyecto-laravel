<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CasillaController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\EleccionController;
use App\Http\Controllers\VotoController;
use App\Http\Controllers\Auth\LoginController;

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
Route::resource('casilla', CasillaController::class);
Route::resource('candidato', CandidatoController::class);
Route::resource('eleccion', EleccionController::class);
Route::resource('voto', VotoController::class);

Route::get('login',[LoginController::class,'index'])->name('login');
Route::get('/login','App\Http\Controllers\Auth\LoginController@index');

Route::get('/login/facebook', 'App\Http\Controllers\Auth\LoginController@redirectToFacebookProvider');
Route::get('/login/facebook/callback', 'App\Http\Controllers\Auth\LoginController@handleProviderFacebookCallback');
Route::get('logout',[LoginController::class, 'logout']);
 
Route::middleware(['auth'])->group(function(){
Route::resource('voto',VotoController::class);

});