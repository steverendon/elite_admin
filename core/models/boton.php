<?php

function ingresar_boton_bodega($mysql,$v1)
{
    $consulta = "INSERT INTO bodega_boton(num_boton) VALUES (?)";
    $sentencia = $mysql->prepare($consulta);
    $sentencia->bind_param("s",$num_boton);
    $num_boton = $mysql->real_escape_string($v1);

    return $sentencia->execute();

    $sentencia->close();
}

function cambiar_estado_boton($mysql,$v1,$v2)
{
    $consulta = "UPDATE bodega_boton SET estado = ? WHERE num_boton = ?";
    $sentencia = $mysql->prepare($consulta);
    $sentencia->bind_param("ss", $estado,$num_boton);
    $estado = $mysql->real_escape_string($v1);
    $num_boton = $mysql->real_escape_string($v2);

    $sentencia->execute();

    if($mysql->affected_rows)
    {
        return true;
    }

    $sentencia->close();
}

function activarBoton($mysql,$v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8)
{
    $consulta = "INSERT INTO boton(documento,num_boton,nombre_boton,direccion,telefono,latitud,longitud,zona) VALUES (?,?,?,?,?,?,?,?)";
    $sentencia = $mysql->prepare($consulta);
    $sentencia->bind_param("sssssssi",$documento,$num_boton,$nombre_boton,$direccion,$telefono,$latitud,$longitud,$zona);
    $documento = $mysql->real_escape_string($v1);
    $num_boton = $mysql->real_escape_string($v2);
    $nombre_boton = $mysql->real_escape_string($v3);
    $direccion = $mysql->real_escape_string($v4);
    $telefono = $mysql->real_escape_string($v5);
    $latitud = $mysql->real_escape_string($v6);
    $longitud = $mysql->real_escape_string($v7);
    $zona = $mysql->real_escape_string($v8);

    $sentencia->execute();

    if($mysql->affected_rows)
    {
        if(cambiar_estado_boton($mysql,1,$num_boton))
        {
            return true;
        }
    }

    $sentencia->close();
}

function restablecer_boton($mysql,$v1)
{
    $consulta = "DELETE FROM boton WHERE num_boton = ?";
    $sentencia = $mysql->prepare($consulta);
    $sentencia->bind_param("s",$num_boton);
    $num_boton = $mysql->real_escape_string($v1);

    if($sentencia->execute())
        cambiar_estado_boton($mysql,2,$num_boton);

    return $mysql->affected_rows;

    $sentencia->close();
}

function ver_botones_creados($mysql)
{
    $sql = "SELECT COUNT(*) FROM bodega_boton";
    $consulta = $mysql->query($sql);
    $resultado = $consulta->fetch_array();
    return $resultado[0];
}

function ver_botones_activos($mysql)
{
    $sql = "SELECT COUNT(*) FROM bodega_boton WHERE estado = 1";
    $consulta = $mysql->query($sql);
    $resultado = $consulta->fetch_array();
    return $resultado[0];
}

function ver_botones_inactivos($mysql)
{
    $sql = "SELECT COUNT(*) FROM bodega_boton WHERE estado = 2";
    $consulta = $mysql->query($sql);
    $resultado = $consulta->fetch_array();
    return $resultado[0];
}

function select_btn($mysql)
{
    $salida = '';
    $sql = "SELECT num_boton FROM bodega_boton WHERE estado = 0 || estado = 2";
    $consulta = $mysql->query($sql);

    $salida .= '<select class="form-control" id="exampleSelect1" name="num_boton">';
    $salida .= '<option>Elite Button Serial Number</option>';
    while($resultado = $consulta->fetch_array())
    {

        $salida .= '<option value="'.$resultado[0].'">'.$resultado[0].'</option>';

    }
    $salida .= '</select>';

    return $salida;

}

# estado del boton 0 = no ha sido usado
# estado del boton 1 = estado en uso (activo)
# estado del boton 2 = reciclado y listo para un nuevo uso

function resultado_botones($mysql)
{

    $sql = "SELECT num_boton,estado FROM bodega_boton WHERE estado = 0 || estado = 2";
    $consulta = $mysql->query($sql);
    while($resultado = $consulta->fetch_array())
    {
        $p = contar_pulsaciones($mysql,$resultado[0]);
        echo '<li>'.$resultado[0].' <span class="text-danger">'.$v = ($resultado[1]==0)? "New!":" ".'</span> ('.$p.')</li>';
    }

}

function contar_pulsaciones($mysql,$v1)
{
    $num_boton = $mysql->real_escape_string($v1);
    $consulta = "SELECT COUNT(*) FROM servicios WHERE num_boton = ?";
    $sentencia = $mysql->prepare($consulta);
    $sentencia->bind_param('s',$num_boton);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $r = $resultado->fetch_array(MYSQLI_NUM);
    return $r[0];
}
