<?php

#ini_set("session.cookie_lifetime","86400");
#ini_set("session.gc_maxlifetime","86400");
session_start();

if(!isset($_SESSION['id']))
{
    session_destroy();
    header("location:index.php");
}

require_once '../models/servicio.php';
require '../conexion.php';

$id = $_POST['id'];
$estado = 'ASIGNADO';

$resultado = aceptar_solicitud($conexion,$estado,$id);

echo $resultado;
