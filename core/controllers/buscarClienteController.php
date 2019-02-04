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
$query = "SELECT * FROM cliente";

if(isset($_POST['consulta']))
{
    $q = $conexion->real_escape_string($_POST['consulta']);
    $query = "SELECT * FROM cliente WHERE nombre LIKE '%".$q ."%' OR documento LIKE '%".$q ."%'";
}

$resultado = $conexion->query($query);

if($resultado->num_rows>0)
{
    $salida .= "<table class='table table-hover'>
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Direccion</th>
                          <th>Telefono</th>
                          <th>Correo</th>
                          <th>Documento</th>
                        </tr>
                      </thead>
                    <tbody style='height: 100px;overflow: auto'>";

        while($fila=$resultado->fetch_assoc())
        {
            $salida .= " <tr>
                          <th>".$fila['nombre']."</th>
                          <td>".$fila['direccion']."</td>
                          <td>".$fila['telefono']."</td>
                          <td>".$fila['correo']."</td>
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
