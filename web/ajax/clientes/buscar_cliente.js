$(buscar_cliente());

function buscar_cliente(consulta){
    $.ajax({
        url:'core/controllers/buscarClienteController.php',
        type: 'POST',
        dataType: 'html',
        data: { consulta: consulta },
    })
    .done(function(respuesta){
        $('#resultado').html(respuesta);
    })
    .fail(function(){
        console.log("error");
    })

}

$(document).on('keyup','#busqueda',function(){
    var valor = $(this).val();
    if(valor != "")
    {
        buscar_cliente(valor);
    }
    else
    {
        buscar_cliente();
    }
});
