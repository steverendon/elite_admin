<?php

session_start();

if(!isset($_SESSION['id']))
{
  session_destroy();
  header("location:index.php");
}

require_once 'web/templates/servicios/panelServicioClienteView.php'; ?>
