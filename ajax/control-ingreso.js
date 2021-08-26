const PERSONAS = [];
$(document).ready(function(){
    getMarcas();
    cargaPersonas();
});

window.onload = function() {

    getModelos(2);
};


/***************FUNCIONES PARA OBTENER MARCAS Y MODELOS ******************/
function getMarcas() {
    //-------------- AJAX pedira la info de los datos se ejecuta cuando entra inicio
    $.ajax({
        url: "../webhook/marcas-list.php",
        type: "POST",
        success: function (response)
        {
            //COnvertimos el string a JSON
            let obj_result = JSON.parse(response);
            //Utilizamos los objetos a y los tratamos en una plantilla en tbody
            let template = "";
            obj_result.forEach((obj_result) =>
                {
                    template += `<option value="${obj_result.id_marca}">${obj_result.nombre}</option>`;
                }
            );
            $("#marcaCoche").html(template);
        },
    });
}

try {
    function getModelos(id_marca) {
        var modelo = $("#id_modelo_fk");
        $.ajax({
            url: "../webhook/modelos-list.php",
            data: {id : id_marca},
            type: "POST",
            beforeSend:function () {
                modelo.prop('disabled',false);
            },
            success: function (response) {
                let obj_result = JSON.parse(response);
                console.log(obj_result);
                let template = "";
                obj_result.forEach((obj_result) =>
                {
                    template += `<option value="${obj_result.id_modelo}">${obj_result.nombre}</option> `;
                });
                $("#id_modelo_fk").html(template);
            }
        });
    }
}catch (e) {

}

$("#marcaCoche").change(function ()
{
    var marcaSelected = $(this);
    var id = marcaSelected.val();
    if (id != '') {
        getModelos(id);
    } else {
        var modelo = $("#modeloCoche");
        alert("No selecciono ningun elemento");
        modelo.find('option').remove();
    }
});

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
    $('#buscaClienteModal').modal('hide')
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
                            <button type="button" class="btn btn-primary" onclick="seleccionaCliente(${persona.no_cliente});">Seleccionar</button>
                        </td>
                    </tr>
                `;
            });
            $("#tbl-clientes").html(template);
        },
    });
}





/******** FUNCION DE CALCULO PARA SUBTOTAL ******/
$("#total").change(function ()
{
    var total = parseInt($("#total").val())
    var iva = total * .16;
    var subtotal = total - iva;
    $("#subtotal_coche").val(subtotal);
    $("#iva_coche").val(iva);
});

/*********************
 * SUBMIT PARA ENVIAR POR APPEND A ADDCONTRATOCOMPRA.PHP
 * ***************************/
$("#msform").on("submit", function(e){
    //let tipocontrato = $('input[name="contrato"]:checked').val();
    var f = $(this);
    var formData = new FormData(document.getElementById("msform"));
    formData.append("dato", "valor");
    //formData.append(f.attr("name"), $(this)[0].files[0]);
    $.ajax({
        url: "../webhook/addContratoCompra.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function(res){
            console.log(res);
        $('#msform').trigger('reset');
        });
    e.preventDefault();
});


//FUNCIONES PARA BUSCADOR Y BOTONES SIGUIENTE Y ANTERIOR
$("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tbl-clientes tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});

