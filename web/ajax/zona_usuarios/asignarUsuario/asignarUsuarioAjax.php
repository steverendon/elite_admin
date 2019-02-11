<?php

require_once '../../../../core/conexion.php';
require_once '../../../../core/models/zona_usuario.php';

$id_zona = $_POST['id_zona'];
$id_usuario = $_POST['id_usuario'];

if(asignarZonaUsuario($conexion,$id_zona,$id_usuario)){
        echo json_encode(array('error' => false));
}else{
        echo json_encode(array('error' => true));
}
