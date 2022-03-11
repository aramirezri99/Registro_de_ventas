<?php

require 'models/productos.php';

class productoController
{
    public function obtener_productos()
    {
        $producto = new producto();
        $all = $producto->allproducts();
        echo json_encode($all->fetch_All());
    }

    public function obtener_precio()
    {
        $producto = new producto();
        $producto->setIdProducto($_GET['id']);
        $precio = $producto->search_precio();
        echo json_encode($precio->fetch_All());
    }
}
