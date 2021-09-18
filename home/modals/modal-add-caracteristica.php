<!-- Modal -->
<div class="modal fade" id="addCaracteristicas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agrega Caracteristica</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm-add-caracteristica">
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label class="form-control-label" for="detalle">Detalles</label>
                                    <div class="row d-flex">
                                        <input type="hidden" id="idCoche" name="idCoche" value="<?php echo $noCoche;?>">
                                        <select id="detalle" name="detalle" class="w-75 form-control fa">
                                            <!-- AJAX RESPONSE GET DETALLES-->
                                        </select>
                                        <button type="button" class="btn btn-primary W-25 mx-2" data-toggle="modal" data-target="#addDetalles">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="valor">Valor</label>
                                    <input type="text" id="valor" name="valor" class="form-control" required="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <div class="col-lg-12 col-auto text-right">
                        <span class="d-flex position-absolute w-100" id="mensajeAddCaracteristica"></span>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Añadir</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>