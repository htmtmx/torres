<?php
    session_start();
    // Establecer tiempo de vida de la sesión en segundos
    $inactividad = 900;
    // Comprobar si $_SESSION["timeout"] está establecida
    if(isset($_SESSION["timeout"])){
        // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
        $sessionTTL = time() - $_SESSION["timeout"];
        if($sessionTTL > $inactividad){
            session_destroy();
            header("Location: ..\controller\c_logout.php");
        }
    }
    // El siguiente key se crea cuando se inicia sesión
    $_SESSION["timeout"] = time();

    if(!isset($_SESSION['usuario']))
    {
      header('Location: ../index.php');
    }
?>
<!doctype html>
<html lang="en">
  <?php
    $tittle = "Configuracion General de la Empresa";
    include("includes/header.php");
    ?>
  <body class="body-home">
  <div class="d-flex">
      <?php 
        include("includes/navegation.php"); 
        include("includes/modal_add_user.php");
      ?>
      
      <div class="w-100">
      <?php include("includes/menus.php"); ?>
        <div id="content">            
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Configuración</li>
                </ol>
            </nav>
        <!--Inicio contenido dinamico-->
          <div class="componet-dinamico bg-mix">

            <!--/col-->
            <section class="container py-3">
                <div class="row">
                    <div class="col-lg-9">
                        <h2 class="font-weight-bold mb-0">Informacion de la empresa</h2>
                        <p class="lead text-muted">Modifique la información aqui</p>
                    </div>
                    <div class="col-lg-3">
                    <button type="button" class="btn btn-primary w-100 aling-self-center" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">
                            <i class="icon ion-md-add mr-2"></i>Agregar Usuario
                        </button>
                    </div>
                </div>
            </section>
            <!--/col-->
            <section class="bg-mix ">
                <div class="container">
                <div class="row">
                <div class="col-md-12 ">
                    <span class="anchor" id="formUserEdit"></span>
                    <!-- form user info -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Información General del Negocio</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" id="form_1">
                                <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">RFC del Negocio</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" id="rfc" placeholder="XEXX010101000">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Nombre del Negocio</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" id="nombre">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Teléfono de contacto</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="tel" id="tel">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Email de Contacto</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="email" id="email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Sitio Web</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" id="web">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label"></label>
                                        <div class="col-lg-9">
                                            <input type="submit" class="btn btn-primary" value="Guardar Cambios">
                                        </div>
                                    </div>
                                </form>
                                <div id="mensaje"></div>
                        </div>
                    </div>
                    <!-- /form user info -->
                </div>
                <div class="col-md-12">
                    <div class="callout callout-primary">
                        <h4>Recuerde:</h4>
                        La información que se encuentra arriba aparecerá en los documentos y el sitio web.
                    </div>
                </div>
                </div>

            </section>
            <section class="bg-grey">
                <div class="col-md-10 offset-md-1">
                    <span class="anchor" id="formComplex"></span>
                    <hr class="my-5">
                    <h3>Dirección de la Empresa</h3>
                    <!-- form complex example -->
                    <form id="form_2" class="form">
                        <div class="form-row mt-4">
                            <div class="col-sm-6 pb-3">
                                <label for="calle">Calle</label>
                                <input type="text" class="form-control" id="calle" placeholder="Ingrese la Calle">
                            </div>
                            <div class="col-sm-3 pb-3">
                                <label for="noExt">No Exterior</label>
                                <input type="text" class="form-control" id="no_ext" placeholder="Número exterior">
                            </div>
                            <div class="col-sm-3 pb-3">
                                <label for="noInt">No Interior</label>
                                <input type="text" class="form-control" id="no_int" placeholder="Número interior">
                            </div>
                            <div class="col-sm-6 pb-3">
                                <label for="col">Colonia</label>
                                <input type="text" class="form-control" id="colonia">
                            </div>
                            <div class="col-sm-6 pb-3">
                                <label for="municipio">Municipio</label>
                                <input type="text" class="form-control" id="de_mun">
                            </div>
                            <div class="col-sm-3 pb-3">
                                <label for="estados">Estado</label>
                                <select class="form-control" id="estado">
                                <option value="CDMX">Ciudad de México</option>
                                <option value="AGS">Aguascalientes</option>
                                <option value="BCN">Baja California</option>
                                <option value="BCS">Baja California Sur</option>
                                <option value="CAM">Campeche</option>
                                <option value="CHP">Chiapas</option>
                                <option value="CHI">Chihuahua</option>
                                <option value="COA">Coahuila</option>
                                <option value="COL">Colima</option>
                                <option value="DUR">Durango</option>
                                <option value="GTO">Guanajuato</option>
                                <option value="GRO">Guerrero</option>
                                <option value="HGO">Hidalgo</option>
                                <option value="JAL">Jalisco</option>
                                <option value="MEX">M&eacute;xico</option>
                                <option value="MIC">Michoac&aacute;n</option>
                                <option value="MOR">Morelos</option>
                                <option value="NAY">Nayarit</option>
                                <option value="NLE">Nuevo Le&oacute;n</option>
                                <option value="OAX">Oaxaca</option>
                                <option value="PUE">Puebla</option>
                                <option value="QRO">Quer&eacute;taro</option>
                                <option value="ROO">Quintana Roo</option>
                                <option value="SLP">San Luis Potos&iacute;</option>
                                <option value="SIN">Sinaloa</option>
                                <option value="SON">Sonora</option>
                                <option value="TAB">Tabasco</option>
                                <option value="TAM">Tamaulipas</option>
                                <option value="TLX">Tlaxcala</option>
                                <option value="VER">Veracruz</option>
                                <option value="YUC">Yucat&aacute;n</option>
                                <option value="ZAC">Zacatecas</option>
                                </select>
                            </div>
                            <div class="col-sm-3 pb-3">
                                <label for="cp">Código Postal</label>
                                <input type="text" class="form-control" id="cp">
                            </div>
                            <div class="col-md-6 pb-3">
                                <div class="col-lg-12 p-3">
                                    <input type="submit" class="btn btn-primary" value="Actualizar dirección">
                                </div>
                                <div id="mensaje2"></div>
                            </div>

                            <div class="col-12">
                                <div class="form-row">
                                    <label class="col-md col-form-label"  for="name">Licence Key</label>
                                    <input type="text" class="form-control col-md-4" name="gid" id="licencia" readonly/>
                                    <label class="col-md col-form-label"  for="name">Versión</label>
                                    <input type="text" class="form-control col-md-4" name="da" id="version" readonly/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>

            
          <!--FIN contenido dinamico-->
          <?php include("includes/footer.php");?>
        </div>
      </div>
  </div>
  <script src="../ajax/bussines.js"></script>
  </body>
</html>