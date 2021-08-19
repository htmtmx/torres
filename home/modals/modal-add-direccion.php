<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="addDireccion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="frm-add-direccion" role="form" autocomplete="off">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Agrega Direccion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" id="idCliente" name="idCLiente" value="<?php echo $idCliente ?>">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="calle" class="col-sm-2 col-form-label"><i class="fas fa-asterisk text-red"></i> Calle</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" id="calle" name="calle" required="" value="" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="noext" class="col-sm-2 col-form-label"><i class="fas fa-asterisk text-red"></i> No exterior</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" id="noext" name="noext" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="noint" class="col-sm-2 col-form-label"> No interior</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" id="noint" name="noint" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colonia" class="col-sm-2 col-form-label"><i class="fas fa-asterisk text-red"></i> Colonia</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" id="colonia" name="colonia" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="municipio" class="col-sm-2 col-form-label"><i class="fas fa-asterisk text-red"></i>Municipio</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" id="municipio" name="municipio">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="estado" class="col-sm-2 col-form-label"><i class="fas fa-asterisk text-red"></i>Estado</label>
                        <div class="col-lg-9">
                            <select name="estado" id="estado" class="form-control">
                                <option value="no">Seleccione uno...</option>
                                <option value="Aguascalientes">Aguascalientes</option>
                                <option value="Baja California">Baja California</option>
                                <option value="Baja California Sur">Baja California Sur</option>
                                <option value="Campeche">Campeche</option>
                                <option value="Chiapas">Chiapas</option>
                                <option value="Chihuahua">Chihuahua</option>
                                <option value="CDMX">Ciudad de México</option>
                                <option value="Coahuila">Coahuila</option>
                                <option value="Colima">Colima</option>
                                <option value="Durango">Durango</option>
                                <option value="Estado de México">Estado de México</option>
                                <option value="Guanajuato">Guanajuato</option>
                                <option value="Guerrero">Guerrero</option>
                                <option value="Hidalgo">Hidalgo</option>
                                <option value="Jalisco">Jalisco</option>
                                <option value="Michoacán">Michoacán</option>
                                <option value="Morelos">Morelos</option>
                                <option value="Nayarit">Nayarit</option>
                                <option value="Nuevo León">Nuevo León</option>
                                <option value="Oaxaca">Oaxaca</option>
                                <option value="Puebla">Puebla</option>
                                <option value="Querétaro">Querétaro</option>
                                <option value="Quintana Roo">Quintana Roo</option>
                                <option value="San Luis Potosí">San Luis Potosí</option>
                                <option value="Sinaloa">Sinaloa</option>
                                <option value="Sonora">Sonora</option>
                                <option value="Tabasco">Tabasco</option>
                                <option value="Tamaulipas">Tamaulipas</option>
                                <option value="Tlaxcala">Tlaxcala</option>
                                <option value="Veracruz">Veracruz</option>
                                <option value="Yucatán">Yucatán</option>
                                <option value="Zacatecas">Zacatecas</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cp" class="col-sm-2 col-form-label"><i class="fas fa-asterisk text-red"></i>Codigo Postal</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" id="cp" name="cp">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="folio_cliente" class="col-sm-2 col-form-label">Referencias</label>
                        <div class="col-lg-9">
                            <div class="form-group">
                                <textarea class="form-control" id="referencias" name="referencias" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <span id="mensajeAddDireccion"></span>
                <div class="modal-footer">
                    <span class="float-left"><i class="fas fa-asterisk text-red"></i> Obligatorio</span>
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>

        </div>
    </div>
</div>
