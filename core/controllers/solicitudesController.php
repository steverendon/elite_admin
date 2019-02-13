<?php

if(!isset($_SESSION['id']))
{
  session_destroy();
  header("location:index.php");
}

require_once 'core/conexion.php';
require_once 'core/models/servicio.php';

require_once 'web/templates/servicios/solicitudesView.php';
