$(document).ready(function(){
    setInterval(
        function(){
            $('#select-btn').load('web/ajax/boton/select-btn.php');
        },3000
    );
});
