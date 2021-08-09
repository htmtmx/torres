<?php
session_start();
// Establecer tiempo de vida de la sesión en segundos
$inactividad = 9000;
// Comprobar si $_SESSION["timeout"] está establecida
if (isset($_SESSION["timeout"])) {
    // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
    $sessionTTL = time() - $_SESSION["timeout"];
    if ($sessionTTL > $inactividad) {
        session_destroy();
        header("Location: ..\controller\c_logout.php");
    }
}
// El siguiente key se crea cuando se inicia sesión
$_SESSION["timeout"] = time();

if (!isset($_SESSION['usuario'])) {
    header('Location: ../index.php');
}
?>
<!doctype html>
<html lang="en">
<style>
    .stepwizard-step p {
        margin-top: 10px;
    }

    .stepwizard-row {
        display: table-row;
    }

    .stepwizard {
        display: table;
        width: 100%;
        position: relative;
    }

    .stepwizard-step button[disabled] {
        opacity: 1 !important;
        filter: alpha(opacity=100) !important;
    }

    .stepwizard-row:before {
        top: 14px;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 100%;
        height: 1px;
        background-color: #ccc;
        z-index: 0;

    }

    .stepwizard-step {
        display: table-cell;
        text-align: center;
        position: relative;
    }

    .btn-circle {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
    }


    /* Category Ads */

    #ads {
        margin: 30px 0 30px 0;

    }

    #ads .card-notify-badge {
        position: absolute;
        left: -10px;
        top: -20px;
        background: var(--grey);
        text-align: center;
        border-radius: 30px 30px 30px 30px;
        color: #000;
        padding: 5px 10px;
        font-size: 14px;

    }

    #ads .card-notify-year {
        position: absolute;
        right: -10px;
        top: -20px;
        background: var(--primary);
        border-radius: 50%;
        text-align: center;
        color: #fff;
        font-size: 14px;
        width: 50px;
        height: 50px;
        padding: 15px 0 0 0;
    }


    #ads .card-detail-badge {
        background: var(--light);
        text-align: center;
        border-radius: 30px 30px 30px 30px;
        color: #000;
        padding: 5px 10px;
        font-size: 14px;
    }



    #ads .card:hover {
        background: #fff;
        box-shadow: 12px 15px 20px 0px rgba(46, 61, 73, 0.15);
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    #ads .card-image-overlay {
        font-size: 20px;

    }


    #ads .card-image-overlay span {
        display: inline-block;
    }


    #ads .ad-btn {
        text-transform: uppercase;
        width: 150px;
        height: 40px;
        font-size: 16px;
        line-height: 35px;
        text-align: center;
        display: block;
        text-decoration: none;
        margin: 20px auto 1px auto;
        color: #000;
        overflow: hidden;
        position: relative;
        background-color: #e6de08;
    }

    #ads .ad-btn:hover {
        background-color: #e6de08;
        color: #1e1717;
        border: 2px solid #e6de08;
        background: transparent;
        transition: all 0.3s ease;
        box-shadow: 12px 15px 20px 0px rgba(46, 61, 73, 0.15);
    }



    #ads .ad-title h5 {
        text-transform: uppercase;
        font-size: 18px;
    }
</style>
<?php
$tittle = "Compra";
include("includes/header.php");
include("includes/modal-add-client.php");
?>

<body class="body-home">
<div class="d-flex">
    <?php include("includes/navegation.php"); ?>
    <div class="w-100">
        <?php include("includes/menus.php"); ?>
        <div id="content">
            <!--Inicio contenido dinamico-->
            <div class="componet-dinamico">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Compra de vehiculo</li>
                    </ol>
                </nav>
                <section class="">
                    <div class="container py3">
                        <div class="row">
                            <div class="col-lg-9">
                                <h2 class="font-weight-bold mb-0">Nueva Compra</h2>
                                <p id="contador-rowsClients" class="lead text-muted">Porfavor, llene los campos solicitados</p>
                            </div>
                            <div class="col-lg-3">
                            </div>
                        </div>
                    </div>
                </section>

                <section class="bg-mix">
                    <div class="alert alert-success" id="alerta" style="display: none;">&nbsp;</div>
                    <div class="container" id="form-add-car-buy">
                        <div class="stepwizard">
                            <div class="stepwizard-row setup-panel">
                                <div class="stepwizard-step">
                                    <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                    <p>Cliente</p>
                                </div>
                                <div class="stepwizard-step">
                                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                    <p>Veh&iacuteculo</p>
                                </div>
                                <div class="stepwizard-step">
                                    <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                    <p>Forma de Pago</p>
                                </div>
                                <div class="stepwizard-step">
                                    <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                                    <p>Confirmar</p>
                                </div>
                            </div>
                        </div>
                            <div class="row setup-content" id="step-1">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <h3>Cliente Seleccionado</h3>
                                        <input type="text" id="id_cliente" class="form-control" placeholder="idCliente" hidden/>
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="inputState">Cliente</label>
                                                        <input required="required" type="text" id="nombreCliente" name="nombreCliente" class="form-control" placeholder="Nombre Cliente" /><span id="nombreCliente"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="inputState">Telefono/Celular</label>
                                                        <input required="required" type="text" id="contacto" class="form-control" placeholder="Telefono / Celular" />
                                                    </div>
                                                    <div class="form-group col-md-5">
                                                        <label for="inputState">Correo</label>
                                                        <input required="required" type="text" id="correoCliente" class="form-control" placeholder="Correo" />
                                                    </div>
                                                    <div class="form-group col-md-1 offset-md-11 ">
                                                        <button class="btn btn-primary nextBtn btn-md pull-right" type="button">Next</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    <hr>
                                        <section class="bg-mix py-2">
                                            <div class="container">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Buscar cliente</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" id="searchClient" placeholder="Ingrese el nombre del cliente">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <button type="button" class="btn btn-primary w-100 aling-self-center" data-toggle="modal" data-target="#modal-new-client" data-whatever="@getbootstrap">
                                                            <i class="icon ion-md-add mr-2"></i>Agregar Cliente
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 my-3 table-responsive">
                                                        <input type="hidden" id="user-id" value="0">
                                                        <table class="table table-striped table-hover bg-light">
                                                            <thead>
                                                            <tr>
                                                                <th scope="col" hidden>#</th>
                                                                <th scope="col" hidden>ID</th>
                                                                <th scope="col">Nombre</th>
                                                                <th scope="col">Teléfono</th>
                                                                <th scope="col">Correo</th>
                                                                <th scope="col">Suscripción</th>
                                                                <th scope="col">Registro</th>
                                                                <th scope="col">Estado</th>
                                                                <th scope="col">Accion</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody id="clientsCompra" name="clientsCompra">

                                                            </tbody>
                                                        </table>
                                                        <!--Dinamic Table AJAX-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div id="paginator" class="col-lg-12 my-2" >

                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>

                            <!-- P A S O    2    C O M P R A -->

                            <div class="row setup-content" id="step-2">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <h3>Registro de Vechiculo</h3>
                                        <input type="text" id="id_car_select" class="form-control" placeholder="idCarSelect" hidden/>
                                        <div class="form-group" >
                                            <form id="formAddCarBuy" class="form" role="form">
                                            <label class="control-label">Vehiculo</label>
                                            <input type="text" id="noVehiculo" class="form-control" placeholder="noVehiculo" />

                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="inputState">Marca</label>
                                                        <select class="form-control" id="marcas" name="marcas">
                                                                <!--AJAX-->
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="inputState">Modelo</label>
                                                        <select class="form-control" id="modelos" name="modelos">
                                                            <!--AJAX-->
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="inputState">Año</label>
                                                        <select class="form-control" id="anio" name="anio">
                                                            <!--AJAX-->
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="inputState">Placa</label>
                                                        <input type="text" class="form-control" id="placa" name="placa" placeholder="Placa">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="inputState">Entidad Placa</label>
                                                        <select class="form-control" id="entidad_placa">
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
                                                    <div class="form-group col-md-2">
                                                        <label for="inputState">Color</label>
                                                        <input required="required" type="text" id="colorCarBuy" class="form-control" placeholder="Color" />
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="inputState">Kilometraje</label>
                                                        <input required="required" type="number" id="kmCarBuy" class="form-control" placeholder="Kilometraje" />
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="inputState">Transmision</label>
                                                        <select class="form-control" id="transimision" name="transimision">
                                                            <option value="MA">Manual</option>
                                                            <option value="AU">Automatica</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="inputState">Combustible</label>
                                                        <select class="form-control" id="combustible" name="combustible">
                                                            <option value="GAS">Gasolina</option>
                                                            <option value="DIE">Diesel</option>
                                                            <option value="HIB">Hibrido</option>
                                                            <option value="ELE">Eléctrico</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="inputState">No Puertas</label>
                                                        <select class="form-control" id="noPuertas" name="noPuertas">
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-12 ">
                                                            <button class="btn btn-primary backBtn btn-md pull-left" type="button">Back</button>
                                                            <button class="btn btn-primary nextBtn btn-md pull-right offset-md-10" type="button">Next</button>
                                                    </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="row setup-content" id="step-3">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <h3>Informacion de pago</h3>
                                        <div class="form-group">
                                            <!--<label class="control-label">Vehiculo</label>-->
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label>Valor del veh&iacuteculo</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input required="required" type="number" class="text-right form-control" id="montoPagarCompra" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label >Forma de Pago</label>
                                                        <select class="form-control" id="formaPagoCompra" name="formaPagoCompra">
                                                            <option value="0">Efectivo</option>
                                                            <option value="1">Credito</option>
                                                            <option value="2">Transferencia</option>
                                                            <option value="3">Deposito</option>
                                                            <option value="4">Cambio</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label >Enganche</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input required="required" type="number" class="text-right form-control" id="engancheCompra" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3 offset-md-1">
                                                        <label >Subtotal</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="number" min="0" class="text-right form-control" id="subtotalCompra">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3 offset-md-5">
                                                        <label >Saldo</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="number" class="text-right form-control" id="saldoCompra" placeholder="Saldo a pagar">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3 offset-md-1">
                                                        <label >IVA</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="number" min="0" class="text-right form-control" id="ivaCompra" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3 offset-md-9">
                                                        <label >Total para liquidar</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="number" class="text-right form-control" id="totalCompra" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12 ">
                                                        <button class="btn btn-primary backBtn btn-md pull-left" type="button">Back</button>
                                                        <button class="btn btn-primary nextBtn btn-md pull-right offset-md-10" type="button">Next</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row setup-content" id="step-4">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <h3>Confirmar</h3>
                                        <button class="btnConfirm btn-success btn-lg pull-right" type="submit">Confirmar!</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </div>
                </section>
            </div>
            <!--FIN contenido dinamico-->
            <?php include("includes/footer.php"); ?>
        </div>
    </div>
</div>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.js"></script>
<script>
    var id_page = 1;
</script>
<!--


<script src="../Seleccionar/js/clients-control.js"></script>
  -->
</body>
<script>
    $(document).ready(function() {

        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

        allWells.hide();

        navListItems.click(function(e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-primary').addClass('btn-default');
                $item.addClass('btn-primary');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allNextBtn.click(function() {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url']"),
                isValid = true;

            $(".form-group").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }

            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-primary').trigger('click');
    });
</script>
<script>
    var id_page = 0;
</script>
<!--<script src="../ajax/cars-control.js"></script>-->
<script src="../ajax/car-buy-control.js"></script>
<script src="../ajax/clients-control.js"></script>
<div id="mensaje"></div>

</html>