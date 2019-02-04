<?php

session_start();

if(isset($_SESSION['id']) )
{
    if($_SESSION['rol'] != 1 && $_SESSION['rol'] != 4)
    {
        echo 'Sin permisos';
        die();
    }
}
else
{
    echo 'Sin permisos';
    session_destroy();
    die();
}


$sesion_id = $_SESSION['id'];

if(isset($_GET['view']))
{
    if(isset($_GET['accion'])&&$_GET['accion']=='guia')
    {
        require_once 'core/models/envio.php';
        require_once 'core/conexion.php';
        require_once 'web/templates/envios/codigoQrView.php';
    }
    else
    {
        require_once 'web/templates/envios/ingresarPaqueteView.php';
    }
}

if(isset($_POST['btn-ingresarPaquete']))
{
    require '../conexion.php';
    require '../models/envio.php';
    require '../models/ubicacion.php';

    $id = $_POST['id'];
    $libras = $_POST['libras'];
    $descripcion = $_POST['descripcion'];
    $caja = $_POST['caja'];

    $envios_disponibles = consultarEnviosDisponibles($conexion,$id);
    $membresia = buscarMembresia($conexion,$libras,$id);//devuelve cero en caso de no encontrar una membresia

    if(verId($conexion,$id))
    {
        if($membresia != 0)
        {
            if(enviarProducto($conexion,$id,$libras,$sesion_id,$descripcion,$caja))
            {
                if(cobrarEnvio($conexion,$membresia,$libras))
                {
                    $codigo = generarCodigoQr($id);
                    $paquete = maxId($conexion);
                    $usuario = $_SESSION['id'];
                    $ubicacion = 'Ingresado a bodega Miami';
                    $msj = 'Tu pedido ya llego a AmazonPrime.com.co Miami';
                    $telefono = telefonoCliente($conexion,$paquete);
                    enviarMsj($telefono,$msj);
                    ubicacion($conexion,$paquete,$ubicacion,$usuario,'N/A');
                    header("location:../../index.php?view=ingresarPaquete&accion=guia&codigo=$codigo&id=$id&paquete=$paquete");
                }

            }
            else
            {
                echo 'error al ejecutar la consulta';
            }
        }
        else
        {
            $paquete = maxId($conexion);
            $telefono = telefonoCliente($conexion,$paquete);
            $msj = 'Hemos recibido un pedido a tu nombre pero has agotado todos tus envios, compra una nueva membresia para poder enviar tu producto - AmazonPrime.com.co';
            enviarMsj($telefono,$msj);
            echo 'no tiene envios disponibles';
        }
    }
    else
    {
        echo 'el id no existe';
    }
}

?>
