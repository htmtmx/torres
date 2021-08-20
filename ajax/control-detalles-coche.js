$(document).ready(function(){
    consultaDetallesCoche();
    consultaDetallesContrato();
});

function consultaDetallesCoche(){
    $.ajax({
        url: "../webhook/cars-list.php",
        type: "POST",
        data: { idCoche: $("#noCoche").val(),
                details:1
        },
        success: function (response)
        {
            let obj_result = JSON.parse(response);
            console.log(obj_result);
            let obj_carro= obj_result[0];
            cargaDatosCarro(obj_carro);
            let carousel = construyeCarouselFotosCoche(obj_carro[1]);
            $("#carouselCocheFotos").html(carousel);
            $("#tblfotosCoche").html(construyeCocheTablaFotos(obj_carro[1]));
            $("#tblDocsCoche").html(construyeCocheTablaDocumentos(obj_carro[1]));
            $("#tbl-detalles").html(contruyeTablaDetalles(obj_carro[0]));

        },
    });
}

function cargaDatosCarro(obj_carro){
    $("#precioContado").html("$"+obj_carro.precio_contado);
    let credito = obj_carro.opc_credito>0 ? "$"+obj_carro.precio_credito : "NA";
    $("#precioCredito").html(credito);
}

function construyeCarouselFotosCoche(docs){
    var fotos = [];
    //FOR PARA EXTRAER LAS FOTOS
    docs.forEach((doc)=>{
        if(doc.id_tipo_archivo==1){
            //SI ES UNA IMAGEN
            fotos.push(doc);
            }
        }
    );
    //FOR PARA CAROUSEL
    let active = `class="active"`;
    let activeFoto = "active";
    let contador =0;
    let templatePaginador=`<ol class="carousel-indicators">`;
    let contenedorFotos = `<div class="carousel-inner">`;
    let template="";
    fotos.forEach((foto) =>
        {

            let acitvPag = contador < 1 ? active:"";
            let link = foto.length < 1 ? "https://hescorp.com.mx/wp-content/themes/consultix/images/no-image-found-360x250.png" : foto.path;
            templatePaginador += `<li data-target="#carouselCocheFotos" data-slide-to="${contador}"></li>`;

            contenedorFotos += `
                                <div class="carousel-item ${contador==0?activeFoto:""}">
                                    <img class="d-block w-100" src="${link}" alt="First slide">
                                </div>
                            `;
            contador++;
        }
    );
    templatePaginador+= `</ol>`;
    contenedorFotos+=`</div>`
    template = templatePaginador+ contenedorFotos;
    template+=`
                        <a class="carousel-control-prev" href="#carouselCocheFotos" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselCocheFotos" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>     
    `
    return template;

}

function construyeCocheTablaFotos(docs){
    var fotos = [];
    //FOR PARA EXTRAER LAS FOTOS
    docs.forEach((doc)=>{
            if(doc.id_tipo_archivo==1){
                //SI ES UNA IMAGEN
                fotos.push(doc);
            }
        }
    );
    let template="";

    fotos.forEach((foto)=>{
        template+= `
                             <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <a href="#" class=" mr-3 align-items-center d-flex">
                                            <img src="${foto.path}" height="90" alt="Image placeholder" class="card-img-top">
                                        </a>
                                    </div>
                                </th>
                                <td>
                                    <button class="btn btn-icon btn-secondary" type="button">
                                        <span class="btn-inner--icon"><i class="far fa-eye text-primary"></i></span>
                                    </button>
                                    <button class="btn btn-icon btn-secondary" type="button">
                                        <span class="btn-inner--icon"><i class="fas fa-cloud-download-alt text-green"></i></span>
                                    </button>
                                    <button class="btn btn-icon btn-secondary" type="button">
                                        <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                                    </button>
                                </td>
                            </tr>
        `;
    });
    return template;
}


function contruyeTablaDetalles(detalles){
    let template="";

    detalles.forEach((detalle)=>{
        template+= `
                             <tr>
                                <th scope="row">
                                    ${detalle.nombre}
                                </th>
                                <td>
                                    ${detalle.valor}
                                </td>
                                <td>
                                    <button class="btn btn-icon btn-secondary" type="button">
                                        <span class="btn-inner--icon"><i class="fas fa-pen text-primary"></i></span>
                                    </button>
                                    <button class="btn btn-icon btn-secondary" type="button">
                                        <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                                    </button>
                                </td>
                            </tr>
        `;
    });
    return template;
}

function construyeCocheTablaDocumentos(docs){
    var archivos = [];
    //FOR PARA EXTRAER LAS FOTOS
    docs.forEach((doc)=>{
            if(doc.id_tipo_archivo!=1){
                //SI ES UNA IMAGEN
                archivos.push(doc);
            }
        }
    );
    let template="";
    archivos.forEach((archivo)=>{
        template+=`
                    <tr>
                        <th scope="row">
                            Factura <i class="fas fa-lock text-red"></i>
                        </th>
                        <td>
                            PDF
                        </td>
                        <td>
                            Archivo protegido
                        </td>
                        <td>
                            <button class="btn btn-icon btn-secondary" type="button" data-toggle="modal" data-target="#vistaPDF">
                                <span class="btn-inner--icon"><i class="far fa-eye text-primary"></i></span>
                            </button>
                            <button class="btn btn-icon btn-secondary" type="button">
                                <span class="btn-inner--icon"><i class="fas fa-cloud-download-alt text-green"></i></span>
                            </button>
                            <button class="btn btn-icon btn-secondary" type="button">
                                <span class="btn-inner--icon"><i class="fas fa-trash-alt text-red"></i></span>
                            </button>
                        </td>
                    </tr>
        `
    });
    return template;
}


/*******************************
 *     DETALLES CONTRATO       *
 *******************************/

function consultaDetallesContrato(){
    $.ajax({
        url: "../webhook/consulta-contratos-nocoche.php",
        type: "POST",
        data: { idCoche: $("#noCoche").val()
        },
        success: function (response)
        {
            let obj_result = JSON.parse(response);
            console.log(obj_result);
            let obj_carro= obj_result[0];
            //let carousel = construyeCarouselFotosCoche(obj_carro[1]);
            //$("#carouselCocheFotos").html(carousel);
            //$("#tblfotosCoche").html(construyeCocheTablaFotos(obj_carro[1]));
            //$("#tblDocsCoche").html(construyeCocheTablaDocumentos(obj_carro[1]));

        },
    });
}