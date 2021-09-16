$(document).ready(function(){
    consultaDetallesContrato();
});

function consultaDetallesContrato(){
    $.ajax({
        url: "../webhook/pagos-abonos-contrato.php",
        type: "POST",
        data: { id: $("#no_contrato").val() },
        success: function (response)
        {
            let obj_result = JSON.parse(response);
        },
    });
}
