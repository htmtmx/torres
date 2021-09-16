$(document).ready(function(){
    consultaCocheAll();
    alert("Aqui me ocupan");
});

function consultaCocheAll(){
    $.ajax({
        url: "../webhook/car-all.php",
        type: "POST",
        data: { id: $("#no_vehiculo").val() },
        success: function (response)
        {
            console.log(response);
            let obj_result = JSON.parse(response);
            console.log(obj_result);
        },
    });
}