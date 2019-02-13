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

         <div class="card border-primary mb-3">
          <div class="card-body">

            <div class="row">
                <div class="col-lg-3">
                <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-white"><i class="fas fa-search"></i> Buscar</div>
                      <div class="card-body">
                        <div class="form-group">
                            <input class="form-control form-control-lg" type="text" placeholder="Buscar cliente" name="busqueda"  id="busqueda">
                        </div>
                        <div class="form-group">
                          <button type="button" class="btn btn-success btn-lg btn-block" id="dame_ubicacion">Buscar</button>
                        </div>
                      </div>
                    </div>

                    <ul class="list-group">
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        Botones Creados
                        <span class="badge badge-primary badge-pill"><?php echo $botones_creados ?></span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        Botones Activos
                        <span class="badge badge-primary badge-pill"><?php echo $botones_activos ?></span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        Botones Inactivos
                        <span class="badge badge-primary badge-pill"><?php echo $botones_inactivos ?></span>
                      </li>
                    </ul>

                    <br>


                <div class="card bg-light mb-3">
                    <div class="card-header bg-primary text-white"><i class="fas fa-pause"></i> Botones sin uso</div>
                      <div class="card-body" style="height:170px;overflow:auto">
                          <ul style="text-align:left">
                              <?php resultado_botones($conexion) ?>
                         </ul>
                     </div>
                </div>

                </div>

                <div class="col-lg-9">
                    <div style="height: 600px;overflow:auto" id="resultado">

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




<script src="web/ajax/boton/boton.js"></script>

<?php require_once 'web/over/footer.php'?>



<!-- resumen -->

<div class="modal" id="boton_datos" role="dialog">
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
              <a class="nav-link show" data-toggle="tab" href="#boton">Button</a>
            </li>
            <li class="nav-item">
              <a class="nav-link show" data-toggle="tab" href="#cliente">Customer</a>
            </li>
          </ul>
          <div id="myTabContent" class="tab-content">

            <div class="tab-pane fade" id="boton">

                <br>


                <form action="" id="formacbo">

                    <h5>DNS: 8765786587</h5>

                    <hr>

                    <div class="row">

                        <div class="col-lg-4">
                          <div class="form-group">
                            <input class="form-control" type="text" placeholder="Area" id="nombre_boton" name="nombre_boton" required>
                          </div>
                        </div>

                        <div class="col-lg-4">
                          <div class="form-group">
                            <input class="form-control" type="text" placeholder="Email" id="email_contacto" name="email_contacto" required>
                          </div>
                        </div>

                        <div class="col-lg-4">
                          <div class="form-group">
                            <input class="form-control" type="text" placeholder="Contact" id="contacto" name="contacto" required>
                          </div>
                        </div>

                        <div class="col-lg-4">
                          <div class="form-group">
                            <input class="form-control" type="text" placeholder="Main Contant Phone" id="telefono" name="telefono" required>
                          </div>
                        </div>

                        <div class="col-lg-4">
                          <div class="form-group">
                            <input class="form-control" type="text" placeholder="Secondary Contant Phone" id="telefono_2" name="telefono_2">
                            <input class="form-control" type="hidden" placeholder="Secondary Contant Phone" id="boton" name="boton" value="<?php echo $boton ?>">
                          </div>
                        </div>


                        <div class="col-lg-4">
                          <div class="form-group">
                              <input class="btn btn-success btn-block" type="submit" id="btn-activar" value="Update">
                          </div>
                        </div>
                    </div>

                </form>

                <hr>

                <h5>Informacion</h5>

            </div>

            <div class="tab-pane fade" id="cliente">

                <br>

                <?php mostrar_tabla_resumen($conexion); ?>

            </div>

      </div>
    </div>
  </div>
</div>
</div>


</body>
</html>
