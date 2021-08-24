$(document).ready(function(){
    updateCar();
});

$("#frm-update-datos-coche").on("submit", function(e){
    //let tipocontrato = $('input[name="contrato"]:checked').val();
    var f = $(this);
    var formData = new FormData(document.getElementById("frm-update-datos-coche"));
    formData.append("dato", "valor");
    //formData.append(f.attr("name"), $(this)[0].files[0]);
    $.ajax({
        url: "../webhook/car-update.php",
        type: "POST",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response)
        {
            console.log(response);

        },
    })
    e.preventDefault();
});

function updateCar() {
    $.ajax({
            type:   "POST",
            url:    "../control/car-add.php",
            data: {
                modelo: $("#modelos").val(),
                anio: $("#anio").val(),
                placa: $("#placa").val(),
                entidad_placa: $("#entidad_placa").val(),
                color: $("#colorCarBuy").val(),
                kilometros: $("#kmCarBuy").val(),
                transmision: $("#transimision").val(),
                combustible: $("#combustible").val(),
                nopuertas: $("#noPuertas").val(),
            }, success: function () {
                console.log(response);
            }
        }
    )
}