<?php

session_start();

if(!isset($_SESSION['id']))
{
  session_destroy();
  header("location:index.php");
}

require_once '../models/boton.php';
require '../conexion.php';

$documento = $_POST['documento'];
$num_boton = $_POST['num_boton'];
$nombre_boton = $_POST['nombre_boton'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$latitud = $_POST['latitud'];
$longitud = $_POST['longitud'];
$zona = $_POST['id_zona'];
$contacto = $_POST['contacto'];
$email = $_POST['email_contacto'];
$telefono_2 = $_POST['telefono_2'];

if(activarBoton($conexion,$documento,$num_boton,$nombre_boton,$direccion,$telefono,$latitud,$longitud,$zona,$contacto,
$email,$telefono_2))
{
    echo json_encode(array('error' => false));
}
else
{
    echo json_encode(array('error' => true));
}
