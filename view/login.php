<?php
  require 'view/header/header.php';
  ?>


<br>
<br>
<div class="container row">



  <form id="form-login" action="http://localhost/proyect-venta/login/validar_login" method="POST">
    <h1>Logueate</h1>
    <div class="mb-3 col-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="number" class="form-control" id="documento" name="documento" aria-describedby="emailHelp">

    </div>
    <div class="mb-3 col-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" id="contraseña"  name="pass">
    </div>

    <button type="submit" class="btn btn-primary">Acceder</button>
  </form>
  
  <?php
  
  
  ?>