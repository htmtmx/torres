$(document).ready(function(){
    if (id_page != 1) {
        getMarcas();
        getModelos();
        getAnios();
        addCar();
    }else {

    }
});
function getMarcas() {
    //-------------- AJAX pedira la info de los datos se ejecuta cuando entra inicio
    $.ajax({
        url: "../control/marcas-list.php",
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
            $("#marcas").html(template);
        },
    });
    //-------------- AJAX pedira la info de los datos
}

try {
    function getModelos(id_marca) {
        var modelo = $("#modelos");
        $.ajax({
            url: "../control/modelos-list.php",
            data: {idMarca : id_marca},
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
                $("#modelos").html(template);
            }
        });
    }
}catch (e) {
    
}

function getAnios() {
    $.ajax({
            url:"",
            data:"",
            success: function () {
                let anioBase = 1950;
                var today = new Date();
                let yearToday = today.getFullYear();
                yearToday++;
                let template = "";
                for (i=yearToday;i>=anioBase;i--) {
                    template += `<option value="${i}">${i}</option>`;
                }
                $("#anio").html(template);
            }
        }
    )
}



$("#marcas").change(function ()
{
    var marcaSelected = $(this);
    var id = marcaSelected.val();
    if (id != '') {
        getModelos(id);
    } else {
        var modelo = $("#modelos");
        alert("No selecciono ningun elemento");
        modelo.find('option').remove();
    }
});
$("#engancheCompra").change(function () {
    var valorVehiculo = $("#montoPagarCompra").val();
    var engancheVehiculo = $("#engancheCompra").val();
    var saldoVehiculo = valorVehiculo-engancheVehiculo;
    $("#saldoCompra").val(saldoVehiculo);
    $("#totalCompra").val(saldoVehiculo);
    var totalCompra = $("#totalCompra").val();
    var subtotalCompra = totalCompra/1.16;
    $("#subtotalCompra").val(subtotalCompra.toFixed(2));
    $("#ivaCompra").val((totalCompra-subtotalCompra).toFixed(2));
});

function addCar() {
        $.ajax({
            type:   "POST",
            url:    "../control/car-add.php",
            data: {
                modelo: $("#modelos").val(),
                anio: $("#anio").val(),
                placa: $("#placa").val(),
                entidad_placa: $("#entidad_placa").val(),
                color: $("#colorCarBuy").val(),
                kilometros: $("#kmCarBuy").val(),
                transmision: $("#transimision").val(),
                combustible: $("#combustible").val(),
                nopuertas: $("#noPuertas").val(),
            }, success: function () {
                console.log(response);
                }
        }
        )
    }
function registraCompra() {
    $.ajax({
        type:   "POST",
        url:    "../control/contrato-add-compra.php",
        data:{
            noContrato: $("#noContrato").val(),
            noEmpleado: $("#").val(),
            noCliente: $("#id_cliente").val(),
            noVehiculo: $("#"),
            tipoContrato: $("#").val(),
            plazo: $("#").val(),
            engancheVehiculo: $("#").val(),
            saldoVehiculo: $("#").val(),
            formaPagoCompra: $("#").val(),
            subtotalCompra: $("#").val(),
            ivaCompra: $("#").val(),
            totalCompra: $("#").val(),
        }, success: function(){

        }
    })
}
$(document).on("click", ".btnConfirm", function () {
    //eliminar cuando confirme
    addCar();
});
