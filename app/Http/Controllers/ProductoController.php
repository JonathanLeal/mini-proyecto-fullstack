<?php

namespace App\Http\Controllers;

use App\Helpers\Http;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function mostrarProductos(){
        $productos = Producto::all();
        if (count($productos) == 0) {
            return Http::respuesta(http::retNotFound, "No hay productos");
        }
        return http::respuesta(http::retOK, $productos);
    }
}
