let PRIMER_MARCA;
$(document).ready(function(){
    consultaDetalles();
});

window.onload = function() {
    getMarcas();
    cargaPersonas();
};

function consultaDetalles() {
    $.ajax({
        url: "../webhook/consulta-detalles-inventario-ingreso.php",
        type: "POST",
        success: function (response)
        {
            let obj_result = JSON.parse(response);
            let detalles = construyeSelectDetalles(obj_result);
            $("#detalleBox").html(detalles);
        },
    });
}

function construyeSelectDetalles(detalles){
    let template="";
    detalles.forEach((detalle)=>{
        template+=`
               <div class="col-xl-2 col-md-4">
                    <div class="form-group d-inline-flex">
                        <label class="form-control-label" for="observaciones">${detalle.nombre}: </label>
                        <label class="custom-toggle">
                            <input type="checkbox" value="${detalle.id_detalle}" name="detalles[]">
                            <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Si"></span>
                        </label>
                    </div>
                </div>
        `;
    });
    return template;
}


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
            let contador = 0;
            obj_result.forEach((obj_result) =>
                {
                    template += `<option value="${obj_result.id_marca}">${obj_result.nombre}</option>`;
                    if (contador==0) {PRIMER_MARCA = obj_result.id_marca;}
                    contador++;
                }
            );
            $("#marcaCoche").html(template);
            $("#marcasCoche").html(template);
            getModelos(PRIMER_MARCA);
        },
    });
}
$("#frm-add-modelo").on("submit", function(e){
    //let tipocontrato = $('input[name="contrato"]:checked').val();
    var f = $(this);
    var formData = new FormData(document.getElementById("frm-add-modelo"));
    formData.append("dato", "valor");
    //formData.append(f.attr("name"), $(this)[0].files[0]);
    $.ajax({
        url: "../webhook/add-modelo.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function(res){
        $("#frm-add-modelo").trigger('reset');
        $("#modaladdmodelo").modal('hide');
        getMarcas();
        });
    e.preventDefault();
});


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
            let mje = JSON.parse(res);
            alertaEmergente(mje.Mensaje);
            let plantilla = `
                        <a href="./detalles-coche.php?idCoche=${mje.idCoche}">
                            <button type="button" class="btn btn-primary"><i class="fas fa-print"></i> Ver Vehiculo</button>
                        </a>
                        <a href="./responsiva.php?noVechiculo=${mje.idCoche}&amp;consult=false" target="_blank">
                            <button type="button" class="btn btn-primary"><i class="fas fa-print"></i> Carta Responsiva</button>
                        </a>
            `;
            $("#botonesContrato").html(plantilla);
        $('#msform').trigger('reset');
        });
    e.preventDefault();
});


