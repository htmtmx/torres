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
            $("#medio_identificacion_cliente").val(obj.medio_identificación);

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
            console.log(obj_result);
            let direcciones= obj_result[0][0];
            cargaDirecciones(direcciones);
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
    consultaDirecciones();
});


function cargaDirecciones(direcciones){
    let direccion = direcciones[0];
    $("#id_dir").val(direccion.id_direccion)
    $("#calle").val(direccion.calle);
    $("#noExtEmp").val(direccion.no_ext);
    $("#noIntEmp").val(direccion.no_int);
    $("#coloniaEmpr").val(direccion.colonia);
    $("#municipio").val(direccion.municipio);
    $("#cpEmpr").val(direccion.CP);
    $("#estadoEmp").val(direccion.estado_republica);
    $("#referencias").val(direccion.referencias);
}