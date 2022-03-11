<?php
require 'models/venta.php';

class ventaController
{
    public function index()
    {
        require 'view/index.php';
    }

    public function todas_ventas()
    {
        //all_ventas
        //require 'view/index.php';
        $venta = new Venta();
        $all = $venta->obtener_ventas();
        echo json_encode($all->fetch_All());
    }

    public function registrar_venta()
    {
        $cargaUtil = json_decode(file_get_contents('php://input'));
        $venta = new Venta();

        $venta->setIdTipoDocumento($cargaUtil->Tipodocumento);
        $venta->setSerie($cargaUtil->serie);
        $venta->setNumero($cargaUtil->numero);
        $venta->setIdCliente($cargaUtil->idcliente);
        $venta->setTotal($cargaUtil->total);
        $venta->setIdUsuario($cargaUtil->usuario);
        $all = $venta->insertar_venta();

        echo json_encode($all);
    }

    public function get_ventas_forid()
    {
        $venta = new Venta();
        $venta->setIdVents($_GET['id']);
        $all = $venta->obtener_ventas_porid();
        echo json_encode($all->fetch_All());
    }

    public function edit_venta()
    {
        $cargaUtil = json_decode(file_get_contents('php://input'));
        $venta = new Venta();

        $venta->setIdVents($cargaUtil->id);
        $venta->setIdTipoDocumento($cargaUtil->tipo);
        $venta->setSerie($cargaUtil->serie);
        $venta->setNumero($cargaUtil->numero);
        $venta->setIdCliente($cargaUtil->cliente);

        $all = $venta->editarVenta();

        echo json_encode($all);
    }

    public function delete_venta()
    {
        $venta = new Venta();
        $venta->setIdVents($_GET['id']);
        $all = $venta->eliminarVenta();
        echo json_encode($all);
    }

    public function show()
    {
        require 'view/pestaña_edit_venta.php';
    }
}
