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
            $('#btn-asignar-usuario').val('Asignar');
            $('#nombre').val('');
            $('#usuario').val('');
            $('#clave').val('');
            $('#rol').val('');
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
