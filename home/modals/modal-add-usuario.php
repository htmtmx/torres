<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="addUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="frm-add-cliente" role="form" autocomplete="off">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Agrega nuevo usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nombre_cliente" class="col-sm-2 col-form-label"><i class="fas fa-asterisk text-red"></i> Nombre</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" id="nombre_cliente" name="nombre_cliente" required="" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="apaterno_cliente" class="col-sm-2 col-form-label"><i class="fas fa-asterisk text-red"></i> Primer Apellido</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" id="apaterno_cliente" name="apaterno_cliente" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="amaterno_cliente" class="col-sm-2 col-form-label"><i class="fas fa-asterisk text-red"></i> Segundo Apellido</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" id="amaterno_cliente" name="amaterno_cliente" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telefono_cliente" class="col-sm-2 col-form-label"><i class="fas fa-asterisk text-red"></i> Telefono</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="tel" id="telefono_cliente" name="telefono_cliente" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="celular_cliente" class="col-sm-2 col-form-label">Celular</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="tel" id="celular_cliente" name="celular_cliente">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="correo_cliente" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="email" id="correo_cliente" name="correo_cliente">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="subscripcion_cliente" class="col-sm-2 col-form-label">Subscripcion</label>
                        <div class="col-lg-9">
                            <select id="subscripcion_cliente" name="subscripcion_clientee" class="form-control">
                                <option value="0">Inactiva</option>
                                <option value="1">Activa</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="medio_identificación_cliente" class="col-sm-2 col-form-label">Identificacion</label>
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
                                <option value="NONE" selected="">Ninguna</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="folio_cliente" class="col-sm-2 col-form-label">Folio de identificacion</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" id="folio_cliente" name="folio_cliente">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tipo_cliente" class="col-sm-2 col-form-label">Tipo Cliente</label>
                        <div class="col-lg-9">
                            <select id="tipo_cliente" name="tipo_cliente" class="form-control">
                                <option value="0">Persona Física</option>
                                <option value="1">Persona Moral</option>
                                <option value="2">NA</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="empresa_cliente" class="col-sm-2 col-form-label">Empresa</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" id="empresa_cliente" name="empresa_cliente" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="rfc_cliente" class="col-sm-2 col-form-label">RFC</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" id="rfc_cliente" name="rfc_cliente">
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
