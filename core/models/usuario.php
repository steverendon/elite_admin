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
        return $d;
    }
    else
    {
        return false;
    }
}

function ver_usuarios($mysql)
{
    $sql = "SELECT * FROM usuario";
    $resultado = $mysql->query($sql);
    while($u = $resultado->fetch_array())
    {
        if($u[4] == 1)
        {
            echo '<button type="button" class="btn btn-outline-primary btn-block">'.$u[1].' ('.$u[2].')</button>';
        }
        else if($u[4] == 2)
        {
            echo '<button type="button" class="btn btn-outline-secondary btn-block">'.$u[1].' ('.$u[2].')</button>';
        }
    }
}

function ingresarUsuario($mysql,$v1,$v2,$v3,$v4)
{
    $consulta = "INSERT INTO usuario(nombre,usuario,pass,rol) VALUES (?,?,?,?)";
    $sentencia = $mysql->prepare($consulta);
    $sentencia->bind_param("ssss", $nombre,$usuario,$pass,$rol);
    $nombre = $mysql->real_escape_string($v1);
    $usuario = $mysql->real_escape_string($v2);
    $pass = $mysql->real_escape_string($v3);
    $rol = $mysql->real_escape_string($v4);

    $sentencia->execute();


    if($mysql->affected_rows == 1){
        return true;
    }else{
        return false;
    }
    $sentencia->close();
}

function eliminarUsuario($mysql,$v1)
{
    $consulta = "DELETE FROM usuario WHERE id = ?";
    $sentencia = $mysql->prepare($consulta);
    $sentencia->bind_param("i", $id);
    $id = $mysql->real_escape_string($v1);

    $sentencia->execute();


    if($mysql->affected_rows == 1){
        return true;
    }else{
        return false;
    }
    $sentencia->close();
}

function lista_usuarios($mysql)
{
    $sql = "SELECT * FROM usuario";
    $resultado = $mysql->query($sql);
    $lista = '<select class="form-control" id="exampleSelect1" name="id_usuario"><option>Seleccione un Agente</option>';
    while($u = $resultado->fetch_array())
    {
        $lista .= '<option value="'.$u[0].'">'.$u[1].' ('.$u[2].')</option>';
    }
    $lista .= '</select>';

    echo $lista;
}
