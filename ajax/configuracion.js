let PRIMER_MARCA;
$(document).ready(function(){
    consultaInfoEmpresa();
    configCaracteristicas();
    getMarcas();
    configTiposArchivo();
});
/*** INFORMACION DE LA EMPRESA ***/
function consultaInfoEmpresa() {
    $.ajax({
        url: "../webhook/bussiness-info.php",
        success: function (response)
        {
            let obj_result = JSON.parse(response);
            let emp = obj_result[0];
            $("#calleEmpresa").val(emp.calle);
            $("#empresaE").html(emp.nombre);
            $("#idEmpresa").val(emp.id_empresa);
            $("#nombreEmpresa").val(emp.nombre);
            $("#rfcEmpresa").val(emp.rfc);
            $("#noExtEmp").val(emp.no_ext);
            $("#noIntEmp").val(emp.no_int);
            $("#coloniaEmpr").val(emp.colonia);
            $("#cpEmpr").val(emp.cp);
            $("#estadoEmp").val(emp.estado);
            $("#telEmpr").val(emp.telefono);
            $("#correoEmp").val(emp.correo);
            $("#webEmpr").val(emp.sitio_web);
            $("#municipio").val(emp.de_mun);
            $("#dateEmpr").val(emp.date_incorp);
            $("#version").val(emp.version);
            $("#clavLic").val(emp.licencia);

        },
    });
}

/*** TABLA CARACTERISTICAS DEL CARRO ***/
function configCaracteristicas(){
    $.ajax({
        url: "../webhook/consulta-detalles.php",
        type: "POST",
        data: { idDetalle:0},
        success: function (response)
        {
            let caracteristicas= JSON.parse(response);
            let template="";
            let contador=0;
            caracteristicas.forEach((caracteristica)=>{
                contador++;
               template+=`
                 <tr idCaracteristica="${caracteristica.id_detalle}">
                    <th scope="row" idCaracteristica="${caracteristica.id_detalle}">
                        ${contador}
                    </th>
                    <td>
                        ${caracteristica.nombre}
                    </td>
                    <td>
                        <button type="button" class="btn btn-white" onclick="editaCaracteristica(${caracteristica.id_detalle},'${caracteristica.nombre}','${caracteristica.categoria}','${caracteristica.visible}','${caracteristica.oblogatorio}');">
                            <i class="fas fa-edit text-green"></i>
                        </button>
                        <button class="btn btn-icon btn-secondary btnEliminarCaracteristica" type="button">
                                        <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                            </button>
                    </td>
                </tr>
               `;
            });
        $("#tblCaracteristicas").html(template);
        },
    });
}

function editaCaracteristica(id_detalle,nombreDetalle,categoria,visible,obligatorio){
    $("#addDetalles").modal('show');
    $("#idDetalles").val(id_detalle);
    $("#nombreCaracteristica").val(nombreDetalle);
    $("#catCarac").val(categoria);
    $("#visibilidadCarac").val(visible);
    $("#obligCarac").val(obligatorio);
}

function limpiaModalCaracteristicas(){
    $("#idDetalles").val(0);
    $("#nombreCaracteristica").val("");
    $("#catCarac").val(0);
    $("#visibilidadCarac").val(0);
    $("#obligCarac").val(0);
}

//CESAR HAZIEL

$("#frm-add-edit-detalle").on("submit", function(e){
    var formData = new FormData(document.getElementById("frm-add-edit-detalle"));
    formData.append("dato", "valor");
    //formData.append(f.attr("name"), $(this)[0].files[0]);
    $.ajax({
        url: "../webhook/add-edit-caracteristica.php",
        type: "POST",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response)
        {
            let template =  `<div class="alert alert-success alert-dismissible fade show" role="alert">
                                ${response}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            `;
            $("#mensajeAddEditDetalle").html(template);
            configCaracteristicas();
            $("#addDetalles").modal('hide');
            limpiaModalCaracteristicas();
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 1000);
        },
    })
    //$('#modal_ConfigTipoArchivo').modal('hide');
    e.preventDefault();
});

$(document).on("click", ".btnEliminarCaracteristica", function () {
    let titulo= "Eliminar Caracteristica";
    let texto= "¿Esta seguro de que desea eliminar esta Caracteristica?";
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
            let elementDetalle = $(this)[0].parentElement.parentElement;
            let idDetalle = $(elementDetalle).attr("idCaracteristica");
            eliminaCaracteristica(idDetalle);
        }
    });
});

function eliminaCaracteristica(idDetalle) {
    $.ajax({
        url: "../webhook/detalle-delete.php",
        type: 'POST',
        data: {
            idDetalle: idDetalle,
        },
        success: function (mje) {
            alertaEmergente(mje);
            configCaracteristicas();
        }
    });
}
/*** CONFIGURACION PARA MARCAS Y MODELOS ***/

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
            let contador = 0;
            obj_result.forEach((obj_result) =>
                {
                    template += `<option value="${obj_result.id_marca}">${obj_result.nombre}</option>`;
                    if (contador==0) {PRIMER_MARCA = obj_result.id_marca;}
                    contador++;
                }
            );
            $("#marcas").html(template);
            $("#marcaModelo").html(template);
            getModelos(PRIMER_MARCA);
        },
    });
}

function getModelos(id_marca) {
    $.ajax({
        url: "../webhook/modelos-list.php",
        data: {id : id_marca},
        type: "POST",
        success: function (response) {
            let modelos = JSON.parse(response);
            let template="";
            let contador=0;
        modelos.forEach((modelo)=>{
            contador++;
            template+=`
                 <tr idModelo="${modelo.id_modelo}" idMarca="${id_marca}">
                    <th scope="row" idModelo="${modelo.id_modelo}">
                        ${modelo.nombremarca}
                    </th>
                    <td>
                        ${modelo.nombre}
                    </td>
                    <td>
                        <button type="button" class="btn btn-white" onclick="editaModelo(${modelo.id_modelo},'${modelo.nombre}','${modelo.id_marca_fk}');">
                            <i class="fas fa-edit text-green"></i>
                        </button>
                        <button class="btn btn-icon btn-secondary btnEliminarModel" type="button">
                            <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                        </button>
                    </td>
                </tr>
               `;
        });
        $("#tblModelosType").html(template);
        }
    });
}


$("#marcas").change(function ()
{
    var marcaSelected = $(this);
    var id = marcaSelected.val();
    if (id != '') {
        getModelos(id);
    }
});
function editaModelo(id_modelo,nombre,marca){
    $("#idmodelo").val(id_modelo);
    var id = $("#marcas").val();
    $("#marcaModelo").val(id);
    $("#idmarca").val(marca);
    $("#nombreModelo").val(nombre);
    $("#modal_ConfigModelo").modal('show');
}

function limpiaModalModelo(){
    $("#idmodelo").val(0);
    $("#nombreModelo").val("");
    $("#marcaModelo").val(0);
}
$("#frm-add-edit-model").on("submit", function(e){
    var formData = new FormData(document.getElementById("frm-add-edit-model"));
    formData.append("dato", "valor");
    //formData.append(f.attr("name"), $(this)[0].files[0]);
    $.ajax({
        url: "../webhook/add-edit-model.php",
        type: "POST",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response)
        {
            let template =  `<div class="alert alert-success alert-dismissible fade show" role="alert">
                                ${response}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            `;
            $("#mensajeAddEditModelo").html(template);
            getModelos($("#marcas").val());
            limpiaModalModelo();
            $("#modal_ConfigModelo").modal('hide');
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 1000);

        },
    })
    //$('#modal_ConfigTipoArchivo').modal('hide');
    e.preventDefault();
});

$(document).on("click", ".btnEliminarModel", function () {
    let titulo= "Eliminar Modelo";
    let texto= "¿Esta seguro de que desea eliminar este Modelo?";
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
            let elementModelo = $(this)[0].parentElement.parentElement;
            let idModelo = $(elementModelo).attr("idmodelo");
            let idMarca = $(elementModelo).attr("idmarca");
            eliminaModelo(idModelo,idMarca);
        }
    });
});

function eliminaModelo(idModelo,idMarca) {
    $.ajax({
        url: "../webhook/modelDelete.php",
        type: 'POST',
        data: {
            idModelo: idModelo,
        },
        success: function (mje) {
            alertaEmergente(mje);
            getModelos(idMarca);
        }
    });
}
/******* CONFIGURA TIPOS DE ARCHIVO ****/
function configTiposArchivo(){
    $.ajax({
        url: "../webhook/list-tipo_archivo.php",
        success: function (response)
        {
            let archivos= JSON.parse(response);
            let template="";
            let contador=0;
            let estado="";
            archivos.forEach((archivo)=>{
                estado = archivo.tipo_Archivo<1?`<i class="fas fa-car fa-2x" style="color:blue"></i>`: ` <i class="far fa-file-pdf fa-2x" style="color:red"></i>`;
                contador++;
                template+=`
                     <tr idArchivo="${archivo.id_tipo_archivo}">
                        <th scope="row" idArchivo="${archivo.id_tipo_archivo}">
                            ${contador}
                        </th>
                        <td>
                           ${estado} ${archivo.nombre}
                        </td>
                        <td>
                            <button type="button" class="btn btn-white" onclick="editaArchivo(${archivo.id_tipo_archivo},'${archivo.nombre}','${archivo.prioridad}','${archivo.tipo_Archivo}')">
                                <i class="fas fa-edit text-green"></i>
                            </button>
                            <button class="btn btn-icon btn-secondary btnEliminarTipoArchivo" type="button">
                                        <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                            </button>
                        </td>
                    </tr>
               `;
            });
            $("#tblDocumentosType").html(template);
        },
    });
}

function editaArchivo(noArchivo,nombreArchivo,prioridad,tipoArchivo){
    $("#idTipoArchivo").val(noArchivo);
    $("#nombreTipoArchivo").val(nombreArchivo);
    $("#prioridadTipoArch").val(prioridad);
    $("#selectTipoArch").val(tipoArchivo);
    $("#modal_ConfigTipoArchivo").modal('show');
}

function limpiaModalTipoArchivo(){
    $("#idTipoArchivo").val(0);
    $("#nombreTipoArchivo").val("");
    $("#prioridadTipoArch").val(0);
    $("#selectTipoArch").val(0);
}

$("#frm-add-edit-tipo-archivo").on("submit", function(e){
    var formData = new FormData(document.getElementById("frm-add-edit-tipo-archivo"));
    formData.append("dato", "valor");
    //formData.append(f.attr("name"), $(this)[0].files[0]);
    $.ajax({
        url: "../webhook/add-edit-tipo-archivo.php",
        type: "POST",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response)
        {
            let template =  `<div class="alert alert-success alert-dismissible fade show" role="alert">
                                ${response}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            `;
            $("#mensajeAddEditArchivo").html(template);
            configTiposArchivo();
            limpiaModalTipoArchivo();
            $('#modal_ConfigTipoArchivo').modal('hide');
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 1000);
        },
    })
    e.preventDefault();
});

$(document).on("click", ".btnEliminarTipoArchivo", function () {
    let titulo= "Eliminar Tipo de archivo";
    let texto= "¿Esta seguro de que desea eliminar este Tipo de archivo?";
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
            let elementTipoArchivo = $(this)[0].parentElement.parentElement;
            let idArchivo = $(elementTipoArchivo).attr("idArchivo");
            eliminaTipoArchivo(idArchivo);
        }
    });
});

function eliminaTipoArchivo(idArchivo) {
    $.ajax({
        url: "../webhook/tipoArchivoDelete.php",
        type: 'POST',
        data: {
            idArchivo: idArchivo,
        },
        success: function (mje) {
            alertaEmergente(mje);
            configTiposArchivo();
        }
    });
}