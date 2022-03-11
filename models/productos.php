<?php

class producto
{
    private $IdProducto;
    private $nombre;
    private $precio;

    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    function getIdProducto()
    {
        return $this->IdProducto;
    }

    function setIdProducto($id)
    {
        $this->IdProducto = $id;
    }

    function getname_producto()
    {
        return $this->name;
    }

    function setname_producto($nombre)
    {
        $this->nombre = $nombre;
    }

    function getprecio()
    {
        return $this->precio;
    }

    function setprecio($precio)
    {
        $this->precio = $precio;
    }

    public function allproducts()
    {
        $all = $this->db->query('SELECT * FROM producto');
        return $all;
    }

    public function search_precio()
    {
        $all = $this->db->query(
            "SELECT precio FROM producto WHERE IdProducto = {$this->getIdProducto()}"
        );
        return $all;
    }
}
