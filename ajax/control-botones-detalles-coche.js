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
/******BTN LISTEN PARA ELIMINAR DOCUMENTOS CONTRATO *****/

$(document).on("click", ".btnEliminaArchivoContrato", function () {
    if (confirm("¿Esta seguro de que desea eliminar este documento? Esta accion no podrá ser revertida")){
        let elemntDocumentoContrato = $(this)[0].parentElement.parentElement;
        let idDocumento = $(elemntDocumentoContrato).attr("id")
        eliminarDocumentoContrato(idDocumento);
    }

});

/**************************************
 **** FUNCIONES PARA BTN LISTENERS ****
 **************************************/

/****** FUNCIONES PARA ELIMINAR CARACTERISTICAS *****/
function eliminarDocumentoContrato(idDocumento){
    $.ajax({
        url: "../webhook/remove-file-contrato.php",
        type: 'POST',
        data: {
            idDocumento: idDocumento
        },
        success: function (mje) {
            consultaDetallesContrato();
        }
    });
}
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
            let obj_result = JSON.parse(response);
            let detalles = construyeSelectDetalles(obj_result);
            $("#detalle").html(detalles);
        },
    });
}



function construyeSelectDetalles(detalles){
    let template ="";
    let tmpExt = `<optgroup label="Exterior">`;
    let tmpInv = `<optgroup label="Inventario">`;
    let tmpAcc = `<optgroup label="Accesorios">`;
    let tmpOtro = `<optgroup label="Otros">`;

    detalles.forEach((detalle)=>{
        let contrato = detalle.oblogatorio === "1" ? `&#xf56c;`:"&#xf1fc";
        let option_template =`<option class="fa" value="${detalle.id_detalle}">${contrato} ${detalle.nombre}</span> </option>`;
        switch (detalle.categoria){
            case "0": tmpExt += option_template; break;
            case "1": tmpInv += option_template; break;
            case "2": tmpAcc += option_template; break;
            default: tmpOtro += option_template; break;
        }
    });
    tmpExt += `</optgroup>`;
    tmpInv += `</optgroup>`;
    tmpAcc += `</optgroup>`;
    tmpOtro += `</optgroup>`;
    template += tmpExt + tmpInv+ tmpAcc+ tmpOtro;
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
            consultaDetallesCoche();
        },
    })
    e.preventDefault();
    $('#frm-add-caracteristica').trigger('reset');
    $('#addCaracteristicas').modal('hide');

});