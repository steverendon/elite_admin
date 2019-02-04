jQuery(document).on('submit','#formac',function(event){
    event.preventDefault();

    jQuery.ajax({
        url: 'core/controllers/activarBotonController.php',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function(){
            $('#btn-activar').val('Loading...');
        }
    })
    .done(function(respuesta){
        console.log(respuesta);
        if(!respuesta.error){
             alertify.success('Successfully activated button!');
            $('#btn-activar').val('Activate');
            $('#documento').val('');
            $('#num_boton').val('');
            $('#nombre_boton').val('');
            $('#direccion').val('');
            $('#telefono').val('');
            $('#input_lat').val('');
            $('#input_lon').val('');
        }else{
             alertify.error('Error when activating the button');
            $('#btn-activar').val('Activate');
        }
    })
    .fail(function(resp){
        console.log(resp.responseText)
    })
    .always(function(){
        console.log("complete")
    });
});
