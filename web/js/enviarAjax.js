$(document).on('ready',function(){       
    function realizaProceso(nombre, correo, ciudad){
        var parametros = {
                "nombre" : nombre,
                "correo" : correo,
                "correo" : ciudad
        };
        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'php/enviar.php', //archivo que recibe la peticion
                type:  'post', //método de envio
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#resultado").html("Datos enviados");
                }
        });
    }
});