
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
    $('#modalejemplo').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Subir archivo al Contrato No. ' + recipient)
      //  modal.find('.modal-body input .contrato').val(recipient)
        modal.find('.no_contrato').val(recipient)
    })
</script>