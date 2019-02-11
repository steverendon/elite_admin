<?php

/*
require 'core/conexion.php';
require 'web/over/header.php';
function lanzar_notificacion($mysql)
{
    $sql = "SELECT * FROM servicios WHERE notificacion = '0'";
    $c = $mysql->query($sql);
    while($resultado = $c->fetch_array())
    {
        $tmp = '<script>

                    Push.create("Hello World!");

                </script>';
        echo $tmp;
        sleep(2);
        $id = $resultado['id'];
        $_sql = "UPDATE servicios SET notificacion = 1 WHERE id = '$id'";
        $mysql->query($_sql);
        return $tmp;
    }
}

echo lanzar_notificacion($conexion);
*/
#$sonido = '<embed style="width:0px" src="web/sonidos/notificacion.mp3">';
#echo $sonido;
#require 'core/models/servicio.php';
#echo sonido();\

/*
require 'core/conexion.php';
session_start();
$id = $_SESSION['id'];
$sql = "SELECT id_zona FROM zona_usuario WHERE id_usuario = '$id'";
$r = $conexion->query($sql);
while($rz = $r->fetch_array())
{
    echo $rz[0].'<br>';
}
*/
$nombre = '';

if($nombre)
    echo true;
else
    echo false;
