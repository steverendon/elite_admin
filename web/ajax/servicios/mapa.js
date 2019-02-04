function aceptar(id){
    alertify.confirm("Aceptar solicitud","Aceptar solicitud de servicio",
      function(){
        asignarServicio(id);
      },
      function(){
        alertify.error('Cancelado');
      });
}

function cancelar(id){
    alertify.confirm("Cancelar solicitud","Esta seguro de cancelar esta solicitud de servicio?",
      function(){
        cancelarServicio(id);
      },
      function(){
        alertify.error('Cancelado');
      });
}

function asignarServicio(id){
    $.ajax({
        type:"POST",
        url: "core/controllers/aceptarSolicitudController.php",
        data:{ id:id },
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

function cancelarServicio(id){
    $.ajax({
        type:"POST",
        url: 'core/controllers/cancelarSolicitudController.php',
        data:{ id:id },
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
