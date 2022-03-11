<?php
session_start();
class login
{
    private $IdUsuario;
    private $NumeroDocumento;
    private $ApellidoPaterno;
    private $ApellidoMaterno;
    private $Nombres;
    private $Password;

    private $db;

    public function getId()
    {
        return $this->IdUsuario;
    }

    public function setId($id)
    {
        return $this->IdUsuario;
    }

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function Obtener_user($dni, $pass)
    {
        $all = $this->db->query(
            "	SELECT * from usuario WHERE NumeroDocumento='$dni' AND PASSWORD='{$pass}'"
        );

        return $all;
    }
}
