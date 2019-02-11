<?php

require_once '../../../../core/conexion.php';
require_once '../../../../core/models/usuario.php';

$id = $_POST['id_usuario'];

if(eliminarUsuario($conexion,$id)){
        echo json_encode(array('error' => false));
}else{
        echo json_encode(array('error' => true));
}
