jQuery(document).on('submit','#formlg',function(event){
    event.preventDefault();

    jQuery.ajax({
        url: 'core/controllers/loginController.php',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function(){
            $('#btn-login').val('Validando...');
        }
    })
    .done(function(respuesta){
        console.log(respuesta);
        if(!respuesta.error){
            var p = 'solicitudes';
            location.href = 'index.php?view='+p;
        }else{
            $('.error_login').slideDown('slow');
            setTimeout(function(){
                $('.error_login').slideUp('slow');
            },3000);
            $('#btn-login').val('Ingresar');
        }
    })
    .fail(function(resp){
        console.log(resp.responseText)
    })
    .always(function(){
        console.log("complete")
    });
});
