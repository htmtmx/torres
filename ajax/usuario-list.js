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

            //Utilizamos los objetos a y los tratamos en una plantilla en tbody
            let template ='';
            let contacto="";
            let cont = 0;
            usuarios.forEach((usuario)=>{
                let nivelAcceso="";
                nivelAcceso= usuario.nivel_acceso>0? "VENDEDOR": "ADMINISTRADOR";
                contacto = `<li><i class="fas fa-phone"></i>`+usuario.telefono+`</li>`;
                contacto += usuario.celular.length> 0 ? ` <li><i class="fas fa-mobile-alt"></i>`+usuario.celular+`</li>`: "";
                contacto += usuario.correo_user.length>0 ? `<li><i class="far fa-envelope"></i> <a class="" href="mailto:${usuario.correo_user}">${usuario.correo_user}</a></li>`: "";
                let sexo= usuario.sexo>0 ? "Mujer": "Hombre";
                let estatus= usuario.estatus>0 ? `<span class="badge badge-success">Activo</span>`: `<span class="badge badge-danger">Inactivo</span>`;
                template += `
                             <tr idUsuario="${usuario.no_empleado}" statusActual="${usuario.estatus}">
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
                                    <button class="btn btn-icon btn-secondary" type="button" data-toggle="modal" data-target="#cuentaUser" onclick="cargaDatosPuestoNv(${usuario.no_empleado},'${usuario.puesto}',${usuario.nivel_acceso})">
                                        <span class="btn-inner--icon"><i class="fas fa-edit text-green"></i>  ${usuario.puesto}</span>
                                    </button>

                                </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#cuentaUser" onclick="cargaDatosPuestoNv(${usuario.no_empleado},'${usuario.puesto}',${usuario.nivel_acceso})">
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
                                    <button class="btn btn-icon btn-secondary btnEliminarEmpleado" type="button">
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
$(document).on('change','input[type="checkbox"]' ,function(e) {
    let elementEmpleadoSelected= $(this)[0].parentElement.parentElement.parentElement;
    let idEmpleado = $(elementEmpleadoSelected).attr("idusuario");
    let estatusActual = $(elementEmpleadoSelected).attr("statusactual");
    cambiaEstadoUsuario(idEmpleado,estatusActual);
});

function cambiaEstadoUsuario(idEmpleado,estatusActual){
    $.ajax({
        url: "../webhook/user-update-estatus.php",
        type: 'POST',
        data: {
            idEmpleado: idEmpleado,
            estatusActual:estatusActual
        },
        success: function (mje) {
            getAllUsers();
        }
    });
}

$(document).on("click", ".btnEliminarEmpleado", function () {
    let titulo= "Eliminar empleado";
    let texto= "¿Esta seguro de que desea eliminar este empleado?";
    Swal.fire({
        title: titulo,
        text: texto,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si!'
    }).then((result) => {
        if (result.isConfirmed) {
            let elementEmpleado = $(this)[0].parentElement.parentElement;
            let idEmpleado = $(elementEmpleado).attr("idUsuario");
            eliminaEmpleado(idEmpleado);
        }
    });
});

function eliminaEmpleado(idEmpleado){
    $.ajax({
        url: "../webhook/user-delete.php",
        type: 'POST',
        data: {
            idEmpleado: idEmpleado,
        },
        success: function (mje) {
            alertaEmergente(mje);
            getAllUsers();
        }
    });
}

/**** FUNCIONES PARA MODALES DE NIVEL ACCESO Y PUESTO***/
function cargaDatosPuestoNv(no_empleado,puesto,nivelAcceso){
    $("#noEmpleado").val(no_empleado);
    $("#puesto").val(puesto);
    $("#nivAcce").val(nivelAcceso);
}

$("#frm-cambia-acceso-puesto").on("submit", function(e){
    //let tipocontrato = $('input[name="contrato"]:checked').val();
    var f = $(this);
    var formData = new FormData(document.getElementById("frm-cambia-acceso-puesto"));
    formData.append("dato", "valor");
    //formData.append(f.attr("name"), $(this)[0].files[0]);
    $.ajax({
        url: "../webhook/update-nivAcc-puesto.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function(res){
            getAllUsers();
            $("#frm-cambia-acceso-puesto").trigger('reset');
            $("#cuentaUser").modal('hide');
        });
    e.preventDefault();
});