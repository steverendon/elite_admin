$(document).ready(function(){
    setInterval(
        function(){
            $('#historial_ajax').load('core/controllers/historialAjaxController.php');
        },1000
    );
});
