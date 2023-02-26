<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\SubcategoriasController;
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
/* Rutas Categoria */
Route::get('/categoria',[CategoriaController::class,'index']);
Route::post('/categoria',[CategoriaController::class,'store']);
Route::get('/categoria/{id}',[CategoriaController::class,'obtenerCursos']);

/* Rutas Subcategorias */
Route::get('/subcategorias',[SubcategoriasController::class,'index']);
Route::post('/subcategorias',[SubcategoriasController::class,'store']);
Route::get('/subcategorias/{id}',[SubcategoriasController::class,'obtenerCursos']);

/* Rutas Estado */
Route::get('/estado',[EstadoController::class,'index']);
Route::post('/estado',[EstadoController::class,'store']);

/* Rutas Curso */
Route::get('/cursos',[CursosController::class,'index']);
Route::post('/curso',[CursosController::class,'store']);
Route::get('/cursos/subcategoria/{categoria}',[CursosController::class,'obtenerSubcategoria']);
Route::get('/cursos/categoria/{categoria}',[CursosController::class,'obtenerCategoria']);
Route::get('/curso/{busqueda}',[CursosController::class,'buscarCurso']);
Route::get('/cursos/{id}',[CursosController::class,'obtenerCurso']);
Route::get('/cursos/busqueda/{busqueda}',[CursosController::class,'buscarPorNombre']);



