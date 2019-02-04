<?php

require_once '../models/usuario.php';
require '../conexion.php';

$usuario = $_POST['usuario'];
$pass = $_POST['pass'];
if(login($conexion,$usuario,$pass))
{
    echo json_encode(array('error' => false));
}
else
{
    echo json_encode(array('error' => true));
}
