<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#"><img src="web/img/boton.png" style="width:90px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">

   <?php if($_SESSION['rol']==1){ ?>

      <ul class="navbar-nav mr-auto">
       <li class="nav-item">
          <a class="nav-link" href="index.php?view=solicitudes"><i class="fas fa-table"></i> Requests <span class="sr-only">(current)</span></a>
        </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?view=administracion"><i class="fas fa-tachometer-alt"></i> Administration Iot</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?view=boton"><i class="fas fa-arrow-alt-circle-up"></i> Button Iot</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?view=administrarUsuarios"><i class="fas fa-user-friends"></i> Manage users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?view=administrarZonas"><i class="fas fa-map-signs"></i> Manage zones</a>
      </li>
    </ul>

<?php }else if($_SESSION['rol']==2){ ?>

        <ul class="navbar-nav mr-auto">
         <li class="nav-item">
            <a class="nav-link" href="index.php?view=panelServicioCliente"><i class="fas fa-table"></i> Requests <span class="sr-only">(current)</span></a>
          </li>
      </ul>

    <?php } ?>

    <span class="navbar-text">
      <p style="margin:0px 20px"><i class="fas fa-user"></i> <?php echo $_SESSION['usuario'] ?></p>
    </span>


    <form class="form-inline my-2 my-lg-0">
     <!-- <input class="form-control mr-sm-2" type="text" placeholder="Search"> -->
      <button class="btn btn-info" type="button" data-toggle="modal" data-target="#salir"><i class="fas fa-sign-out-alt"></i> Exit</button>
    </form>
  </div>
</nav>
