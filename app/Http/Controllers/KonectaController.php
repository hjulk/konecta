<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use App\Models\KonectaModel;

class KonectaController extends Controller
{
    public function Home(){
        setlocale(LC_MONETARY, 'es_CO');
        $Producto = KonectaModel::ListarProductos();
        $ListaProductos = array();
        $contador = 0;
        foreach($Producto as $valor){
            $ListaProductos[$contador]['id'] = $valor->ID;
            $ListaProductos[$contador]['nombre_producto'] = $valor->NOMBRE;
            $ListaProductos[$contador]['referencia'] = $valor->REFERENCIA;
            $ListaProductos[$contador]['categoria'] = $valor->CATEGORIA;
            $ListaProductos[$contador]['precio'] = (int)$valor->PRECIO;
            $ListaProductos[$contador]['precio_publico'] = '$' . number_format($valor->PRECIO, 0);;
            $ListaProductos[$contador]['stock'] = (int)$valor->STOCK;
            $ListaProductos[$contador]['peso'] = (int)$valor->PESO;
            $ListaProductos[$contador]['peso_producto'] = $valor->PESO.'kg';
            $ListaProductos[$contador]['fecha_creacion'] = date('d/m/Y h:i A', strtotime($valor->FECHA_CREACION));
            $ListaProductos[$contador]['fecha_ultima_venta'] = date('d/m/Y h:i A', strtotime($valor->FECHA_ULTIMA_VENTA));
            $contador++;
        }
        return view('konecta',['Productos' => $ListaProductos]);
    }

    public function CrearProducto(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre_producto' => 'required',
            'referencia' => 'required',
            'precio' => 'required',
            'peso' => 'required',
            'categoria' => 'required',
            'stock' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('/')->withErrors($validator)->withInput();
        }else{
            $Nombre = $request->nombre_producto;
            $Referencia = $request->referencia;
            $Precio = $request->precio;
            $Peso = $request->peso;
            $Stock = $request->stock;
            $Categoria = $request->categoria;
            $CrearProducto = KonectaModel::CrearProducto($Nombre,$Referencia,$Precio,$Peso,$Stock,$Categoria);
            if($CrearProducto){
                $verrors = 'Se creo con éxito el producto '.$Nombre.' con éxito.';
                return Redirect::to('/')->with('mensaje', $verrors);
            }else{
                $verrors = array();
                array_push($verrors, 'Hubo un problema al crear el producto');
                return Redirect::to('/')->withErrors(['errors' => $verrors])->withInput();
            }
        }
    }
}
