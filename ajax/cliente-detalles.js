$(document).ready(function(){
    consultaDetallesCliente();
});

function consultaDetallesCliente(){
    $.ajax({
        url: "../webhook/client-list.php",
        type: "POST",
        data: { id: $("#idCliente").val() },
        success: function (response)
        {
            let obj_result = JSON.parse(response);
            console.log(obj_result);
            let obj = obj_result[0];
            $("#nombre").val(obj.nombre);
            $("#apaterno").val(obj.apaterno);
            $("#amaterno").val(obj.amaterno);
        },
    });
}
