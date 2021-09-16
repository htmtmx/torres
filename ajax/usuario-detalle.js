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
    let pwn= $("#pw").val();
    let pwa= $("#pwo").val();
    let pwc= $("#cpw").val();
    let mensaje = '';
    let tipoAlert;
    if(pwn!='' && pwa!='' && pwc!='')   {
        if(pwn===pwc){
            const valoresCajas = {
                pwa: pwa,
                pwn: pwn,
                pwc: pwc
            };
            let url = "../webhook/user-update-pw.php";
            //funcion propia de jQuery para POST (a doinde enviar, que enviar, resultado devuelto)
            $.post(url,valoresCajas,function (mje) {
                //tratamos los datos y hacemos acciones
                mensaje = mje;
                tipoAlert = "success";
                let template = `
                    <div class="alert alert-${tipoAlert} alert-dismissible fade show" role="alert">
                          ${mensaje}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                `;
                $("#mensajeUpdateContraseña").html(template);
                $("#frm-update-password").trigger('reset');
            });
        } else {
            mensaje= "Las contraseñas nuevas no coinciden";
            tipoAlert = "danger";
            $("#pw").focus();
        }
    } else {
        mensaje= "Los campos no pueden estar vacios";
        tipoAlert = "warning";
        $("#pwo").focus();
    }
    let template = `
    <div class="alert alert-${tipoAlert} alert-dismissible fade show" role="alert">
          ${mensaje}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
`;
    $("#mensajeUpdateContraseña").html(template);
});