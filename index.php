<?php
session_start();
require 'config/parametros.php';
require 'database/conecction.php';
require_once 'autoload.php';

/*si no existe controlodor siempre muestra
 el index*/

if (!isset($_GET['controller'])) {
    $default_controlador = controller_default;

    if (class_exists($default_controlador)) {
        $contr = new $default_controlador();
        $action_default = action_default;
        $contr->$action_default();
    }
}

if (isset($_GET['controller'])) {
    $nombre_controlador = $_GET['controller'] . 'Controller';

    if (class_exists($nombre_controlador)) {
        $controlador = new $nombre_controlador();

        if (
            isset($_GET['action']) &&
            method_exists($controlador, $_GET['action'])
        ) {
            $action = $_GET['action'];
            $controlador->$action();
        }
        exit();
    }
}