<?php

function ingresarZona($mysql,$v1)
{
    $consulta = "INSERT INTO zona(zona) VALUES (?)";
    $sentencia = $mysql->prepare($consulta);
    $sentencia->bind_param("s", $zona);
    $zona = $mysql->real_escape_string($v1);

    $sentencia->execute();


    if($mysql->affected_rows == 1){
        return true;
    }else{
        return false;
    }
    $sentencia->close();
}

function eliminarZona($mysql,$v1)
{
    $consulta = "DELETE FROM zona WHERE id = ?";
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

function lista_zonas($mysql)
{
    $sql = "SELECT * FROM zona";
    $resultado = $mysql->query($sql);
    $lista = '<select class="form-control" id="exampleSelect1" name="id_zona"><option>Seleccione Una Zona</option>';
    while($u = $resultado->fetch_array())
    {
        $lista .= '<option value="'.$u[0].'">'.$u[1].'</option>';
    }
    $lista .= '</select>';

    echo $lista;
}

function zonas($mysql)
{
    $sql = "SELECT * FROM zona";
    $resultado = $mysql->query($sql);
    echo '<div class="card mb-3">';
    while($u = $resultado->fetch_array())
    {

        echo '<h3 class="card-header" data-toggle="modal" data-target="#modalAsignacionZona" onClick="agregaDatos('.$u[0].')">'.$u[1].'</h3>';

        zona_usuario($mysql,$u[0]);

    }
    echo '</div>';

}

function zona_usuario($mysql, $id_zona)
{
    $sql = "SELECT id_usuario FROM zona_usuario WHERE id_zona = '$id_zona'";
    $resultado = $mysql->query($sql);

    while($usuario = $resultado->fetch_array())
    {
        $query = "SELECT * FROM usuario WHERE id = '$usuario[0]'";
        $consulta = $mysql->query($query);

        while($record = $consulta->fetch_array())
        {
            echo '<ul class="list-group list-group-flush"><li class="list-group-item">'. $record[1] .' ('. $record[2] . ') <button class="btn btn-danger" onClick="pregunta(' . $record[0] . ',' . $id_zona . ')" style="float:right"> <i class="fas fa-trash-alt" id="minus"></i></li></button></ul>';
        }

    }
}

function zonaSinAgente($mysql)
{
    $sql = "SELECT z.zona FROM zona AS z LEFT JOIN zona_usuario as zu on z.id = zu.id_zona WHERE zu.id_zona IS NULL";
    $query = $mysql->query($sql);
    if($query->num_rows == 0)
    {
        echo 'Todas las zonas estan asignadas';
    }
    else
    {
        while($array = $query->fetch_array())
        {
            echo $array[0] . " - ";
        }
    }
}
