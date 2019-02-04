<?php

session_start();

if(!isset($_SESSION['id']))
{
  session_destroy();
  header("location:index.php");
}

require_once '../models/servicio.php';
require '../conexion.php';

ini_set('date.timezone','America/New_York');

if(buscar_boton($conexion,$_GET['num_boton']))
{
    $num_boton = $_GET['num_boton'];
    $estado = 'solicitado';
    $time1 = date('H:i:s',time());
    $fecha = date('Y-m-d', time());
    $hora = date("g:i a", strtotime($time1));

    ingresar_solicitud($conexion,$num_boton,$estado,$fecha,$hora);
}
