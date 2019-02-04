<?php

session_start();

if(!isset($_SESSION['id']))
{
  session_destroy();
  header("location:index.php");
}

require_once '../models/boton.php';
require '../conexion.php';

$serial = $_POST['serial'];

if(ingresar_boton_bodega($conexion,$serial))
    echo json_encode(array('error' => false));
else
    echo json_encode(array('error' => true));
