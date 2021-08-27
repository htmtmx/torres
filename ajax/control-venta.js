$(document).ready(function(){
    cargaPersonas();
    let noCoche= $("#noCoche").val();
    if(noCoche>0) buscaCochePaVenta(noCoche);
    consultaCochesVenta();

});

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
    e.preventDefault();
});
