

<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm-add-abono-contrato">
                <div class="modal-body">
                            <input type="hidden" class="form-control abono" id="noContrato" name="noContrato">
                        <div class="form-group">
                            <label for="montoPago" class="col-form-label">Monto del Abono:</label>
                            <input class="form-control" type="number" id="montoPago" name="montoPago" min="0" max="1000000">
                        </div>
                </div>
                <div class="modal-footer">
                    <span class="d-flex position-absolute w-100" id="mensajeAddAbono"></span>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Abonar</button>
                </div>
            </form>
        </div>
    </div>
</div>

