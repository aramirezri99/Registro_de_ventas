<!-- MODAL AGREGAR PRODUCTO -->
<div class="modal fade" id="animal_edit_modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar Animal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="animal_edit_form">

                <div class="modal-body">


                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Producto</label>
                        <select class="form-control" id="selproducto" name="selproducto">

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Cantidad</label>
                        <input type="number" class="form-control" id="txtCantidad" name="txtcantidad"
                            aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Precio</label>
                        <input type="number" class="form-control" id="txtprecio" name="txtprecio"
                            aria-describedby="emailHelp" disabled>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Sub Total</label>
                        <input type="number" class="form-control" id="txtsubtotal" name="txtsubtotal"
                            aria-describedby="emailHelp" disabled>
                    </div>




                </div>
                <div class="modal-footer">
                    <button id="btnaddtable" type="submit" class="btn btn-primary">Añadir</button>
                </div>
            </form>

        </div>
    </div>
</div>