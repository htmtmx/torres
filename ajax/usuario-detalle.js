$(document).ready(function(){
consultaDetallesUsuario();
});

function consultaDetallesUsuario(){
    $.ajax({
        url: "../webhook/users-list.php",
        type: "POST",
        data:{id:-1},
        success: function (response)
        {
            let obj_result = JSON.parse(response);
           console.log(obj_result);
            let user = obj_result[0];
            $("#nombreTitulo").html(`Hola `+user.nombre);
            $("#nombre").val(user.nombre);
            $("#apaterno").val(user.apaterno);
            $("#amaterno").val(user.amaterno);
            $("#telefono").val(user.telefono);
            $("#celular").val(user.celular);
            $("#correo").val(user.correo_user);
            $("#sexo").val(user.sexo);
            $("#puesto").val(user.puesto);
            let nivelAcceso = user.nivel_acceso>0 ?"Vendedor" : "Administrador";
            $("#nvl_acceso").val(nivelAcceso);
        }
    });
}

$("#frm-datos-empleado").on("submit", function(e){
    e.preventDefault();
    var formData = new FormData(document.getElementById("frm-datos-empleado"));
    formData.append("dato", "valor");
    //formData.append(f.attr("name"), $(this)[0].files[0]);
    $.ajax({
        url: "../webhook/user-update.php",
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
    $('#frm-datos-empleado').trigger('reset');
    consultaDetallesUsuario();

});

$("#frm-update-password").on("submit", function(e){
    e.preventDefault();
    var formData = new FormData(document.getElementById("frm-update-password"));
    formData.append("dato", "valor");
    //formData.append(f.attr("name"), $(this)[0].files[0]);
    $.ajax({
        url: "../webhook/user-update-pw.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function(res){
            let alerta = cosntructMensaje("success",res);
            $("#mensajeUpdateContraseña").html(alerta);
        });
    $('#frm-update-password').trigger('reset');
});