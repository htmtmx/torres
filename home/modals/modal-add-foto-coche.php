
<!-- Modal ADD NUEVA FOTO -->
<div class="modal fade" id="modalAddFotoCoche" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Carga Nueva Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm-add-foto-vehiculo">
                <div class="modal-body">
                    <img src="https://sierranorte.cnt.es/wp-content/uploads/no_preview.jpg" class="card-img-top img-thumbnail img-preview" alt="img del curso"  id="preview" >
                    <div class="card-body">
                        <p class="card-text py-1">Elija una imagen no muy pesada para este vehiculo</p>
                        <div class="row">
                            <div class="col-md-9">
                                <form>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control-file"id="noVehiculo" name="noVehiculo" value="<?php echo $noCoche ?>" >
                                        <label for="exampleFormControlFile1">Seleccionar foto de vehiculo</label>
                                        <input type="file" class="form-control-file"id="archivo1" name="archivo1" accept="image/*">
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" ><i class="fas fa-upload"></i> Subir Foto</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script>
    $(document).on("click", ".custom-file-input", function() {
        var file = $(this).parents().find(".file");
        file.trigger("click");
    });
    $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#preview").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

</script>
