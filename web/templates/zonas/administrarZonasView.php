<?php require_once 'web/over/header.php'?>

<body style="text-align: center">

 <!-- menu -->

<?php require_once 'web/over/menu.php' ?>

<!-- pagina -->

<!-- Cuerpo pagina -->

<div class="contenido">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
        <div class="card-body">
    <div class="row justify-content-center">
        <div class="col-lg-12">
             <div class="card border-primary mb-3" style="text-align:left">
              <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">

                        <!--

                        formulario crear zona

                        -->

                        <form action="" id="formzo">

                        <div class="card bg-light mb-3">
                            <div class="card-header bg-primary text-white"><i class="fas fa-plus"></i> Agregar zona</div>
                          <div class="card-body" style="height:176px;overflow:auto">
                              <div class="form-group">
                                  <input type="text" class="form-control form-control-lg" placeholder="Nombre de zona (Ej: zona 1)" id="zona" name="zona" required>
                              </div>
                              <input type="submit" class="btn btn-primary btn-lg btn-block" value="Agregar">
                          </div>
                        </div>

                        </form>

                        <div class="card bg-light mb-3">
                            <div class="card-header bg-primary text-white"><i class="fas fa-minus"></i> Eliminar zona</div>
                          <div class="card-body" style="height:176px;overflow:auto">


                              <!--

                              lista de zonas ajax y formulario para eliminar zona

                                -->
                              <form action="" id="formzoel">

                                  <div class="form-group" id="lista_zonas">

                                  </div>



                                  <input type="submit" class="btn btn-warning btn-lg btn-block" value="Eliminar" id="btn-eliminar-zona">


                              </form>

                          </div>
                        </div>


                        <!--


                        Zona sin agente ajax  zona alerta

                        -->

                    <div class="alert alert-dismissible alert-info" id="alerta">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <h4 class="alert-heading">Alerta!</h4>
                          <p class="mb-0" id="zonaSinAgente"></p>
                    </div>


                      <!--


                      Zona sin agente ajax  zona alerta

                      -->

                    </div>
                    <div class="col-lg-8">
                        <div class="card bg-light mb-3">
                            <div class="card-header bg-primary text-white"><i class="fas fa-user-edit"></i> Zonas</div>



                            <!--


                            Zonas ajax

                            -->


                          <div class="card-body" style="height:520px;overflow:auto" id="zonas">




                          </div>



                          <!--


                          Zonas ajax

                          -->



                </div>



    </div>

    </div>

    </div>
  </div>
</div>
</div>
    </div>
        </div>
    </div>
    </div>
    </div>

</div>

                <!--

                modal asignacion de usuario

                -->

    <div class="modal" id="modalAsignacionZona">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Asignar Usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" id="formas">
              <div class="modal-body">
                    <div class="form-group" id="lista_usuarios_3"></div>
                    <input type="hidden" value="" id="zonau" name="id_zona">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Agregar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
          </form>
        </div>
      </div>
    </div>


    <script src="web/ajax/zonas/crearZona/crearZonaAjax.js"></script>
    <script src="web/ajax/zonas/eliminarZona/eliminarZonaAjax.js"></script>
    <script src="web/ajax/zonas/listaZonas/listaZonasAjax.js"></script>
    <script src="web/ajax/zonas/zonas/zonasAjax.js"></script>
    <script src="web/ajax/zonas/zonaAlerta/zonaAlertaAjax.js"></script>
    <script src="web/ajax/zona_usuarios/desasignarUsuario/desasignarUsuarioAjax.js"></script>
    <script src="web/ajax/usuarios/listaUsuario/listaUsuariosAjax.js"></script>
    <script src="web/ajax/zona_usuarios/asignarUsuario/asignarUsuarioAjax.js"></script>

<?php require_once 'web/over/footer.php'?>

</body>
</html>
