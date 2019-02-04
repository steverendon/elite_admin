<?php

session_start();

if(!isset($_SESSION['id']))
{
  session_destroy();
  header("location:index.php");
}

require_once '../models/servicio.php';
require '../conexion.php';

$id = $_POST['id'];
$estado = 'CANCELADO';

echo aceptar_solicitud($conexion,$estado,$id);
