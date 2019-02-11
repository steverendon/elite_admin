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
                        <div class="card bg-light mb-3">
                            <div class="card-header bg-primary text-white"><i class="fas fa-map-marker-alt"></i> Search Ubication</div>
                          <div class="card-body" style="height:153px">
                            <div class="form-group">
                              <button type="button" class="btn btn-info" id="dame_ubicacion">View Ubication</button>
                              <a href="https://www.google.com/maps/d/u/0/edit?hl=es&mid=1YotwVqsXyNKRXwLZnZz38rDDcDQfstdu&ll=26.700250992896862%2C-80.05877213770384&z=15" target="_blank" class="btn btn-outline-info" id="btn-link">View Zone</a>
                            </div>
                              <p><i class="fas fa-globe"></i> <b id="latitud">Latitud:</b></p>
                              <p><i class="fas fa-globe"></i> <b id="longitud">Longitud:</b></p>
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                    <div class="card bg-light mb-3">
                    <div class="card-header bg-primary text-white"><i class="fas fa-user-plus"></i> New Client</div>
                      <div class="card-body" style="height:153px">

                        <form action="" id="formin">
                          <div class="row">
                              <div class="col-lg-4">
                                <div class="form-group">
                                  <input class="form-control text-capitalize" type="text" placeholder="Client Name" name="nombre" id="nombre" required>
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="form-group">
                                  <input class="form-control" type="text" placeholder="Address" name="direccion" id="direccion" required>
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="form-group">
                                  <input class="form-control" type="text" placeholder="Prymary Phone" name="telefono" id="telefono" required>
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="form-group">
                                  <input class="form-control" type="text" placeholder="Email" name="correo" id="correo" required>
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="form-group">
                                  <input class="form-control" type="text" placeholder="Tax Id" name="documento" id="documento" required>
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="form-group">
                                <input class="btn btn-success btn-block" type="submit" id="btn-ingresar" value="Save">
                                </div>
                              </div>
                          </div>
                      </form>

                      </div>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                    <div class="card bg-light mb-3">
                    <div class="card-header bg-primary text-white"><i class="fas fa-check-double"></i> Activate button</div>
                      <div class="card-body">

                        <form action="" id="formac">

                            <div class="row">
                                <div class="col-lg-4">
                                  <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Tax id" id="Documento" name="documento" required>
                                  </div>
                                </div>
                                <div class="col-lg-4">
                                  <!--<div class="form-group">
                                    <input class="form-control form-control-lg text-uppercase " type="text" placeholder="Serial de Boton" id="num_boton" name="num_boton" required>
                                </div>-->
                                <div class="form-group" id="select-btn">
                                    <?php echo select_btn($conexion) ?>
                                </div>
                                </div>
                                <div class="col-lg-4">
                                  <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Cliente Name" id="nombre_boton" name="nombre_boton" required>
                                  </div>
                                </div>
                                <div class="col-lg-4">
                                  <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Longitud" id="input_lon" name="longitud" required>
                                  </div>
                                </div>
                                <div class="col-lg-4">
                                  <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Latitud" id="input_lat" name="latitud" required>
                                  </div>
                                </div>
                                <div class="col-lg-4">
                                  <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Work Order Address" id="direccion" name="direccion" required>
                                  </div>
                                </div>
                                <div class="col-lg-4">
                                  <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Main Contant Phone" id="telefono" name="telefono" required>
                                  </div>
                                </div>

                                <!--

                                  lista de zonas ajax

                                -->


                                <div class="col-lg-2" id="lista_zonas_3">


                                    <!-- ajax -->

                                </div>



                                <!--

                                  lista de zonas ajax

                                -->


                                <div class="col-lg-6">
                                  <div class="form-group">
                                      <input class="btn btn-success btn-block" type="submit" id="btn-activar" value="Activate">
                                  </div>
                                </div>
                            </div>

                        </form>

                      </div>

                    </div>

                        <div class="card text-white bg-primary mb-3">
                            <div class="card-body">
                            <form action="" id="ingresar_bodega_boton">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <a href="#" data-toggle="modal" data-target="#reiniciar"><p style="padding: 10px;text-align: center;color: #fff"><i class="fas fa-window-restore"></i>
                                        Reboot button</p></a>
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="#" data-toggle="modal" data-target="#clientes"><p style="padding: 10px;text-align: center;color: #fff"><i class="fas fa-users"></i>
                                        Clients</p></a>
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="#" data-toggle="modal" data-target="#generar"><p style="padding: 10px;text-align: center;color: #fff"><i class="fas fa-file-code"></i>
                                        Generate code</p></a>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                          <input class="form-control form-control" type="text" placeholder="Elite Button Serial Number" name="serial" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-2">
                                        <input type="submit" class="btn btn-success btn-block" value="Add button" id="btn-ingreso-bodega">
                                    </div>

                                    <div class="col-lg-1">
                                        <a href="index.php?view=administracion" class="btn btn-info btn-block"><i class="fas fa-sync-alt"></i></a>
                                    </div>

                                    </form>


                                    </div>
                                </div>
                            </form>
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

    <!-- modal -->

    <div class="modal" id="reiniciar"  role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">RESTABLECER BOTON</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form action="" id="formre">

          <div class="modal-body">
          <div class="alert alert-dismissible alert-warning">
                <h4 class="alert-heading">PRECAUCION!</h4>
                <p class="mb-0">Esta accion no tiene retroceso. Asegurese de ingresar correctamente el serial del boton por reiniciar.</p>
           </div>
            <div class="form-group">
              <input class="form-control form-control-lg " type="text" placeholder="Serial del boton" id="inputLarge" name="num_boton">
            </div>
          </div>
          <div id="load">
              <img src="web/img/loading.gif" style="width:100px;margin:auto">
              <p style="margin-top:-20px" class="text-primary">Restableciendo...</p>
          </div>
          <div class="modal-footer" id="footer-modal-restablecer">
            <input type="submit" class="btn btn-primary" value="Restablecer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          </div>

        </form>

        </div>
      </div>
    </div>

    <!-- modal -->

    <div class="modal" id="clientes"  role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">CLIENTES REGISTRADOS</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <input class="form-control form-control-lg" type="text" placeholder="Buscar cliente" name="busqueda"  id="busqueda">
            </div>
            <div id="resultado">

            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- modal -->

    <div class="modal" id="generar"  role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">GENERAR CODIGO</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="modal-body">
            <div class="form-group">
              <input class="form-control form-control-lg" type="search" placeholder="Serial del boton" id="numBtn">
            </div>
            <div class="form-group">
                  <textarea class="form-control" id="contenido_textarea" rows="20" style="background: #000;color: #fff" disabled>


                  </textarea>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="generar()">Generar</button>
            <button type="button" class="btn btn-secondary"onclick="cancelar()">Cancelar</button>
          </div>
        </div>
      </div>
    </div>

    <script src="web/ajax/clientes/ingresar_cliente.js"></script>
    <script src="web/ajax/boton/activar_boton.js"></script>
    <script src="web/ajax/boton/restablecer_boton.js"></script>
    <script src="web/ajax/boton/crear_codigo_aws.js"></script>
    <script src="web/ajax/clientes/buscar_cliente.js"></script>
    <script src="web/ajax/boton/ingresar_boton_bodega.js"></script>
    <script src="web/ajax/zonas/listaZonas/listaZonasAjax.js"></script>

<?php require_once 'web/over/footer.php'?>

</body>
</html>
