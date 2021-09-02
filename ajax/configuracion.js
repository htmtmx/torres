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
                 <tr>
                    <th scope="row" idCaracteristica="${caracteristica.id_detalle}">
                        ${contador}
                    </th>
                    <td>
                        ${caracteristica.nombre}
                    </td>
                    <td>
                        <button type="button" class="btn btn-white" onclick="editaCaracteristica(${caracteristica.id_detalle},'${caracteristica.nombre}');">
                            <i class="fas fa-edit text-green"></i>
                        </button>
                        <button type="button" class="btn btn-danger ">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
               `;
            });
        $("#tblCaracteristicas").html(template);
        },
    });
}

function editaCaracteristica(id_detalle,nombreDetalle){
    $("#addDetalles").modal('show');
    $("#idDetalles").val(id_detalle);
    $("#nombreCaracteristica").val(nombreDetalle);
}

function limpiaModalCaracteristicas(){
    $("#idDetalles").val(0);
    $("#nombreCaracteristica").val("");
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
                 <tr>
                    <th scope="row" idModelo="${modelo.id_modelo}">
                        ${modelo.nombremarca}
                    </th>
                    <td>
                        ${modelo.nombre}
                    </td>
                    <td>
                        <button type="button" class="btn btn-white" onclick="editaModelo(${modelo.id_modelo},'${modelo.nombre}');">
                            <i class="fas fa-edit text-green"></i>
                        </button>
                        <button type="button" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
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
    } else console.log("Hay un error interno");
});
function editaModelo(id_modelo,nombre){
    $("#idmodelo").val(id_modelo);
    $("#nombreModelo").val(nombre);
    $("#modal_ConfigModelo").modal('show');
}

function limpiaModalModelo(){
    $("#idmodelo").val(0);
    $("#nombreModelo").val("");
}
/******* CONFIGURA TIPOS DE ARCHIVO ****/
function configTiposArchivo(){
    $.ajax({
        url: "../webhook/list-tipo_archivo.php",
        success: function (response)
        {
            let archivos= JSON.parse(response);
            console.log(archivos);
            let template="";
            let contador=0;
            let estado="";
            archivos.forEach((archivo)=>{
                estado = archivo.prioridad<1?`<i class="fas fa-car text-purple"></i>`: ` <i class="fas fa-file-contract text-pink"> </i>`;
                contador++;
                template+=`
                     <tr>
                        <th scope="row" idArchivo="${archivo.id_tipo_archivo}">
                            ${contador}
                        </th>
                        <td>
                           ${estado} ${archivo.nombre}
                        </td>
                        <td>
                            <button type="button" class="btn btn-white" onclick="editaArchivo(${archivo.id_tipo_archivo},'${archivo.nombre}')">
                                <i class="fas fa-edit text-green"></i>
                            </button>
                            <button type="button" class="btn btn-danger ">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
               `;
            });
            $("#tblDocumentosType").html(template);
        },
    });
}

function editaArchivo(noArchivo,nombreArchivo){
    $("#idTipoArchivo").val(noArchivo);
    $("#nombreDetalle").val(nombreArchivo);
    $("#modal_ConfigTipoArchivo").modal('show');
}

function limpiaModalTipoArchivo(){
    $("#idTipoArchivo").val(0);
    $("#nombreDetalle").val("");
}