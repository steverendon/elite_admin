$(document).ready(function(){
    setInterval(
        function(){
            $('#panel_ajax').load('core/controllers/panelServicioClienteAjaxController.php');
        },1000
    );
});
