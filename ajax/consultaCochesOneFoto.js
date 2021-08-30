$(document).ready(function(){

});

window.onload = function() {
    consultaCochesOneFoto();
};

let LISTA_COCHES;

function consultaCochesOneFoto(){
    $.ajax({
        url: "../webhook/car-list-one-foto.php",
        type: "POST",
        data: { id: $("#no_vehiculo").val(),
            filter: $("#filtro").val()
        },
        success: function (response)
        {
            let obj_result = JSON.parse(response);
            let gridData = construyeGridCochesCatalogo(obj_result);
            $("#gridCoches").html(gridData);
        },
    });
}

function construyeGridCochesCatalogo(listaCoches) {
    let template = "";
    LISTA_COCHES = listaCoches;
    listaCoches.forEach((coche) =>
        {
            let statusCche = "";
            let botonVender = "";
            switch (coche.estatus) {
                case "0":
                    statusCche = `<div class="exclusive-price venta"><label>$ ${coche.precio_contado}</label></div>`;
                    botonVender = `<a href="./nuevaVenta.php?idCoche=${coche.no_vehiculo}">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cuentaUser">
                                            <i class="fas fa-dollar-sign text-white"></i> Vender
                                        </button>
                                    </a>`;
                    break;
                case "1":
                    statusCche =`<div class="exclusive-price vendido"><label>Vendido</label></div>`;
                    break;
                default:
                    statusCche =`<div class="exclusive-price apartado"><label>Apartado</label></div>`;
                    break;
            }
            let foto = coche[0];
            let link = foto.length < 1 ? "https://hescorp.com.mx/wp-content/themes/consultix/images/no-image-found-360x250.png" : foto[0].path;
            let credito = coche.opc_credito == "1" && coche.estatus== "0" ? `<li><strong>Costo a Credito: $</strong>${coche.precio_credito}</li>`:"";
            let contado = coche.estatus== "0" ? `<li><strong>Precio de Lista: $</strong>${coche.precio_contado}</li>`:"";
            template += `
              <div class="col-xl-4 order-xl-1">
                <div class="card card-profile">
                ${statusCche}
                        <img src="${link}" alt="Image placeholder" class="card-img-top" style="max-height: 300px; width: auto;">
                    </a>
                    <div class="card-body pt-0 py-3">
                        <div class="text-center">
                            <h5 class="h3">
                                ${coche.marca_coche + " " + coche.modelo_coche + " " + coche.anio}
                            </h5>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>Placa: <strong class="heading">${coche.placa}</strong>(${coche.entidad_placa})
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <div>
                                        <span class="heading">${coche.anio}</span>
                                        <span class="description">Año</span>
                                    </div>
                                    <div>
                                        <span class="heading">${coche.transimision}</span>
                                        <span class="description">Trasmisión</span>
                                    </div>
                                    <div>
                                        <span class="heading">${coche.kilometros}</span>
                                        <span class="description">Km</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <ul class="text-left">
                                <li><strong>Color: </strong>${coche.color}</li>
                                <li><strong>Conbustible: </strong>${coche.combustible}</li>
                                <li><strong>Puertas: </strong>${coche.no_puertas}</li>
                                ${contado}
                                ${credito}
                            </ul>
                        </div>
                    </div>
                    <div class="card-header text-center border-0">
                        <div class="d-flex justify-content-between">
                            <a href="./detalles-coche.php?idCoche=${coche.no_vehiculo}">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cuentaUser">
                                    <i class="fas fa-list text-white"></i> Mas detalles
                                </button>
                            </a>
                            ${botonVender}
                        </div>
                    </div>
                </div>
            </div>
            `;
        }
    );
    return template;
}

$("#filtro").change(function ()
{
    consultaCochesOneFoto();
});