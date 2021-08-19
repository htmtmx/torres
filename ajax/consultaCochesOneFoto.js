$(document).ready(function(){
    consultaCochesOneFoto();
});

function consultaCochesOneFoto(){
    $.ajax({
        url: "../webhook/car-list-one-foto.php",
        type: "POST",
        data: { id: $("#no_vehiculo").val() },
        success: function (response)
        {
            //console.log(response);
            let obj_result = JSON.parse(response);
            console.log(obj_result);
        },
    });
}