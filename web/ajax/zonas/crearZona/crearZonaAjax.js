jQuery(document).on('submit','#formzo',function(event){
    event.preventDefault();

    jQuery.ajax({
        url: 'web/ajax/zonas/crearZona/crearZonaAjax.php',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function(){
            $('#btn-crear-zona').val('Agregando...');
        }
    })
    .done(function(respuesta){
        console.log(respuesta);
        if(!respuesta.error){
             alertify.success('Zona Creada!');
             $('#lista_zonas').load('web/ajax/zonas/listaZonas/listaZonasAjax.php');
             $('#lista_zonas_2').load('web/ajax/zonas/listaZonas/listaZonasAjax.php');
             $('#zonaSinAgente').load('web/ajax/zonas/zonaAlerta/zonaAlertaAjax.php');
             $('#zonas').load('web/ajax/zonas/zonas/zonasAjax.php');
            //$('#usuarios').load('web/ajax/usuarios/verUsuariosAjax.php');
            //$('#lista_usuarios').load('web/ajax/usuarios/listaUsuario/listaUsuariosAjax.php');
            //$('#lista_usuarios_2').load('web/ajax/usuarios/listaUsuario/listaUsuariosAjax.php');
            $('#btn-crear-zona').val('Agregar');
            $('#zona').val('');
        }else{
             alertify.error('Zona Creada!');
            $('#btn-crear-zona').val('Agregar');
        }
    })
    .fail(function(resp){
        console.log(resp.responseText)
    })
    .always(function(){
        console.log("complete")
    });
});
