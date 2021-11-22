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

    public static function CrearProducto($Nombre,$Referencia,$Precio,$Peso,$Stock,$Categoria){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaCreacion  = date('Y-m-d H:i', strtotime($fecha_sistema));
        $CrearProducto = DB::Insert('INSERT INTO PRODUCTOS (NOMBRE,REFERENCIA,PRECIO,PESO,STOCK,CATEGORIA,FECHA_CREACION)
                                    VALUES (?,?,?,?,?,?,?)',
                                    [$Nombre,$Referencia,$Precio,$Peso,$Stock,$Categoria,$fechaCreacion]);
        return $CrearProducto;
    }
}
