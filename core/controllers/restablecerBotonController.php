<?php

session_start();

if(!isset($_SESSION['id']))
{
  session_destroy();
  header("location:index.php");
}

require_once '../models/boton.php';
require '../conexion.php';
sleep(2);
$num_boton = $_POST['num_boton'];

if(restablecer_boton($conexion,$num_boton))
    echo json_encode(array('error' => false));
else
    echo json_encode(array('error' => true));
