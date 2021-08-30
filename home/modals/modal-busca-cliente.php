
<!-- Modal -->
<div class="modal fade" id="buscaClienteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Seleccione una persona</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <h3 class="mb-0">Personas registradas</h3>
                                    </div>
                                    <div class="col text-right">
                                        <div class="form-group mb-0">
                                            <div class="input-group input-group-alternative input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-search"></i>
                                                    </span>
                                                </div>
                                                <input class="form-control" id="myInput" type="text" placeholder="Nombrer del cliente..">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <!-- Projects table -->
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">No</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbl-clientes-contratos">
                                    <!-- AJAX RESPONSE TBL CLIENTES TODOS LOS CLIENTES ACTIVOS-->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>