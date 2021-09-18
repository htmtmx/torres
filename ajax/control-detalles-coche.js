var arrayMarcas =  new Array();
$(document).ready(function(){
    consultaMarcas();
});

window.onload = function() {
    consultaDetallesCoche();
    consultaDetallesContrato();
};

function consultaDetallesCoche(){
    $.ajax({
        url: "../webhook/cars-list.php",
        type: "POST",
        data: { idCoche: $("#noCoche").val(),
            details:1, estatus:99, archivado:true
        },
        success: function (response)
        {
            let obj_result = JSON.parse(response);
            let obj_carro= obj_result[0];
            cargaDatosCarro(obj_carro);
            $("#carouselCocheFotos").html(construyeCarouselFotosCoche(obj_carro[1]));
            $("#tblfotosCoche").html(construyeCocheTablaFotos(obj_carro[1]));
            $("#tblDocsCoche").html(construyeCocheTablaDocumentos(obj_carro[1]));
            $("#tbl-detalles").html(contruyeTablaDetalles(obj_carro[0]));
            $("#noCocheContratoModal").val(obj_carro.no_vehiculo);
        },
    });
}

function cargaDatosCarro(obj_carro){
    $("#idCoche").val(obj_carro.no_vehiculo);
    $("#precioLista").html("$"+obj_carro.precio_contado);
    let credito = obj_carro.opc_credito>0 ? "$"+obj_carro.precio_credito : "NA";
    $("#precioCredito").html(credito);
    $("#nameVehiculo").html(obj_carro.marca_coche+" "+obj_carro.modelo_coche+", "+obj_carro.anio);
    $("#niv").val(obj_carro.NIV);
    $("#marca").val(obj_carro.id_marca);
    consultaModelos(obj_carro.id_marca, obj_carro.id_modelo );
    $("#modelo").val(obj_carro.id_modelo);
    $("#anio").val(obj_carro.anio);
    $("#placa").val(obj_carro.placa);
    $("#PlacaInfo").html(obj_carro.placa);
    $("#color").val(obj_carro.color);
    $("#kilometraje").val(obj_carro.kilometros);
    $("#transmision").val(obj_carro.transimision);
    $("#combustible").val(obj_carro.combustible);
    $("#nopuertas").val(obj_carro.no_puertas);
    $("#fecha_registro").val(obj_carro.fecha_registro);
    $("#observaciones").val(obj_carro.observaciones);
    $("#estado").val(obj_carro.entidad_placa);
    let creditoChecked = obj_carro.opc_credito === "1" ? "checked":"";
    let templateOpcCredit = `
        <input type="checkbox" ${creditoChecked} value="1" id="ckeckCredito" name="ckeckCredito" >
        <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Si"></span>
    `;
    $("#checkOpcCredit").html(templateOpcCredit);
    //$("#opcCredito").html(obj_carro.opc_credito.val == 1 ? "checked":"unchecked");
    $("#precioListaCoche").val(obj_carro.precio_contado);
    $("#precioCreditoCoche").val(obj_carro.precio_credito);

    let btnAccionCoche = '';
    if(obj_carro.no_vehiculo>0){
        switch (obj_carro.estatus) {
            case "0":
                btnAccionCoche = `
                            <a href="./nuevaVenta.php?idCoche=${obj_carro.no_vehiculo}">
                            <button type="button" class="btn btn-success">
                                <i class="fas fa-dollar-sign text-white"></i> Vender
                            </button></a>`;
                break;
            case "1":
                btnAccionCoche = `<button type="button" class="btn btn-warning" onclick="hideCoche(${obj_carro.no_vehiculo});">
                                <i class="fas fa-archive"></i> Archivar
                            </button>`;
                break;
            case "-1":
                btnAccionCoche = `<button type="button" class="btn btn-alert">
                                <i class="fas fa-undo"></i> Liberar
                            </button>`;
                break;
        }
    }

    $("#containerBotonCoche").html(btnAccionCoche);

    //NUEVOS VALORES AGREGADOS EN LA BASE DE DATOS (IMPRIME VALORES)
    $("#noMotor").val(obj_carro.no_motor);
    $("#tipoVehiculo").val(obj_carro.tipo_carro);
    $("#noSerieV").val(obj_carro.numero_serie_vehicular);
    $("#noFactura").val(obj_carro.no_factura);
    $("#fecha_expedicion").val(obj_carro.fecha_factura);
    $("#empresaExpide").val(obj_carro.empresa_factura);
    $("#dirFactura").val(obj_carro.domicilio_empresa);
    $("#tarjeton").val(obj_carro.tarjeton);
    $("#folioTarjeton").val(obj_carro.folio_tarjeton);
    $("#tarjectaCirc").val(obj_carro.tarjeta_circulacion);
    $("#folioTarjCirc").val(obj_carro.folio_tarje_circul);
    $("#ultimaTenencia").val(obj_carro.ultima_tenencia);
    $("#verificaciones").val(obj_carro.verificaciones_coche);
    $("#carroceria").val(obj_carro.carroceria);
    $("#pintura").val(obj_carro.pintura);
    $("#llantas").val(obj_carro.llantas);

}

function construyeCarouselFotosCoche(docs){
    var fotos = [];
    //FOR PARA EXTRAER LAS FOTOS
    docs.forEach((doc)=>{
            if(doc.uso_archivo==1){
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
    $("#countFotos").html(contador);
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
                </a>`
    return template;

}

function construyeCocheTablaFotos(docs){
    var fotos = [];
    //FOR PARA EXTRAER LAS FOTOS
    docs.forEach((doc)=>{
            if(doc.uso_archivo==1){
                //SI ES UNA IMAGEN
                fotos.push(doc);
            }
        }
    );
    let template="";
    fotos.forEach((foto)=>{
        template+= `
                     <tr idFile="${foto.id_file_v}">
                        <th scope="row">
                            <div class="media align-items-center">
                                <a href="#" class=" mr-3 align-items-center d-flex">
                                    <img src="${foto.path}" height="90" alt="Image placeholder" class="card-img-top">
                                </a>
                            </div>
                        </th>
                        <td>
                            <a href="${foto.path}" target="_blank">
                                 <button class="btn btn-icon btn-secondary" type="button">
                                    <span class="btn-inner--icon"><i class="far fa-eye text-primary"></i></span>
                                </button>
                            </a> 
                            <a href="${foto.path}" target="_blank" download="${foto.nombreArchivo}">
                                   <button class="btn btn-icon btn-secondary" type="button">
                                <span class="btn-inner--icon"><i class="fas fa-cloud-download-alt text-green"></i></span>
                                </button>
                            </a>
                            <button class="btn btn-icon btn-secondary btnEliminarFotoCoche" type="button">
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
/***
 * Funcion para agregar datos del form de detalles o caracteristicas
 ***/
$("#frm-add-detalle").on("submit", function(e){
    //let tipocontrato = $('input[name="contrato"]:checked').val();
    var f = $(this);
    var formData = new FormData(document.getElementById("frm-add-detalle"));
    formData.append("dato", "valor");
    //formData.append(f.attr("name"), $(this)[0].files[0]);
    $.ajax({
        url: "../webhook/add-detalle.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function(res){
            consultaDetallesCocheGenerales();
            $("#frm-add-detalle").trigger('reset');
            $("#addDetalles").modal('hide');

        });
    e.preventDefault();
});


function construyeCocheTablaDocumentos(docs){
    var archivos = [];
    //FOR PARA EXTRAER LAS FOTOS
    docs.forEach((doc)=>{
            if(doc.uso_archivo!=1){
                //SI ES UNA IMAGEN
                archivos.push(doc);
            }
        }
    );
    let template="";
    archivos.forEach((archivo)=>{
        let privado= archivo.nivel_acceso==0 ? `<i class="fas fa-lock text-red"></i>`:"";
        let estatus= archivo.nivel_acceso==0 ? "Archivo Protegido": "Visible";
        template+=`
                    <tr idDocCoch="${archivo.id_file_v}">
                        <th scope="row">
                            ${archivo.nombreTipo}
                            ${privado}
                        </th>
                        <td>
                            ${archivo.ext}
                        </td>
                        <td>
                            ${estatus}
                        </td>
                        <td>
                          <!--  <button class="btn btn-icon btn-secondary" type="button" data-toggle="modal" data-target="#vistaPDF">
                                <span class="btn-inner--icon"><i class="far fa-eye text-primary"></i></span>
                            </button>-->
                        <a href="${archivo.path}" target="_blank">
                            <button class="btn btn-icon btn-secondary" type="button">
                                <span class="btn-inner--icon"><i class="far fa-eye text-primary"></i></span>
                            </button>
                        </a> 
                        <a href="${archivo.path}" target="_blank" download="${archivo.nombreArchivo}">
                            <button class="btn btn-icon btn-secondary" type="button">
                                <span class="btn-inner--icon"><i class="fas fa-cloud-download-alt text-green"></i></span>
                            </button>
                        </a>
                            <button class="btn btn-icon btn-secondary btnEliminarDocumentoCoche" type="button">
                                <span class="btn-inner--icon "><i class="fas fa-trash-alt text-red"></i></span>
                            </button>
                        </td>
                    </tr>
        `
    });
    return template;
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
            let contratoVenta = getContrato(obj_result,"0"); // 0 -> venta
            let contratoAdquisicion = getContrato(obj_result,"1"); // 1 -> Adquisicion
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
    let templateTablaArchivos = buildTblFileContratoVenta(contrato[1]);
    let templatePagos = buildTblPagos(contrato[0]);
    let formaPago;
    if(contrato.forma_pago==="0"){
        formaPago="Contado";
    } else if(contrato.forma_pago==="1"){
        formaPago="Credito";
    } else formaPago="Apartado";
    let btnTemplates = ` <a href="./contrato.php?noVehiculo=${contrato.no_vehiculo_fk}&consult=true" target="_blank">
                            <button type="button" class="btn btn-primary"><i class="fas fa-print"></i> Contrato</button>
                        </a>`;
    console.log(contrato);
    let btnContrato= contrato.forma_pago=="1"?btnTemplates:"";



    template += `
                <!-- CONTRATO DE VENTA-->
                                <div class="tab-pane fade show active" id="venta" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row pt-0 py-3">
                                      <!-- INFO DEL CONTRATO-->
                                        <div class="col-xl-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h3 class="mb-0">Contrato de Venta</h3>
                                                        </div>
                                                        <div class="col text-right">
                                                            <i class="fas fa-calendar-alt"></i>  ${contrato.hora_fecha_creacion}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <input type="hidden" name="idCliente" id="idCliente" value="${contrato.no_contrato}">
                                                    <div class="pl-lg-4">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <label class="form-control-label" for="medio_identificacion_cliente">No de Contrato</label>
                                                                <input type="text"  class="form-control" value="${contrato.no_contrato}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <label class="form-control-label" for="medio_identificacion_cliente">Cliente</label>
                                                                <input type="text" class="form-control" value="${contrato.cliente}"readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label class="form-control-label" for="correo">Vendido Por:</label>
                                                                    <input type="text" class="form-control" value="${contrato.vendido_comprado_por}"readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label class="form-control-label" for="correo">Forma de Pago:</label>
                                                                    <input type="text" class="form-control" value="${formaPago}"readonly>
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
                                                                        <input type="text" class="form-control" value="${contrato.subtotal}" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label for="staticEmail" class="col-sm-4 col-form-label">IVA: </label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" value="${contrato.iva}" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label for="staticEmail" class="col-sm-4 col-form-label">TOTAL: </label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" value="${contrato.total}" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-auto text-right">
                                                                ${btnContrato}
                                                                <a href="./responsiva.php?noVechiculo=${contrato.no_vehiculo_fk}&consult=true" target="_blank">
                                                                    <button type="button" class="btn btn-primary"><i class="fas fa-print"></i> C. Responsiva</button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            <!-- INFO DEL CREDITO-->
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
                                                                            <input type="text" readonly="" name="telefono" id="telefono" class="form-control" value="${contrato.total}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Enganche: </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" readonly="" name="telefono" id="telefono" class="form-control" value="${contrato.enganche}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Saldo: </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" readonly="" name="telefono" id="telefono" class="form-control" value="${contrato.saldo}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- DETALLES DEL CREDITO-->
                                    <div class="row pt-0 py-3">
                                        <!-- DOCS-->
                                        <div class="col-xl-6">
                                            <div class="card">
                                                <div class="card-header border-0">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h3 class="mb-0">Documentos disponibles del contrato de Venta</h3>
                                                        </div>
                                                        <div class="col text-right">
                                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalejemplo" data-whatever="${contrato.no_contrato}">
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
                                        </div> <!-- PAGOS -->
                                        <div class="col-xl-6">
                                            <div class="card">
                                                <div class="card-header border-0">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h3 class="mb-0">Pagos del Credito</h3>
                                                        </div>
                                                        <div class="col text-right">
                                                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal1" data-whatever="${contrato.no_contrato}">
                                                                <span class="btn-inner--icon"><i class="fas fa-coins text-green"></i> Abonar</span>
                                                             </button>
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
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                ${templatePagos}
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
    let formaPagoAdq = contrato.forma_pago === "0" ? "Contado" : "Credito";
    let documentos = buildTblFileContratoVenta(contrato[1]);
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
                                                            <i class="fas fa-calendar-alt"></i>  ${contrato.hora_fecha_creacion}
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
                                                                    <input type="text"  class="form-control" value="${contrato.no_contrato}" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <label class="form-control-label" for="medio_identificacion_cliente">Vendedor</label>
                                                                    <input type="text" readonly id="cliente" class="form-control" value="${contrato.cliente}">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label" for="correo">Comprado por:</label>
                                                                        <input type="text" readonly id="comprado_por" class="form-control" value="${contrato.vendido_comprado_por}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label" for="correo">Forma de Pago:</label>
                                                                        <input type="text" readonly class="form-control" value="${formaPagoAdq}">
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
                                                                            <input type="text" readonly name="subtotalAdqui" id="subtotalAdqui" class="form-control" value="${contrato.subtotal}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">IVA: </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" readonly name="ivaAdqui" id="ivaAdqui" class="form-control" value="${contrato.iva}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group row">
                                                                        <label for="staticEmail" class="col-sm-4 col-form-label">TOTAL: </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" readonly name="totalAdqui" id="totalAdqui" class="form-control" value="${contrato.total}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-auto text-right">
                                                                    <a href="./responsiva.php?noVechiculo=${contrato.no_vehiculo_fk}&consult=false" target="_blank">
                                                                        <button type="button" class="btn btn-primary"><i class="fas fa-print"></i> C. Responsiva</button>
                                                                    </a>
                                                                </div>
                                                            </div>
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
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalejemplo" data-whatever="${contrato.no_contrato}">
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
                                                        ${documentos}
                                                        <!--CONSTRUCTOR TBL FILES-->
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

function buildTblAbonosabonos(abonos) {
    let templateAbonos;
    let contador = 0;
    abonos.forEach((abono)=>{
        contador++;
        templateAbonos += `
              <tr idAbono="${abono.folio}" >
                <th scope="row">${contador}</th>
                <td>${abono.fecha_registro}</td>
                <td>$ ${abono.monto}</td>
                <td>${abono.notas}</td>
                <td>
                    <button class="btn btn-icon btn-secondary" type="button">
                        <span class="btn-inner--icon"><i class="fas fa-paper-plane text-orange"></i> Enviar Recibo</span>
                    </button>
                </td>
            </tr>
        `;
    });
    return templateAbonos;
}

function buildTblPagos(pagos) {
    let template = "";
    let contador = 0;
    pagos.forEach((pago)=>{
        let statusPago = pago.estatus_pago == 1 ? "PAGADO" : "PENDIENTE";
        let tipoStatusPago = pago.estatus_pago == 1 ? "bg-success" : "bg-warning";
        let templateEstatusPago =   `<i class="${tipoStatusPago}"></i><span class="status">${statusPago}</span>`;
        contador++;
        let abonos = buildTblAbonosabonos(pago[0]);
        template += `
              <tr data-toggle="collapse" data-target="#collapse${contador}" aria-expanded="true" aria-controls="collapse${contador}" class="mano">
                <th scope="row">
                    ${pago.concepto}
                </th>
                <td>
                    ${pago.fecha_pago}
                </td>
                <td>
                  $  ${pago.total}
                </td>
                <td>                    
                  $ ${pago.saldo}
                </td>
                <td>
                  <span class="badge badge-dot mr-4" id="status_pago" name="status_pago">
                    ${templateEstatusPago}
                  </span>
                </td>
            </tr>
            <tr>
                <td colspan="5" class="p-0">
                    <div id="collapse${contador}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
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
                                    ${abonos}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
            </tr>
        `;
    });
    return template;
}

function buildTblFileContratoVenta(archivos) {
    let template = "";
    archivos.forEach((file)=>{
        let visible =  file.nivel_acceso != 1 ? `<i class="fas fa-lock text-red"></i>`:"";
        let visibleText =  file.nivel_acceso != 1 ? "Protegido":"Visible";
        template += `
            <tr id="${file.id_file_c}">
                <th scope="row">
                    ${file.nombre + " "+ visible} 
                </th>
                <td>
                    ${file.nombre}
                </td>
                <td>
                    ${visibleText}
                </td>
                <td>
                    <a href="${file.path}" target="_blank">
                        <button class="btn btn-icon btn-secondary" type="button">
                            <span class="btn-inner--icon"><i class="far fa-eye text-primary"></i></span>
                        </button>
                    </a>
                    <a href="${file.path}" download="${file.nombre}">
                        <button class="btn btn-icon btn-secondary" type="button">
                            <span class="btn-inner--icon"><i class="fas fa-cloud-download-alt text-green"></i></span>
                        </button>
                    </a>
                    <button class="btn btn-icon btn-secondary btnEliminaArchivoContrato" type="button">
                        <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                    </button>
                </td>
            </tr>
        `;
    });
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

 function consultaMarcas() {
     $.ajax(
         {
             url: "../webhook/marcas-list.php",
             success: function (response)
             {
                 let obj_result = JSON.parse(response);
                 let template = "";
                 obj_result.forEach(
                     (obj_result)=>
                     {
                         template += `<option value="${obj_result.id_marca}">${obj_result.nombre}</option>`;
                         arrayMarcas.push(obj_result);
                     }

                 );
                 $("#marca").html(template);
             }
         }
     );
 }

$("#marca").change(function ()
{
    //obj que tienes cambios
    var marca_sel = $(this);
    var id = marca_sel.val();
    if (id != '')
    {
        consultaModelos(id);
    }
    else
    {
        var modelo = $("#modelo");
        alert("No selecciono ningun elemento");
        modelo.find('option').remove();
    }
});

try {
    function consultaModelos(id_marca, idModeloSelct) {
        //Obj que voy a modificar
        var modelo = $("#modelo");
        $.ajax(
            {
                url: "../webhook/modelos-list.php",
                data: { id : id_marca },
                type: "POST",
                beforeSend: function ()
                {
                    modelo.prop('disabled',false);
                },
                success: function (response)
                {
                    let obj_result = JSON.parse(response);
                    let template = "";

                    obj_result.forEach(
                        (modelo)=>
                        {
                            let seleccionado = modelo.id_modelo == idModeloSelct ? "selected":"";
                            template += `<option value ="${modelo.id_modelo }" ${seleccionado}>${modelo.nombre}</option>`;
                        }
                    );

                    $("#modelo").html(template);
                    modelo.prop('disabled',false);
                },
                error: function ()
                {
                    alert('Ocurrio un error en el servidor...');
                    modelo.prop('disabled',true);
                }
            }
        );
    }
}catch (e) {

}

function hideCoche(parametro) {
    let titulo= "Archivar coche";
    let texto= "¿Esta seguro de querer archivar este carro?";
    Swal.fire({
        title: titulo,
        text: texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si!'
    }).then((result) => {
        if (result.isConfirmed) {
            let elementCoche =parametro;
            ocultaCoche(elementCoche);
        }
    });
}


function ocultaCoche(coche){
    $.ajax({
        url: "../webhook/car-delete.php",
        type: 'POST',
        data: {
            idCoche: coche,
        },
        success: function (mje) {
            alertaEmergente(mje);
            setTimeout(history.back(),30000);
        }
    });
}
