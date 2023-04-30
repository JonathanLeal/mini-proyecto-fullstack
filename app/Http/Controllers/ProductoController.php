<?php

namespace App\Http\Controllers;

use App\Helpers\Http;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    public function mostrarProductos(){
        $productos = Producto::all();
        if (count($productos) == 0) {
            return Http::respuesta(http::retNotFound, "No hay productos");
        }
        return http::respuesta(http::retOK, $productos);
    }

    public function mostrarPorId(Request $request){
        $idProductos = Producto::find($request->id_productos);
        if (!$idProductos) {
            return http::respuesta(http::retNotFound, "Producto no encontrado");
        }
        return http::respuesta(http::retOK, $idProductos);
    }

    public function agregarProducto(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre_pro' => 'required|string',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return http::respuesta(http::retError, $validator->errors());
        }

        $producto = new Producto();
        $producto->nombre_pro = $request->nombre_pro;
        $producto->cantidad = $request->cantidad;
        $producto->precio = $request->precio;
        $producto->save();
        return http::respuesta(http::retOK, "Producto agregado correctamente");
    }
}
