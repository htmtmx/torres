$(document).ready(function(){
   getTiposArchivo();
});


function getTiposArchivo() {
   $.ajax({
      url: "../webhook/list-tipo_archivo.php",
      success: function (response) {

         let obj_result = JSON.parse(response);

         let template = "";
         obj_result.forEach((obj) => {
            template += `<option value="${obj.id_tipo_archivo}">${obj.nombre}</option> `;

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
          $('#modalejemplo').modal('hide');
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
          $('#addArchivoCoche').modal('hide');
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
          consultaDetallesCoche();
          $('#modalAddFotoCoche').modal('hide');
          document.getElementById("preview").src = "https://sierranorte.cnt.es/wp-content/uploads/no_preview.jpg";s
       });
   $('#frm-add-foto-vehiculo').trigger('reset');
   e.preventDefault();
});
