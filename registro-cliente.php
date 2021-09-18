<!-- ----- VERSION DEL DOCUMENTO ---------
    VERSION 1.08.1 BUILD 27-08-21
    @autor: ReCkrea StuDios
    @website: reckreastudios.com
    @webdevs: ChrisRCGS, Fernando HL, Cesar HPP.
    -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de Gestión de Vehiculos y documentos de Autos Torres">
    <meta name="author" content="ReCkreaStuDios">
    <meta name="keywords" content="autos torres, compra venta, vehiculos, venta de coches, venta autos, compra coches, coches, compra venta"/>
    <meta name="revised" content="27/08/2021" />
    <meta name="og:image" content="logo.jpg" />
    <meta name="robots" content="index"/>
    <meta name="robots" content="follow"/>

    <meta name="copyright" content="ReCkreaStuDios" />
    <title>Registro de Cliente | Autos Torres</title>
    <!-- Favicon -->
    <link rel="icon" href="./logo.jpg" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="./assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="./assets/css/argon.css?v=1.2.0" type="text/css">
    <link rel="stylesheet" href="./assets/css/style.css" type="text/css">
</head>

<body class="bg-default">
<!-- Main content -->
<div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-4 pt-lg-9"
         style="background: url(./assets/img/bg-client.jpg) center no-repeat !important;">
        <div class="container-fluid">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 px-5 py-5">
                        <a href="./">
                            <img  src="./assets/img/logo.png" width="250">
                        </a>
                        <h1 class="text-white">¡Registrate!</h1>
                        <h4 class="text-lead text-white">Por favor llena los campos obligatorios</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--8 pb-5">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Llene los datos que se solicitan</h3>
                            </div>
                            <div class="col text-right">
                                <a href="./" class="btn btn-sm btn-primary">Regresar</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="no_cliente" id="no_cliente" value="0">
                        <h6 class="heading-small text-muted mb-4">Información del Cliente</h6>
                        <form id="frm-add-cliente-inicio">
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="nombre_cliente">Nombre</label>
                                            <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control" placeholder="Nombre" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="apaterno_cliente">Primer Apellido</label>
                                            <input type="text" name="apaterno_cliente" id="apaterno_cliente" class="form-control" placeholder="Primer Apellido">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="amaterno_cliente">Segundo Apellido</label>
                                            <input type="text" name="amaterno_cliente" id="amaterno_cliente" class="form-control" placeholder="Segundo Apellido">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="correo_cliente">Correo Electronico</label>
                                            <input type="email" name="correo_cliente" id="correo_cliente" class="form-control" placeholder="example@gmail.com">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="telefono_cliente">Telefono</label>
                                            <input type="text" name="telefono_cliente" id="telefono_cliente" class="form-control" placeholder="No. Telefono">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="celular_cliente">Celular</label>
                                            <input type="text" id="celular_cliente" name="celular_cliente" class="form-control" placeholder="No. Celular">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <h6 class="heading-small text-muted mb-4">Dirección</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <input type="hidden" id="id_dir" name="id_dir">
                                            <label class="form-control-label" for="calle">Calle</label>
                                            <input type="text" id="calle" name="calle" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label class="form-control-label" for="noExtEmp">No Ext.</label>
                                            <input type="text" id="noExtEmp" name="noExtEmp" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label class="form-control-label" for="noIntEmp">No Int.</label>
                                            <input type="text" id="noIntEmp" name="noIntEmp" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="coloniaEmpr">Colonia</label>
                                            <input type="text" id="coloniaEmpr" name="coloniaEmpr" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="municipio">Municipio</label>
                                            <input type="text" id="municipio" name="municipio" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label class="form-control-label" for="cpEmpr">CP</label>
                                            <input type="numeric" id="cpEmpr" name="cpEmpr" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="estadoEmp">Estado</label>
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
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="referencias">Referencias</label>
                                            <input type="text" id="referencias" name="referencias" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <h6 class="heading-small text-muted mb-4">Otros datos</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="empresa_cliente">Empresa / Organizacion</label>
                                            <input id="empresa_cliente" name="empresa_cliente" class="form-control" placeholder="Nombre Empresa">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="rfc_cliente">RFC</label>
                                            <input id="rfc_cliente" name="rfc_cliente" class="form-control" placeholder="RFC">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="medio_identificación_cliente">Se identifica con:</label>
                                            <select id="medio_identificación_cliente" name="medio_identificación_cliente" class="form-control">
                                                <option value="INE">INE</option>
                                                <option value="PASAPORTE">Pasaporte</option>
                                                <option value="CEDULA">Cédula Profesional</option>
                                                <option value="CARTILLA">Cartilla de Servicio Militar</option>
                                                <option value="NONE">Ninguna</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="folio_cliente">Folio</label>
                                            <input type="text" name="folio_cliente" id="folio_cliente" class="form-control" placeholder="Folio">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="tipo_cliente">Tipo de cliente</label>
                                            <select id="tipo_cliente" name="tipo_cliente" class="form-control">
                                                <option value="0">Persona Física</option>
                                                <option value="1">Persona Moral</option>
                                                <option value="2">NA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="col-lg-12 col-auto text-right">
                                <span class="d-flex position-absolute w-100" id="mensajeUpdateCliente"></span>
                                <button type="submit" class="btn btn-primary">Registrar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<footer class="py-5" id="footer-main">
    <div class="container">
        <div class="row align-items-center justify-content-xl-between">
            <div class="col-xl-6">
                <div class="copyright text-center text-xl-left text-muted">
                    &copy; 2021 <a href="https://reckreastudios.com/" class="font-weight-bold ml-1" target="_blank">
                        ReCKrea Studios
                    </a>
                </div>
            </div>
            <div class="col-xl-6">
                <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                    <li class="nav-item">
                        <a href="https://reckreastudios.com/" class="nav-link" target="_blank">ReCkreaStudios</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" target="_blank">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" target="_blank">Ayuda</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://github.com/htmtmx/torres#readme" class="nav-link" target="_blank">RCSG License</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- Argon Scripts -->
<!-- Core -->
<script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="./assets/vendor/js-cookie/js.cookie.js"></script>
<script src="./assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="./assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Argon JS -->
<script src="./assets/js/argon.js?v=1.2.0"></script>
<script src="./assets/js/sweetalert2.all.min.js"></script>
</body>


<script>
$("#nombre_cliente").focus();
</script>
<script src="./ajax/registro-usuario-page.js"></script>
<script src="./ajax/valida-form.js"></script>
<script src="./ajax/console_user.js"></script>

</html>
