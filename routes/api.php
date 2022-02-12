<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Rutas de usuarios
Route::get('usuarios',[UsuarioController::class, 'usuarios'] );
//importante: en el controlador de usuarios, el metodo usuarios, devuelve un json con todos los usuarios
//post es un metodo estatico
Route::post('login',[UsuarioController::class,'login']);