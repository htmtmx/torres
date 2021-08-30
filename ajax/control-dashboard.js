$(document).ready(function(){

});

window.onload = function() {
    consultaCochesDashBoard();
    consultaPagosContrato();
    consultaCreditosPendientes();
};

function consultaCochesDashBoard(){
    $.ajax({
        url: "../webhook/car-list-one-foto.php",
        type: "POST",
        data: { id: 0, filter:0 },
        success: function (response)
        {
            let obj_result = JSON.parse(response);
            //console.log(obj_result);
            let caroselCoche = construyeCarouselCoche(obj_result);
            let tableCoches= construyetablaCoches(obj_result);
            $("#caroucelCochesDinamico").html(caroselCoche);
            $("#tblCoches").html(tableCoches);
        },
    });
}

function consultaPagosContrato(){
    $.ajax({
        url: "../webhook/pagosPendientesPorContrato.php",
        success: function (response)
        {
            let obj_result = JSON.parse(response);
            console.log(obj_result);
           let abonos   =   construyeTablaAbonosContrato(obj_result);
            $("#tblPagos").html(abonos);
        },
    });
}

function consultaCreditosPendientes(){
    $.ajax({
        url: "../webhook/avanceCredits.php",
        success: function (response)
        {
            let obj_result = JSON.parse(response);
            console.log(obj_result);
            let contratosCedito   =   construyeTablaContratosCredito(obj_result);
            $("#tblCredits").html(contratosCedito);
        },
    });
}

function construyeTablaContratosCredito(listaContratos) {
    let template="";
    let contador=0;
    listaContratos.forEach((contrato) => {
        let nombreStatus = "";
        var porcentaje = contrato['1'];
        var estadoCredito = contrato['0'];
        var porcentajeCredito = porcentaje.toFixed();
        if (estadoCredito == 1) {
            nombreStatus = `<i class="fas fa-calendar-check text-green"></i> Al corriente`;
        } else {
            nombreStatus = `<i class="fas fa-calendar-check text-red"></i> Atrasado`;
        }
            let obj = listaContratos[contador];
            contador++;
            template += `
            <tr>
                                <th scope="row">
                                    ${contrato.no_contrato}
                                </th>
                                <td>
                                    ${contrato.vehiculo}                                  
                                </td>
                                <td>
                                    ${contrato.fecha_venta}
                                </td>
                                <td>
                                    ${nombreStatus}
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="mr-2">${porcentajeCredito}%</span>
                                        <div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: ${porcentaje}%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown show">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Acciones
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="./detalles-coche.php?idCoche=${contrato.no_vehiculo}#conteinerContratos"><i class="fas fa-eye text-blue"></i> Ver Contrato</a>
                                            <!---<a class="dropdown-item" href="#"><i class="fas fa-hand-holding-usd text-green"></i>Registrar Abono</a>--->
                                            <a class="dropdown-item" href="#"><i class="fas fa-cloud-upload-alt text-orange"></i> Subir Archivo</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
        `;
        }
    );
    return template;
}

function construyeTablaAbonosContrato(listaAbonos) {
    let template="";
    let contador=0;
    listaAbonos.forEach((abono) => {
            var saldo =new Intl.NumberFormat().format(abono.saldo);
        let obj = listaAbonos[contador];
        contador++;
        template += `
            <tr>
                                <th scope="row">
                                    ${abono.no_contrato}
                                </th>
                                <td>
                                    ${abono.vehiculo} <span class="badge badge-info">${abono.placa}</span>
                                </td>
                                <td>
                                    ${abono.fecha_limite_pago}
                                </td>
                                <td>
                                    ${abono.detalles}
                                </td>
                                <td>
                                    <i class="fas fa-dollar-sign text-green"></i> ${saldo}
                                </td>
                                <td>
                                     <a href="./detalles-coche.php?idCoche=${abono.no_vehiculo}#conteinerContratos">
                                     <button class="btn btn-icon btn-secondary" type="button">
                                            <span class="btn-inner--icon"><i class="fas fa-eye"></i> Ver contrato </span>
                                        </button>
                                    </a>
                                </td>
                            </tr>
        `;
    }
    );
    return template;
}


function construyetablaCoches(listaCoches) {
    let template="";
    let contador=0;
    listaCoches.forEach((coche) =>
        {
            let obj = listaCoches[contador];
            contador++;
            let contado=`<strong class="heading"><i class="fas fa-dollar-sign text-green"></i> ${obj.precio_contado}</strong>` ;
            let credito=`<strong class="heading"><i class="fas fa-credit-card"></i> ${obj.precio_credito}</strong>`;
            let precio= obj.opc_credito>0 ? `<div class="h6 font-weight-300"> ${contado}</div>  <div class="h6 font-weight-300">${credito} </div>`:`<div class="h6 font-weight-300">  ${contado}  </div>`;
            template += `
        <tr>
            <th scope="row">
                ${contador}
            </th>
            <td>
                <a href="./detalles-coche.php?idCoche=${obj.no_vehiculo}">
                    ${obj.placa}
                </a>
            </td>
            <td>
                ${obj.marca_coche+" "+obj.modelo_coche+" "+obj.anio}
            </td>
            <td>
                    Color ${obj.color},
                    ${obj.no_puertas} puertas,
                     ${obj.kilometros} Km.
            </td>
            <td>
                ${precio}
            </td>
            <td>
                <a href="./nuevaVenta.php?idCoche=${obj.no_vehiculo}">
                    <button class="btn btn-icon btn-secondary" type="button">
                            <span class="btn-inner--icon">
                                <i class="fas fa-tag text-green"></i> VENDER 
                            </span>
                    </button>
                </a>
                
            </td>
            <td>
                <a href="./detalles-coche.php?idCoche=${obj.no_vehiculo}">
                    <button class="btn btn-icon btn-secondary" type="button">
                            <span class="btn-inner--icon">
                                <i class="fas fa-eye text-blue"></i> Ver más</a>
                            </span>
                    </button>
                </a>
            </td>
        </tr>
            `;
        }
    );
return template;

}


function construyeCarouselCoche(listaCoches) {
    let template = "";
    let templatePaginador =  `<ol class="carousel-indicators">`;
    let contenedorFotos = `<div class="carousel-inner">`;
    LISTA_COCHES = listaCoches;
    let contador = 0;
    let active = `class="active"`;
    let activeFoto = "active";
    listaCoches.forEach((coche) =>
        {
            let foto = coche[0];
            let acitvPag = contador < 1 ? active:"";
            let link = foto.length < 1 ? "https://hescorp.com.mx/wp-content/themes/consultix/images/no-image-found-360x250.png" : foto[0].path;
            templatePaginador += `<li data-target="#caroucelCochesDinamico" data-slide-to="${contador}"></li>`;

            contenedorFotos += `
                                <div class="carousel-item ${contador==0?activeFoto:""}">
                                    <div class="col text-center position-absolute align-text-bottom py-3">
                                        <a href="./nuevaVenta.php?idCoche=${coche.no_vehiculo}">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cuentaUser">
                                                <i class="fas fa-dollar-sign text-white"></i> Vender
                                            </button>
                                        </a>
                                        <a href="./detalles-coche.php?idCoche=${coche.no_vehiculo}">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cuentaUser">
                                                <i class="fas fa-list text-white"></i> Mas detalles
                                            </button>
                                        </a>
                                    </div>
                                    <img class="d-block w-100" src="${link}" alt="First slide">
                                </div>
                            `;
            contador++;
        }
    );
    templatePaginador += `</ol>`;
    contenedorFotos += `</div>`;
    template = templatePaginador + contenedorFotos;
    template += `<a class="carousel-control-prev" href="#caroucelCochesDinamico" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#caroucelCochesDinamico" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>`;
    return template;
}

