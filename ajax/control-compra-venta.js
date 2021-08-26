const PERSONAS = [];

/******** FUNCION PARA TRAER Y GENERAR TABLAS DE CLIENTES ACTIVOS ******/

function seleccionaCliente(noPersona) {
    let personaFound;
    PERSONAS.forEach((tmpPersona)=>{
        if ( tmpPersona.no_cliente==noPersona){
            personaFound = tmpPersona;
        }
    });
    cargarDatosPersona(personaFound);
}

function limpiarCliente() {
    $("#fechaRegistroCliente").addClass("d-none");
    $("#no_cliente").val("");
    $("#nombre").val("");
    $("#apaterno").val("");
    $("#amaterno").val("");
    $("#correo").val("");
    $("#telefono").val("");
    $("#celular").val("");
    $("#rfcCliente").val("");
    $("#empresa").val("");
    $("#medio_identificacion_cliente").val("");
    $("#folio").val("");
    $("#tipo_cliente").val("");
    $("#fecha_registro_Cliente").val("");
    $("#nombre").focus();
}

function cargarDatosPersona(persona) {
    $("#fechaRegistroCliente").removeClass("d-none");
    $("#no_cliente").val(persona.no_cliente);
    $("#nombre").val(persona.nombre);
    $("#apaterno").val(persona.apaterno);
    $("#amaterno").val(persona.amaterno);
    $("#correo").val(persona.correo);
    $("#telefono").val(persona.telefono);
    $("#celular").val(persona.celular);
    $("#rfcCliente").val(persona.rfc);
    $("#empresa").val(persona.empresa);
    $("#medio_identificacion_cliente").val(persona.medio_identificación);
    $("#folio").val(persona.folio);
    $("#tipo_cliente").val(persona.tipo_cliente);
    $("#fecha_registro_Cliente").val(persona.fecha_registro);
    $('#buscaClienteModal').modal('hide');
}

function cargaPersonas() {
    $.ajax({
        url: "../webhook/client-list.php",
        type: "POST",
        data: { id: "0" },
        success: function (response)
        {
            //COnvertimos el string a JSON
            let personas = JSON.parse(response);
            //Utilizamos los objetos a y los tratamos en una plantilla en tbody
            let template = "";
            let cont = 0;
            personas.forEach((persona) => {
                PERSONAS.push(persona);
                cont++;
                let estatus="";
                estatus = persona.estatus>0? `<span class="badge badge-success">Activo</span>`: `<span class="badge badge-warning">Suspendida</span>`;
                template += `
                    <tr idcliente="${persona.no_cliente}">
                        <th scope="row">
                            ${cont}
                        </th>
                        <td>
                            <a class="nav-link" href="./detalles-cliente.php?idCliente=${persona.no_cliente}">
                                ${persona.no_cliente}
                            </a>
                        </td>
                        <td>
                            ${persona.nombre+" "+persona.apaterno+" "+persona.amaterno}
                            ${estatus}
                        </td>

                        <td>
                            <button type="button" class="btn btn-primary" onclick="seleccionaCliente(${persona.no_cliente});"> <i class="far fa-hand-pointer"></i> Seleccionar</button>
                        </td>
                    </tr>
                `;
            });
            $("#tbl-clientes").html(template);
        },
    });
}