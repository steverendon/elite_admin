<?php

require_once '../models/servicio.php';
require '../conexion.php';


if(mostrar_notificacion($conexion)>0)
{
    echo "<script>
        Push.create('Hello World!')
        </script>";
}
