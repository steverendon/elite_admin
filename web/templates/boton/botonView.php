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

</body>
</html>
