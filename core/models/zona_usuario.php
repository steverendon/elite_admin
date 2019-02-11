<?php

function asignarZonaUsuario($mysql,$v1,$v2)
{
    $consulta = "INSERT INTO zona_usuario(id_zona,id_usuario) VALUES (?,?)";
    $sentencia = $mysql->prepare($consulta);
    $sentencia->bind_param("ii", $id_zona,$id_usuario);
    $id_zona = $mysql->real_escape_string($v1);
    $id_usuario = $mysql->real_escape_string($v2);

    $sentencia->execute();


    if($mysql->affected_rows == 1){
        return true;
    }else{
        return false;
    }
    $sentencia->close();
}

function desasignarZonaUsuario($mysql,$v1,$v2)
{
    $consulta = "DELETE FROM zona_usuario WHERE id_usuario = ? AND id_zona = ?";
    $sentencia = $mysql->prepare($consulta);
    $sentencia->bind_param("ii",$id_usuario,$id_zona);
    $id_usuario = $mysql->real_escape_string($v1);
    $id_zona = $mysql->real_escape_string($v2);

    return $sentencia->execute();

    $sentencia->close();
}
