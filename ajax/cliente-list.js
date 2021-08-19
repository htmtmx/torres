$(document).ready(function(){
    consultaClientes();
});

function consultaClientes(){
    $.ajax({
        url: "../webhook/client-list.php",
        type: "POST",
        data: { id: "0" },
        success: function (response)
        {
            //COnvertimos el string a JSON
            let obj_result = JSON.parse(response);
            //Utilizamos los objetos a y los tratamos en una plantilla en tbody
            let template = "";
            let cont = 0;
            /*console.log(response);
            console.log("******************");
            console.log(obj_result);*/
            obj_result.forEach((obj_result) => {
                cont++;
                let contacto="";
                contacto += `<li><i class="fas fa-phone"></i>`+obj_result.telefono+`</li>`;
                contacto += obj_result.celular.length>0 ? ` <li><i class="fas fa-mobile-alt"></i>`+obj_result.celular+`</li>`: "";
                contacto += obj_result.correo.length>0 ? ` <li><i class="far fa-envelope"></i>`+obj_result.correo+`</li>`: "";
                let detalles ="";
                detalles += obj_result.empresa.length>0 ? obj_result.empresa: "";
                detalles += obj_result.rfc.length>0 ? ` (`+obj_result.rfc+`)`: "";
                let estatus="";
                estatus = obj_result.estatus>0? `<span class="badge badge-success">Activo</span>`: `<span class="badge badge-warning">Suspendida</span>`;
                template += `
                <tr idCliente="${obj_result.no_cliente}">
                                <th scope="row">
                                    ${cont}
                                </th>
                                <td>
                                    ${obj_result.no_cliente}
                                </td>
                                <td>
                                    ${obj_result.nombre+" "+obj_result.apaterno+" "+obj_result.amaterno}
                                    ${estatus}
                                </td>
                                <td>
                                    <ul>
                                        ${contacto}
                                    </ul>
                                </td>
                                <td>
                                     ${detalles}
                                </td>
                                <td>
                                    ${obj_result.fecha_registro}
                                </td>
                                <td>
                                    <div class="dropdown show">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Acciones
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="./detalles-cliente.php?idCliente=${obj_result.no_cliente}"><i class="fas fa-eye text-blue"></i> Ver Detalles</a>
                                            <a class="dropdown-item" href="#"><i class="fas fa-hand-holding-usd text-green"></i> Suspender</a>
                                            <a class="dropdown-item" href="#"><i class="fas fa-cloud-upload-alt text-orange"></i> Eliminar</a>
                                            <a class="dropdown-item" href="#"><i class="fas fa-times text-red"></i> Cancelar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>`;
            });
            $("#tbl-clientes").html(template);
        },
    });
}