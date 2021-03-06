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
$value = $_POST['value'];
$agente = $_SESSION['usuario'];
$estado = 'ASIGNADO';

ini_set('date.timezone','America/New_York');
$time1 = date('H:i:s',time());
$fecha = date('Y-m-d', time());
$hora = date("g:i a", strtotime($time1));

echo aceptar_solicitud($conexion,$estado,$id,$fecha,$hora,$agente,$value);
