<?php

if(isset($_GET['view']))
{
    require_once 'web/templates/usuarios/loginView.php';
}

if(isset($_POST['btn-login']))
{
    require '../conexion.php';
    require_once '../models/usuario.php';

    $documento = $_POST['documento'];
    $contrasena = $_POST['contrasena'];

    if(login($conexion,$documento,$contrasena))
    {
        header("location:../../index.php?view=buscarPaquete");
    }
}

?>
