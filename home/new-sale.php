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
$tittle = "Venta";
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
                            <li class="breadcrumb-item active" aria-current="page">Venta de Vehiculo</li>
                        </ol>
                    </nav>
                    <section class="">
                        <div class="container py3">
                            <div class="row">
                                <div class="col-lg-9">
                                    <h2 class="font-weight-bold mb-0">Nueva Venta</h2>
                                    <p id="contador-rows" class="lead text-muted">Porfavor, llene los campos solicitados</p>
                                </div>
                                <div class="col-lg-3">
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="bg-mix">
                        <div class="container">
                            <div class="stepwizard">
                                <div class="stepwizard-row setup-panel">
                                    <div class="stepwizard-step">
                                        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                        <p>Cliente</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                        <p>Vechiculo</p>
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
                            <form role="form">
                                <div class="row setup-content" id="step-1">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <h3>Cliente Seleccionado</h3>
                                            <div class="form-group">
                                                <label class="control-label">Cliente</label>
                                                <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter First Name" />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Last Name</label>
                                                <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Last Name" />
                                            </div>
                                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row setup-content" id="step-2">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <h3>Vechiculo Seleccionado</h3>
                                            <div class="form-group">
                                                <label class="control-label">Vehiculo</label>
                                                <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Company Address</label>
                                                <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address" />
                                            </div>
                                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row setup-content" id="step-3">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <h3>Informacion de pago y Credito</h3>
                                            <div class="form-group">
                                                <label class="control-label">Vehiculo</label>
                                                <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Company Address</label>
                                                <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address" />
                                            </div>
                                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row setup-content" id="step-4">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <h3>Confirmar</h3>
                                            <button class="btn btn-success btn-lg pull-right" type="submit">Confirmar!</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>

                    <section class="bg-grey py-3">
                        <div class="container">
                            <div class="row">
                                <div class="row" id="ads">
                                    <!-- Category Card -->
                                    <div class="col-md-4 py-4">
                                        <div class="card rounded">
                                            <div class="card-image">
                                                <span class="card-notify-badge">Low KMS</span>
                                                <span class="card-notify-year">2018</span>
                                                <img class="img-fluid" src="https://imageonthefly.autodatadirect.com/images/?USER=eDealer&PW=edealer872&IMG=USC80HOC011A021001.jpg&width=440&height=262" alt="Alternate Text" />
                                            </div>
                                            <div class="card-image-overlay m-auto">
                                                <span class="card-detail-badge">Used</span>
                                                <span class="card-detail-badge">$28,000.00</span>
                                                <span class="card-detail-badge">13000 Kms</span>
                                            </div>
                                            <div class="card-body text-center">
                                                <div class="ad-title m-auto">
                                                    <h5>Honda Accord LX</h5>
                                                </div>
                                                <a class="btn btn-primary nextBtn btn-lg pull-right" href="#">Seleccionar</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 py-4">
                                        <div class="card rounded">
                                            <div class="card-image">
                                                <span class="card-notify-badge">Fully-Loaded</span>
                                                <span class="card-notify-year">2017</span>
                                                <img class="img-fluid" src="https://imageonthefly.autodatadirect.com/images/?USER=eDealer&PW=edealer872&IMG=CAC80HOC021B121001.jpg&width=440&height=262" alt="Alternate Text" />
                                            </div>
                                            <div class="card-image-overlay m-auto">
                                                <span class="card-detail-badge">Used</span>
                                                <span class="card-detail-badge">$28,000.00</span>
                                                <span class="card-detail-badge">13000 Kms</span>
                                            </div>
                                            <div class="card-body text-center">
                                                <div class="ad-title m-auto">
                                                    <h5>Honda CIVIC HATCHBACK LS</h5>
                                                </div>
                                                <a class="btn btn-primary nextBtn btn-lg pull-right" href="#">Seleccionar</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Category Card -->
                                    <div class="col-md-4 py-4">
                                        <div class="card rounded">
                                            <div class="card-image">
                                                <span class="card-notify-badge">Low KMS</span>
                                                <span class="card-notify-year">2018</span>
                                                <img class="img-fluid" src="https://imageonthefly.autodatadirect.com/images/?USER=eDealer&PW=edealer872&IMG=USC80HOC011A021001.jpg&width=440&height=262" alt="Alternate Text" />
                                            </div>
                                            <div class="card-image-overlay m-auto">
                                                <span class="card-detail-badge">Used</span>
                                                <span class="card-detail-badge">$28,000.00</span>
                                                <span class="card-detail-badge">13000 Kms</span>
                                            </div>
                                            <div class="card-body text-center">
                                                <div class="ad-title m-auto">
                                                    <h5>Honda Accord LX</h5>
                                                </div>
                                                <a class="btn btn-primary nextBtn btn-lg pull-right" href="#">Seleccionar</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 py-4">
                                        <div class="card rounded">
                                            <div class="card-image">
                                                <span class="card-notify-badge">Fully-Loaded</span>
                                                <span class="card-notify-year">2017</span>
                                                <img class="img-fluid" src="https://imageonthefly.autodatadirect.com/images/?USER=eDealer&PW=edealer872&IMG=CAC80HOC021B121001.jpg&width=440&height=262" alt="Alternate Text" />
                                            </div>
                                            <div class="card-image-overlay m-auto">
                                                <span class="card-detail-badge">Used</span>
                                                <span class="card-detail-badge">$28,000.00</span>
                                                <span class="card-detail-badge">13000 Kms</span>
                                            </div>
                                            <div class="card-body text-center">
                                                <div class="ad-title m-auto">
                                                    <h5>Honda CIVIC HATCHBACK LS</h5>
                                                </div>
                                                <a class="btn btn-primary nextBtn btn-lg pull-right" href="#">Seleccionar</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Category Card -->
                                    <div class="col-md-4 py-4">
                                        <div class="card rounded">
                                            <div class="card-image">
                                                <span class="card-notify-badge">Low KMS</span>
                                                <span class="card-notify-year">2018</span>
                                                <img class="img-fluid" src="https://imageonthefly.autodatadirect.com/images/?USER=eDealer&PW=edealer872&IMG=USC80HOC011A021001.jpg&width=440&height=262" alt="Alternate Text" />
                                            </div>
                                            <div class="card-image-overlay m-auto">
                                                <span class="card-detail-badge">Used</span>
                                                <span class="card-detail-badge">$28,000.00</span>
                                                <span class="card-detail-badge">13000 Kms</span>
                                            </div>
                                            <div class="card-body text-center">
                                                <div class="ad-title m-auto">
                                                    <h5>Honda Accord LX</h5>
                                                </div>
                                                <a class="btn btn-primary nextBtn btn-lg pull-right" href="#">Seleccionar</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 py-4">
                                        <div class="card rounded">
                                            <div class="card-image">
                                                <span class="card-notify-badge">Fully-Loaded</span>
                                                <span class="card-notify-year">2017</span>
                                                <img class="img-fluid" src="https://imageonthefly.autodatadirect.com/images/?USER=eDealer&PW=edealer872&IMG=CAC80HOC021B121001.jpg&width=440&height=262" alt="Alternate Text" />
                                            </div>
                                            <div class="card-image-overlay m-auto">
                                                <span class="card-detail-badge">Used</span>
                                                <span class="card-detail-badge">$28,000.00</span>
                                                <span class="card-detail-badge">13000 Kms</span>
                                            </div>
                                            <div class="card-body text-center">
                                                <div class="ad-title m-auto">
                                                    <h5>Honda CIVIC HATCHBACK LS</h5>
                                                </div>
                                                <a class="btn btn-primary nextBtn btn-lg pull-right" href="#">Seleccionar</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Category Card -->
                                    <div class="col-md-4 py-4">
                                        <div class="card rounded">
                                            <div class="card-image">
                                                <span class="card-notify-badge">Low KMS</span>
                                                <span class="card-notify-year">2018</span>
                                                <img class="img-fluid" src="https://imageonthefly.autodatadirect.com/images/?USER=eDealer&PW=edealer872&IMG=USC80HOC011A021001.jpg&width=440&height=262" alt="Alternate Text" />
                                            </div>
                                            <div class="card-image-overlay m-auto">
                                                <span class="card-detail-badge">Used</span>
                                                <span class="card-detail-badge">$28,000.00</span>
                                                <span class="card-detail-badge">13000 Kms</span>
                                            </div>
                                            <div class="card-body text-center">
                                                <div class="ad-title m-auto">
                                                    <h5>Honda Accord LX</h5>
                                                </div>
                                                <a class="btn btn-primary nextBtn btn-lg pull-right" href="#">Seleccionar</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 py-4">
                                        <div class="card rounded">
                                            <div class="card-image">
                                                <span class="card-notify-badge">Fully-Loaded</span>
                                                <span class="card-notify-year">2017</span>
                                                <img class="img-fluid" src="https://imageonthefly.autodatadirect.com/images/?USER=eDealer&PW=edealer872&IMG=CAC80HOC021B121001.jpg&width=440&height=262" alt="Alternate Text" />
                                            </div>
                                            <div class="card-image-overlay m-auto">
                                                <span class="card-detail-badge">Used</span>
                                                <span class="card-detail-badge">$28,000.00</span>
                                                <span class="card-detail-badge">13000 Kms</span>
                                            </div>
                                            <div class="card-body text-center">
                                                <div class="ad-title m-auto">
                                                    <h5>Honda CIVIC HATCHBACK LS</h5>
                                                </div>
                                                <a class="btn btn-primary nextBtn btn-lg pull-right" href="#">Seleccionar</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Category Card -->
                                    <div class="col-md-4 py-4">
                                        <div class="card rounded">
                                            <div class="card-image">
                                                <span class="card-notify-badge">Low KMS</span>
                                                <span class="card-notify-year">2018</span>
                                                <img class="img-fluid" src="https://imageonthefly.autodatadirect.com/images/?USER=eDealer&PW=edealer872&IMG=USC80HOC011A021001.jpg&width=440&height=262" alt="Alternate Text" />
                                            </div>
                                            <div class="card-image-overlay m-auto">
                                                <span class="card-detail-badge">Used</span>
                                                <span class="card-detail-badge">$28,000.00</span>
                                                <span class="card-detail-badge">13000 Kms</span>
                                            </div>
                                            <div class="card-body text-center">
                                                <div class="ad-title m-auto">
                                                    <h5>Honda Accord LX</h5>
                                                </div>
                                                <a class="btn btn-primary nextBtn btn-lg pull-right" href="#">Seleccionar</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 py-4">
                                        <div class="card rounded">
                                            <div class="card-image">
                                                <span class="card-notify-badge">Fully-Loaded</span>
                                                <span class="card-notify-year">2017</span>
                                                <img class="img-fluid" src="https://imageonthefly.autodatadirect.com/images/?USER=eDealer&PW=edealer872&IMG=CAC80HOC021B121001.jpg&width=440&height=262" alt="Alternate Text" />
                                            </div>
                                            <div class="card-image-overlay m-auto">
                                                <span class="card-detail-badge">Used</span>
                                                <span class="card-detail-badge">$28,000.00</span>
                                                <span class="card-detail-badge">13000 Kms</span>
                                            </div>
                                            <div class="card-body text-center">
                                                <div class="ad-title m-auto">
                                                    <h5>Honda CIVIC HATCHBACK LS</h5>
                                                </div>
                                                <a class="btn btn-primary nextBtn btn-lg pull-right" href="#">Seleccionar</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Category Card -->
                                    <div class="col-md-4 py-4">
                                        <div class="card rounded">
                                            <div class="card-image">
                                                <span class="card-notify-badge">Low KMS</span>
                                                <span class="card-notify-year">2018</span>
                                                <img class="img-fluid" src="https://imageonthefly.autodatadirect.com/images/?USER=eDealer&PW=edealer872&IMG=USC80HOC011A021001.jpg&width=440&height=262" alt="Alternate Text" />
                                            </div>
                                            <div class="card-image-overlay m-auto">
                                                <span class="card-detail-badge">Used</span>
                                                <span class="card-detail-badge">$28,000.00</span>
                                                <span class="card-detail-badge">13000 Kms</span>
                                            </div>
                                            <div class="card-body text-center">
                                                <div class="ad-title m-auto">
                                                    <h5>Honda Accord LX</h5>
                                                </div>
                                                <a class="btn btn-primary nextBtn btn-lg pull-right" href="#">Seleccionar</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 py-4">
                                        <div class="card rounded">
                                            <div class="card-image">
                                                <span class="card-notify-badge">Fully-Loaded</span>
                                                <span class="card-notify-year">2017</span>
                                                <img class="img-fluid" src="https://imageonthefly.autodatadirect.com/images/?USER=eDealer&PW=edealer872&IMG=CAC80HOC021B121001.jpg&width=440&height=262" alt="Alternate Text" />
                                            </div>
                                            <div class="card-image-overlay m-auto">
                                                <span class="card-detail-badge">Used</span>
                                                <span class="card-detail-badge">$28,000.00</span>
                                                <span class="card-detail-badge">13000 Kms</span>
                                            </div>
                                            <div class="card-body text-center">
                                                <div class="ad-title m-auto">
                                                    <h5>Honda CIVIC HATCHBACK LS</h5>
                                                </div>
                                                <a class="btn btn-primary nextBtn btn-lg pull-right" href="#">Seleccionar</a>
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
<script src="../ajax/cars-control.js"></script>
<div id="mensaje"></div>

</html>