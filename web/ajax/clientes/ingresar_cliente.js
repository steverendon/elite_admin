jQuery(document).on('submit','#formin',function(event){
    event.preventDefault();

    jQuery.ajax({
        url: 'core/controllers/ingresarClienteController.php',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function(){
            $('#btn-ingresar').val('Loading...');
        }
    })
    .done(function(respuesta){
        console.log(respuesta);
        if(!respuesta.error){
             alertify.success('Successfully saved customer!');
            $('#btn-ingresar').val('Save');
            $('#nombre').val('');
            $('#direccion').val('');
            $('#telefono').val('');
            $('#correo').val('');
            $('#documento').val('');
        }else{
             alertify.error('Error saving client!');
            $('#btn-ingresar').val('Save');
        }
    })
    .fail(function(resp){
        console.log(resp.responseText)
    })
    .always(function(){
        console.log("complete")
    });
});
