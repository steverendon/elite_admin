<?php

#ini_set("session.cookie_lifetime","20");
#ini_set("session.gc_maxlifetime","20");
session_start();

if(!isset($_SESSION['id']))
{
  session_destroy();
  header("location:index.php");
}

require_once 'web/templates/servicios/solicitudesView.php';
