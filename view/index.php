<?php
require 'header/header.php'; ?>
<div class="container">
    <h1>Registro de Venta</h1>
    <br>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                role="tab" aria-controls="home" aria-selected="true">Agregar</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                role="tab" aria-controls="profile" aria-selected="false">Lista</button>
        </li>

    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <br>

            <form id="registro-venta">


                <div class="row">


                    <div class="form-group col">
                        <label for="exampleInputEmail1">Tipo de Documento</label>
                        <select class="form-control" id="Optiontipo" name="selEspecie">
                            <option value="1">Factura</option>
                            <option value="2">Boleta</option>

                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="exampleInputEmail1">Serie</label>
                        <input type="number" class="form-control" id="txtserie" name="txtserie"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group col">
                        <label for="exampleInputEmail1">Numero</label>
                        <input type="number" class="form-control" id="txtnumero" name="txtnumero"
                            aria-describedby="emailHelp">
                    </div>

                </div>
                <br>
                <div class="row">


                    <div class="form-group col">
                        <label for="exampleInputEmail1">Cliente</label>
                        <select class="form-control" id="OptionCliente" name="selcliente">

                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="exampleInputEmail1">Total</label>
                        <input type="number" class="form-control" id="txttotal" name="txttotal"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group col " hidden>
                        <label for="exampleInputEmail1">Usuario</label>
                        <input type="number" class="form-control" id="txtusuario" name="txtnumero"
                            aria-describedby="emailHelp" value="1">
                    </div>


                </div>



                <br>
                <button id="btn-registrar" type="submit" class="btn btn-primary">Registrar</button>
                <button id="modalproducto" class="btn btn-secondary">Agregar producto</button>
            </form>

            <br>

            <table id="tabla-detalles" class="table table-hover">
                <thead>
                    <td>IDProducto</td>
                    <td>Producto</td>
                    <td>Cantidad</td>
                    <td>Precio</td>
                    <td>Sub Total</td>

                </thead>
                <tbody>

                </tbody>
            </table>

        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <h3></h3>
                    <br>
                    <table id="tabla-ventas" class="table table-hover">
                        <thead>
                            <td>IDVenta</td>
                            <td>TipoDocumento</td>
                            <td>Serie</td>
                            <td>Numero</td>
                            <td>Empresa</td>
                            <td>Total</td>
                            <td>Vendedor</td>
                            <td>Acciones</td>

                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">3</div>
    </div>



    <?php
  require 'view/modal_detalle.php';
  require 'view/modaleditventa.php';
  require 'view/delete_modal_venta.php';
  require 'header/pie.php';


?>