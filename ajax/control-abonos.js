$(document).ready(function(){
});

//FUNCION SUBMIT PARA EL FORM DE DOC CONTRATO ADQUISICION
$("#frm-add-abono-contrato").on("submit", function(e){
    alert("OK");
    $('#exampleModal1').modal('hide')
    e.preventDefault();
});