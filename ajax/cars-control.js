$(document).ready(function () {
    if (id_page != 1) {
      getAllCars();
    } else {
      getOnlyCar();
    }
  
    function getOnlyCar() {
        getMarcas();
        getCarDetails();
        getListDetails();
    }

    function getMarcas() {
      //-------------- AJAX pedira la info de los datos se ejecuta cuando entra inicio
      $.ajax({
        url: "../control/backend/marcas-list.php",
        type: "POST",
        data: { placa: "0" },
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


    // Bloqueamos el SELECT de los modelos

   // $("#modelo").prop('disabled', true);

    $("#marcas").change(function()
    {
        // Guardamos el select de marca
        var modelo = $("#modelo");
        // Guardamos el select de alumnos
        var marca_sel = $(this);
        if($(this).val() != '')
        {
            $.ajax({
                data: { id : marca_sel.val() },
                url:   '../control/backend/modelos-list.php',
                type:  'POST',
                beforeSend: function () 
                {
                    modelo.prop('disabled', true);
                },
                success:  function (response) 
                {
                    modelo.prop('disabled', false);
                    // Limpiamos el select
                    modelo.find('option').remove();
                    let obj_result = JSON.parse(response);
                    let template = "";
                    obj_result.forEach((obj_result) => {
                        template += `<option value="${obj_result.id_modelo}">${obj_result.nombre}</option>`;
                        });
                        template += `<option value="0">OTRO</option>`;
                    $("#modelo").html(template);
                    modelo.prop('disabled', false);
                },
                error: function()
                {
                    alert('Ocurrio un error en el servidor ..');
                    modelo.prop('disabled', false);
                }
            });
        }
        else
        {
            alert("no selecciono elemento");
            modelo.find('option').remove();
            modelo.prop('disabled', true);
        }
    })

    function getListDetails() {
        $.ajax({
            url: "../control/backend/cars-list-details.php",
            type: "POST",
            data: { id: $("#car-id").val()},
            success: function (response) {
                console.log(response);
                            //COnvertimos el string a JSON
                let obj_result = JSON.parse(response);
                //Utilizamos los objetos a y los tratamos en una plantilla en tbody
                console.log(obj_result);
                let template = "";
                obj_result.forEach((obj_result) => 
                    {
                        template += `<option value="${obj_result.id_detalle}">${obj_result.nombre}</option>`;
                    }
                );
                $("#car_detalles_add").html(template);
            
            }
        });
      }
    
  function getCarDetails() {
    //-------------- AJAX pedira la info de los datos se ejecuta cuando entra inicio
    $.ajax({
      url: "../control/cars-list.php",
      type: "POST",
      data: {
          idCoche: $("#car-id").val(),
          details: true
      },
      success: function (response) {
          console.log(response);
        //COnvertimos el string a JSON
        try {
          let obj_users = JSON.parse(response);
          console.log(obj_users);
          let obj = obj_users[0];
          $("#fecha").val(obj.fecha_registro);
          $("#anio").val(obj.anio);
          $("#placa").val(obj.placa);
          $("#entidad_placa").val(obj.entidad_placa);
          $("#color").val(obj.color);
          $("#kilometros").val(obj.kilometros);
          $("#transimision").val(obj.transimision);
          $("#combustible").val(obj.combustible);
          $("#no_puertas").val(obj.no_puertas);
          $("#precio_contado").val(obj.precio_contado);
          $("#precio_credito").val(obj.precio_credito);
          $("#opc_credito").val(obj.opc_credito);
          $("#observaciones").val(obj.observaciones);
          $("#estatus").val(getEstado(obj.estatus));
          $("#marcas").val(obj.marca_coche);
          $("#modelo_id").val(obj.id_modelo);
          $("#modelo_coche").val(obj.modelo_coche);
          
          

          const event = new Date(Date.parse(obj.fecha_registro));
          const options = {
            weekday: "long",
            year: "numeric",
            month: "long",
            day: "numeric",
          };
          $("#fecha").html(
            event.toLocaleDateString(undefined, options) +
              " " +
              event.toLocaleTimeString("en-US")
          );
          $("#tipo_cliente").val(obj.tipo_cliente);
          $("#estatus").val(obj.estatus);
        } catch (error) {
          //window.history.back();
        }
      },
    });
  }

    //Funcion, Carga
    function getAllCars() {
      //-------------- AJAX pedira la info de los datos se ejecuta cuando entra inicio
      $.ajax({
        url: "../control/cars-list.php",
        type: "POST",
        data: { id: "0", details: "false" },
        success: function (response) 
        {
            //COnvertimos el string a JSON
            let obj_result = JSON.parse(response);
            //Utilizamos los objetos a y los tratamos en una plantilla en tbody
            let template = "";
            let templateGrid = "";
            let template_page = "";
            let cont = 0;
            obj_result.forEach((obj_result) => {
            cont++;
            template += `
                <tr no_cliente="${obj_result.no_vehiculo}">
                    <td>${cont}</td>
                    <td>${obj_result.placa}</td>
                    <td>${obj_result.marca_coche +" " +obj_result.modelo_coche +" " +obj_result.anio +", "+obj_result.color}</td>
                    <td>${obj_result.entidad_placa}</td>
                    <td>${obj_result.fecha_registro}</td>
                    <td>${humanizeNumber(obj_result.kilometros)} Km</td>
                    <td>${obj_result.observaciones}</td>
                    <td>${getEstado(obj_result.estatus)}</td>
                    <td> <a href="new-sale.php?id=0&vehiculo=${obj_result.no_vehiculo}"><button id="btn-sale${obj_result.no_vehiculo}" type="button" class="btn btn-success">Vender</button></a></td>
                    <td>
                    <div class="dropdown" value_estatus="${
                    obj_result.estatus}">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Opciones
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <a href="new-sale.php?id=0&vehiculo=${obj_result.no_vehiculo}"><button id="btn-sale${obj_result.no_vehiculo} "class="user-edit  dropdown-item" type="button">Iniciar Venta</button></a>
                            <a href="car-edit.php?id=${obj_result.no_vehiculo}&details=true"><button id="btn-edit${obj_result.no_vehiculo} "class="user-edit  dropdown-item" type="button">Editar</button></a>
                            <button id="btn-reset${obj_result.no_vehiculo} "class="user-reset dropdown-item" type="button">Direcciones</button>
                            <button id="btn-block${obj_result.no_vehiculo} "class="client-status dropdown-item" type="button btn btn-danger">${obj_result.estatus == 1 ? "Bloquear" : "Activar"}</button>
                            <button id="btn-delete${obj_result.no_vehiculo} "class="user-delete dropdown-item bg-alert" type="button">Eliminar</button>
                        </div>
                        </div>
                    </td>
                </tr>`;

            templateGrid+=`
                <div class="item col-xs-4 col-lg-4">
                    <div class="thumbnail card position-relative">
                        <div class="img-event">
                            <div class="position-absolute top-0 start-0 p-1"><h2><span class="badge badge-secondary">$${obj_result.precio_contado}</span></h2></div>
                                <img class="group list-group-image img-fluid" src="https://i.blogs.es/84b986/bestune_t77-640x360/450_1000.jpg" alt="" />
                            </div>
                            <div class="caption card-body">
                                <h4 class="group card-title inner list-group-item-heading">${obj_result.marca_coche +" " +obj_result.modelo_coche +" " +obj_result.anio}</h4>
                                <p class="group inner list-group-item-text">
                                Placa: ${obj_result.entidad_placa +"<br>Color:&nbsp;" +obj_result.color +"<br>" +obj_result.kilometros +" Km.<br>Transmisión:&nbsp;"+obj_result.transimision}
                                <br>Combustible: ${obj_result.combustible +"<br>Color:&nbsp;" +obj_result.color +"<br>" +obj_result.no_puertas +" Puertas<br>Transmisión: "+obj_result.transimision}
                                </p>
                            </div>
                            <div class="row">
                            <div class="col-xs col-md-6">
                            </div>
                            <div class="col-xs-12 col-md-6 py-3">
                            <a class="btn btn-primary" href="new-sale.php?id=0&vehiculo=${obj_result.no_vehiculo}">Vender</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                `;
            });
            if(obj_result.length < 10) 
            {
                if(obj_result.length > 0) {
                    template_page += `
                                <nav aria-label="Page navigation example">
                                <ul  class="pagination justify-content-center">

                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item disabled">
                                <a class="page-link" href="#">Siguiente</a>
                                </li>
                                </ul>
                                </nav>  
                                `;
                } else 
                {
                    template_page += `
                                <div class="container py-3">
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Oops! Sin clientes :(</strong> Aun no hay coches registrados. Agrega uno
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                </div>
                                `;
                }
                $("#paginator").html(template_page);
            }
            //Selecciono el elemento donde voy a pintar el template
            $("#contador-rows").html("Encontramos " + obj_result.length + " clientes en el sistema");
            $("#cars").html(template);
            
            $("#products").html(templateGrid);
            },
        });
      //-------------- AJAX pedira la info de los datos
    }
    
  
    function humanizeNumber(n) 
    {
        n = n.toString()
        while (true) {
            var n2 = n.replace(/(d)(d{3})($|,|.)/g, "$1,$2$3")
            if (n == n2) break
            n = n2
        }
        return n
    }


    function getEstado(n) {
        var edo = "";
        switch (n) {
            case '0':
                edo = "No disponible";
                break;
            case '1':
                edo = "Vendido";
                break;
            case '2':
                edo = "Apartado";
                break;
            case '3':
                edo = "En Venta";
                break;
            default:
                edo = "Por Adquirir";
                break;
        }
        return edo;
      }

  });
  