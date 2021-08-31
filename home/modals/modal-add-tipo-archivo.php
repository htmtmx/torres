<!-- Modal -->
<div class="modal fade" id="addDetalles" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agrega caracteristicas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm-add-detalle" enctype="multipart/form-data" method="post">
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label class="form-control-label" for="nombreDetalle">Nombre de la caracteristica</label>
                                    <input  type="text" id="nombreDetalle" name="nombreDetalle" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="visibilidad">Privado</label>
                                    <select name="visibilidad" id="visibilidad" class="form-control">
                                        <option value="0">Si</option>
                                        <option value="1" selected>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <span class="d-flex position-absolute w-100" id="mensajeAddArchivo"></span>
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Añadir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>