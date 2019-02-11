<?php

session_start();

if(!isset($_SESSION['id']))
{
  session_destroy();
  header("location:index.php");
}

require_once '../models/servicio.php';
require '../conexion.php';

echo mostrar_panel($conexion);
