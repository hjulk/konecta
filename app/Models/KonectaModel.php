<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KonectaModel extends Model
{
    use HasFactory;


    public static function ListarProductos(){
        $Productos = DB::Select('SELECT * FROM PRODUCTOS ORDER BY 1');
        return $Productos;
    }

    public static function ListarProductoId($id){
        $Productos = DB::Select('SELECT * FROM PRODUCTOS WHERE ID = ?',[$id]);
        return $Productos;
    }

    public static function CrearProducto($Nombre,$Referencia,$Precio,$Peso,$Stock,$Categoria){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaCreacion  = date('Y-m-d H:i', strtotime($fecha_sistema));
        $CrearProducto = DB::Insert('INSERT INTO PRODUCTOS (NOMBRE,REFERENCIA,PRECIO,PESO,STOCK,CATEGORIA,FECHA_CREACION)
                                    VALUES (?,?,?,?,?,?,?)',
                                    [$Nombre,$Referencia,$Precio,$Peso,$Stock,$Categoria,$fechaCreacion]);
        return $CrearProducto;
    }

    public static function ActualizarProducto($Nombre,$Referencia,$Precio,$Peso,$Stock,$Categoria,$id){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaActualizacion = date('Y-m-d H:i', strtotime($fecha_sistema));
        $ActualizarProducto = DB::Update('UPDATE PRODUCTOS SET
                                        NOMBRE = ?,
                                        REFERENCIA = ?,
                                        PRECIO = ?,
                                        PESO = ?,
                                        STOCK = ?,
                                        CATEGORIA = ?,
                                        FECHA_ACTUALIZACION = ?
                                        WHERE ID = ?',
                                        [$Nombre,$Referencia,$Precio,$Peso,$Stock,$Categoria,$fechaActualizacion,$id]);
        return $ActualizarProducto;
    }

    public static function VentaProducto($Cantidad,$nuevoStock,$id,$venta){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaVenta = date('Y-m-d H:i', strtotime($fecha_sistema));
        $VentaProducto = DB::Update('UPDATE PRODUCTOS SET
                                        STOCK = ?,
                                        FECHA_ULTIMA_VENTA = ?
                                        WHERE ID = ?',
                                        [$nuevoStock,$fechaVenta,$id]);
        DB::insert('INSERT INTO HISTORIAL (ID_PRODUCTO,PRECIO,UNIDADES,FECHA_VENTA)
                    VALUES (?,?,?,?)',
                    [$id,$venta,$Cantidad,$fechaVenta]);
        return $VentaProducto;
    }

    public static function BorrarProducto($id){
        $BorrarProducto = DB::delete('DELETE FROM PRODUCTOS WHERE ID = ?', [$id]);
        return $BorrarProducto;
    }
}
