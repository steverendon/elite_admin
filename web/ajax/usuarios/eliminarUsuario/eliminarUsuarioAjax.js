jQuery(document).on('submit','#formel',function(event){
    event.preventDefault();

    jQuery.ajax({
        url: 'web/ajax/usuarios/eliminarUsuario/eliminarUsuarioAjax.php',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function(){
            $('#btn-ingresar_usuario').val('Eliminando...');
        }
    })
    .done(function(respuesta){
        console.log(respuesta);
        if(!respuesta.error){
             alertify.success('Usuario Eliminado!');
            $('#usuarios').load('web/ajax/usuarios/verUsuariosAjax.php');
            $('#lista_usuarios').load('web/ajax/usuarios/listaUsuario/listaUsuariosAjax.php');
            $('#lista_usuarios_2').load('web/ajax/usuarios/listaUsuario/listaUsuariosAjax.php');
            $('#btn-ingresar_usuario').val('Eliminar');
        }else{
             alertify.error('Error Al Eliminar Usuario!');
            $('#btn-ingresar').val('Eliminar');
        }
    })
    .fail(function(resp){
        console.log(resp.responseText)
    })
    .always(function(){
        console.log("complete")
    });
});
