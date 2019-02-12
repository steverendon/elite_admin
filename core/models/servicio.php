<?php

function mostrar_solicitud($mysql)
{
$query = "SELECT b.documento,b.direccion,b.telefono,b.latitud,b.longitud,s.estado,s.fecha,s.hora,s.id,b.latitud,b.longitud, b.nombre_boton, b.zona FROM servicios as s LEFT JOIN boton as b on s.num_boton = b.num_boton where s.estado = 'solicitado' ORDER BY s.id DESC";
$resultado = $mysql->query($query);

$salida = "<table class='table table-hover' style='overflow:auto'>
              <thead>
                <tr>
                  <th scope='col'>Service Address</th>
                  <th scope='col'>Telephone</th>
                  <th scope='col'>Name</th>
                  <th scope='col'>Zone</th>
                  <th scope='col'>State</th>
                  <th scope='col'>Date</th>
                  <th scope='col'>Hour</th>
                  <th scope='col'></th>
                </tr>
              </thead>
              <tbody>";

while($fila=$resultado->fetch_array())
{
    $salida .= " <tr>
                  <th>".$fila[1]."</th>
                  <td>".$fila[2]."</td>
                  <td>".$fila[11]."</td>
                  <td>".$fila[12]."</td>
                  <td>".$fila[5]."</td>
                  <td>".$fila[6]."</td>
                  <td>".$fila[7]."</td>
                  <td><a href='index.php?view=mapa&documento=".$fila[0]."&id=".$fila[8]."&estado=".$fila[5]."&latitud=".$fila[9]."&longitud=".$fila[10]."&direccion=".$fila[1]."&fecha=".$fila[6]."&hora=".$fila[7]."'><i class='fas fa-caret-right' style='font-size:2em'></i></a></td>
                </tr>";
}

$salida .= "</tbody></table>";

lanzar_notificacion($mysql);

return $salida;

}


function mostrar_panel($mysql)
{
$query = "SELECT b.documento,b.direccion,b.telefono,b.latitud,b.longitud,s.estado,s.fecha,s.hora,s.id,b.latitud,b.longitud, b.nombre_boton, b.zona FROM servicios as s LEFT JOIN boton as b on s.num_boton = b.num_boton where s.estado = 'solicitado' ORDER BY s.id DESC";
$resultado = $mysql->query($query);

$salida = "<table class='table table-hover' style='overflow:auto'>
              <thead>
                <tr>
                  <th scope='col'>Service Address</th>
                  <th scope='col'>Telephone</th>
                  <th scope='col'>Name</th>
                  <th scope='col'>Zone</th>
                  <th scope='col'>State</th>
                  <th scope='col'>Date</th>
                  <th scope='col'>Hour</th>
                  <th scope='col'></th>
                </tr>
              </thead>
              <tbody>";

while($fila=$resultado->fetch_array())
{
    $id = $_SESSION['id'];
    $sql = "SELECT id_zona FROM zona_usuario WHERE id_usuario = '$id'";
    $r = $mysql->query($sql);
    while($rz = $r->fetch_array())
    {
        if($rz[0] == $fila[12])
        {
            $salida .= " <tr>
                          <th>".$fila[1]."</th>
                          <td>".$fila[2]."</td>
                          <td>".$fila[11]."</td>
                          <td>".$fila[12]."</td>
                          <td>".$fila[5]."</td>
                          <td>".$fila[6]."</td>
                          <td>".$fila[7]."</td>
                          <td><a href='index.php?view=mapa&documento=".$fila[0]."&id=".$fila[8]."&estado=".$fila[5]."&latitud=".$fila[9]."&longitud=".$fila[10]."&direccion=".$fila[1]."&fecha=".$fila[6]."&hora=".$fila[7]."'><i class='fas fa-caret-right' style='font-size:2em'></i></a></td>
                        </tr>";

            lanzar_notificacion($mysql);
        }
    }
}


$salida .= "</tbody></table>";

return $salida;

}

function ver_zona($mysql,$id)
{
    $sql = "SELECT id_zona FROM zona_usuario WHERE id_usuario = '$id'";
    $resultado = $mysql->query($sql);
    $q = $resultado->fetch_array();
    return $q;
}

function mostrar_historial($mysql)
{
$query = "SELECT b.num_boton,b.direccion,b.telefono,b.latitud,b.longitud,s.estado,s.fecha,s.hora, b.nombre_boton FROM servicios as s LEFT JOIN boton as b on s.num_boton = b.num_boton ORDER BY s.id DESC";
$resultado = $mysql->query($query);

$salida = "<table class='table table-hover'>
              <thead>
                <tr>
                  <th scope='col'>Direccion del servicio</th>
                  <th scope='col'>Telefono</th>
                  <th scope='col'>Nombre</th>
                  <th scope='col'>Estado</th>
                  <th scope='col'>Fecha</th>
                  <th scope='col'>Hora</th>
                </tr>
              </thead>
              <tbody>";

while($fila=$resultado->fetch_array())
{
    $salida .= " <tr>
                  <th>".$fila[1]."</th>
                  <td>".$fila[2]."</td>
                  <td>".$fila[8]."</td>
                  <td>".$fila[5]."</td>
                  <td>".$fila[6]."</td>
                  <td>".$fila[7]."</td>
                </tr>";
}

$salida .= "</tbody></table>";

return $salida;

}

function mostrar_resumen_aceptados($mysql)
{
$query = "SELECT b.num_boton,b.direccion,b.zona,b.telefono,b.nombre_boton,s.estado,s.fecha,s.hora,s.fecha_rta,s.hora_rta,s.agente,s.value FROM servicios as s LEFT JOIN boton as b on s.num_boton = b.num_boton where s.estado = 'ASIGNADO' ORDER BY s.id DESC";
$resultado = $mysql->query($query);



    while($fila=$resultado->fetch_array())
    {
        echo '<div class="card border-primary mb-3">
                <div class="card-body">
                  <h4 class="card-title">Servicio Aceptado - <b>'.$fila[4].'</b></h4>
                  <p class="card-text">Solicitado a las <b>'.$fila[7].'</b> el <b>'.$fila[6].'</b>. Para la direccion '.$fila[1].'. Serial del boton <b>'.$fila[0].'</b>. Fue aceptado por <b>'.$fila[10].'</b> y el numero de orden <b>'.$fila[11].'</b> a las <b>'.$fila[9].'</b> el <b>'.$fila[8].'</b></p>
                </div>
              </div>';
    }

}

function mostrar_resumen_cancelados($mysql)
{
$query = "SELECT b.num_boton,b.direccion,b.zona,b.telefono,b.nombre_boton,s.estado,s.fecha,s.hora,s.fecha_rta,s.hora_rta,s.agente,s.value FROM servicios as s LEFT JOIN boton as b on s.num_boton = b.num_boton where s.estado = 'CANCELADO' ORDER BY s.id DESC";
$resultado = $mysql->query($query);



    while($fila=$resultado->fetch_array())
    {
        echo '<div class="card border-primary mb-3">
                <div class="card-body">
                  <h4 class="card-title">Servicio Cancelado - <b>'.$fila[4].'</b></h4>
                  <p class="card-text">Solicitado a las <b>'.$fila[7].'</b> el <b>'.$fila[6].'</b>. Para la direccion <b>'.$fila[1].'</b>. Serial del boton <b>'.$fila[0].'</b>, fue cancelado por <b>'.$fila[10].'</b> a las <b>'.$fila[9].'</b> el <b>'.$fila[8].'</b>. El motivo de cancelacion es el siguiente:<b>'.$fila[11].'</b></p>
                </div>
              </div>';
    }

}

function mostrar_tabla_resumen($mysql)
{
$query = "SELECT b.num_boton,b.direccion,b.zona,b.telefono,b.nombre_boton,s.estado,s.fecha,s.hora,s.fecha_rta,s.hora_rta,s.agente,s.value FROM servicios as s LEFT JOIN boton as b on s.num_boton = b.num_boton ORDER BY s.id DESC";
$resultado = $mysql->query($query);


    while($fila=$resultado->fetch_array())
    {

        echo '<p><b>Alias: </b>'.$fila[4].'<br>
              <b>Dns: </b>'.$fila[0].'<br>
              <b>Direccion: </b>'.$fila[1].'<br>
              <b>Zona: </b>'.$fila[2].'<br>
              <b>Estado: </b>'.$fila[5].'<br>
              <b>Solicitado:</b>'.$fila[7].' '.$fila[6].' <br>
              <b>Respondido:</b>'.$fila[9].' '.$fila[8].'<br>
              <b>Agente: </b>'.$fila[10].'<br>
              <b>Observaciones: </b>'.$fila[11].'<br></p>
              <hr>';
    }


}

function ingresar_solicitud($mysql,$v1,$v2,$v3,$v4)
{
    $consulta = "INSERT INTO servicios(num_boton,estado,fecha,hora) VALUES (?,?,?,?)";
    $sentencia = $mysql->prepare($consulta);
    $sentencia->bind_param("ssss", $num_boton,$estado,$fecha,$hora);
    $num_boton = $mysql->real_escape_string($v1);
    $estado = $mysql->real_escape_string($v2);
    $fecha = $mysql->real_escape_string($v3);
    $hora = $mysql->real_escape_string($v4);

    if($sentencia->execute()){
        $num_telefono = '1';
        $num_telefono .= mostrar_num_telefono($mysql,$num_boton);
        enviar_msj($num_telefono);
        return true;
    }else{
        return false;
    }
    $sentencia->close();
}

function aceptar_solicitud($mysql,$v1,$v2,$v3,$v4,$v5,$v6)
{
    $consulta = "UPDATE servicios SET estado = ?, fecha_rta = ?, hora_rta = ?, agente = ?, value = ? WHERE id = ?";
    $sentencia = $mysql->prepare($consulta);
    $sentencia->bind_param("sssssi", $estado,$fecha,$hora,$agente,$value,$id);
    $estado = $mysql->real_escape_string($v1);
    $id = $mysql->real_escape_string($v2);
    $fecha = $mysql->real_escape_string($v3);
    $hora = $mysql->real_escape_string($v4);
    $agente = $mysql->real_escape_string($v5);
    $value = $mysql->real_escape_string($v6);

    if($sentencia->execute()){
        return 1;
    }else{
        return 0;
    }
    $sentencia->close();
}

function mostrar_num_telefono($mysql,$num_boton)
{
    $sql = "SELECT telefono FROM boton WHERE num_boton = '$num_boton' LIMIT 1";
    $consulta = $mysql->query($sql);
    $resultado = $consulta->fetch_array();
    return $resultado[0];
}


function enviar_msj($num_telefono)
{
    $post["to"] = array($num_telefono);
    $post["message"] = "GET READY FOR ELITE, If you pushed the Elite button by error please contact us immediately 1-888-634-2552";
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
}

function buscar_boton($mysql,$v1)
{
    $num_boton = $mysql->real_escape_string($v1);
    $consulta = "SELECT * FROM bodega_boton WHERE num_boton = ?";
    $sentencia = $mysql->stmt_init();
    $sentencia->prepare($consulta);
    $sentencia->bind_param("s",$num_boton);
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

function lanzar_notificacion($mysql)
{
    $sql = "SELECT * FROM servicios WHERE notificacion = '0'";
    $c = $mysql->query($sql);
    while($resultado = $c->fetch_array())
    {
        $tmp = '<script>

                    Push.create("New request",{
                        body: "There is a new service request",
                        icon: "web/img/boton.png",
                        requireInteraction: true,
                        vibrate[1000,100],
                        //timeout:4000,
                        onClick: function(){
                            window.location="https://elitee.co/index.php?view=solicitudes";
                            this.close();
                        }
                    });

                </script>';
        echo $tmp;
        echo '<script>var audio = document.getElementById("audio");
        audio.play();</script>';
        sleep(1);
        $id = $resultado['id'];
        $_sql = "UPDATE servicios SET notificacion = 1 WHERE id = '$id'";
        $mysql->query($_sql);
    }

}
/*
function sonido()
{
    $sonido = '<embed style="width:1px" src="web/sonidos/notificacion.mp3">';
    return $sonido;
}
*/
