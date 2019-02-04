<?php

session_start();

if(!isset($_SESSION['id']))
{
  session_destroy();
  header("location:index.php");
}

require_once '../models/boton.php';
require '../conexion.php';

$salida = "";
$query = "SELECT * FROM boton";

if(isset($_POST['consulta']))
{
    $q = $conexion->real_escape_string($_POST['consulta']);
    $query = "SELECT * FROM boton WHERE num_boton LIKE '%".$q ."%' OR documento LIKE '%".$q ."%'";
}

$resultado = $conexion->query($query);

if($resultado->num_rows>0)
{
    $salida .= '<table class="table table-hover" style="overflow:auto">
                      <thead class="bg-primary text-white">
                        <tr>
                          <th scope="col">Nombre</th>
                          <th scope="col">Serial</th>
                          <th scope="col">Direccion</th>
                          <th scope="col">Telefono</th>
                          <th scope="col">Pagador</th>
                        </tr>
                      </thead>
                      <tbody style="height: 600px;overflow: auto">';

        while($fila=$resultado->fetch_assoc())
        {
            $p = contar_pulsaciones($conexion,$fila['num_boton']);
            $salida .= " <tr>
                          <th>".$fila['nombre_boton']."</th>
                          <td>".$fila['num_boton']." (".$p.")</td>
                          <td>".$fila['direccion']."</td>
                          <td>".$fila['telefono']."</td>
                          <td>".$fila['documento']."</td>
                         </tr>";
        }

        $salida .= "</tbody></table>";
}
else
{
    $salida .= "No hay datos";
}

echo $salida;

$conexion->close();

 ?>
