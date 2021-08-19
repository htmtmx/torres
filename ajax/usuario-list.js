$(document).ready(function(){
    getAllUsers();
});


function getAllUsers()
{
    //-------------- AJAX pedira la info de los datos se ejecuta cuando entra inicio
    $.ajax({
        url: '../webhook/users-list.php',
        type: 'POST',
        data: {id: '0'},
        success: function (response) {
            //COnvertimos el string a JSON
            let obj_users = JSON.parse(response);
            console.log(obj_users);

            //Utilizamos los objetos a y los tratamos en una plantilla en tbody
            let template ='';
            let obj= obj_users[0];
            let contacto="";
            contacto += `<li><i class="fas fa-phone"></i>`+obj.telefono+`</li>`;
            contacto += obj.celular.length> 0 ? ` <li><i class="fas fa-mobile-alt"></i>`+obj.celular+`</li>`: "";
            contacto += obj.correo_user.length>0 ? `<li><i class="far fa-envelope"></i> <a class="" href="mailto:${obj.correo_user}">${obj.correo_user}</a></li>`: "";
            let sexo= obj>0 ? "Mujer": "Hombre";
            let nivelAcceso= obj>0 ? "Vendedor": "Administrador";
            let estatus= obj.estatus>0 ? ``: `data-label-off="Inactivo"`;
            let cont = 0;
            obj_users.forEach(
                obj_users => {
                    cont ++;
                    template += `
                    <tr idEmpleado="${obj_users.no_empleado}">
                                <th scope="row">
                                    ${obj_users.no_empleado}
                                </th>
                                <td><i class="fas fa-user-tie"></i>
                                    ${obj_users.nombre+" "+obj_users.apaterno+" "+obj_users.amaterno}
                                    <span class="badge badge-success">Activo</span>
                                </td>
                                <td>
                                    ${contacto}
                                </td>
                                <td>
                                    ${sexo}
                                </td>
                                <td>
                                    ${obj_users.fecha_registro}
                                </td>
                                <td>
                                    <button class="btn btn-icon btn-secondary" type="button" data-toggle="modal" data-target="#cuentaUser">
                                        <span class="btn-inner--icon"><i class="fas fa-edit text-green"></i>${obj_users.puesto}</span>
                                    </button>

                                </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#cuentaUser">
                                        <i class="fas fa-edit text-green"></i> ${nivelAcceso}
                                    </button>
                                </td>
                                <td>
                                    <label class="custom-toggle">
                                        <input type="checkbox" ${obj_users.estatus>0 ? "checked": ""}>
                                        <span class="custom-toggle-slider rounded-circle" data-label-off="Inactivo" data-label-on="Activo"></span>
                                    </label>
                                </td>
                                <td>
                                    <button class="btn btn-icon btn-secondary" type="button">
                                        <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                                    </button>
                                </td>
                            </tr>
                    `
                }
            );
            //Selecciono el elemento donde voy a pintar el template
            $('#tbl-clientes').html(template);
        }
    });
    //-------------- AJAX pedira la info de los datos
}