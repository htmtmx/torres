<!-- Modal -->
<div class="modal fade" id="buscaVechiculoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Seleccione una vehiculo</h5>
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
                                        <h3 class="mb-0">Coches disponibles para venta</h3>
                                    </div>
                                    <div class="col text-right">
                                        <div class="form-group mb-0">
                                            <div class="input-group input-group-alternative input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-search"></i>
                                                    </span>
                                                </div>
                                                <input class="form-control" id="myInput" type="text" placeholder="Placa">
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
                                        <th scope="col">Placa</th>
                                        <th scope="col">Detalles</th>
                                        <th scope="col">Costo</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbl-coches-venta">
                                    <tr idcoche="370237125480822">
                                        <th scope="row">
                                            1
                                        </th>
                                        <td>
                                            <a class="nav-link" href="./detalles-cliente.php?idCliente=370237125480822">
                                                MKDFP456
                                            </a>
                                        </td>
                                        <td>
                                            Nissan Versa 2018 Rojo
                                        </td>
                                        <td>
                                            <div class="h6 font-weight-300"> <strong class="heading"><i class="fas fa-dollar-sign text-green"></i> 120000.00</strong></div>  <div class="h6 font-weight-300"><strong class="heading"><i class="fas fa-credit-card"></i> 150000.00</strong> </div>
                                        </td>

                                        <td>
                                            <button type="button" class="btn btn-primary" onclick="seleccionaCoche(370237125480822);">Seleccionar</button>
                                        </td>
                                    </tr>
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
</div>