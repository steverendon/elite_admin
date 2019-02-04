<?php

function buscarId($mysql,$id)
{
    $mysql->query("SELECT id FROM envios WHERE id_cliente = '$id'");
    $resultado = $mysql->fetch_array();
    $id = $resultado[0];
    return $id;
}

function ubicacion($mysql,$v1,$v2,$v3,$v4)
{
    $consulta = "INSERT INTO ubicacion(id_envio,ubicacion,operador,num_guia)VALUES(?,?,?,?)";
    $sentencia = $mysql->prepare($consulta);
    $sentencia->bind_param("ssss",$id,$ubicacion,$operador,$num_guia);
    $id = $mysql->real_escape_string($v1);
    $ubicacion = $mysql->real_escape_string($v2);
    $operador = $mysql->real_escape_string($v3);
    $num_guia = $mysql->real_escape_string($v4);
    if($sentencia->execute())
    {
        return true;
    }
    else
    {
        return false;
    }
}

function verUbicacion($mysql,$v1)
{
    $id_envio = $mysql->real_escape_string($v1);
    $consulta = "SELECT * FROM ubicacion WHERE id_envio = ?";
    $sentencia = $mysql->stmt_init();
    $sentencia->prepare($consulta);
    $sentencia->bind_param("i",$id_envio);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    while($reg = $resultado->fetch_array(MYSQLI_NUM)){
    echo '<tr>
          <th>'.$reg[1].'</th>
          <td>'.$reg[2].'</td>
          <td>'.$reg[3].'</td>
          <td>'.$reg[4].'</td>
          <td>'.$reg[5].'</td>
          </tr>';
    }
}


 ?>
