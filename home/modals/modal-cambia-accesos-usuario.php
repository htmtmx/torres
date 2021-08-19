<!-- Modal -->
<div class="modal fade" id="cuentaUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Detalles de la Cuenta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="puesto">Puesto</label>
                                    <input type="email" id="puesto" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="puesto">Nivel de Acceso</label>
                                    <select id="medio_identificación_cliente" name="medio_identificación_cliente" class="form-control">
                                        <option value="0">Administrador</option>
                                        <option value="PASAPORTE">Vendedor</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <div class="col-lg-12 col-auto text-right">
                        <span class="d-flex position-absolute w-100" id="mensajeUpdateCliente"></span>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>