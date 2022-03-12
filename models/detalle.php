<?php

class detalle_venta
{
    private $IdDetalleVenta;
    private $IdVenta;
    private $IdProducto;
    private $Cantidad;
    private $Precio;
    private $SubTotal;

    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    function getIdDetalleVenta()
    {
        return $this->IdDetalleVenta;
    }

    function setIdDetalleVenta($id)
    {
        $this->IdDetalleVenta = $id;
    }

    function getIdVenta()
    {
        return $this->IdVenta;
    }

    function setIdVenta($id)
    {
        $this->IdVenta = $id;
    }

    function getIdProducto()
    {
        return $this->IdProducto;
    }

    function setIdProducto($id)
    {
        $this->IdProducto = $id;
    }

    function getCantidad()
    {
        return $this->Cantidad;
    }

    function setCantidad($cantidad)
    {
        $this->Cantidad = $cantidad;
    }

    function getPrecio()
    {
        return $this->Precio;
    }

    function setPrecio($precio)
    {
        $this->Precio = $precio;
    }

    function getSubTotal()
    {
        return $this->SubTotal;
    }

    function setSubTotal($subtotal)
    {
        $this->SubTotal = $subtotal;
    }

    //obtener detalles por venta
    public function get_detall_toventa()
    {
        $all = $this->db
            ->query("SELECT IdDetalleVenta,(SELECT IdTipoDocumento FROM venta WHERE IdVenta=detalle_venta.IdVenta) AS TipoDocumento,
(SELECT Serie FROM venta WHERE IdVenta=detalle_venta.IdVenta) AS Serie,
(SELECT Numero FROM venta WHERE IdVenta=detalle_venta.IdVenta) AS Numero,
(SELECT Nombre FROM producto WHERE IdProducto=detalle_venta.IdProducto) AS Productos,Cantidad,Precio,SubTotal
FROM detalle_venta WHERE IdDetalleVenta={$this->getIdDetalleVenta()};");
        return $all;
    }

    //insertar
    public function save_detall()
    {
        $all = $this->db->query(
            "INSERT INTO detalle_venta (IdVenta,IdProducto,Cantidad,Precio,SubTotal)VALUES ({$this->getIdVenta()},{$this->getIdProducto()},{$this->getCantidad()},{$this->getPrecio()},{$this->getSubTotal()})"
        );

        if ($all) {
            return true;
        }
    }
}