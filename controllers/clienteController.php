<?php

require 'models/cliente.php';

class clienteController{


  public function mostrarclientes(){
      $cliente = new cliente();  
      $all = $cliente->all_clientes();
    echo json_encode($all->fetch_All());

  }
}