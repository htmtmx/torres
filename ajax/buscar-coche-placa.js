$("#navbar-search-main").on("submit", function(e){
    var formData = new FormData(document.getElementById("navbar-search-main"));
    formData.append("dato", "valor");
    //formData.append(f.attr("name"), $(this)[0].files[0]);
    $.ajax({
        url: "../webhook/consulta-placa-id-coche.php",
        type: "POST",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response)
        {
            let placas = JSON.parse(response);
            console.log(placas);
            if(placas.length>0){
                let placa = placas[0];
                window.location.href="./detalles-coche.php?idCoche="+placa.no_vehiculo;
            } else alert("El numero de placa no existe");
        },
    })

    e.preventDefault();
});