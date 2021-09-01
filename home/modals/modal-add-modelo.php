<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modaladdmodelo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm-add-modelo">
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label class="form-control-label" for="marcasCoche">Marcas</label>
                                    <select id="marcasCoche" name="marcasCoche" class="w-75 form-control">
                                        <!-- AJAX RESPONSE GET DETALLES-->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="modeloname">Nombre del modelo</label>
                                    <input type="text" id="modeloname" name="modeloname" class="form-control" required="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <div class="col-lg-12 col-auto text-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Añadir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
