jQuery(document).on('submit','#formas',function(event){
    event.preventDefault();

    jQuery.ajax({
        url: 'web/ajax/zona_usuarios/asignarUsuario/asignarUsuarioAjax.php',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function(){
            $('#btn-asignar-usuario').val('Procesando...');
        }
    })
    .done(function(respuesta){
        console.log(respuesta);
        if(!respuesta.error){
             alertify.success('Usuario Asignado!');
            $('#lista_zonas').load('web/ajax/zonas/listaZonas/listaZonasAjax.php');
            $('#lista_zonas_2').load('web/ajax/zonas/listaZonas/listaZonasAjax.php');
            $('#lista_zonas_3').load('web/ajax/zonas/listaZonas/listaZonasAjax.php');
            $('#zonaSinAgente').load('web/ajax/zonas/zonaAlerta/zonaAlertaAjax.php');
            $('#zonas').load('web/ajax/zonas/zonas/zonasAjax.php');
            $('#btn-asignar-usuario').val('Asignar');
        }else{
             alertify.error('Error Al Asignar Usuario!');
            $('#btn-asignar-usuario').val('Asignar');
        }
    })
    .fail(function(resp){
        console.log(resp.responseText)
    })
    .always(function(){
        console.log("complete")
    });
});
