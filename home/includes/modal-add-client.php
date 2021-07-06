<div class="modal fade" id="modal-new-client" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="modal-body">
        <div class="alert alert-success" id="alerta" style="display: none;">&nbsp;</div>
  <!-- form client info -->
            <form id="form-add-client" class="form" role="form" autocomplete="off">
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">*Nombre</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="text" id="nombre_cliente" name="nombre_cliente" require >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">*A. Paterno</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="text" id="apaterno_cliente" name="apaterno_cliente" require>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">*A. Materno</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="text" id="amaterno_cliente" name="amaterno_cliente" require>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">*Teléfono</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="tel" id="telefono_cliente" name="telefono_cliente" require>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Celular</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="tel" id="celular_cliente" name="celular_cliente">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Correo</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="email" id="correo_cliente" name="correo_cliente" require>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Suscripción</label>
                    <div class="col-lg-9">
                        <select id="subscripcion_cliente" name="subscripcion_clientee" class="form-control">
                            <option value="0">Inactiva</option>
                            <option value="1">Activa</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Identificación</label>
                    <div class="col-lg-9">
                        <select id="medio_identificación_cliente" name="medio_identificación_cliente" class="form-control">
                            <option value="INE">INE</option>
                            <option value="PASAPORTE">Pasaporte</option>
                            <option value="CEDULA">Cédula Profesional</option>
                            <option value="LICENCIA">Licencia de Conducir</option>
                            <option value="INAPAM">INAPAM</option>
                            <option value="ESCOLAR">Credencial de Estudiante</option>
                            <option value="CERTIFICADO">Certificado Escolar</option>
                            <option value="TITULO">Título Profesional</option>
                            <option value="CARTILLA">Cartilla de Servicio Militar</option>
                            <option value="SEGURO">Credencial IMSS ISSSTE</option>
                            <option value="CEDULA">Cédula de Idedntificacion Ciudadana</option>
                            <option value="OTRO">Otro</option>
                            <option value="NONE">Ninguna</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Folio</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="text" id="folio_cliente" name="folio_cliente" require>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Tipo de Cliente</label>
                    <div class="col-lg-9">
                        <select id="tipo_cliente" name="tipo_cliente" class="form-control">
                            <option value="0">Persona Física</option>
                            <option value="1">Persona Moral</option>
                            <option value="2">NA</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Empresa</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="text" id="empresa_cliente" name="empresa_cliente" require>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">RFC</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="text" id="rfc_cliente" name="rfc_cliente" require>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
          </div>
  <!-- /form client info -->
      </div>
    </div>
  </div>
</div>