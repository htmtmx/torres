$(document).ready(function(){
    let noCoche= $("#noCoche").val();
    if(noCoche>0) buscaCochePaVenta(noCoche);
    consultaCochesVenta();

});
window.onload = function() {
    cargaPersonas();
};

function buscaCochePaVenta(noCoche) {
    $.ajax({
        url: "../webhook/cars-list.php",
        type: "POST",
        data: { idCoche: noCoche ,
            details: 1,
            estatus:0
        },
        success: function (response)
        {
            //COnvertimos el string a JSON
            let coches= JSON.parse(response);
            cargaDatosCoche(coches[0]);
        },
    });
}

$("#msform").on("submit", function(e){
    var f = $(this);
    var formData = new FormData(document.getElementById("msform"));
    formData.append("dato", "valor");
    //formData.append(f.attr("name"), $(this)[0].files[0]);
    $.ajax({
        url: "../webhook/addContratoVenta.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response)
        {
            let mje = JSON.parse(response);
            alertaEmergente(mje.Mensaje);
            let plantilla = `
                        <a href="./detalles-coche.php?idCoche=${mje.idCoche}">
                            <button type="button" class="btn btn-primary"><i class="fas fa-print"></i> Ver Vehiculo</button>
                        </a>
                        <a href="./contrato.php?noVehiculo=${mje.idCoche}&amp;consult=true" target="_blank">
                            <button type="button" class="btn btn-primary"><i class="fas fa-print"></i> Contrato</button>
                        </a>
                        <a href="./responsiva.php?noVechiculo=${mje.idCoche}&amp;consult=true" target="_blank">
                            <button type="button" class="btn btn-primary"><i class="fas fa-print"></i> Carta Responsiva</button>
                        </a>
            `;
            $("#botonesContrato").html(plantilla);
        },
    })
    $('#msform').trigger('reset');
    e.preventDefault();
});

/******** FUNCION DE CALCULO PARA SUBTOTAL ******/
$("#forma_pago").change(function ()
{
    let forma = $("#forma_pago").val();
    if (forma==="1"){
        $("#engancheSpan").html("Enganche:");
        $("#creditoContainer").removeClass("d-none");
        $("#containerAvales").removeClass("d-none");
    }
    else{
        $("#engancheSpan").html("Pagar / Apartar Con:");
        $("#creditoContainer").addClass("d-none");
        $("#containerAvales").addClass("d-none");
        $("#nombreAva1").val("");
        $("#telaval1").val("");
        $("#nombreAval2").val("");
        $("#telAval2").val("");
    }
    calculaResto();
    calculaCredito();
});

/******** FUNCION DE CALCULO PARA SUBTOTAL ******/
$("#enganche").change(function ()
{
    calculaResto();
    calculaCredito();
});

$("#plazo").change(function ()
{
    calculaResto();
    calculaCredito();
});

function calculaResto() {
    let forma = $("#forma_pago").val();
    let totalLista =0;
    if (forma==="1"){
        //Eljije credito
        totalLista = $("#precio_credito").val();
    }
    else{
        totalLista = $("#precio_contado").val();
    }
    var adelanto = parseFloat($("#enganche").val());
    var restante = totalLista-adelanto;
    $("#total").val(restante);
}

function calculaCredito() {
    let plazo = $("#plazo").val();
    let totalPendiente = $("#total").val();
    var mensualidad = (parseFloat(totalPendiente)/parseFloat(plazo)).toFixed(2);
    $("#mensualidad").val(mensualidad);
}

//FUNCIONES PARA BUSCADOR Y en la tabla de coches
$("#buscaCoche").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tblCoches tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});

