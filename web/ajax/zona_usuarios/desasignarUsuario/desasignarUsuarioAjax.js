function pregunta(id_usuario,id_zona)
{
    alertify.confirm('Desvincular usuario','Desvincular usuario de esta zona?',
    function(){
        desasignarUsuario(id_usuario,id_zona);
    },
    function(){
        alertify.error('Cancelado!');
    });
}

function desasignarUsuario(id_usuario,id_zona)
{
    var cadena = {
            "id_usuario" : id_usuario,
            "id_zona" : id_zona
    };

    jQuery.ajax({
        url: "web/ajax/zona_usuarios/desasignarUsuario/desasignarUsuarioAjax.php",
        type: 'POST',
        dataType: 'json',
        data: cadena,
        beforeSend: function(){

        }
    })
    .done(function(respuesta){
        console.log(respuesta);
        if(!respuesta.error){
             $('#zonas').load('web/ajax/zonas/zonas/zonasAjax.php');
             $('#zonaSinAgente').load('web/ajax/zonas/zonaAlerta/zonaAlertaAjax.php');
             alertify.success('Usuario Desviculado!');
        }else{
             alertify.error('Error Al Asignar Usuario!');
        }
    })
    .fail(function(resp){
        console.log(resp.responseText)
    })
    .always(function(){
        console.log("complete")
    });
}
