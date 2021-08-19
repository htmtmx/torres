<!-- Modal -->
<div class="modal fade" id="updatepassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualiza tu constraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm-update-password">
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="pwo">Contraseña Actual</label>
                                    <input type="password" id="pwo" name="pwo" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="pw">Nueva Contraseña</label>
                                    <input type="password" id="pw" name="pw" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="cpw">Confirma contraseña nueva</label>
                                    <input type="password" id="cpw" name="cpw" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <div class="col-lg-12 col-auto text-right">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                    <div class="col-lg-12 col-auto text-right">
                        <span class="d-flex position-absolute w-100" id="mensajeUpdateContraseña"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><?php
