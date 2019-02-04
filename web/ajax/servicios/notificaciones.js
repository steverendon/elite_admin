$(document).ready(function(){
    setInterval(
        function(){
            $('#notificaciones').load('core/controllers/notificacionesAjaxController.php');
        },1000
    );
});
