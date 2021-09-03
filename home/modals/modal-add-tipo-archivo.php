<!-- Modal add nuevo detalle -->
<div class="modal fade" id="addDetalles" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agrega caracteristicas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm-add-edit-detalle" enctype="multipart/form-data" method="post">
                    <div class="pl-lg-4">
                        <input  type="hidden" id="idDetalles" name="idDetalles" value="0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="nombreCaracteristica">Nombre de la caracteristica</label>
                                    <input  type="text" id="nombreCaracteristica" name="nombreCaracteristica" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="catCarac">Categoria</label>
                                    <select name="catCarac" id="catCarac" class="form-control">
                                        <option value="0">1</option>
                                        <option value="1">2</option>
                                        <option value="2">3</option>
                                        <option value="3">4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="visibilidadCarac">Visible</label>
                                    <select name="visibilidadCarac" id="visibilidadCarac" class="form-control">
                                        <option value="0">Si</option>
                                        <option value="1">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="obligCarac">Obligatorio</label>
                                    <select name="obligCarac" id="obligCarac" class="form-control">
                                        <option value="0">Si</option>
                                        <option value="1">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <span id="mensajeAddEditDetalle"></span>
                        </div>
                        <div class="col-lg-3">
                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                        <div class="col-lg-3">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Modal add edit Tipo archivo -->
<div class="modal fade" id="modal_ConfigTipoArchivo" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agrega nuevo Tipo de Archivo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm-add-edit-tipo-archivo" enctype="multipart/form-data" method="post">
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input  type="hidden" id="idTipoArchivo" name="idTipoArchivo" value="0">
                                    <label class="form-control-label" for="nombreTipoArchivo">Nombre del Tipo de archivo</label>
                                    <input  type="text" id="nombreTipoArchivo" name="nombreTipoArchivo" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="prioridadTipoArch">Prioridad</label>
                                    <select name="prioridadTipoArch" id="prioridadTipoArch" class="form-control">
                                        <option value="0">Si</option>
                                        <option value="1" selected>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class=" col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="selectTipoArch">Tipo de Archivo</label>
                                    <select name="selectTipoArch" id="selectTipoArch" class="form-control">
                                        <option value="0" selected>Foto</option>
                                        <option value="1" >Documento</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <span id="mensajeAddEditArchivo"></span>
                        </div>
                        <div class="col-lg-3">
                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                        <div class="col-lg-3">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal add nuevo Modelo -->
<div class="modal fade" id="modal_ConfigModelo" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modelos de Vehiculo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm-add-edit-model" enctype="multipart/form-data" method="post">
                    <div class="pl-lg-4">
                        <input  type="hidden" id="idmodelo" name="idmodelo" value="0">
                        <input  type="hidden" id="idmarca" name="idmarca" value="0">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="marcaModelo">Marca</label>
                                    <select name="marcaModelo" id="marcaModelo" class="form-control">
                                        <!-- AJAX -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="nombreModelo">Nombre del modelo</label>
                                    <input  type="text" id="nombreModelo" name="nombreModelo" class="form-control">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <span id="mensajeAddEditModelo"></span>
                        </div>
                        <div class="col-lg-3">
                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                        <div class="col-lg-3">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>