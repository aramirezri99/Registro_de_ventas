<!-- MODAL AGREGAR PRODUCTO -->
<div class="modal fade" id="modal-edit-venta" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar Animal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="ventaedit">

                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Id Venta</label>
                        <input type="number" class="form-control" id="idventa-medit" name="txtcantidad"
                            aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo de Documento</label>
                        <select class="form-control" id="seltipo-medit">
                            <option value="1">Factura</option>
                            <option value="2">Boleta</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Serie</label>
                        <input type="number" class="form-control" id="serie-medit" name="txtcantidad"
                            aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Numero</label>
                        <input type="number" class="form-control" id="numero-medit" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Cliente</label>
                        <select class="form-control" id="cliente-medit">

                        </select>
                    </div>



                </div>
                <div class="modal-footer">
                    <button id="btnaddtable" type="submit" class="btn btn-primary">Añadir</button>
                </div>
            </form>

        </div>
    </div>
</div>