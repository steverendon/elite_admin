$(document).ready(function(){
    setInterval(
        function(){
            $('#solicitudes_ajax').load('core/controllers/solicitudesAjaxController.php');
        },1000
    );
});
