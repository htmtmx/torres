$(document).ready(function(){
    consultaDetallesCoche();
    consultaDetallesContrato();
});

function consultaDetallesCoche(){
    $.ajax({
        url: "../webhook/cars-list.php",
        type: "POST",
        data: { idCoche: $("#noCoche").val(),
                details:1
        },
        success: function (response)
        {
           // console.log(response);
            let obj_result = JSON.parse(response);
            console.log(obj_result);
            let obj_carro= obj_result[0];
            cargaDatosCarro(obj_carro);
            $("#carouselCocheFotos").html(construyeCarouselFotosCoche(obj_carro[1]));
            $("#tblfotosCoche").html(construyeCocheTablaFotos(obj_carro[1]));
            $("#tblDocsCoche").html(construyeCocheTablaDocumentos(obj_carro[1]));
            $("#tbl-detalles").html(contruyeTablaDetalles(obj_carro[0]));
        },
    });
}

function cargaDatosCarro(obj_carro){
    $("#precioContado").html("$"+obj_carro.precio_contado);
    let credito = obj_carro.opc_credito>0 ? "$"+obj_carro.precio_credito : "NA";
    $("#precioCredito").html(credito);
}

function construyeCarouselFotosCoche(docs){
    var fotos = [];
    //FOR PARA EXTRAER LAS FOTOS
    docs.forEach((doc)=>{
        if(doc.id_tipo_archivo==1){
            //SI ES UNA IMAGEN
            fotos.push(doc);
            }
        }
    );
    //FOR PARA CAROUSEL
    let active = `class="active"`;
    let activeFoto = "active";
    let contador =0;
    let templatePaginador=`<ol class="carousel-indicators">`;
    let contenedorFotos = `<div class="carousel-inner">`;
    let template="";
    fotos.forEach((foto) =>
        {

            let acitvPag = contador < 1 ? active:"";
            let link = foto.length < 1 ? "https://hescorp.com.mx/wp-content/themes/consultix/images/no-image-found-360x250.png" : foto.path;
            templatePaginador += `<li data-target="#carouselCocheFotos" data-slide-to="${contador}"></li>`;

            contenedorFotos += `
                                <div class="carousel-item ${contador==0?activeFoto:""}">
                                    <img class="d-block w-100" src="${link}" alt="First slide">
                                </div>
                            `;
            contador++;
        }
    );
    templatePaginador+= `</ol>`;
    contenedorFotos+=`</div>`
    template = templatePaginador+ contenedorFotos;
    template+=`
                        <a class="carousel-control-prev" href="#carouselCocheFotos" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselCocheFotos" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>     
    `
    return template;

}

function construyeCocheTablaFotos(docs){
    var fotos = [];
    //FOR PARA EXTRAER LAS FOTOS
    docs.forEach((doc)=>{
            if(doc.id_tipo_archivo==1){
                //SI ES UNA IMAGEN
                fotos.push(doc);
            }
        }
    );
    let template="";

    fotos.forEach((foto)=>{
        template+= `
                             <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <a href="#" class=" mr-3 align-items-center d-flex">
                                            <img src="${foto.path}" height="90" alt="Image placeholder" class="card-img-top">
                                        </a>
                                    </div>
                                </th>
                                <td>
                                    <button class="btn btn-icon btn-secondary" type="button">
                                        <span class="btn-inner--icon"><i class="far fa-eye text-primary"></i></span>
                                    </button>
                                    <button class="btn btn-icon btn-secondary" type="button">
                                        <span class="btn-inner--icon"><i class="fas fa-cloud-download-alt text-green"></i></span>
                                    </button>
                                    <button class="btn btn-icon btn-secondary" type="button">
                                        <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                                    </button>
                                </td>
                            </tr>
        `;
    });
    return template;
}

function contruyeTablaDetalles(detalles){
    let template="";

    detalles.forEach((detalle)=>{
        template+= `
                             <tr idCarac="${detalle.id_detalle}">
                                <th scope="row">
                                    ${detalle.nombre}
                                </th>
                                <td>
                                    ${detalle.valor}
                                </td>
                                <td>
                                    <button class="btn btn-icon btn-secondary" type="button">
                                        <span class="btn-inner--icon"><i class="fas fa-pen text-primary"></i></span>
                                    </button>
                                    <button class="btn btn-icon btn-secondary btnEliminarCaracteristicas" type="button">
                                        <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                                    </button>
                                </td>
                            </tr>
        `;
    });
    return template;
}

function construyeCocheTablaDocumentos(docs){
    var archivos = [];
    //FOR PARA EXTRAER LAS FOTOS
    docs.forEach((doc)=>{
            if(doc.id_tipo_archivo!=1){
                //SI ES UNA IMAGEN
                archivos.push(doc);
            }
        }
    );
    let template="";
    archivos.forEach((archivo)=>{
        template+=`
                    <tr idDocCoch="${archivo.id_file_v}">
                        <th scope="row">
                            ${archivo.nombreTipo} <i class="fas fa-lock text-red"></i>
                        </th>
                        <td>
                            ${archivo.ext}
                        </td>
                        <td>
                            Archivo protegido
                        </td>
                        <td>
                            <button class="btn btn-icon btn-secondary" type="button" data-toggle="modal" data-target="#vistaPDF">
                                <span class="btn-inner--icon"><i class="far fa-eye text-primary"></i></span>
                            </button>
                            <button class="btn btn-icon btn-secondary" type="button">
                                <span class="btn-inner--icon"><i class="fas fa-cloud-download-alt text-green"></i></span>
                            </button>
                            <button class="btn btn-icon btn-secondary btnEliminarDocumentoCoche" type="button">
                                <span class="btn-inner--icon "><i class="fas fa-trash-alt text-red"></i></span>
                            </button>
                        </td>
                    </tr>
        `
    });
    return template;
}

/////////******BTN LISTEN PARA BOTONES *****////////

$(document).on("click", ".btnEliminarCaracteristicas", function () {
    if (confirm("¿Esta seguro de que desea eliminar este documento? Esta accion no podrá ser revertida")){
        let elementCaracteristica = $(this)[0].parentElement.parentElement;
        let idCaracteristica = $(elementCaracteristica).attr("idcarac")
        eliminarDetalle(idCaracteristica);
    }

});

/*
$(document).on("click", ".btnEliminarDocumentoCoche", function () {
    if (confirm("¿Esta seguro de que desea eliminar este documento? Esta accion no podrá ser revertida")){
        console.log("Funciona");
        //eliminarDireccion(idDireccion)
    }

});*/

/////////******BTN LISTEN PARA BOTONES *****////////
function eliminarDetalle(idCaracteristica){
    $.ajax({
        url: "../webhook/delete-uso_detalle.php",
        type: 'POST',
        data: {
            idCarc: idCaracteristica,
            no_vehiculo: $("#noCoche").val()
        },
        success: function (mje) {
            consultaDetallesCoche();
            alert(mje);
        }
    });
}

/*******************************
 *     DETALLES CONTRATO       *
 *******************************/

function consultaDetallesContrato(){
    $.ajax({
        url: "../webhook/consulta-contratos-nocoche.php",
        type: "POST",
        data: { idCoche: $("#noCoche").val()
        },
        success: function (response)
        {
            let obj_result = JSON.parse(response);
            //esta siempre va a existir
            let contratoAdquisicion = getContrato(obj_result,"0"); // 0 -> Adquisicion
            let contratoVenta = getContrato(obj_result,"1"); // 1 -> venta
            console.log(contratoAdquisicion);
            console.log(contratoVenta);
            //construir el TAB
            $("#myTab").html(constuyeNavContratos(contratoAdquisicion,contratoVenta));
            $("#myTabContent").html(constuyeContainersContratos(contratoAdquisicion,contratoVenta));

        },
    });
}

function constuyeContainersContratos(contratoAdquisicion,contratoVenta) {
    let template = "";
    if (contratoVenta!=null){
        //Contruyo el Nav de venta
        template+= getTemplateContratoVenta(contratoVenta);
    }
    template+= getTemplateContratoAdq(contratoAdquisicion);
    return template;
}


function getTemplateContratoVenta(contrato) {
    let template = "";
    let templateTablaArchivos = buildTblFileContratoVenta(contrato);
    template += `
                <!-- CONTRATO DE VENTA-->
                                <div class="tab-pane fade show active" id="venta" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row pt-0 py-3">
                                        <div class="col-xl-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h3 class="mb-0">Contrato de Venta</h3>
                                                        </div>
                                                        <div class="col text-right">
                                                            <i class="fas fa-calendar-alt"></i>  25 Septiembre de 2021
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <input type="hidden" name="idCliente" id="idCliente" value="896610125442">
                                                    <div class="pl-lg-4">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <label class="form-control-label" for="medio_identificacion_cliente">No de Contrato</label>
                                                                <input type="text" name="noContratoVta" id="noContratoVta" class="form-control" value="${contrato.no_contrato}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <label class="form-control-label" for="medio_identificacion_cliente">Cliente</label>
                                                                <input type="text" name="telefono" id="telefono" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label class="form-control-label" for="correo">Vendido Por:</label>
                                                                    <input type="text" name="telefono" id="telefono" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label class="form-control-label" for="correo">Forma de Pago:</label>
                                                                    <input type="text" name="telefono" id="telefono" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="my-4">
                                                    <!-- Address -->
                                                    <h6 class="heading-small text-muted mb-4">TOTAL DE VENTA (CONTADO/CREDITO)</h6>
                                                    <div class="pl-lg-4">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label for="staticEmail" class="col-sm-4 col-form-label">Subtotal: </label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" readonly name="telefono" id="telefono" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label for="staticEmail" class="col-sm-4 col-form-label">IVA: </label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" readonly name="telefono" id="telefono" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label for="staticEmail" class="col-sm-4 col-form-label">TOTAL: </label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" readonly name="telefono" id="telefono" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="my-4">
                                                    <!-- Description -->
                                                    <div class="col-lg-12 col-auto text-right">
                                                        <span class="d-flex position-absolute w-100" id="mensajeUpdateCliente"></span>
                                                        <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Mas Detalles</button>
                                                        <span class="d-flex position-absolute w-100" id="mensajeUpdateCliente"></span>
                                                        <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Imprimir</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="card">
                                                <div class="card-header border-0">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h3 class="mb-0">Documentos disponibles del contrato de Venta</h3>
                                                        </div>
                                                        <div class="col text-right">
                                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#cuentaUser">
                                                                <i class="fas fa-file-upload text-white"></i>  Agregar Archivo
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="table-responsive">
                                                    <!-- Projects table -->
                                                    <table class="table align-items-center table-flush">
                                                        <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col">Archivo</th>
                                                            <th scope="col">Tipo</th>
                                                            <th scope="col">Detalles</th>
                                                            <th scope="col"></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        ${templateTablaArchivos}
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- DETALLES DEL CREDITO-->
                                    <div class="row pt-0 py-3">
                                        <div class="col-xl-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h3 class="mb-0">Informacion del Crédito</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <form id="frm-datos-cliente">
                                                        <input type="hidden" name="idCliente" id="idCliente" value="896610125442">
                                                        <div class="pl-lg-4">
                                                            <h6 class="heading-small text-muted mb-4">SALDO DEL CREDITO</h6>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">TOTAL: </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" readonly="" name="telefono" id="telefono" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Enganche: </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" readonly="" name="telefono" id="telefono" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Pagos Realizados: </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" readonly="" name="telefono" id="telefono" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Saldo: </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" readonly="" name="telefono" id="telefono" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr class="my-4">
                                                        <!-- Description -->
                                                        <div class="col-lg-12 col-auto text-right">
                                                            <span class="d-flex position-absolute w-100" id="mensajeUpdateCliente"></span>
                                                            <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Mas Detalles</button>
                                                            <span class="d-flex position-absolute w-100" id="mensajeUpdateCliente"></span>
                                                            <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Imprimir</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="card">
                                                <div class="card-header border-0">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h3 class="mb-0">Pagos del Credito</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="my-3">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <!-- Projects table -->
                                                        <table class="table align-items-center table-flush" id="accordion">
                                                            <thead class="thead-light">
                                                            <tr>
                                                                <th scope="col">Concepto</th>
                                                                <th scope="col">Limite de Pago</th>
                                                                <th scope="col">Total</th>
                                                                <th scope="col">Saldo</th>
                                                                <th scope="col">Estatus</th>
                                                                <th scope="col"></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1" class="mano">
                                                                    <th scope="row" >
                                                                        Pago de Enganche
                                                                    </th>
                                                                    <td>
                                                                        15 AGO 2021
                                                                    </td>
                                                                    <td>
                                                                        $50,000.00
                                                                    </td>
                                                                    <td>
                                                                        $0.00
                                                                    </td>
                                                                <td>
                                                              <span class="badge badge-dot mr-4">
                                                                <i class="bg-success"></i>
                                                                <span class="status">PAGADO</span>
                                                              </span>
                                                                </td>
                                                                <td>
                                                                    <button class="btn btn-icon btn-secondary" type="button" data-toggle="modal" data-target="#addAbono">
                                                                        <span class="btn-inner--icon"><i class="fas fa-coins text-green"></i> Abonar</span>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                                <tr>
                                                                    <td colspan="6" class="p-0">
                                                                        <div id="collapse1" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                                                            <div class="card-body">
                                                                                <table class="table table-hover">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th scope="col">#</th>
                                                                                        <th scope="col">Fecha</th>
                                                                                        <th scope="col">Monto</th>
                                                                                        <th scope="col">Detalles</th>
                                                                                        <th scope="col"></th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <th scope="row">1</th>
                                                                                        <td>14 Ago 2021 12:00</td>
                                                                                        <td>$50,000</td>
                                                                                        <td>Primer Pago</td>
                                                                                        <td>
                                                                                            <button class="btn btn-icon btn-secondary" type="button">
                                                                                                <span class="btn-inner--icon"><i class="fas fa-paper-plane text-orange"></i> Enviar Recibo</span>
                                                                                            </button>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">2</th>
                                                                                        <td>14 Sep 2021 17:00</td>
                                                                                        <td>$50,000</td>
                                                                                        <td>Primer Pago</td>
                                                                                        <td>
                                                                                            <button class="btn btn-icon btn-secondary" type="button">
                                                                                                <span class="btn-inner--icon"><i class="fas fa-paper-plane text-orange"></i> Enviar Recibo</span>
                                                                                            </button>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">2</th>
                                                                                        <td>14 Sep 2021 17:00</td>
                                                                                        <td>$50,000</td>
                                                                                        <td>Primer Pago</td>
                                                                                        <td>
                                                                                            <button class="btn btn-icon btn-secondary" type="button">
                                                                                                <span class="btn-inner--icon"><i class="fas fa-paper-plane text-orange"></i> Enviar Recibo</span>
                                                                                            </button>
                                                                                        </td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2" class="mano">
                                                                    <th scope="row" >
                                                                        Pago 1/6
                                                                    </th>
                                                                    <td>
                                                                        15 AGO 2021
                                                                    </td>
                                                                    <td>
                                                                        $50,000.00
                                                                    </td>
                                                                    <td>
                                                                        $0.00
                                                                    </td>
                                                                    <td>
                                                              <span class="badge badge-dot mr-4">
                                                                <i class="bg-success"></i>
                                                                <span class="status">PAGADO</span>
                                                              </span>
                                                                    </td>
                                                                    <td>
                                                                        <button class="btn btn-icon btn-secondary" type="button" data-toggle="modal" data-target="#addAbono">
                                                                            <span class="btn-inner--icon"><i class="fas fa-coins text-green"></i> Abonar</span>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="6" class="p-0">
                                                                        <div id="collapse2" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                                                                            <div class="card-body">
                                                                                <table class="table table-hover">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th scope="col">#</th>
                                                                                        <th scope="col">Fecha</th>
                                                                                        <th scope="col">Monto</th>
                                                                                        <th scope="col">Detalles</th>
                                                                                        <th scope="col"></th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <th scope="row">1</th>
                                                                                        <td>14 Ago 2021 12:00</td>
                                                                                        <td>$50,000</td>
                                                                                        <td>Primer Pago</td>
                                                                                        <td>
                                                                                            <button class="btn btn-icon btn-secondary" type="button">
                                                                                                <span class="btn-inner--icon"><i class="fas fa-paper-plane text-orange"></i> Enviar Recibo</span>
                                                                                            </button>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">2</th>
                                                                                        <td>14 Sep 2021 17:00</td>
                                                                                        <td>$50,000</td>
                                                                                        <td>Primer Pago</td>
                                                                                        <td>
                                                                                            <button class="btn btn-icon btn-secondary" type="button">
                                                                                                <span class="btn-inner--icon"><i class="fas fa-paper-plane text-orange"></i> Enviar Recibo</span>
                                                                                            </button>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th scope="row">2</th>
                                                                                        <td>14 Sep 2021 17:00</td>
                                                                                        <td>$50,000</td>
                                                                                        <td>Primer Pago</td>
                                                                                        <td>
                                                                                            <button class="btn btn-icon btn-secondary" type="button">
                                                                                                <span class="btn-inner--icon"><i class="fas fa-paper-plane text-orange"></i> Enviar Recibo</span>
                                                                                            </button>
                                                                                        </td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
        `;
    return template;
}

function getTemplateContratoAdq(contrato) {
    let template = "";
    template+= `
                <!-- CONTRATO DE ADQUISICION-->
                                <div class="tab-pane fade" id="adq" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row pt-0 py-3">
                                        <div class="col-xl-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h3 class="mb-0">Adquisición</h3>
                                                        </div>
                                                        <div class="col text-right">
                                                            <i class="fas fa-calendar-alt"></i>  15 Agosto de 2021
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <form id="frm-datos-cliente">
                                                        <input type="hidden" name="idCliente" id="idCliente" value="896610125442">
                                                        <div class="pl-lg-4">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <label class="form-control-label" for="medio_identificacion_cliente">No de Contrato</label>
                                                                    <input type="text" name="noContratoVta" id="noContratoVta" class="form-control" value="${contrato.no_contrato}" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <label class="form-control-label" for="medio_identificacion_cliente">Vendedor</label>
                                                                    <input type="text" name="telefono" id="telefono" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label" for="correo">Comprado por:</label>
                                                                        <input type="text" name="telefono" id="telefono" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label" for="correo">Forma de Pago:</label>
                                                                        <input type="text" name="telefono" id="telefono" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr class="my-4">
                                                        <!-- Address -->
                                                        <h6 class="heading-small text-muted mb-4">COSTOS DE LA COMPRA</h6>
                                                        <div class="pl-lg-4">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Subtotal: </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" readonly name="telefono" id="telefono" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">IVA: </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" readonly name="telefono" id="telefono" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">TOTAL: </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" readonly name="telefono" id="telefono" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr class="my-4">
                                                        <!-- Description -->
                                                        <div class="col-lg-12 col-auto text-right">
                                                            <span class="d-flex position-absolute w-100" id="mensajeUpdateCliente"></span>
                                                            <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Imprimir</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="card">
                                                <div class="card-header border-0">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h3 class="mb-0">Documentos de Adquisicion</h3>
                                                        </div>
                                                        <div class="col text-right">
                                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#cuentaUser">
                                                                <i class="fas fa-file-upload text-white"></i>  Agregar Archivo
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="table-responsive">
                                                    <!-- Projects table -->
                                                    <table class="table align-items-center table-flush">
                                                        <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col">Archivo</th>
                                                            <th scope="col">Tipo</th>
                                                            <th scope="col">Detalles</th>
                                                            <th scope="col"></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <th scope="row">
                                                                Factura <i class="fas fa-lock text-red"></i>
                                                            </th>
                                                            <td>
                                                                PDF
                                                            </td>
                                                            <td>
                                                                Archivo protegido
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-icon btn-secondary" type="button" data-toggle="modal" data-target="#vistaPDF">
                                                                    <span class="btn-inner--icon"><i class="far fa-eye text-primary"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-cloud-download-alt text-green"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                Tarjeta de Circulacion
                                                            </th>
                                                            <td>
                                                                PDF
                                                            </td>
                                                            <td>
                                                                Disponible a vendedores
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-icon btn-secondary" type="button" data-toggle="modal" data-target="#vistaPDF">
                                                                    <span class="btn-inner--icon"><i class="far fa-eye text-primary"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-cloud-download-alt text-green"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                Factura <i class="fas fa-lock text-red"></i>
                                                            </th>
                                                            <td>
                                                                PDF
                                                            </td>
                                                            <td>
                                                                Archivo protegido
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-icon btn-secondary" type="button" data-toggle="modal" data-target="#vistaPDF">
                                                                    <span class="btn-inner--icon"><i class="far fa-eye text-primary"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-cloud-download-alt text-green"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                Factura <i class="fas fa-lock text-red"></i>
                                                            </th>
                                                            <td>
                                                                PDF
                                                            </td>
                                                            <td>
                                                                Archivo protegido
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-icon btn-secondary" type="button" data-toggle="modal" data-target="#vistaPDF">
                                                                    <span class="btn-inner--icon"><i class="far fa-eye text-primary"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-cloud-download-alt text-green"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                Factura <i class="fas fa-lock text-red"></i>
                                                            </th>
                                                            <td>
                                                                PDF
                                                            </td>
                                                            <td>
                                                                Archivo protegido
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-icon btn-secondary" type="button" data-toggle="modal" data-target="#vistaPDF">
                                                                    <span class="btn-inner--icon"><i class="far fa-eye text-primary"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-cloud-download-alt text-green"></i></span>
                                                                </button>
                                                                <button class="btn btn-icon btn-secondary" type="button">
                                                                    <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
            
    `;
    return template;
}



function buildTblFileContratoVenta(contrato) {
    let template = "";
    let visible = "";

    for (let i = 0; i < 10; i++){
        template += `
            <tr>
                <th scope="row">
                    Factura <i class="fas fa-lock text-red"></i>
                </th>
                <td>
                    PDF
                </td>
                <td>
                    Archivo protegido
                </td>
                <td>
                    <button class="btn btn-icon btn-secondary" type="button" data-toggle="modal" data-target="#vistaPDF">
                        <span class="btn-inner--icon"><i class="far fa-eye text-primary"></i></span>
                    </button>
                    <button class="btn btn-icon btn-secondary" type="button">
                        <span class="btn-inner--icon"><i class="fas fa-cloud-download-alt text-green"></i></span>
                    </button>
                    <button class="btn btn-icon btn-secondary" type="button">
                        <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                    </button>
                </td>
            </tr>
        `;
    }
    return template;
}

function constuyeNavContratos(contratoAdquisicion,contratoVenta) {
    let template = "";
    if (contratoVenta!=null){
        //Contruyo el Nav de venta
        template += `
               <!-- NAV DE VENTA-->
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#venta" role="tab" aria-controls="home" aria-selected="true">
                        Detalles y Documentos de Contrato de Venta</a>
                </li>
        `;
    }
    template+= `
                <!-- NAV DE ADQUISICION-->
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#adq" role="tab" aria-controls="profile" aria-selected="false">
                    Detalles y Documentos de Contrato de Adquisición
                </a>
            </li>
    `;
    return template;
}




function getContrato(listaContratos,tipo) {
    let tmpContratoFound;
    listaContratos.forEach((contrato)=>{
        if (contrato.tipo_contrato === tipo)
            tmpContratoFound = contrato;
    });
    return tmpContratoFound;
}

