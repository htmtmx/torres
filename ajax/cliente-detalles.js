$(document).ready(function(){
    consultaDetallesCliente();
    consultaDirecciones();
});

function consultaDetallesCliente(){
    $.ajax({
        url: "../webhook/client-list.php",
        type: "POST",
        data: { id: $("#idCliente").val() },
        success: function (response)
        {
            let obj_result = JSON.parse(response);
            let obj = obj_result[0];
            $("#nombre").val(obj.nombre);
            $("#apaterno").val(obj.apaterno);
            $("#amaterno").val(obj.amaterno);
            $("#correo").val(obj.correo);
            $("#telefono").val(obj.telefono);
            $("#empresa").val(obj.empresa);
            $("#rfc").val(obj.rfc);
            $("#folio").val(obj.folio);
            $("#fecha_registro").val(obj.fecha_registro);
            $("#celular").val(obj.celular);
        },
    });
}
function consultaDirecciones(){
    $.ajax({
        url: "../webhook/consulta-direccion.php",
        type: "POST",
        data: { id: $("#idCliente").val() },
        success: function (response)
        {
            let obj_result = JSON.parse(response);
            let cont=0;
            let template="";
            //Creamos direcciones para tabla DETALLES CLIENTE
            obj_result.forEach((obj) => {
                cont++;
                let noint= obj.no_int>0 ? `, No.Int `+obj.no_int:"";
                let estatus="";
                estatus = obj.estado>0? `<span class="badge badge-success">Activo</span>`: `<span class="badge badge-warning">Baja</span>`;
                template += `
                <tr idDireccion="${obj.id_direccion}">
                                <th scope="row">
                                    ${cont}
                                </th>
                                <td>
                                    ${obj.calle+" No. Ext "+obj.no_ext+noint}
                                </td>
                                <td>
                                    ${obj.colonia}
                                </td>
                                <td>
                                    <ul>
                                        ${obj.municipio}
                                    </ul>
                                </td>
                                <td>
                                     ${obj.estado_republica}
                                </td>
                                <td>
                                    ${estatus}
                                </td>
                                <td>
                                    <div class="dropdown show">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Acciones
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="#"><i class="fas fa-edit text-blue"></i> Editar</a>
                                            <a class="dropdown-item" href="#"><i class="fas fa-trash-alt text-red"></i> Eliminar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>`;
            });
            $("#tbl-direcciones").html(template);

        },
    });
}
//SUBMIT PARA ACTUALIZAR DATOS DE CLIENTE DESDE EL DETALLES CLIENTE
$("#frm-datos-cliente").on("submit", function(e){
    //let tipocontrato = $('input[name="contrato"]:checked').val();
    e.preventDefault();
    var f = $(this);
    var formData = new FormData(document.getElementById("frm-datos-cliente"));
    formData.append("dato", "valor");
    //formData.append(f.attr("name"), $(this)[0].files[0]);
    $.ajax({
        url: "../webhook/client-edit.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function(res){
            let alerta = cosntructMensaje("success",res);
            $("#mensajeUpdateCliente").html(alerta);
        });
    $('#frm-datos-cliente').trigger('reset');
    consultaDetallesCliente();
});

$("#frm-add-direccion").on("submit", function(e){

    var formData = new FormData(document.getElementById("frm-add-direccion"));
    formData.append("dato", "valor");
    //formData.append(f.attr("name"), $(this)[0].files[0]);
    $.ajax({
        url: "../webhook/direccion-add.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function(res){
            let alerta = cosntructMensaje("success",res);
            $("#mensajeAddDireccion").html(alerta);
        });
    $('#frm-add-direccion').trigger('reset');
   // e.preventDefault();
    consultaDirecciones();

});