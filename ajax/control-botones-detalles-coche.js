$(document).ready(function(){
    consultaDetallesCoche();
});

//FUNCIONES DE ELIMINAR DOCUMENTO DEL COCHE
$(document).on("click", ".btnEliminarDocumentoCoche", function () {
    if (confirm("¿Esta seguro de que desea eliminar este documento? Esta accion no podrá ser revertida")) {
        let elementGetByDoc = $(this)[0].parentElement.parentElement;
        let idDocCoch = $(elementGetByDoc).attr("iddoccoch");
        eliminarDocumentoCoche(idDocCoch);
    }
});


// FUNCIONES DE ELIMINAR FOTOS DE COCHE DEL FILE VEHICULO

$(document).on("click", ".btnEliminarFotoCoche", function () {
    if (confirm("¿Esta seguro de que desea eliminar este foto? Esta accion no podrá ser revertida")) {
        let elementGetByDoc = $(this)[0].parentElement.parentElement;
        let idDocCoch = $(elementGetByDoc).attr("idFile");
        console.log(idDocCoch);
        eliminarDocumentoCoche(idDocCoch);
    }
});

/////////******BTN LISTEN PARA ELIMINAR CARACTERISTICA *****////////

$(document).on("click", ".btnEliminarCaracteristicas", function () {
    if (confirm("¿Esta seguro de que desea eliminar este documento? Esta accion no podrá ser revertida")){
        let elementCaracteristica = $(this)[0].parentElement.parentElement;
        let idCaracteristica = $(elementCaracteristica).attr("idcarac")
        eliminarDetalle(idCaracteristica);
    }

});

/**************************************
 **** FUNCIONES PARA BTN LISTENERS ****
 **************************************/

/////////****** FUNCIONES PARA ELIMINAR CARACTERISTICAS *****////////
function eliminarDetalle(idCaracteristica){
    $.ajax({
        url: "../webhook/delete-uso_detalle.php",
        type: 'POST',
        data: {
            idCarc: idCaracteristica,
            no_vehiculo: $("#noCoche").val()
        },
        success: function (mje) {
            consultaDetallesCoche();
            alert(mje);
        }
    });
    e.preventDefault();
}

/////////****** FUNCIONES PARA ELIMINAR DOCUMENTOS DE COCHE *****////////
function eliminarDocumentoCoche(idDocCoche){
    $.ajax({
        url: "../webhook/remove-file-vehiculo.php",
        type: 'POST',
        data: {
            idDocCoche: idDocCoche
        },
        success: function (mje) {
            consultaDetallesCoche();
        }
    });
    e.preventDefault();
}