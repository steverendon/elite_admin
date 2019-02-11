<?php

session_start();

if(!isset($_SESSION['id']))
{
  session_destroy();
  header("location:index.php");
}

require_once 'core/conexion.php';
require_once 'core/models/boton.php';

require_once 'web/templates/usuarios/administrarUsuariosView.php';
