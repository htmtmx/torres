$(document).ready(function(){
   getTiposArchivo();
});

function getTiposArchivo() {
   $.ajax({
      url: "../webhook/list-tipo_archivo.php",
      success: function (response) {
         let obj_result = JSON.parse(response);
         let template = "";
         obj_result.forEach((obj_result) => {
            template += `<option value="${obj_result.id_tipo_archivo}">${obj_result.nombre}</option> `;
         });
         $("#tipoArchivo").html(template);
         $("#tipoArchivo2").html(template);
         $("#tipoArchivo3").html(template);
      }
   });
}

//FUNCION SUBMIT PARA EL FORM DE DOC CONTRATO ADQUISICION
$("#frm_Subir_Doc_Contrato").on("submit", function(e){
   e.preventDefault();
   //let tipocontrato = $('input[name="contrato"]:checked').val();
   var f = $(this);
   var formData = new FormData(document.getElementById("frm_Subir_Doc_Contrato"));
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
          $("#mensaje").html("Respuesta: " + res);
       });
   $('#frm_Subir_Doc_Contrato').trigger('reset');
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
$("#frm_Doc_Coch").on("submit", function(e){
   e.preventDefault();
   var f = $(this);
   var formData = new FormData(document.getElementById("frm_Doc_Coch"));
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
          $("#mensaje3").html("Respuesta: " + res);
       });
});

//FUNCION SUBMIT PARA EL FORM DE DOC COCHE
$("#frm_Foto_Coch").on("submit", function(e){
   e.preventDefault();
   var f = $(this);
   var formData = new FormData(document.getElementById("frm_Foto_Coch"));
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
          $("#mensaje4").html("Respuesta: " + res);
       });
});