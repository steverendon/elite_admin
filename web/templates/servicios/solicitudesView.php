<?php require_once 'web/over/header.php'?>

<body style="text-align: center">

 <!-- menu -->

<?php require_once 'web/over/menu.php' ?>

<!-- pagina -->

<!-- Cuerpo pagina -->

<div class="jumbotron">
    <div class="card border-primary mb-3" style="height: 600px;overflow: auto">
      <div class="card-body">
        <div class="card text-white bg-primary mb-3">
          <div class="card-body">
                  <h3 style="text-align: center">
                      <b>New requests</b>
                  </h3>
          </div>
        </div>

        <div id="solicitudes_ajax"></div>

      </div>
    </div>

    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#historial">
    see history</button>

    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#resumen">
    Resumen</button>
</div>

<!-- modal -->

<div class="modal" id="historial"  role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <h5 class="modal-title">HISTORIAL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"  style="height:600px;overflow:auto">

        <div id="historial_ajax"></div>
        <div id="notificaciones"></div>

      </div>
    </div>
  </div>
</div>

<!-- resumen -->

<div class="modal" id="resumen"  role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title">RESUMEN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"  style="height:600px;overflow:auto;text-align:left">

        <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link show active" data-toggle="tab" href="#home">Servicios Asignados</a>
            </li>
            <li class="nav-item">
              <a class="nav-link show" data-toggle="tab" href="#profile">Servicios Cancelados</a>
            </li>
            <li class="nav-item">
              <a class="nav-link show" data-toggle="tab" href="#profile">Vista Por Usuarios</a>
            </li>
          </ul>
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active show" id="home">

                <br>

                <div class="card border-primary mb-3">
                  <div class="card-body">
                    <h4 class="card-title">Servicio Aceptado</h4>
                    <p class="card-text">A las 9:35 am el 2019-12-02 se hizo solicitud de servicio para la direccion cll 45 23 12 con numero de boton 234556777, fue aceptada por Mauricio Roth a las 9:37 am el 2019-12-02</p>
                  </div>
                </div>
                    <div class="card border-primary mb-3">
                      <div class="card-body">
                        <h4 class="card-title">Servicio Aceptado</h4>
                        <p class="card-text">A las 9:35 am el 2019-12-02 se hizo solicitud de servicio para la direccion cll 45 23 12 con numero de boton 234556777, fue aceptada por Mauricio Roth a las 9:37 am el 2019-12-02</p>
                      </div>
                    </div>

            </div>

            <div class="tab-pane fade" id="profile">

                <br>

                <div class="card border-primary mb-3">
                  <div class="card-body">
                    <h4 class="card-title">Servicio Cancelado - zapateria la 15</h4>
                    <p class="card-text">A las 9:35 am el 2019-12-02 se recibio una solicitud de servicio para la direccion cll 45 23 12 con numero de boton 234556777, esta fue cancelado por el siguiente motivo: <b>se presiono el boton por error</b>. Esta gestion fue realizada por el agente Mauricio Roth a las 9:37 am el 2019-12-02</p>
                  </div>
                </div>
                <div class="card border-primary mb-3">
                  <div class="card-body">
                    <h4 class="card-title">Servicio Cancelado - zapateria la 15</h4>
                    <p class="card-text">A las 9:35 am el 2019-12-02 se recibio una solicitud de servicio para la direccion cll 45 23 12 con numero de boton 234556777, esta fue cancelado por el siguiente motivo: <b>se presiono el boton por error</b>. Esta gestion fue realizada por el agente Mauricio Roth a las 9:37 am el 2019-12-02</p>
                  </div>
                </div>
                <div class="card border-primary mb-3">
                  <div class="card-body">
                    <h4 class="card-title">Servicio Cancelado - zapateria la 15</h4>
                    <p class="card-text">A las 9:35 am el 2019-12-02 se recibio una solicitud de servicio para la direccion cll 45 23 12 con numero de boton 234556777, esta fue cancelado por el siguiente motivo: <b>se presiono el boton por error</b>. Esta gestion fue realizada por el agente Mauricio Roth a las 9:37 am el 2019-12-02</p>
                  </div>
                </div>
                    <div class="card border-primary mb-3">
                      <div class="card-body">
                        <h4 class="card-title">Servicio Cancelado</h4>
                        <p class="card-text">A las 9:35 am el 2019-12-02 se hizo solicitud de servicio para la direccion cll 45 23 12 con numero de boton 234556777, fue cancelado por Mauricio Roth a las 9:37 am el 2019-12-02</p>
                      </div>
                    </div>

          </div>

      </div>
    </div>
  </div>
</div>

<audio id="audio" controls style="display:none">
    <source type="audio/wav" src="web/sonidos/notificacion.mp3">
</audio>

<?php require_once 'web/over/footer.php'?>

<script src="web/ajax/servicios/servicio.js"></script>
<script src="web/ajax/servicios/historial.js"></script>
<script src="web/push.js/bin/push.min.js"></script>

</body>
</html>
