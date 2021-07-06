<div class="modal fade" id="modal-new-user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="modal-body">
        <div class="alert alert-success" id="alerta" style="display: none;">&nbsp;</div>
  <!-- form user info -->
            <form id="form-add-user" class="form" role="form" autocomplete="off">
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Nombre</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="text" id="nombre_user" name="nombre_user" require >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">A. Paterno</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="text" id="apaterno_user" name="apaterno_user" require>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">A. Materno</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="text" id="amaterno_user" name="amaterno_user" require>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Teléfono</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="tel" id="telefono_user" name="telefono_user" require>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Celular</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="tel" id="celular_user" name="celular_user">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Correo</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="email" id="correo_user" name="correo_user" require>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Puesto</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="text" id="puesto_user" name="puesto_user" require>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Sexo</label>
                    <div class="col-lg-9">
                        <select id="sexo_user" name="sexo_user" class="form-control">
                            <option value="0">Hombre</option>
                            <option value="1">Mujer</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Nivel Acceso</label>
                    <div class="col-lg-9">
                        <select id="acceso_user" name="acceso_user" class="form-control">
                            <option value="0">Administrador</option>
                            <option value="1">Vendedor</option>
                            <option value="2">Consultor</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
          </div>
  <!-- /form user info -->
      </div>
    </div>
  </div>
</div>