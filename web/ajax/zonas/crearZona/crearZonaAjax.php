<?php

require_once '../../../../core/conexion.php';
require_once '../../../../core/models/zona.php';

$zona = $_POST['zona'];

if(ingresarZona($conexion,$zona)){
        echo json_encode(array('error' => false));
}else{
        echo json_encode(array('error' => true));
}
