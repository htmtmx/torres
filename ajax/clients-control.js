$(document).ready(function () {
  if (id_page != 1) {
    getAllClientes();
  } else {
    console.log("estamos en la otra pagina");
    getOnlyClient();
  }

  //Tratamos guardar/actualizar(solo cuando cargamos modal)
  try {
    $("#form-add-client").validate({
      event: "blur",
      rules: {
        nombre_cliente: "required",
        apaterno_cliente: "required",
        amaterno_cliente: "required",
        telefono_cliente: "required",
      },
      messages: {
        nombre_cliente: "Por favor indica el nombre del cliente",
        apaterno_cliente: "Por favor, indica el apellido paterno",
        amaterno_user: "Por favor, indica el apellido materno",
        telefono_cliente: "Escriba un número de teléfono",
      },
      debug: true,
      errorElement: "label",
      submitHandler: function (form) {
        $("#alerta").show();
        $("#alerta").html(
          "<img src='../assets/img/loading.gif' class='loading_save'/><strong>Guardando información...</strong>"
        );
        setTimeout(function () {
          $("#alerta").fadeOut("slow");
        }, 5000);
        // ----- AJAX send php response
        $.ajax({
          type: "POST",
          url: "../control/client-add.php",
          data: {
            nombre_cliente: $("#nombre_cliente").val(),
            apaterno_cliente: $("#apaterno_cliente").val(),
            amaterno_cliente: $("#amaterno_cliente").val(),
            telefono_cliente: $("#telefono_cliente").val(),
            celular_cliente: $("#celular_cliente").val(),
            correo_cliente: $("#correo_cliente").val(),
            subscripcion_cliente: $("#subscripcion_cliente").val(),
            empresa_cliente: $("#empresa_cliente").val(),
            medio_identificación_cliente: $(
              "#medio_identificación_cliente"
            ).val(),
            folio_cliente: $("#folio_cliente").val(),
            tipo_cliente: $("#tipo_cliente").val(),
            rfc_cliente: $("#rfc_cliente").val(),
            estatus_cliente: "1",
            accion: 1,
          },
          success: function (msg) {
            $("#alerta").html(msg);
            setTimeout(function () {
              $("#alerta").fadeOut("slow");
            }, 3000);
            getAllClientes();
          },
        });
        $("#form-add-client").trigger("reset");
      },
    });
  } catch (error) {}

  try {
    $("#form-update-client").validate({
      event: "blur",
      rules: {
        nombre_cliente: "required",
        apaterno_cliente: "required",
        amaterno_cliente: "required",
        telefono_cliente: "required",
      },
      messages: {
        nombre_cliente: "Por favor indica el nombre del cliente",
        apaterno_cliente: "Por favor, indica el apellido paterno",
        amaterno_user: "Por favor, indica el apellido materno",
        telefono_cliente: "Escriba un número de teléfono",
      },
      debug: true,
      errorElement: "label",
      submitHandler: function (form) {
        $("#alerta").show();
        $("#alerta").html(
          "<img src='../assets/img/loading.gif' class='loading_save'/><strong>Guardando información...</strong>"
        );
        setTimeout(function () {
          $("#alerta").fadeOut("slow");
        }, 5000);
        // ----- AJAX send php response
        $.ajax({
          type: "POST",
          url: "../control/client-add.php",
          data: {
            id: $("#user-id").val(),
            nombre_cliente: $("#nombre_cliente").val(),
            apaterno_cliente: $("#apaterno_cliente").val(),
            amaterno_cliente: $("#amaterno_cliente").val(),
            telefono_cliente: $("#telefono_cliente").val(),
            celular_cliente: $("#celular_cliente").val(),
            correo_cliente: $("#correo_cliente").val(),
            subscripcion_cliente: $("#subscripcion_cliente").val(),
            empresa_cliente: $("#empresa_cliente").val(),
            medio_identificación_cliente: $(
              "#medio_identificación_cliente"
            ).val(),
            folio_cliente: $("#folio_cliente").val(),
            tipo_cliente: $("#tipo_cliente").val(),
            rfc_cliente: $("#rfc_cliente").val(),
            estatus_cliente: $("#estatus").val(),
            accion: 0,
          },
          success: function (msg) {
            $("#alerta").html(msg);
            setTimeout(function () {
              $("#alerta").fadeOut("slow");
            }, 3000);
          },
        });
        //regresar a la anterior pagina
        return false;
      },
    });
  } catch (error) {}

  function getOnlyClient() {
    //-------------- AJAX pedira la info de los datos se ejecuta cuando entra inicio
    $.ajax({
      url: "../control/client-list.php",
      type: "POST",
      data: { id: $("#user-id").val() },
      success: function (response) {
        console.log(response);
        //COnvertimos el string a JSON
        try {
          let obj_users = JSON.parse(response);
          console.log(obj_users);
          let obj = obj_users[0];
          $("#nombre_cliente").val(obj.nombre);
          $("#apaterno_cliente").val(obj.apaterno);
          $("#amaterno_cliente").val(obj.amaterno);
          $("#telefono_cliente").val(obj.telefono);
          $("#celular_cliente").val(obj.celular);
          $("#correo_cliente").val(obj.correo);
          $("#subscripcion_cliente").val(obj.subscripcion);
          $("#empresa_cliente").val(obj.empresa);
          $("#rfc_cliente").val(obj.rfc);
          $("#medio_identificación_cliente").val(obj.medio_identificación);
          $("#folio_cliente").val(obj.folio);
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
          window.history.back();
        }
      },
    });
  }

  //Funcion, Carga
  function getAllClientes() {
    //-------------- AJAX pedira la info de los datos se ejecuta cuando entra inicio
    $.ajax({
      url: "../control/client-list.php",
      type: "POST",
      data: { id: "0" },
      success: function (response) 
      {
        //COnvertimos el string a JSON
        let obj_result = JSON.parse(response);
        //Utilizamos los objetos a y los tratamos en una plantilla en tbody
        let template = "";
        let template_page = "";
        let cont = 0;
        console.log(response);
        console.log("******************");
        console.log(obj_result);
        obj_result.forEach((obj_result) => {
          cont++;
          template += `
                        <tr no_cliente="${obj_result.no_cliente}">
                            <td>${cont}</td>
                            <td>${obj_result.no_cliente}</td>
                            <td>${
                              obj_result.nombre +
                              " " +
                              obj_result.apaterno +
                              " " +
                              obj_result.amaterno
                            }</td>
                            <td>${
                              obj_result.telefono + " / " + obj_result.celular
                            }</td>
                            <td>${obj_result.correo}</td>
                            <td>${
                              obj_result.subscripcion == 1 ? "SUSCRITO" : "-"
                            }</td>
                            <td>${obj_result.fecha_registro}</td>
                            <td><div class="spinner-grow text-${
                              obj_result.estatus == 1 ? "success" : "secondary"
                            }" role="status"><span class="sr-only"></span></div>${
            obj_result.estatus == 1 ? " Activa" : " Inactiva"
          }</td>
                            <td>
                            <div class="dropdown" value_estatus="${
                              obj_result.estatus
                            }">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Opciones
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <a href="new-sale.php?id=${
                                      obj_result.no_cliente
                                    }&vehiculo=0"><button id="btn-sale${
            obj_result.no_cliente
          } "class="user-edit  dropdown-item" type="button">Iniciar Venta</button></a>
                                    <a href="client-edit.php?id=${
                                      obj_result.no_cliente
                                    }"><button id="btn-edit${
            obj_result.no_cliente
          } "class="user-edit  dropdown-item" type="button">Editar</button></a>
                                    <button id="btn-reset${
                                      obj_result.no_cliente
                                    } "class="user-reset dropdown-item" type="button">Direcciones</button>
                                    <button id="btn-block${
                                      obj_result.no_cliente
                                    } "class="client-status dropdown-item" type="button btn btn-danger">${
            obj_result.estatus == 1 ? "Bloquear" : "Activar"
          }</button>
                                    <button id="btn-delete${
                                      obj_result.no_cliente
                                    } "class="user-delete dropdown-item bg-alert" type="button">Eliminar</button>
                                </div>
                                </div>
                            </td>
                        </tr>
                        `;
        });
        if (obj_result.length < 10) {
          if (obj_result.length > 0) {
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
          } else {
            template_page += `
                        <div class="container py-3">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Oops! Sin clientes :(</strong> Aun no hay ningun cliente. Agrega uno
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
        $("#contador-rows").html(
          "Encontramos " + obj_result.length + " clientes en el sistema"
        );
        $("#clients").html(template);
      },
    });
    //-------------- AJAX pedira la info de los datos
  }

  ///////////////////////////////////ACCIONES DE CLIENTES GENERALES

  ///Acciones con los elementos

  $(document).on("click", ".user-delete", function () {
    //eliminar cuando confirme
    if (
      confirm(
        "¿Esta seguro que desea eliminar al cliente? Ya no se podrá activar al cliente de nuevo."
      )
    ) {
      let element = $(this)[0].parentElement.parentElement.parentElement
        .parentElement;
      let ele_estatus = $(this)[0].parentElement.parentElement;
      let id = $(element).attr("no_cliente");
      let estatus_val = $(ele_estatus).attr("value_estatus");
      $.post(
        "../control/client-delete.php",
        { id, estatus_val },
        function (response) {
          getAllClientes();
        }
      );
    }
  });

  $(document).on("click", ".client-status", function () {
    //eliminar cuando confirme
    if (confirm("¿Esta seguro que desea cambiar el estado del cliente?")) {
      let element = $(this)[0].parentElement.parentElement.parentElement
        .parentElement;

      let ele_estatus = $(this)[0].parentElement.parentElement;
      let id = $(element).attr("no_cliente");
      let estatus_val = $(ele_estatus).attr("value_estatus");
      $.post(
        "../control/client-update-estatus.php",
        { id, estatus_val },
        function (response) {
          getAllClientes();
        }
      );
    }
  });
});
