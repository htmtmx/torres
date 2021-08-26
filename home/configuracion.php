<?php include_once "./include/session.php"?>
<?php $titulo = "Perfil " ?>
<!DOCTYPE html>
<html>
<head>
    <?php include_once "./include/header.php"?>
</head>

<style>

</style>
<body>
<?php include_once "./include/sidebar.php"?>

<!-- Main content -->
<div class="main-content" id="panel">
    <?php include_once "./include/nav.php"?>
    <!-- Header -->
    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(http://www.autostecnologico.com/sis/images/portadas/2.1.jpg); background-size: cover; background-position: center;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <h1 class="display-2 text-white" id="empresaE"></h1>
                    <p class="text-white mt-0 mb-5">Modifica los Datos del negocio, estos aparereceran en los documentos que se generen </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 ">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Datos del Negocio</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="frm-update-datos-empresa">
                            <h6 class="heading-small text-muted mb-4">Dirección</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="nombre">Nombre</label>
                                            <input type="hidden" id="idEmpresa" name="idEmpresa" class="form-control">
                                            <input type="text" id="nombreEmpresa" name="nombreEmpresa" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="apaterno">RFC</label>
                                            <input type="text" id="rfcEmpresa" name="rfcEmpresa" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label class="form-control-label" for="telefono">Calle</label>
                                            <input type="text" id="calleEmpresa" name="calleEmpresa" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label class="form-control-label" for="celular">No Ext.</label>
                                            <input type="text" id="noExtEmp" name="noExtEmp" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label class="form-control-label" for="celular">No Int.</label>
                                            <input type="text" id="noIntEmp" name="noIntEmp" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="coloniaEmpr">Colonia</label>
                                            <input type="text" id="coloniaEmpr" name="coloniaEmpr" class="form-control" required >
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="municipio">Municipio</label>
                                            <input type="text" id="municipio" name="municipio" class="form-control" required >
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <label class="form-control-label" for="correo">CP</label>
                                            <input type="numeric" id="cpEmpr" name="cpEmpr" class="form-control" required >
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="form-control-label" for="correo">Estado</label>
                                            <select name="estadoEmp" id="estadoEmp" class="form-control">
                                                <option value="AGU">Aguascalientes</option>
                                                <option value="BCN">Baja California</option>
                                                <option value="BCS">Baja California Sur</option>
                                                <option value="CAM">Campeche</option>
                                                <option value="CHP">Chiapas</option>
                                                <option value="CHH">Chihuahua</option>
                                                <option value="CDMX">Ciudad de México</option>
                                                <option value="COA">Coahuila</option>
                                                <option value="COL">Colima</option>
                                                <option value="DUR">Durango</option>
                                                <option value="MEX">Estado de México</option>
                                                <option value="GUA">Guanajuato</option>
                                                <option value="GRO">Guerrero</option>
                                                <option value="HID">Hidalgo</option>
                                                <option value="JAL">Jalisco</option>
                                                <option value="MIC">Michoacán</option>
                                                <option value="MOR">Morelos</option>
                                                <option value="NAY">Nayarit</option>
                                                <option value="NLE">Nuevo León</option>
                                                <option value="OAX">Oaxaca</option>
                                                <option value="PUE">Puebla</option>
                                                <option value="QUE">Querétaro</option>
                                                <option value="ROO">Quintana Roo</option>
                                                <option value="SLP">San Luis Potosí</option>
                                                <option value="SIN">Sinaloa</option>
                                                <option value="SON">Sonora</option>
                                                <option value="TAB">Tabasco</option>
                                                <option value="TAM">Tamaulipas</option>
                                                <option value="TLA">Tlaxcala</option>
                                                <option value="VER">Veracruz</option>
                                                <option value="YUC">Yucatán</option>
                                                <option value="ZAC">Zacatecas</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <!-- Address -->
                            <h6 class="heading-small text-muted mb-4">Detalles del negocio</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="puesto">Teléfono</label>
                                            <input type="text" id="telEmpr" name="telEmpr" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="nvl_acceso">Correo</label>
                                            <input type="email" id="correoEmp" name="correoEmp" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label class="form-control-label" for="puesto">Web Site</label>
                                            <input type="text" id="webEmpr" name="webEmpr" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="nvl_acceso">Fecha registro</label>
                                            <input type="text" id="dateEmpr" name="dateEmpr" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <!-- Address -->
                            <h6 class="heading-small text-muted mb-4">Licencia de Uso de Software</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="form-control-label" for="puesto">Version</label>
                                            <input type="email" id="puesto" class="form-control" value="1.2 BUILD 211809" disabled >
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="form-control-label" for="puesto">Revisión</label>
                                            <input type="email" id="puesto" class="form-control" value="19 AGO 2021" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="nvl_acceso">Clave de Licencia</label>
                                            <input type="email" id="nvl_acceso" class="form-control" value="BHBCHJ415615156B" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <h6 class="heading-small text-muted mb-4">Contrato</h6>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Contrato de Uso de Software ReCkreaStudios</label>
                                    <textarea rows="8" class="form-control" disabled>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean magna neque, cursus id ligula sit amet, porttitor
                                        icies congue. Ut a mau
                                    </textarea>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <div class="col-lg-12 col-auto text-right">
                                <span class="d-flex position-absolute w-100" id="mensajeUpdateCliente"></span>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include './include/footer.php'; ?>
    </div>
</div>

</body>
<?php include './include/js.php'; ?>
</html>
<script src="../ajax/configuracion.js"></script>
<script src="../ajax/empresa-update.js"></script>