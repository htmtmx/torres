/*
alert("Hola desde config DOCS");*/
/*$(document).ready(function(){
    cargaDatosTipoArchivo();
});*/
$("#frm-add-edit-detalle").on("submit", function(e){
    var formData = new FormData(document.getElementById("frm-add-edit-detalle"));
    formData.append("dato", "valor");
    //formData.append(f.attr("name"), $(this)[0].files[0]);
    $.ajax({
        url: "../webhook/add-edit-caracteristica.php",
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
            $("#mensajeAddEditDetalle").html(template);
            configCaracteristicas();
            limpiaModalCaracteristicas();
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

$(document).on("click", ".btnEliminarCaracteristica", function () {
    let titulo= "Eliminar Caracteristica";
    let texto= "¿Esta seguro de que desea eliminar esta Caracteristica?";
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
            let elementDetalle = $(this)[0].parentElement.parentElement;
            //console.log(elementDetalle);
            let idDetalle = $(elementDetalle).attr("idCaracteristica");
            //console.log(idDetalle);
            eliminaCaracteristica(idDetalle);
        }
    });
});

function eliminaCaracteristica(idDetalle) {
    $.ajax({
        url: "../webhook/detalle-delete.php",
        type: 'POST',
        data: {
            idDetalle: idDetalle,
        },
        success: function (mje) {
            alertaEmergente(mje);
            configCaracteristicas();
        }
    });
}