$(document).ready(function(){
   getTiposArchivo();
});


function getTiposArchivo() {
   $.ajax({
      url: "../webhook/list-tipo_archivo.php",
      success: function (response) {
         console.log("Hola");
         let obj_result = JSON.parse(response);
         console.log(obj_result);
         let template = "";
         obj_result.forEach((obj) => {
            template += `<option value="${obj.id_tipo_archivo}">${obj.nombre}</option> `;
            console.log(template);
         });
         $("#tipoArchivoCarro").html(template);
         $("#tipoArchivoContrato").html(template);
      }
   });
}

//FUNCION SUBMIT PARA EL FORM DE DOC CONTRATO ADQUISICION
$("#frm-add-archivo-contrato").on("submit", function(e){
   e.preventDefault();
   //let tipocontrato = $('input[name="contrato"]:checked').val();
   var f = $(this);
   var formData = new FormData(document.getElementById("frm-add-archivo-contrato"));
   formData.append("dato", "valor");
   //formData.append(f.attr("name"), $(this)[0].files[0]);
   $.ajax({
      url: "../webhook/recibe-documento-contrato.php",
      type: "post",
      dataType: "html",
      data: formData,
      cache: false,
      contentType: false,
      processData: false
   })
       .done(function(res){
          $("#mensajeAddDocumentoContrato").html("Respuesta: " + res);
          consultaDetallesContrato();
       });
   $('#frm-add-archivo-contrato').trigger('reset');
   e.preventDefault();

});

//FUNCION SUBMIT PARA EL FORM DE DOC CONTRATO VENTA
$("#frm_Subir_Doc_Ven").on("submit", function(e){
   e.preventDefault();
   var f = $(this);
   var formData = new FormData(document.getElementById("frm_Subir_Doc_Ven"));
   formData.append("dato", "valor");
   //formData.append(f.attr("name"), $(this)[0].files[0]);
   $.ajax({
      url: "../webhook/recibe-documento-contrato.php",
      type: "post",
      dataType: "html",
      data: formData,
      cache: false,
      contentType: false,
      processData: false
   })
       .done(function(res){
          $("#mensaje2").html("Respuesta: " + res);
       });
});

//FUNCION SUBMIT PARA EL FORM DE DOC COCHE
$("#frm-add-archivo-coche").on("submit", function(e){
   var f = $(this);
   var formData = new FormData(document.getElementById("frm-add-archivo-coche"));
   formData.append("dato", "valor");
   //formData.append(f.attr("name"), $(this)[0].files[0]);
   $.ajax({
      url: "../webhook/recibe-documento-coche.php",
      type: "post",
      dataType: "html",
      data: formData,
      cache: false,
      contentType: false,
      processData: false
   })
       .done(function(res){
          $("#mensajeAddArchivo").html(res);
          consultaDetallesCoche();

       });
   $('#frm-add-archivo-coche').trigger('reset');
   e.preventDefault();

});

//FUNCION SUBMIT PARA EL FORM DE DOC COCHE
$("#frm-add-foto-vehiculo").on("submit", function(e){
   e.preventDefault();
   var f = $(this);
   var formData = new FormData(document.getElementById("frm-add-foto-vehiculo"));
   formData.append("dato", "valor");
   //formData.append(f.attr("name"), $(this)[0].files[0]);
   $.ajax({
      url: "../webhook/recibe-fotos-coche.php",
      type: "post",
      dataType: "html",
      data: formData,
      cache: false,
      contentType: false,
      processData: false
   })
       .done(function(res){
          alert(res);
          consultaDetallesCoche();
          document.getElementById("preview").src = "https://sierranorte.cnt.es/wp-content/uploads/no_preview.jpg";
       });
   $('#frm-add-foto-vehiculo').trigger('reset');
   e.preventDefault();
});