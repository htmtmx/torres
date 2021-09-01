$(document).ready(function(){
    let noCoche= $("#noCoche").val();
    if(noCoche>0) buscaCochePaVenta(noCoche);
    consultaCochesVenta();

});
window.onload = function() {
    cargaPersonas();
};

function buscaCochePaVenta(noCoche) {
    $.ajax({
        url: "../webhook/cars-list.php",
        type: "POST",
        data: { idCoche: noCoche ,
            details: 1,
            estatus:0
        },
        success: function (response)
        {
            //COnvertimos el string a JSON
            let coches= JSON.parse(response);
            console.log(coches);
            cargaDatosCoche(coches[0]);
        },
    });
}

$("#msform").on("submit", function(e){
    var f = $(this);
    var formData = new FormData(document.getElementById("msform"));
    formData.append("dato", "valor");
    //formData.append(f.attr("name"), $(this)[0].files[0]);
    $.ajax({
        url: "../webhook/addContratoVenta.php",
        type: "post",
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
    $('#msform').trigger('reset');
    e.preventDefault();
});
