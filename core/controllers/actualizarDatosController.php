<?php

ini_set('display_errors', 1);

session_start();

if(!isset($_SESSION['id']))
{
  session_destroy();
  header("location:index.php");
}

if(isset($_GET['view']))
{
    require 'core/conexion.php';
    require 'core/models/persona.php';
    $id = $_SESSION['id'];
    $r = resultSet($conexion,$id);
    require_once 'web/templates/personas/actualizarDatosView.php';
}

if(isset($_POST['btn-actualizar']))
{
    require '../conexion.php';
    require '../models/persona.php';
    $num_doc = $_POST['num_doc'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $departamento = $_POST['departamento'];
    $ciudad = $_POST['ciudad'];
    $direccion = $_POST['direccion'];
    $id = $_SESSION['id'];

    actualizarRegistro($conexion,$num_doc,$nombre,$telefono,$correo,$departamento,$ciudad,$direccion,$id);

    header("location:../../index.php?view=actualizarDatos");
}
