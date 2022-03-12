<?php
require 'models/login.php';

class loginController
{
    public function mostrar_login()
    {
        header('Location: http://localhost/proyect-venta/login/mostrar_login');
    }

    public function validar()
    {
        if (isset($_POST)) {
            # code...
            $documento = $_POST['documento'];
            $pass = $_POST['pass'];
            $login = new login();
            $dato = $login->Obtener_user($documento, $pass)->fetch_object();

            if (
                $documento = $dato->NumeroDocumento && ($pass = $dato->Password)
            ) {
                $_SESSION['user'] = 'activo';

                header('Location: http://localhost/proyect-venta/');
            } else {
                echo '<h1>USUARIO INCORRECTO<h1>';
            }
        } else {
            echo '<h1>CAMPOS VACIOS<h1>';
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }

        header('Location: http://localhost/proyect-venta/');
    }
}