function aceptar(id){
    alertify.prompt("Aceptar solicitud","Orden de servicio",
      function(evt, value){
        asignarServicio(id,value);
      },
      function(){
        alertify.error('Cancelado');
      });
}

function cancelar(id){
    alertify.prompt("Cancelar solicitud?","Observaciones",
      function(evt, value){
        cancelarServicio(id,value);
      },
      function(){
        alertify.error('Cancelado');
      });
}

function asignarServicio(id,value){
    $.ajax({
        type:"POST",
        url: "core/controllers/aceptarSolicitudController.php",
        data:{ id:id, value:value },
        success:function(r){
            if(r==1){
                $('#btn-aceptar').attr('disabled','disabled');
                $('#btn-cancelar').attr('disabled','disabled');
                alertify.success("Solicitud aceptada");
            }else{
                alertify.error("Error");
            }
        }
    });
}

function cancelarServicio(id, value){
    $.ajax({
        type:"POST",
        url: 'core/controllers/cancelarSolicitudController.php',
        data:{ id:id, value:value },
        success:function(r){
            if(r==1){
                $('#btn-aceptar').attr('disabled','disabled');
                $('#btn-cancelar').attr('disabled','disabled');
                alertify.success("Solicitud cancelada");
            }else {
                alertify.error("Error");
            }
        }
    });
}
