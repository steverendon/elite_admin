<?php

require_once '../../../../core/conexion.php';
require_once '../../../../core/models/usuario.php';

$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$rol = $_POST['rol'];

if(ingresarUsuario($conexion,$nombre,$usuario,$clave,$rol)){
        echo json_encode(array('error' => false));
}else{
        echo json_encode(array('error' => true));
}
