<?php
require 'models/detalle.php';
require 'models/venta.php';

class detalleController
{
    public function registrar()
    {
        $cargaUtil = json_decode(file_get_contents('php://input'));

        $venta = new Venta();
        $uno = $venta->UltimaVenta()->fetch_object();

        $detalle = new detalle_venta();

        $detalle->setIdVenta($uno->IdVenta);
        $detalle->setIdProducto($cargaUtil->id);
        $detalle->setCantidad($cargaUtil->cantidad);
        $detalle->setPrecio($cargaUtil->precio);
        $detalle->setSubTotal($cargaUtil->subtotal);

        $all = $detalle->save_detall();

        echo json_encode($all);
    }
}
