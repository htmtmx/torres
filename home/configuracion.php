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
                    <h1 class="display-2 text-white">AUTOS TORRES</h1>
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
                        <form>
                            <h6 class="heading-small text-muted mb-4">Dirección</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="nombre">Nombre</label>
                                            <input type="text" id="nombre" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="apaterno">RFC</label>
                                            <input type="text" id="apaterno" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label class="form-control-label" for="telefono">Calle</label>
                                            <input type="tel" id="telefono" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label class="form-control-label" for="celular">No Ext.</label>
                                            <input type="tel" id="celular" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label class="form-control-label" for="celular">No Int.</label>
                                            <input type="tel" id="celular" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="correo">Colonia</label>
                                            <input type="text" id="correo" class="form-control" required >
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="form-control-label" for="correo">CP</label>
                                            <input type="numeric" id="correo" class="form-control" required >
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="form-control-label" for="correo">Estado</label>
                                            <select name="estado" id="estado" class="form-control">
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
                                                <option value="Estado de México" selected="">Estado de México</option>
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
                                            <input type="email" id="puesto" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="nvl_acceso">Correo</label>
                                            <input type="email" id="nvl_acceso" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label class="form-control-label" for="puesto">Web Site</label>
                                            <input type="email" id="puesto" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="nvl_acceso">Fecha registro</label>
                                            <input type="email" id="nvl_acceso" class="form-control" disabled>
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
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean magna neque, cursus id ligula sit amet, porttitor cursus nunc. Sed ac velit tortor. Integer molestie imperdiet sem in ullamcorper. Aliquam vitae lacus odio. Donec ut mattis tellus, et venenatis elit. Cras tincidunt auctor nisl semper placerat. Sed sit amet iaculis odio, a tincidunt nibh. Vivamus ante elit, egestas et arcu at, hendrerit sodales arcu.

Nulla augue odio, condimentum eget ante vitae, efficitur feugiat nunc. Pellentesque sed mauris ut risus semper congue fermentum ac ipsum. Integer porta dolor ut lectus malesuada porttitor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam eleifend congue tellus et efficitur. Aliquam interdum, neque in mattis ultrices, ante ligula rhoncus libero, ac mollis erat velit in urna. Morbi nec purus eu magna condimentum lobortis id id mauris. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc sed egestas purus, vitae lobortis elit. Ut sit amet congue nisl. Duis imperdiet justo eget nibh blandit sodales. Nam ultrices augue a elit lobortis auctor eget eu nibh. Donec vel ornare nisl, sed ultricies felis. Sed imperdiet pulvinar auctor. Curabitur quis turpis gravida, pulvinar neque at, malesuada massa.

Praesent aliquam nunc tortor, vitae imperdiet mauris rutrum sit amet. Maecenas luctus justo et tellus varius, et posuere orci varius. Suspendisse potenti. Vestibulum elementum tortor at mauris finibus sodales. In dignissim neque eu tristique maximus. Vestibulum tempor nunc et ultrices viverra. Cras elementum porttitor nulla, ut porttitor lacus scelerisque non.

Fusce vitae commodo orci. Donec ut est rhoncus, placerat metus nec, sollicitudin justo. Quisque aliquam purus eget elementum vehicula. Sed euismod fringilla tortor, a malesuada dolor. Nullam semper ac magna at dictum. Nullam nec pellentesque turpis, at feugiat dolor. Duis sit amet purus justo. Mauris elit turpis, rutrum quis laoreet non, eleifend sit amet ipsum. In enim massa, condimentum nec imperdiet sit amet, euismod in elit. Sed imperdiet vel ipsum in faucibus. Praesent fringilla tincidunt odio, quis ultricies leo blandit sed. Pellentesque nulla tellus, porttitor eget luctus vitae, fringilla at orci. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla auctor vel libero eget imperdiet.

Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam rhoncus, leo imperdiet euismod ullamcorper, nulla leo rhoncus neque, a porttitor velit felis nec nisl. Cras in dolor id quam commodo consectetur. Aliquam nec tellus nec eros sodales tempor. Sed vestibulum vulputate consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ac blandit mi. Ut lobortis velit id arcu volutpat, ut laoreet lectus semper. Maecenas mattis tortor sapien, porttitor sodales tellus ultricies congue. Ut a mauris eget sapien vestibulum mattis vel id ipsum. Praesent sagittis tristique sem quis venenatis. Duis mauris ante, volutpat sit amet feugiat sed, dapibus eu urna. Cras in est sit amet lectus eleifend rhoncus. Maecenas a tempor urna. Aenean lacinia mi vel mattis sagittis. Quisque auctor lacus a eros feugiat, eget euismod elit gravida.
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
