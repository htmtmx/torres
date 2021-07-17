//Star Session
$(document).ready(function(){

   console.log("Escuchando acciones");

       //-------------------Star Sessions
       $('#tarea_form').submit(function (e) 
       {
        //se ejecuta el elemento submit
           // console.log('enviado');
           var user = $("#txtUser").val();
           var pw =  $("#txtPw").val();
           if (user == "" || pw  == "") 
           {
            //cr4amos una plantilla
            var template = `<div class="alert alert-warning" role="alert">Porfavor escriba su cuenta y la contraseña.</div>`;
            //Domde quiero mostrar los elementos y lo llenamos con la plantilla hecha
            var mensaje = document.getElementById("mensaje");
            mensaje.innerHTML = template;
            }
            else
            {
                //obtenemos los datos de los valores que se enviaran al servidor
                const valoresCajas = {
                    user: $('#txtUser').val(),
                    pw : $('#txtPw').val()
                };
                let url = './control/c_verifica_usuario.php';
                console.log(url);
                //funcion propia de jQuery para POST (a doinde enviar, que enviar, resultado devuelto)
                $.post(url,valoresCajas, function (response) {
                    //tratamos los datos y hacemos acciones
                    console.log(response);
                    let obj_user = JSON.parse(response);
                    if (obj_user.length === 0) 
                    {
                        var template = `<div class="alert alert-danger" role="alert">El correo o la contraseña es incorrecta, o la cuenta esta inactiva</div>`;
                        //Domde quiero mostrar los elementos y lo llenamos con la plantilla hecha
                        var mensaje = document.getElementById("mensaje");
                        mensaje.innerHTML = template;
                        //limpiar
                        $('#tarea_form').trigger('reset');
                    }
                    else
                    {
                        var template = `
                        <div class="alert alert-success" role="alert">
                            <div class="d-flex align-items-center">
                                <strong>Iniciando sesión...</strong>
                                <div class="spinner-border ml-auto" role="status" aria-hidden="true">
                                </div>
                            </div>
                        </div>`;
                        //Domde quiero mostrar los elementos y lo llenamos con la plantilla hecha
                        var mensaje = document.getElementById("mensaje");
                        mensaje.innerHTML = template;
                        $.ajax({
                            //type: "method",
                            url: "./control/c_iniciar_sesion.php",
                            //Post para enviar y GET para recibir de serv
                            type: "POST",
                            //enviamos el valor del imput al servidor
                            data:{
                                nombre:obj_user[0].nombre,
                                no_empleado:obj_user[0].no_empleado,
                                rfc_fk:obj_user[0].rfc_fk,
                                apaterno:obj_user[0].apaterno,
                                amaterno:obj_user[0].amaterno,
                                puesto:obj_user[0].puesto,
                                nivel_acceso:obj_user[0].nivel_acceso,
                                correo_user:obj_user[0].correo_user,
                                pw:obj_user[0].pw,
                                nombre:obj_user[0].nombre,
                            },
                            //lo que regresa si todo OK
                            success: function (response) {
                                location.reload();
                            }
                        });
                    }
                });
            }
            //console.log(postData);
           //Cancela las funciones basicas del boton submit y evita regrescar la pagina
            e.preventDefault();
          })
          //-------------------End StarSesion
});