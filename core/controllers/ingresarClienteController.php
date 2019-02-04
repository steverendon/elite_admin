<?php

session_start();

if(!isset($_SESSION['id']))
{
  session_destroy();
  header("location:index.php");
}

require_once '../models/cliente.php';
require '../conexion.php';

$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$documento = $_POST['documento'];

if(ingresarCliente($conexion,$nombre,$direccion,$telefono,$correo,$documento)){
        echo json_encode(array('error' => false));
}else{
        echo json_encode(array('error' => true));
}
