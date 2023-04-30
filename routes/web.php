<?php

use App\Http\Controllers\ProductoController;
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

Route::get('/productos', function () {
    return view('Productos');
});
Route::get('api/productos/list', [ProductoController::class, 'mostrarProductos']);
Route::get('api/productos/list/{id_productos}', [ProductoController::class, 'mostrarPorId']);
Route::post('api/productos/save', [ProductoController::class, 'agregarProducto']);