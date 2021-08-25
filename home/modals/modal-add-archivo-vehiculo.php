<!-- Modal -->
<div class="modal fade" id="addArchivoCoche" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Documento de Vehiculo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm-add-archivo-coche" enctype="multipart/form-data" method="post">
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" id="noVehiculo" name="noVehiculo" value="<?php echo $noCoche; ?>">
                                <div class="form-group">
                                    <label class="form-control-label" for="tipoArchivo">Tipo de Archivo</label>
                                    <select name="tipoArchivo" id="tipoArchivo" class="form-control">
                                        <!-- AJAX RESPONSE -->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label class="form-control-label" for="archivo">Seleccione un archivo</label>
                                    <input  type="file" id="archivo" name="archivo" class="form-control">
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
                        <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i> Subir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>