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
            console.log(response);
            let obj_result = JSON.parse(response);
            console.log(obj_result);
        },
    });
}
