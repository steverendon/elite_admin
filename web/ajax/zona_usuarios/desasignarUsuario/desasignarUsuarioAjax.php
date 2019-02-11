<?php

require_once '../../../../core/conexion.php';
require_once '../../../../core/models/zona_usuario.php';

$id_usuario = $_POST['id_usuario'];
$id_zona = $_POST['id_zona'];

if(desasignarZonaUsuario($conexion,$id_usuario,$id_zona))
{
    echo json_encode(array('error' => false));
}
else
{
    echo json_encode(array('error' => true));
}
