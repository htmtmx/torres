$(document).ready(function(){
});

//FUNCIONES DE ELIMINAR DOCUMENTO DEL COCHE
$(document).on("click", ".btnEliminarDocumentoCoche", function () {
    if (confirm("¿Esta seguro de que desea eliminar este documento? Esta accion no podrá ser revertida")) {
        let elementGetByDoc = $(this)[0].parentElement.parentElement;
        let idDocCoch = $(elementGetByDoc).attr("iddoccoch");
        eliminarDocumentoCoche(idDocCoch);
    }
});


function eliminarDocumentoCoche(idDocCoche){
    $.ajax({
        url: "../webhook/remove-file-vehiculo.php",
        type: 'POST',
        data: {
            idDocCoche: idDocCoche
        },
        success: function (mje) {
            alert(mje);
        }
    });
}

// FUNCIONES DE ELIMINAR FOTOS DE COCHE DEL FILE VEHICULO

$(document).on("click", ".btnEliminarFotoCoche", function () {
    if (confirm("¿Esta seguro de que desea eliminar este foto? Esta accion no podrá ser revertida")) {
        let elementGetByDoc = $(this)[0].parentElement.parentElement;
        let idDocCoch = $(elementGetByDoc).attr("idFile");
        console.log(idDocCoch);
        eliminarDocumentoCoche(idDocCoch);
    }
});
