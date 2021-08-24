$(document).ready(function(){
    consultaDetallesCocheGenerales();
});

/*****FUNCIONES DE ELIMINAR DOCUMENTO DEL COCHE ****/
$(document).on("click", ".btnEliminarDocumentoCoche", function () {
    if (confirm("¿Esta seguro de que desea eliminar este documento? Esta accion no podrá ser revertida")) {
        let elementGetByDoc = $(this)[0].parentElement.parentElement;
        let idDocCoch = $(elementGetByDoc).attr("iddoccoch");
        eliminarDocumentoCoche(idDocCoch);
    }
});


/********FUNCIONES DE ELIMINAR FOTOS DE COCHE DEL FILE VEHICULO]************/

$(document).on("click", ".btnEliminarFotoCoche", function () {
    if (confirm("¿Esta seguro de que desea eliminar este foto? Esta accion no podrá ser revertida")) {
        let elementGetByDoc = $(this)[0].parentElement.parentElement;
        let idDocCoch = $(elementGetByDoc).attr("idFile");
        eliminarDocumentoCoche(idDocCoch);
    }
});

/******BTN LISTEN PARA ELIMINAR CARACTERISTICA *****/

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

/****** FUNCIONES PARA ELIMINAR CARACTERISTICAS *****/
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
        }
    });
}

/****** FUNCIONES PARA ELIMINAR DOCUMENTOS DE COCHE *****/
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
}
function consultaDetallesCocheGenerales(){
    $.ajax({
        url: "../webhook/consulta-detalles.php",
        type: "POST",
        data: {
            idDetalle:0
        },
        success: function (response)
        {
            //console.log(response);
            let obj_result = JSON.parse(response);
            let detalles = construyeSelectDetalles(obj_result);
            $("#detalle").html(detalles);
        },
    });
}



function construyeSelectDetalles(detalles){
    let template="";
    detalles.forEach((detalle)=>{
        template+=`
            <option value="${detalle.id_detalle}">${detalle.nombre}</option>
        `;
    });
    return template;
}
//FUNCION SUBMIT PARA EL FORM DE DOC CONTRATO ADQUISICION
$("#frm-add-caracteristica").on("submit", function(e){
    //let tipocontrato = $('input[name="contrato"]:checked').val();
    var f = $(this);
    var formData = new FormData(document.getElementById("frm-add-caracteristica"));
    formData.append("dato", "valor");
    //formData.append(f.attr("name"), $(this)[0].files[0]);
    $.ajax({
        url: "../webhook/add-uso-detalle.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response)
        {
            console.log(response);
            let obj_result = JSON.parse(response);
            console.log(obj_result);
            let mje= builAlertaDinamica(obj_result);
            consultaDetallesCoche();
            $("#mensajeAddCaracteristica").html(mje);
        },
    })
    e.preventDefault();
    $('#frm-add-caracteristica').trigger('reset');

});

function builAlertaDinamica(objMje) {
    let template="";
    switch (objMje.mjeType){
        case "1":
            template += `
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              ${objMje.Mensaje}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            `;
            break;
        case "0":
            template += `
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              ${objMje.Mensaje}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            `;
            break;
        default:
            template += `
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              ${objMje.Mensaje}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            `;
            break;
    }
    return template;

}