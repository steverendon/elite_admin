<?php

session_start();

if(!isset($_SESSION['id']))
{
  session_destroy();
  header("location:index.php");
}

if(isset($_GET['view']))
{
    require_once 'web/templates/personas/actualizarContrasenaView.php';
}

if(isset($_POST['btn-actualizar']))
{
    require_once '../conexion.php';
    require_once '../models/persona.php';
    $id = $_SESSION['id'];
    $antiguoPass = md5($_POST['ant_pass']);
    $pass = md5($_POST['pass']);
    if(preActualizar($conexion,$id,$antiguoPass))
    {
        if(actualizar_pass($conexion,$pass,$id))
        {
            header("location:../../index.php?view=actualizarContrasena&mensaje=Contraseña  actualizada");
        }
        else
        {
            header("location:../../index.php?view=actualizarContrasena&mensaje=Error intentalo nuevamente");
        }
    }else
    {
            header("location:../../index.php?view=actualizarContrasena&mensaje=Contraseña antigua equivocada");
    }

}

?>
