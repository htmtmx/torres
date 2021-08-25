$(document).ready(function(){
    montoVehiculosDashboard();
    countVehiculosVendidosDashboard();
    montoPagosDashboard();
    countPagosPendientesDashboard();
});


window.onload = function() {
    consultaCochesDashBoard();
    consultaAbonosContrato();

};

function montoVehiculosDashboard() {
    $.ajax({
        url: "../webhook/montoCochesVendidos.php",
        success: function (response)
        {
            let obj_result = JSON.parse(response);
            console.log(obj_result);
            var total =new Intl.NumberFormat().format(obj_result[0]['total_vendido']);
            console.log(obj_result[0]['total_vendido']);
            $("#montoVendido").html("$"+total);
        },
    });
}

function countVehiculosVendidosDashboard() {
    $.ajax({
        url: "../webhook/countCochesVendidos.php",
        success: function (response)
        {
            let obj_result = JSON.parse(response);
            console.log(obj_result);
            console.log(obj_result[0]['total_vendido']);
            $("#no_vehiculos").html(obj_result[0]['no_vehiculos']+" Vehiculos vendidos");
        },
    });
}

function montoPagosDashboard() {
    $.ajax({
        url: "../webhook/montoPagosPendientes.php",
        success: function (response)
        {
            let obj_result = JSON.parse(response);
            console.log(obj_result);
            var total =new Intl.NumberFormat().format(obj_result[0]['total_pagos']);
            console.log(obj_result[0]['total_pagos']);
            $("#montoPagosPend").html("$"+total);
        },
    });
}

function countPagosPendientesDashboard() {
    $.ajax({
        url: "../webhook/countPagosPendientes.php",
        success: function (response)
        {
            let obj_result = JSON.parse(response);
            $("#noPagosPend").html(obj_result[0]['no_pagos']+" Pagos pendientes");
        },
    });
}

function consultaCochesDashBoard(){
    $.ajax({
        url: "../webhook/car-list-one-foto.php",
        type: "POST",
        data: { id: 0, filter:0 },
        success: function (response)
        {
            let obj_result = JSON.parse(response);
            console.log(obj_result);
            let caroselCoche = construyeCarouselCoche(obj_result);
            let tableCoches= construyetablaCoches(obj_result);
            $("#caroucelCochesDinamico").html(caroselCoche);
            $("#tblCoches").html(tableCoches);
        },
    });
}

function consultaAbonosContrato(){
    $.ajax({
        url: "../webhook/pagos-abonos-contrato.php",
        type: "POST",
        data: { id: 0, estatus:0 },
        success: function (response)
        {
            //console.log(response);
            let obj_result = JSON.parse(response);
            //console.log(obj_result);
           let abonos   =   construyeAbonosContrato(obj_result);
        },
    });
}


function construyeAbonosContrato(listaAbonos) {
    let template="";
    let contador=0;

    /*listaAbonos.forEach((abono) => {


        }
    );
    return template;*/
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
            <a href="./catalogo.php">
                <button class="btn btn-icon btn-secondary" type="button">
                        <span class="btn-inner--icon">
                            <i class="fas fa-tag text-green"></i> EN VENTA
                        </span>
                </button>
            </a>
            
        </td>
        <td>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Acciones
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#"><i class="fas fa-dollar-sign text-green"></i> Vender</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-cloud-upload-alt text-orange"></i> Subir
                        Archivo</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-eye text-blue"></i> Ver mas</a>
                </div>
            </div>
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

