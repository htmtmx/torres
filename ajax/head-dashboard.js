$(document).ready(function(){
    montoVehiculosDashboard();
    countVehiculosVendidosDashboard();
    montoPagosDashboard();
    countPagosPendientesDashboard();
    countCochesEnVentaDashboard();
    sumaAbonosHoy();
});

function montoVehiculosDashboard() {
    $.ajax({
        url: "../webhook/montoCochesVendidos.php",
        success: function (response)
        {
            let obj_result = JSON.parse(response);
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
            $("#noVehiculosVenta").html(obj_result[0]['no_vehiculos_venta']);
        },
    });
}

function sumaAbonosHoy() {
    $.ajax({
        url: "../webhook/sumaAbonosHoy.php",
        success: function (response)
        {
            let obj_result = JSON.parse(response);
            var total =new Intl.NumberFormat().format(obj_result[0]['total_abonos_hoy']);
            $("#montoAbonosHoy").html("$"+total);
        },
    });
}