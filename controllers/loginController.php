<?php


require 'models/login.php';

class loginController{


  public function mostrar_login(){
    require 'view/login.php';
  }

  public function validar_login(){
  
    
   $documento = $_POST['documento'];
    $pass=$_POST['pass'];
    $login = new login();
    $dato = $login->Obtener_user($documento,$pass)->fetch_object();
     
    if ($documento = $dato->NumeroDocumento && $pass = $dato->Password) {
      
      $_SESSION['usuario'] = 'activo';
            
      header("Location: http://localhost/proyect-venta/");

    } else {

      echo("<h1>USUARIO INCORRECTO<h1>");
    }
         
     
  }


}