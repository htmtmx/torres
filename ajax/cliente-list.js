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
                contacto += obj_result.correo.length>0 ? `<li><i class="far fa-envelope"></i> <a class="" href="mailto:${obj_result.correo}">${obj_result.correo}</a></li>`: "";
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
                                    <a class="nav-link" href="./detalles-cliente.php?idCliente=${obj_result.no_cliente}">
                                        ${obj_result.no_cliente}
                                    </a>
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
                                    <ul class="nav align-items-center ml-md-auto ">
                                        <li class="nav-item">
                                            <a class="nav-link" href="./detalles-cliente.php?idCliente=${obj_result.no_cliente}">
                                                <i class="fas fa-eye text-blue"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                <i class="fas fa-pause-circle text-yellow"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                <i class="fas fa-trash-alt text-red"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>`;
            });
            $("#tbl-clientes").html(template);
        },
    });
}