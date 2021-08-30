<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="addUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="frm-add-usuario" role="form" autocomplete="off" class="was-validated">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Agrega nuevo usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nombre_user" class="col-sm-2 col-form-label"><i class="fas fa-asterisk text-red"></i> Nombre</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" id="nombre_user" name="nombre_user" required="" >
                            <div class="valid-feedback">¡Ok!</div>
                            <div class="invalid-feedback">Escriba un nombre</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="apaterno_user" class="col-sm-2 col-form-label"><i class="fas fa-asterisk text-red"></i> Primer Apellido</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" id="apaterno_user" name="apaterno_user" required>
                            <div class="valid-feedback">¡Ok!</div>
                            <div class="invalid-feedback">Escriba apellido paterno</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="amaterno_user" class="col-sm-2 col-form-label"><i class="fas fa-asterisk text-red"></i> Segundo Apellido</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" id="amaterno_user" name="amaterno_user" required>
                            <div class="valid-feedback">¡Ok!</div>
                            <div class="invalid-feedback">Escriba apellido materno</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telefono_user" class="col-sm-2 col-form-label"><i class="fas fa-asterisk text-red"></i> Telefono</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="tel" id="telefono_user" name="telefono_user" required>
                            <div class="valid-feedback">¡Ok!</div>
                            <div class="invalid-feedback">Escriba un telefono</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="celular_user" class="col-sm-2 col-form-label">Celular</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="tel" id="celular_user" name="celular_user">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="correo_user" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="email" id="correo_user" name="correo_user">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="puesto_user" class="col-sm-2 col-form-label">Puesto</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" id="puesto_user" name="puesto_user">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="puesto_user" class="col-sm-2 col-form-label">Nivel de Acceso</label>
                        <div class="col-lg-9">
                            <select id="puesto_user" name="puesto_user" class="form-control">
                                <option value="0">SUPER USUARIO</option>
                                <option value="1">ADMINISTRADOR</option>
                                <option selected="" value="2">VENDEDOR</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sexo_user" class="col-sm-2 col-form-label">Sexo</label>
                        <div class="col-lg-9">
                            <select id="sexo_user" name="sexo_user" class="form-control">
                                <option value="0">HOMBRE</option>
                                <option value="1">MUJER</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span class="float-left"><i class="fas fa-asterisk text-red"></i> Obligatorio</span>
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
