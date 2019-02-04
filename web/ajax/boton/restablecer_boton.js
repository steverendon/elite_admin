jQuery(document).on('submit','#formre',function(event){
    event.preventDefault();

    jQuery.ajax({
        url: 'core/controllers/restablecerBotonController.php',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function(){
            $('#load').css("display", "block");
        }
    })
    .done(function(respuesta){
        console.log(respuesta);
        if(!respuesta.error){
             alertify.success('The button has been restored successfully!');
            $('#load').css("display", "none");
        }else{
            $('#load').css("display", "none");
             alertify.error('Error executing this action');
        }
    })
    .fail(function(resp){
        console.log(resp.responseText)
    })
    .always(function(){
        console.log("complete")
    });
});
