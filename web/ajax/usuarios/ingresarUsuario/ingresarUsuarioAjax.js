jQuery(document).on('submit','#formus',function(event){
    event.preventDefault();

    jQuery.ajax({
        url: 'web/ajax/usuarios/ingresarUsuario/ingresarUsuarioAjax.php',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function(){
            $('#btn-ingresar_usuario').val('Precesando...');
        }
    })
    .done(function(respuesta){
        console.log(respuesta);
        if(!respuesta.error){
             alertify.success('Usuario Creado!');
            $('#usuarios').load('web/ajax/usuarios/verUsuariosAjax.php');
            $('#lista_usuarios').load('web/ajax/usuarios/listaUsuario/listaUsuariosAjax.php');
            $('#lista_usuarios_2').load('web/ajax/usuarios/listaUsuario/listaUsuariosAjax.php');
            $('#btn-ingresar_usuario').val('Crear');
            $('#nombre').val('');
            $('#usuario').val('');
            $('#clave').val('');
            $('#rol').val('');
        }else{
             alertify.error('Error Al Crear Usuario!');
            $('#btn-ingresar').val('Crear');
        }
    })
    .fail(function(resp){
        console.log(resp.responseText)
    })
    .always(function(){
        console.log("complete")
    });
});
