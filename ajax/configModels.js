$(document).ready(function(){
    getMarcasModal();
});
$("#frm-add-edit-model").on("submit", function(e){
    var formData = new FormData(document.getElementById("frm-add-edit-model"));
    formData.append("dato", "valor");
    //formData.append(f.attr("name"), $(this)[0].files[0]);
    $.ajax({
        url: "../webhook/add-edit-model.php",
        type: "POST",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response)
        {
            console.log(response);
            let template =  `<div class="alert alert-success alert-dismissible fade show" role="alert">
                                ${response}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            `;
            $("#mensajeAddEditModelo").html(template);
            getModelos($("#marcas").val());
            limpiaModalModelo();
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

function getMarcasModal() {
    //-------------- AJAX pedira la info de los datos se ejecuta cuando entra inicio
    $.ajax({
        url: "../webhook/marcas-list.php",
        type: "POST",
        success: function (response)
        {
            //COnvertimos el string a JSON
            let obj_result = JSON.parse(response);
            //Utilizamos los objetos a y los tratamos en una plantilla en tbody
            let template = "";
            let contador = 0;
            obj_result.forEach((obj_result) =>
                {
                    template += `<option value="${obj_result.id_marca}">${obj_result.nombre}</option>`;
                    if (contador==0) {PRIMER_MARCA = obj_result.id_marca;}
                    contador++;
                }
            );
            $("#marcaModelo").html(template);
            //getModelos(PRIMER_MARCA);
        },
    });
}

$(document).on("click", ".btnEliminarModel", function () {
    let titulo= "Eliminar Modelo";
    let texto= "¿Esta seguro de que desea eliminar este Modelo?";
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
            console.log(elementTipoArchivo);
            let idModelo = $(elementTipoArchivo).attr("idmodelo");
            let idMarca = $(elementTipoArchivo).attr("idmarca");
            console.log(idModelo);
            console.log(idMarca);
            eliminaModelo(idModelo,idMarca);
        }
    });
});

function eliminaModelo(idModelo,idMarca) {
    $.ajax({
        url: "../webhook/modelDelete.php",
        type: 'POST',
        data: {
            idModelo: idModelo,
        },
        success: function (mje) {
            alertaEmergente(mje);
            getModelos(idMarca);
        }
    });
}