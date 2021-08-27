function cosntructMensaje(tipo,mensaje){
    let template="";
    template =`
    <div class="alert alert-${tipo} alert-dismissible fade show" role="alert">
        ${mensaje}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    `;
    return template;
}
