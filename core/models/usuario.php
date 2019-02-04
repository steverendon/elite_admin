<?php

function login($mysql,$v1,$v2)
{
    $usuario = $mysql->real_escape_string($v1);
    $pass = $mysql->real_escape_string($v2);
    $consulta = "SELECT * FROM usuario WHERE usuario = ? AND pass = ?";
    $sentencia = $mysql->stmt_init();
    $sentencia->prepare($consulta);
    $sentencia->bind_param("ss",$usuario,$pass);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $num = $resultado->num_rows;

    if($num>0)
    {
        session_start();
        $d = $resultado->fetch_array(MYSQLI_NUM);
        $_SESSION['id'] = $d[0];
        $_SESSION['nombre'] = $d[1];
        $_SESSION['usuario'] = $d[2];
        $_SESSION['pass'] = $d[3];
        $_SESSION['rol'] = $d[4];
        return true;
    }
    else
    {
        return false;
    }
}
