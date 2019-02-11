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
                            <div class="card-header bg-primary text-white"><i class="fas fa-user-friends"></i> Usuarios</div>



                          <div class="card-body" id="usuarios" style="height:520px">

                          </div>



                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card bg-light mb-3">
                            <div class="card-header bg-primary text-white"><i class="fas fa-user-edit"></i> Asignar Usuario / Cambiar Usuario</div>
                          <div class="card-body">

                              <!--


                              formulario asignar usuarios

                                -->


                              <form action="" id="formas">

                              <div class="row">
                                  <div class="col-lg-4">
                                      <div class="form-group">

                                          <div class="form-group" id="lista_zonas_2">

                                          </div>

                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="form-group">

                                          <!--
                                          lista de usuarios ajax

                                          -->

                                           <div class="form-group" id="lista_usuarios"></div>

                                           <!-- lista usuario ajax -->

                                      </div>
                                  </div>
                                  <div class="col-lg-2">
                                    <input type="submit" class="btn btn-success btn-block" id="btn-asignar-usuario" value="Asignar">
                                  </div>
                              </div>

                          </form>





                      </div>
                    </div>

                    <!--

                    formulario ingreso de usuario

                    -->

                    <div class="card bg-light mb-3">
                        <div class="card-header bg-primary text-white"><i class="fas fa-user-plus"></i> Crear Usuario</div>
                      <div class="card-body">

                      <form action="" id="formus">

                          <div class="row">
                              <div class="col-lg-3">
                                  <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre">
                                  </div>
                              </div>
                              <div class="col-lg-3">
                                  <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Usuario" id="usuario" name="usuario">
                                  </div>
                              </div>
                              <div class="col-lg-3">
                                  <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Clave" id="clave" name="clave">
                                  </div>
                              </div>
                              <div class="col-lg-3">
                                  <div class="form-group">
                                    <select class="form-control" id="rol" name="rol">
                                      <option>Rol</option>
                                      <option value="1">Administrador</option>
                                      <option value="2">Agente</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="col-lg-2">
                                <input type="submit" class="btn btn-success btn-block" id="btn_ingresar_usuario" value="Crear">
                              </div>
                          </div>

                      </form>

                  </div>
                </div>


                <!--

                formulario ingreso de usuario

                -->



                <div class="card bg-light mb-3">
                    <div class="card-header bg-primary text-white"><i class="fas fa-user-minus"></i> Eliminar Usuario</div>
                  <div class="card-body">
                      <form action="" id="formel">

                      <div class="row">
                          <div class="col-lg-6">

                             <!--
                             lista de usuarios ajax

                             -->

                              <div class="form-group" id="lista_usuarios_2"></div>

                              <!-- lista usuario ajax -->

                          </div>
                          <div class="col-lg-2">
                            <input type="submit" class="btn btn-warning btn-block" value="Eliminar">
                          </div>
                      </div>

                  </form>

              </div>
            </div>

            <a href="index.php?view=administrarZonas"><button type="button" class="btn btn-primary btn-lg btn-block">Ir a Administracion De Zonas</button></a>

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

<script src="web/ajax/usuarios/verUsuariosAjax.js"></script>
<script src="web/ajax/usuarios/ingresarUsuario/ingresarUsuarioAjax.js"></script>
<script src="web/ajax/usuarios/listaUsuario/listaUsuariosAjax.js"></script>
<script src="web/ajax/usuarios/eliminarUsuario/eliminarUsuarioAjax.js"></script>
<script src="web/ajax/zona_usuarios/asignarUsuario/asignarUsuarioAjax.js"></script>
<script src="web/ajax/zonas/listaZonas/listaZonasAjax.js"></script>


<?php require_once 'web/over/footer.php'?>

</body>
</html>
