//Star Session
$(document).ready(function() {
    //-------------------Star Sessions
    $('#tarea_form').submit(function (e) {
        //se ejecuta el elemento submit
        var user = $("#txtUser").val();
        var pw = $("#txtPw").val();
        let titulo;
        let texto;
        let tipo ;
        if (user == "" || pw == "") {
            //Asignamos valores a las variables del SWAL.
            titulo= "Campos vacios";
            texto= "Porfavor llena los datos que se solicitan";
            tipo = "warning";
            alerta(titulo,texto,tipo);
        } else {
            //obtenemos los datos de los valores que se enviaran al servidor
            const valoresCajas = {
                user: user,
                pw: pw
            };
            let url = './webhook/c_verifica_usuario.php';
            //funcion propia de jQuery para POST (a doinde enviar, que enviar, resultado devuelto)
            $.post(url, valoresCajas, function (response) {
                //tratamos los datos y hacemos acciones
                let obj_mje = JSON.parse(response);

                if (obj_mje.mjeType == "0") {
                    titulo= "Cuenta no encontrada";
                    texto= "El correo o la contraseña son incorrectos. Intente nuevamente";
                    tipo = "error";
                    alerta(titulo,texto,tipo);
                    //limpiar
                    $('#tarea_form').trigger('reset');
                } else {
                    var template = `
                        <div class="alert alert-success" role="alert">
                            <div class="d-flex align-items-center">
                                ${obj_mje.Mensaje}
                                <strong>Iniciando sesión...</strong>
                                <div class="spinner-border ml-auto" role="status" aria-hidden="true">
                                </div>
                            </div>
                        </div>`;
                    //Domde quiero mostrar los elementos y lo llenamos con la plantilla hecha
                    var mensaje = document.getElementById("mensaje");
                    mensaje.innerHTML = template;
                    location.reload();
                }
            });
        }
        //Cancela las funciones basicas del boton submit y evita regrescar la pagina
        e.preventDefault();
    })
    //-------------------End StarSesion
});