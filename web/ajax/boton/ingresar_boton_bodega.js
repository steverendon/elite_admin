jQuery(document).on('submit','#ingresar_bodega_boton',function(event){
    event.preventDefault();

    jQuery.ajax({
        url: 'core/controllers/ingresoBodegaBotonController.php',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function(){
            $('#btn-ingreso-bodega').val('loading...');
        }
    })
    .done(function(respuesta){
        console.log(respuesta);
        if(!respuesta.error){
             alertify.success('Saved button in Bodega con success!');
            $('#btn-ingreso-bodega').val('Add button');
            $('#serial').val('');
        }else{
             alertify.error('Error saving in store');
            $('#btn-ingreso-bodega').val('Add button');
        }
    })
    .fail(function(resp){
        console.log(resp.responseText)
    })
    .always(function(){
        console.log("complete")
    });
});
