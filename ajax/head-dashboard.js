$(document).ready(function(){
    montoVehiculosDashboard();
    countVehiculosVendidosDashboard();
    montoPagosDashboard();
    countPagosPendientesDashboard();
    countCochesEnVentaDashboard();
});

function montoVehiculosDashboard() {
    $.ajax({
        url: "../webhook/montoCochesVendidos.php",
        success: function (response)
        {
            let obj_result = JSON.parse(response);
            //console.log(obj_result);
            var total =new Intl.NumberFormat().format(obj_result[0]['total_vendido']);
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
            var total =new Intl.NumberFormat().format(obj_result[0]['total_pagos']);
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
            //console.log(obj_result);
            $("#noPagosPend").html(obj_result[0]['count_pagos']+" Pagos pendientes");
        },
    });
}

function countCochesEnVentaDashboard() {
    $.ajax({
        url: "../webhook/countVehiculosEnVenta.php",
        success: function (response)
        {
            let obj_result = JSON.parse(response);
            console.log(obj_result);
            $("#noVehiculosVenta").html(obj_result[0]['no_vehiculos_venta']);
        },
    });
}