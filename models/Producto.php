<?php

namespace Model;

class Producto extends ActiveRecord
{
    protected static $tabla = 'productos';
    protected static $idTabla = 'id';
    protected static $columnasDB = ['nombre', 'precio', 'situacion'];

    public $id;
    public $nombre;
    public $precio;
    public $situacion;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->precio = $args['precio'] ?? 0;
        $this->situacion = $args['situacion'] ?? 1;
    }

    public static function obtenerProductosconQuery()
    {
        $sql = "SELECT * FROM productos where situacion = 1";
        return self::fetchArray($sql);
    }

    public static function productosResumen()
    {
        $sql = "SELECT nombre as producto, sum(detalle_cantidad) as cantidad from detalle_ventas inner join productos on detalle_producto = id where detalle_situacion = 1 group by nombre";
        return self::fetchArray($sql);
    }
}
