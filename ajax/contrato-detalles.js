$(document).ready(function(){
    consultaContrato();
});

function consultaContrato(){
    $.ajax({
        url: "../webhook/consulta-detalles-contrato.php",
        type: "POST",
        data: { id: $("#no_contrato").val() },
        success: function (response)
        {
            let obj_result = JSON.parse(response);

        },
    });
}