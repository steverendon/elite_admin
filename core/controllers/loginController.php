<?php

require_once '../models/usuario.php';
require '../conexion.php';

$usuario = $_POST['usuario'];
$pass = $_POST['pass'];
$dato = login($conexion,$usuario,$pass);
if(isset($dato) && !empty($dato))
{
    echo json_encode(array('error' => false, 'tipo' => $dato[4]));
}
else
{
    echo json_encode(array('error' => true));
}
