<?php

use App\Http\Controllers\CancionController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\MusicaController;
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
Route::post('register',[UsuarioController::class,'register']);
Route::get('provincia',[ProvinciaController::class,'listar']);
Route::get('genero',[GeneroController::class,'genero']);
Route::get('rol',[GeneralController::class,'roles']);
Route::get('year',[GeneralController::class,'years']);
Route::get('generSong',[GeneralController::class,'geners_songs']);
Route::post('musica/create',[CancionController::class,'registerSong']);
Route::get('name_album',[GeneralController::class,'albums_songs']);
Route::get('musica/listar',[CancionController::class,'view']);
Route::delete('musica/eliminar',[CancionController::class,'delete']);
Route::post('album/create',[AlbumController::class,'register']);
Route::get('album/listar',[AlbumController::class,'view']);
Route::delete('album/eliminar',[AlbumController::class,'delete']);




