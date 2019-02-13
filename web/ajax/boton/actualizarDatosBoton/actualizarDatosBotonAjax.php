<?php

require_once '../../../../core/conexion.php';
require_once '../../../../core/models/boton.php';

$area = $_POST['area'];
$email = $_POST['email'];
$contacto = $_POST['contacto'];
$telefono = $_POST['telefono'];
$telefono_2 = $_POST['telefono_2'];
$boton = $_POST['boton'];

if(actualizar_datos_boton($mysql,$boton,$area,$email,$contacto,$telefono,$telefono_2))
{
    echo json_encode(array('error' => false));
}
else
{
    echo json_encode(array('error' => true));
}
