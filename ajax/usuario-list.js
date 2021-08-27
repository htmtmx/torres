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
            let usuarios = JSON.parse(response);
            console.log(usuarios);

            //Utilizamos los objetos a y los tratamos en una plantilla en tbody
            let template ='';
            let contacto="";
            let cont = 0;
            usuarios.forEach((usuario)=>{
                let nivelAcceso="";
                switch (usuario.nivel_acceso) {
                    case "0":
                        nivelAcceso+="Super usuario";
                        break;
                    case "1":
                        nivelAcceso+="Administrador";
                        break;
                    case "2":
                        nivelAcceso+="Vendedor";
                        break;

                }
                contacto = `<li><i class="fas fa-phone"></i>`+usuario.telefono+`</li>`;
                contacto += usuario.celular.length> 0 ? ` <li><i class="fas fa-mobile-alt"></i>`+usuario.celular+`</li>`: "";
                contacto += usuario.correo_user.length>0 ? `<li><i class="far fa-envelope"></i> <a class="" href="mailto:${usuario.correo_user}">${usuario.correo_user}</a></li>`: "";
                let sexo= usuario.sexo>0 ? "Mujer": "Hombre";
                let estado= usuario.estatus>0 ? ``: `data-label-off="Inactivo"`;
                let estatus= usuario.estatus>0 ? `<span class="badge badge-success">Activo</span>`: `<span class="badge badge-danger">Inactivo</span>`;
                template += `
                             <tr idUsuario="${usuario.no_empleado}">
                                <th scope="row">
                                    ${usuario.no_empleado}
                                </th>
                                <td><i class="fas fa-user-tie"></i>
                                    ${usuario.nombre+" "+usuario.apaterno+" "+usuario.amaterno}
                                    ${estatus}
                                </td>
                                <td>
                                    <ul>
                                        ${contacto}
                                    </ul>
                                </td>
                                <td>
                                    ${sexo}
                                </td>
                                <td>
                                    ${usuario.fecha_registro}
                                </td>
                                <td>
                                    <button class="btn btn-icon btn-secondary" type="button" data-toggle="modal" data-target="#cuentaUser">
                                        <span class="btn-inner--icon"><i class="fas fa-edit text-green"></i>  ${usuario.puesto}</span>
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
                                        <input type="checkbox"${usuario.estatus>0 ? "checked": ""}>
                                        <span class="custom-toggle-slider rounded-circle" data-label-off="Inactivo" data-label-on="Activo"></span>
                                    </label>
                                </td>
                                <td>
                                    <button class="btn btn-icon btn-secondary" type="button">
                                        <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                                    </button>
                                </td>
                            </tr>
                    `;
            });
            //Selecciono el elemento donde voy a pintar el template
            $('#tbl-usuarios').html(template);
        }
    });
    //-------------- AJAX pedira la info de los datos
}