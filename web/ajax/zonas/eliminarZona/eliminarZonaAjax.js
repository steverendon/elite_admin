jQuery(document).on('submit','#formzoel',function(event){
    event.preventDefault();

    jQuery.ajax({
        url: 'web/ajax/zonas/eliminarZona/eliminarZonaAjax.php',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function(){
            $('#btn-eliminar-zona').val('Procesando...');
        }
    })
    .done(function(respuesta){
        console.log(respuesta);
        if(!respuesta.error){
             alertify.success('Zona Eliminada!');
             $('#lista_zonas').load('web/ajax/zonas/listaZonas/listaZonasAjax.php');
             $('#lista_zonas_2').load('web/ajax/zonas/listaZonas/listaZonasAjax.php');
             $('#zonaSinAgente').load('web/ajax/zonas/zonaAlerta/zonaAlertaAjax.php');
             $('#zonas').load('web/ajax/zonas/zonas/zonasAjax.php');
            //$('#usuarios').load('web/ajax/usuarios/verUsuariosAjax.php');
            //$('#lista_usuarios').load('web/ajax/usuarios/listaUsuario/listaUsuariosAjax.php');
            //$('#lista_usuarios_2').load('web/ajax/usuarios/listaUsuario/listaUsuariosAjax.php');
            $('#btn-eliminar-zona').val('Eliminar');
            $('#zona').val('');
        }else{
             alertify.error('Zona Creada!');
            $('#btn-eliminar-zona').val('Eliminar');
        }
    })
    .fail(function(resp){
        console.log(resp.responseText)
    })
    .always(function(){
        console.log("complete")
    });
});
