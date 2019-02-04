<?php

function ingresarCliente($mysql,$v1,$v2,$v3,$v4,$v5)
{
    $consulta = "INSERT INTO cliente(nombre,direccion,telefono,correo,documento) VALUES (?,?,?,?,?)";
    $sentencia = $mysql->prepare($consulta);
    $sentencia->bind_param("sssss", $nombre,$direccion,$telefono,$correo,$documento);
    $nombre = $mysql->real_escape_string($v1);
    $direccion = $mysql->real_escape_string($v2);
    $telefono = $mysql->real_escape_string($v3);
    $correo = $mysql->real_escape_string($v4);
    $documento = $mysql->real_escape_string($v5);

    $sentencia->execute();


    if($mysql->affected_rows == 1){
        return true;
    }else{
        return false;
    }
    $sentencia->close();
}

function actualizarRegistro($mysql,$v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8)
{
    $consulta = "UPDATE personas SET num_doc = ?,nombre = ?,telefono = ?,correo = ?,departamento = ?,
    ciudad = ?,direccion = ? WHERE id = ?";
    $sentencia = $mysql->prepare($consulta);
    $sentencia->bind_param("ssssssss", $num_doc,$nombre,$telefono,$correo,$departamento,$ciudad,$direccion,$id);
    $num_doc = $mysql->real_escape_string($v1);
    $nombre = $mysql->real_escape_string($v2);
    $telefono = $mysql->real_escape_string($v3);
    $correo = $mysql->real_escape_string($v4);
    $departamento = $mysql->real_escape_string($v5);
    $ciudad = $mysql->real_escape_string($v6);
    $direccion = $mysql->real_escape_string($v7);
    $id = $mysql->real_escape_string($v8);

    $sentencia->execute();
    $sentencia->close();
}

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
        $_SESSION['num_doc'] = $d[1];
        $_SESSION['nombre'] = $d[2];
        $_SESSION['telefono'] = $d[3];
        $_SESSION['correo'] = $d[4];
        return true;
    }
    else
    {
        return false;
    }
}

function preActualizar($mysql,$v1,$v2)
{
    $id = $mysql->real_escape_string($v1);
    $contrasena = $mysql->real_escape_string($v2);
    $consulta = "SELECT * FROM personas WHERE id = ? AND contrasena = ?";
    $sentencia = $mysql->stmt_init();
    $sentencia->prepare($consulta);
    $sentencia->bind_param("is",$id,$contrasena);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $num = $resultado->num_rows;

    if($num>0)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function infoCliente($mysql,$v1){
    $correo = $mysql->real_escape_string($v1);
    $consulta = "SELECT * FROM personas WHERE id = ?";
    $sentencia = $mysql->prepare($consulta);
    $sentencia->bind_param('s',$correo);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $r = $resultado->fetch_array(MYSQLI_NUM);
    return $r;
}

function IdCliente($mysql,$v1){
    $correo = $mysql->real_escape_string($v1);
    $consulta = "SELECT id FROM personas WHERE correo = ?";
    $sentencia = $mysql->prepare($consulta);
    $sentencia->bind_param('s',$correo);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $r = $resultado->fetch_array(MYSQLI_NUM);
    return $r[0];
}

function dataId($mysql,$v1){
    $correo = $mysql->real_escape_string($v1);
    $consulta = "SELECT * FROM personas WHERE correo = ?";
    $sentencia = $mysql->prepare($consulta);
    $sentencia->bind_param('s',$correo);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $r = $resultado->fetch_array(MYSQLI_NUM);
    return $r;
}

function resultSet($mysql,$id){
    $consulta = "SELECT * FROM personas WHERE id = ?";
    $sentencia = $mysql->stmt_init();
    $sentencia->prepare($consulta);
    $sentencia->bind_param("i",$id);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $r = $resultado->fetch_array(MYSQLI_NUM);
    return $r;
}

function mostrarUsuarios($mysql,$id){
    $consulta = "SELECT * FROM personas WHERE id = ? OR num_doc = ?";
    $sentencia = $mysql->stmt_init();
    $sentencia->prepare($consulta);
    $sentencia->bind_param("ss",$id,$id);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $r = $resultado->fetch_array(MYSQLI_NUM);
    echo '
        <td>'.$r[0].'</td>
        <td>'.$r[1].'</td>
        <td>'.$r[2].'</td>
        <td>'.$r[3].'</td>
        <td>'.$r[4].'</td>
        <td>'.$r[6].'</td>
        <td>'.$r[7].'</td>
        <td>'.$r[8].'</td>
        <td><a href="index.php?view=verUsuario&accion=descripcion&id='.$r[0].'">Ver</td>
    ';
}

function num_usuarios($mysql){
    $consulta = $mysql->query("SELECT COUNT(id) FROM personas");
    $r = $consulta->fetch_array();
    return $r[0];
}

?>
