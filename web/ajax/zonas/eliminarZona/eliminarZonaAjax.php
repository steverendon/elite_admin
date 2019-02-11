<?php

require_once '../../../../core/conexion.php';
require_once '../../../../core/models/zona.php';

$id = $_POST['id_zona'];

if(eliminarZona($conexion,$id)){
        echo json_encode(array('error' => false));
}else{
        echo json_encode(array('error' => true));
}
