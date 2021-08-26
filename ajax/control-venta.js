$(document).ready(function(){
    cargaPersonas();
    let noCoche= $("#noCoche").val();
    if(noCoche>0) buscaCochePaVenta();
});

function buscaCochePaVenta() {
    alert("Buscare el  coche");
}

$("#msform").on("submit", function(e){
    e.preventDefault();
});
