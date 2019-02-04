<?php

$latitud = $_GET['latitud'];
$longitud = $_GET['longitud'];

$url = 'https://www.google.com/maps/search/?api=1&query='.$latitud.','.$longitud;

require_once 'web/templates/servicios/mapaView.php';
