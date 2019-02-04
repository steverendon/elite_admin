<?php require_once 'web/over/header.php'?>

<body style="text-align: center">

 <!-- menu -->

<?php require_once 'web/over/menu.php' ?>

<!-- pagina -->

<!-- Cuerpo pagina -->

<div class="jumbotron">
 <div class="card">
     <div class="card-body">
         <div class="card text-white bg-primary mb-3">
           <div class="card-body">
               <h4>Servicio solicitado para la direccion <b><?php echo $_GET['direccion']?></b> el <?php echo $_GET['fecha']?> a las <?php echo $_GET['hora']?> <button onclick="abrir('<?php echo $url ?>')" class="btn btn-link">
                <i class="fas fa-map-marked-alt" style="font-size:1.5em;margin-left:30px;color:#fff"></i></button></h4>
           </div>
         </div>
 <div class="row justify-content-center">
     <div class="col-lg-12">
          <div class="card border-primary mb-3">
           <div class="card-body"  id="mapa">
            <img src="https://maps.googleapis.com/maps/api/staticmap?center=<?php echo $latitud ?>,<?php echo $longitud ?> &zoom=16&size=600x300&maptype=roadmap&sensor=falses
            &markers=4.808441999999999,-75.6922937
            &key=AIzaSyA4DhoZ0pH2Bn1-lrYITgd2X0eTeS7TJVE" style="height:400px;width: 100%">
           </div>
         </div>
     </div>
 </div>
 <div class="row justify-content-center">
     <div class="col-lg-3">
         <button type="button" class="btn btn-success btn-lg btn-block" id="btn-aceptar" onclick="aceptar('<?php echo $_GET["id"]?>')"><i class="fas fa-check"></i> Aceptar
         </button>
     </div>
     <div class="col-lg-3">
         <button type="button" class="btn btn-danger btn-lg btn-block" id="btn-cancelar" onclick="cancelar('<?php echo $_GET["id"]?>')"><i class="fas fa-times"></i> Cancelar
         </button>
     </div>
 </div>
     </div>
 </div>
</div>

<?php require_once 'web/over/footer.php'?>

<script src="web/ajax/servicios/mapa.js"></script>
<script src="web/ajax/servicios/ventana_maps.js"></script>

</body>
</html>
