<?php

session_start();

if(!isset($_SESSION['id']))
{
  session_destroy();
  header("location:index.php");
}

require_once 'core/conexion.php';
require_once 'core/models/boton.php';

$botones_creados = ver_botones_creados($conexion);
$botones_activos = ver_botones_activos($conexion);
$botones_inactivos = ver_botones_inactivos($conexion);

require_once 'web/templates/boton/botonView.php';
