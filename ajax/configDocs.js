/*
alert("Hola desde config DOCS");*/
/*$(document).ready(function(){
    cargaDatosTipoArchivo();
});*/
$("#frm-add-edit-tipo-archivo").on("submit", function(e){
    var formData = new FormData(document.getElementById("frm-add-edit-tipo-archivo"));
    formData.append("dato", "valor");
    //formData.append(f.attr("name"), $(this)[0].files[0]);
    $.ajax({
        url: "../webhook/add-edit-tipo-archivo.php",
        type: "POST",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response)
        {
            //console.log(response);
            let template =  `<div class="alert alert-success alert-dismissible fade show" role="alert">
                                ${response}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            `;
            $("#mensajeAddEditArchivo").html(template);
            configTiposArchivo();
            limpiaModalTipoArchivo();
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 1000);
        },
    })
    //$('#modal_ConfigTipoArchivo').modal('hide');
    e.preventDefault();
});

$(document).on("click", ".btnEliminarTipoArchivo", function () {
    let titulo= "Eliminar Tipo de archivo";
    let texto= "¿Esta seguro de que desea eliminar este Tipo de archivo?";
    Swal.fire({
        title: titulo,
        text: texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si!'
    }).then((result) => {
        if (result.isConfirmed) {
            let elementTipoArchivo = $(this)[0].parentElement.parentElement;
            //console.log(elementTipoArchivo);
           let idArchivo = $(elementTipoArchivo).attr("idArchivo");
            //console.log(idArchivo);
            eliminaTipoArchivo(idArchivo);
        }
    });
});

function eliminaTipoArchivo(idArchivo) {
    $.ajax({
        url: "../webhook/tipoArchivoDelete.php",
        type: 'POST',
        data: {
            idArchivo: idArchivo,
        },
        success: function (mje) {
            alertaEmergente(mje);
            configTiposArchivo();
        }
    });
}