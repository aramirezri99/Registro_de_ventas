<?php

class cliente
{
    private $IdCliente;
    private $Ruc;
    private $RazonSocial;

    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    function getIdCliente()
    {
        return $this->IdCliente;
    }

    function setIdCliente($id)
    {
        $this->IdCliente = $id;
    }

    function getRuc()
    {
        return $this->Ruc;
    }

    function setIRuc($ruc)
    {
        $this->Ruc = $ruc;
    }

    function getRazonSocial()
    {
        return $this->RazonSocial;
    }

    function setRazonSocial($razon)
    {
        $this->RazonSocial = $razon;
    }

    public function all_clientes()
    {
        $all = $this->db->query('SELECT * FROM cliente');
        return $all;
    }
}
