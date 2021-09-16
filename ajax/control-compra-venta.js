const PERSONAS = [];
const COCHES    = [];

/******** FUNCION PARA TRAER PINTAR TABLA DE COCHES DISPONIBLES PARA VENDER ******/

function consultaCochesVenta(){
    $.ajax({
        url: "../webhook/cars-list.php",
        type: "POST",
        data: { idCoche: 0 ,
            details: 1,
            estatus:0
        },
        success: function (response)
        {
            //COnvertimos el string a JSON
            let coches = JSON.parse(response);
            console.log(coches);
            $("#tbl-coches-venta").html(construyeTablaCochesVenta(coches));

        },
    });
}

function construyeTablaCochesVenta(coches){
    let template="";
    let contador=0;
        coches.forEach((coche)=> {
            COCHES.push(coche);
            contador ++;
            template +=`
                        <tr idcoche="${coche.no_vehiculo}">
                            <th scope="row">
                                ${contador}
                            </th>
                            <td>
                                <a class="nav-link" href="./detalles-coche.php?idCoche=${coche.no_vehiculo}">
                                    ${coche.placa}
                                </a>
                            </td>
                            <td>
                                ${coche.marca_coche+" "+ coche.modelo_coche+" "+coche.anio}
                            </td>
                            <td>
                                <div class="h6 font-weight-300"> <strong class="heading">
                                      <i class="fas fa-dollar-sign text-green"></i> ${coche.precio_contado}</strong>
                                </div> 
                                <div class="h6 font-weight-300"><strong class="heading">
                                      <i class="fas fa-credit-card"></i> ${coche.precio_credito}</strong> 
                                </div>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary" onclick="seleccionaCoche(${coche.no_vehiculo});">Seleccionar</button>
                            </td>
                        </tr>
        `;
        });

    return template;
}
//Funcion para encontrar a un coche seleccionado
function seleccionaCoche(noCoche){
    let cocheFound;
    COCHES.forEach((tmpCoche)=>{
        if ( tmpCoche.no_vehiculo==noCoche){
            cocheFound = tmpCoche;
        }
    });
    cargaDatosCoche(cocheFound);
}

//Funcion para cargar en el HTML los valores del carro encontrado
function cargaDatosCoche(coche) {
    $("#noCoche").val(coche.no_vehiculo);
    $("#marca").val(coche.marca_coche);
    $("#id_modelo_fk").val(coche.modelo_coche);
    $("#anio").val(coche.anio);
    $("#placa").val(coche.placa);
    $("#entidad_placa").val(coche.entidad_placa);
    $("#color").val(coche.color);
    $("#kilometros").val(coche.kilometros);
    $("#transmision").val(coche.transimision);
    $("#combustible").val(coche.combustible);
    $("#no_puertas").val(coche.no_puertas);
    $("#nivCoche").val(coche.NIV);
    $("#observaciones").val(coche.observaciones);
    $("#precio_contado").val(coche.precio_contado);
    $("#precio_credito").val(coche.precio_credito);
    $('#buscaVechiculoModal').modal('hide');
}

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
    $("#no_cliente").val(0);
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
    limpiarDireccion();
}

function cargarDatosPersona(persona) {
    let dir = persona[0][0];
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
    if(persona[0].length>0){
        // DIRECCION
        $("#id_dir").val(dir.id_direccion);
        $("#calle").val(dir.calle);
        $("#noExtEmp").val(dir.no_ext);
        $("#noIntEmp").val(dir.no_int);
        $("#coloniaEmpr").val(dir.colonia);
        $("#municipio").val(dir.municipio);
        $("#cpEmpr").val(dir.CP);
        $("#estadoEmp").val(dir.estado_republica);
        $("#referencias").val(dir.referencias);
    }else {
        limpiarDireccion();
    }

}

function limpiarDireccion(){
    $("#id_dir").val(0);
    $("#calle").val("");
    $("#noExtEmp").val("");
    $("#noIntEmp").val("");
    $("#coloniaEmpr").val("");
    $("#municipio").val("");
    $("#cpEmpr").val("");
    $("#referencias").val("");
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
            $("#tbl-clientes-contratos").html(template);
        },
    });
}


$("#forma_pago").change(function(){
    var tipo_pago = document.getElementById("forma_pago").value;
    if(tipo_pago=="1"){
        $("#selectedCredito").removeClass("d-none");
    }else{
        $("#selectedCredito").addClass("d-none");
    }
});
