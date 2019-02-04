<?php

/*
require 'core/conexion.php';
require 'web/over/header.php';
function lanzar_notificacion($mysql)
{
    $sql = "SELECT * FROM servicios WHERE notificacion = '0'";
    $c = $mysql->query($sql);
    while($resultado = $c->fetch_array())
    {
        $tmp = '<script>

                    Push.create("Hello World!");

                </script>';
        echo $tmp;
        sleep(2);
        $id = $resultado['id'];
        $_sql = "UPDATE servicios SET notificacion = 1 WHERE id = '$id'";
        $mysql->query($_sql);
        return $tmp;
    }
}

echo lanzar_notificacion($conexion);
*/
#$sonido = '<embed style="width:0px" src="web/sonidos/notificacion.mp3">';
#echo $sonido;
#require 'core/models/servicio.php';
#echo sonido();
$post["to"] = array('573145872935');
$post["message"] = 'prueba';
$post["from"] = "Elite";
$post["campaignName"] = "Confirmacion servicios";
$user = "elitee";
$password = "elitee@#";
try {
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://dashboard.360nrs.com/api/rest/sms");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
"Accept: application/json",
"Authorization: Basic " . base64_encode($user . ":" . $password)));
$result = curl_exec($ch);
var_dump($result);
} catch (Exception $exc) {
echo $exc->getTraceAsString();
}
?>
