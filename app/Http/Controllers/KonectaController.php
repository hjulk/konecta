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
            $ListaProductos[$contador]['precio_publico'] = '$' . number_format($valor->PRECIO, 0);
            $ListaProductos[$contador]['stock'] = (int)$valor->STOCK;
            if($valor->STOCK > 0){
                $ListaProductos[$contador]['venta'] = '<a href="#" class="btn btn-success" title="Vender" data-toggle="modal" data-target="#modal-productoBuy" onclick="obtener_datos_venta('.$valor->ID.');"><i class="fas fa-shopping-cart"></i></a>';
            }else{
                $ListaProductos[$contador]['venta'] = '<a href="#" class="btn btn-success" title="Vender" data-toggle="modal" data-target="#modalErrorVenta"><i class="fas fa-shopping-cart"></i></a>';
            }
            $ListaProductos[$contador]['peso'] = (int)$valor->PESO;
            $ListaProductos[$contador]['peso_producto'] = $valor->PESO.'kg';
            $ListaProductos[$contador]['fecha_creacion'] = date('d/m/Y h:i A', strtotime($valor->FECHA_CREACION));
            if($valor->FECHA_ULTIMA_VENTA){
                $ListaProductos[$contador]['fecha_ultima_venta'] = date('d/m/Y h:i A', strtotime($valor->FECHA_ULTIMA_VENTA));
            }else{
                $ListaProductos[$contador]['fecha_ultima_venta'] = 'Sin información';
            }
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
            $Precio = (int)$request->precio;
            $Peso = (int)$request->peso;
            $Stock = (int)$request->stock;
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

    public function ActualizarProducto(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre_producto_upd' => 'required',
            'referencia_upd' => 'required',
            'precio_upd' => 'required',
            'peso_upd' => 'required',
            'categoria_upd' => 'required',
            'stock_upd' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('/')->withErrors($validator)->withInput();
        }else{
            $Nombre = $request->nombre_producto_upd;
            $Referencia = $request->referencia_upd;
            $Precio = (int)$request->precio_upd;
            $Peso = (int)$request->peso_upd;
            $Stock = (int)$request->stock_upd;
            $Categoria = $request->categoria_upd;
            $id = (int)$request->id_producto;
            $ActualizarProducto = KonectaModel::ActualizarProducto($Nombre,$Referencia,$Precio,$Peso,$Stock,$Categoria,$id);
            if($ActualizarProducto){
                $verrors = 'Se actualizó con éxito el producto '.$Nombre.' con éxito.';
                return Redirect::to('/')->with('mensaje', $verrors);
            }else{
                $verrors = array();
                array_push($verrors, 'Hubo un problema al actualizar el producto');
                return Redirect::to('/')->withErrors(['errors' => $verrors])->withInput();
            }
        }
    }

    public function VentaProducto(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre_producto_venta' => 'required',
            'referencia_venta' => 'required',
            'precio_venta' => 'required',
            'peso_venta' => 'required',
            'categoria_venta' => 'required',
            'cantidad' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('/')->withErrors($validator)->withInput();
        }else{
            $Cantidad = (int)$request->cantidad;
            $id = (int)$request->id_producto_venta;
            $Nombre = $request->nombre_producto_venta;
            $Producto = KonectaModel::ListarProductoId($id);
            foreach($Producto as $valor){
                $precio = (int)$valor->PRECIO;
                $Stock = (int)$valor->STOCK;
            }
            $nuevoStock = $Stock - $Cantidad;
            $venta = $precio * $Cantidad;
            $total = '$' . number_format($venta, 0);
            $VentaProducto = KonectaModel::VentaProducto($Cantidad,$nuevoStock,$id,$venta);
            if($VentaProducto){
                $verrors = 'Se realizo la compra de '.$Cantidad.' unidades del producto '.$Nombre.' por un valor de '.$total;
                return Redirect::to('/')->with('mensaje', $verrors);
            }else{
                $verrors = array();
                array_push($verrors, 'Hubo un problema al vender el producto');
                return Redirect::to('/')->withErrors(['errors' => $verrors])->withInput();
            }
        }
    }

    public function BorrarProducto(Request $request){
        $idProducto = $request->idProducto;
        $BorrarProducto = KonectaModel::BorrarProducto($idProducto);
        if($BorrarProducto) {
            return Response::json(array('valido' => 'true'));
        } else {
            return Response::json(array('valido' => 'false'));
        }
    }
}
