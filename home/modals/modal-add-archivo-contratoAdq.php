
<div class="modal fade" id="modalejemplo" tabindex="-1" role="dialog" aria-labelledby="modalejemploLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalejemploLabel">Subir archivo al Contrato</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm-add-archivo-contrato" enctype="multipart/form-data" method="post">
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Input para no_contrato y no_coche-->
                                <input type="hidden" class="form-control no_contrato" id="recipient-name" name="recipient-name">
                                <input type="hidden" class="form-control " id="noCocheContratoModal" name="noCocheContratoModal">
                                <div class="form-group">
                                    <label class="form-control-label" for="tipoArchivoContrato">Tipo de Archivo</label>
                                    <select name="tipoArchivoContrato" id="tipoArchivoContrato" class="form-control">
                                        <!-- AJAX RESPONSE -->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label class="form-control-label" for="archivo1">Seleccione un archivo</label>
                                    <input  type="file" id="archivo1" name="archivo1" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="visibilidadDocumentoContrato">Privado</label>
                                    <select name="visibilidadDocumentoContrato" id="visibilidadDocumentoContrato" class="form-control">
                                        <option value="0">Si</option>
                                        <option value="1" selected>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <span class="d-flex position-absolute w-100" id="mensajeAddDocumentoContrato"></span>
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i> Subir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
