$(document).ready(function(){
    if (id_page !=1) {
        getAllUsers();
    }
    else{
        console.log("estamos en la otra pagina");
        getOnlyUser();
    }
    //Funcion, Carga
    function getAllUsers() 
    {
        //-------------- AJAX pedira la info de los datos se ejecuta cuando entra inicio
        $.ajax({
            url: '../control/users-list.php',
            type: 'POST',
            data: {id: '0'},
            success: function (response) {
            //COnvertimos el string a JSON
            let obj_users = JSON.parse(response);

            //Utilizamos los objetos a y los tratamos en una plantilla en tbody
            let template ='';
            let template_page = '';
            let cont = 0;
            obj_users.forEach(
                obj_users => {
                    cont ++;
                    template += `
                    <tr user_id="${obj_users.no_empleado}">
                        <td>${cont}</td>
                        <td>${obj_users.no_empleado}</td>
                        <td>${obj_users.nombre + ' ' + obj_users.apaterno + ' ' + obj_users.amaterno}</td>
                        <td>${obj_users.telefono}</td>
                        <td>${obj_users.correo_user}</td>
                        <td>${obj_users.puesto}</td>
                        <td><div class="spinner-grow text-${obj_users.estatus == 1 ? "success":"secondary"}" role="status"><span class="sr-only"></span></div>${obj_users.estatus == 1 ? " Activa":" Inactiva"}</td>
                        <td>
                        <div class="dropdown" value_estatus="${obj_users.estatus}">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Opciones
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <a href="user-edit.php?id=${obj_users.no_empleado}"><button id="btn-edit${obj_users.no_empleado} "class="user-edit  dropdown-item" type="button">Editar</button></a>
                                <button id="btn-reset${obj_users.no_empleado} "class="user-reset dropdown-item" type="button">Retablecer Contraseña</button>
                                <button id="btn-block${obj_users.no_empleado} "class="user-dell dropdown-item" type="button btn btn-danger">${obj_users.estatus == 1 ? "Bloquear":"Activar"}</button>
                                <button id="btn-delete${obj_users.no_empleado} "class="user-delete dropdown-item bg-alert" type="button">Eliminar</button>
                            </div>
                          </div>
                        </td>
                    </tr>
                    `
                }
            );
            if (obj_users.length <10) {
                if (obj_users.length>0) {
                    template_page += `
                    <nav aria-label="Page navigation example">
                    <ul  class="pagination justify-content-center">

                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item disabled">
                    <a class="page-link" href="#">Siguiente</a>
                    </li>
                  </ul>
                  </nav>  
                    `;
                    
                }
                else{
                    template_page += `
                    <div class="container py-3">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Oops! Sin usuarios</strong> Aun no hay Usuarios, agrega uno.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                  </div>
                    `;
                }
                $('#paginator').html(template_page);
            }
            //Selecciono el elemento donde voy a pintar el template
            $('#contador-rows').html("Encontramos "+obj_users.length+" usuarios en el sistema");
            $('#users').html(template);
            }
        });
        //-------------- AJAX pedira la info de los datos
    }

    function getOnlyUser() 
    {
        //-------------- AJAX pedira la info de los datos se ejecuta cuando entra inicio
        $.ajax({
            url: '../control/users-list.php',
            type: 'POST',
            data: {id: $('#user-id').val()},
            success: function (response) {
            //COnvertimos el string a JSON
                try {
                    let obj_users = JSON.parse(response);
                    console.log(obj_users);
                    let obj = obj_users[0];
                    $("#nombre_user").val(obj.nombre);
                    $("#apaterno_user").val(obj.apaterno);
                    $("#amaterno_user").val(obj.amaterno);
                    $("#telefono_user").val(obj.telefono);
                    $("#celular_user").val(obj.celular);
                    $("#correo_user").val(obj.correo_user);
                    $("#sexo_user").val(obj.sexo);
                    const event = new Date(Date.parse(obj.fecha_registro));
                    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                    $('#fecha').html(event.toLocaleDateString(undefined, options)+" "+event.toLocaleTimeString('en-US'));
                    $("#puesto_user").val(obj.puesto);
                    $("#acceso_user").val(obj.nivel_acceso);
                    $("#estatus").val(obj.estatus);
                } catch (error) {
                    window.history.back();
                }

            }
        });
    }

        //Tratamos de valodar al usuario (solo cuando cargamos modal)
    try {
        $("#form-add-user").validate({
            event: "blur",rules: {
                'nombre_user': "required",
                'apaterno_user': "required",
                'amaterno_user': "required",
                'telefono_user': "required",
                'correo_user': "required",
                'puesto_user': "required"
            },
            messages: {
                'nombre_user': "Por favor indica tu nombre",
                'apaterno_user': "Por favor, indica una apellido paterno",
                'amaterno_user': "Por favor, indica tu apellido materno",
                'telefono_user': "Escriba un numero de teléfono",
                'correo_user': "Es necesario el correo",
                'puesto_user': "Escriba el puesto del usuario"
            },
            debug: true,errorElement: "label",
            submitHandler: function(form){
                $("#alerta").show();
                $("#alerta").html("<img src='../assets/img/loading.gif' class='loading_save'/><strong>Guardando información...</strong>");
                setTimeout(function() {
                    $('#alerta').fadeOut('slow');
                }, 5000);
                // ----- AJAX send php response
                $.ajax({
                    type: "POST",
                    url:"../control/users-add.php",
                    data: {
                            nombre_user: $('#nombre_user').val(),
                            apaterno_user: $('#apaterno_user').val(),
                            amaterno_user: $('#amaterno_user').val(),
                            telefono_user: $('#telefono_user').val(),
                            celular_user: $('#celular_user').val(),
                            correo_user: $('#correo_user').val(),
                            puesto_user: $('#puesto_user').val(),
                            sexo_user: $('#sexo_user').val(),
                            acceso_user: $('#acceso_user').val(),
                            estatus_user:'1',
                            accion: 1
                        }, 
                    success: function(msg){
                        $("#alerta").html(msg);
                        setTimeout(function() {
                            $('#alerta').fadeOut('slow');
                        }, 3000);
                        getAllUsers();
                    }
                });
                $('#form-add-user').trigger('reset');
            }
        });
        } catch (error) {
            
        }
    
    try {
        $("#form-update-user").validate({
            event: "blur",rules: {
                'nombre_user': "required",
                'apaterno_user': "required",
                'amaterno_user': "required",
                'telefono_user': "required",
                'correo_user': "required",
                'puesto_user': "required"
            },
            messages: {
                'nombre_user': "Por favor indica tu nombre",
                'apaterno_user': "Por favor, indica una apellido",
                'amaterno_user': "Por favor, indica tu apellido materno",
                'telefono_user': "Escriba un numero de teléfono",
                'correo_user': "Es necesario el correo",
                'puesto_user': "Escriba el puesto del usuario"
            },
            debug: true,errorElement: "label",
            submitHandler: function(form){
                $("#alerta").show();
                $("#alerta").html("<img src='../assets/img/loading.gif' class='loading_save'/><strong>Guardando información...</strong>");
                setTimeout(function() {
                    $('#alerta').fadeOut('slow');
                }, 5000);
                // ----- AJAX send php response
                $.ajax({
                    type: "POST",
                    url:"../control/users-add.php",
                    data: {
                            id: $('#user-id').val(),
                            nombre_user: $('#nombre_user').val(),
                            apaterno_user: $('#apaterno_user').val(),
                            amaterno_user: $('#amaterno_user').val(),
                            telefono_user: $('#telefono_user').val(),
                            celular_user: $('#celular_user').val(),
                            correo_user: $('#correo_user').val(),
                            puesto_user: $('#puesto_user').val(),
                            sexo_user: $('#sexo_user').val(),
                            acceso_user: $('#acceso_user').val(),
                            estatus_user: $('#estatus').val(),
                            accion: 0
                        }, 
                    success: function(msg){
                        $("#alerta").html(msg);
                        setTimeout(function() {
                            $('#alerta').fadeOut('slow');
                        }, 3000);
                    }
                });
                //regresar a la anterior pagina
                return false;
            }
        });
    } catch (error) {
        
    }
    
///Acciones con los elementos

$(document).on('click','.user-delete',function () 
{
    //eliminar cuando confirme
    if (confirm('¿Esta seguro que desea eliminar al usuario? Ya no se podrá activar la cuenta posteriormente.')) {
        let element = $(this)[0].parentElement.parentElement.parentElement.parentElement;
        let ele_estatus =$(this)[0].parentElement.parentElement;
        let id = $(element).attr('user_id');
        let estatus_val = $(ele_estatus).attr('value_estatus');
        $.post('../control/user-delete.php',{id,estatus_val}, function (response) {
            console.log(response);
            getAllUsers();
        });
    }
});

    $(document).on('click','.user-dell',function () 
    {
        //eliminar cuando confirme
        if (confirm('¿Esta seguro que desea cambiar el estado del usuario?')) {
            let element = $(this)[0].parentElement.parentElement.parentElement.parentElement;
            let ele_estatus =$(this)[0].parentElement.parentElement;
            let id = $(element).attr('user_id');
            let estatus_val = $(ele_estatus).attr('value_estatus');
            $.post('../control/user-update-estatus.php',{id,estatus_val}, function (response) {
                console.log(response);
                getAllUsers();
            });
        }
    });

    $(document).on('click','.user-reset',function () 
    {
        //eliminar cuando confirme
        if (confirm('¿Esta seguro que desea restablecer la contraseña del usuario?')) {
            let element = $(this)[0].parentElement.parentElement.parentElement.parentElement;
            let id = $(element).attr('user_id');
            $.post('../control/user-reset-pw.php',{id}, function (response) {
                alert(response);
            });
        }
    });

 });
