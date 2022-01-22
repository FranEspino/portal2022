<!DOCTYPE html>

<?php



require_once('Connections/conexion.php');
require_once('Connections/funciones.php');

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
  
  

?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>UNCP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/font-awesome.css">
</head>



<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
   
    <?php
     $item = 0 ;
        $rs=mysqli_query($conexion, "SELECT * FROM slide WHERE EstadoPublicacion='1'");

        while($rows=mysqli_fetch_array($rs))
        {
            
    ?>
    
    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo($item);?>" class="<?php if($item==0){echo('active');} else {echo('');};?>"></li>
    
    <?php
            $item=$item+1;
        }
    ?>
    <!--
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>-->
  </ol>
  <div class="carousel-inner" role="listbox">
    <?php
     $item=0;
        $rs=mysqli_query($conexion, "SELECT * FROM slide  WHERE EstadoPublicacion='1'");

        while($rows=mysqli_fetch_array($rs))
        {
           
    ?>
    
    <div class="carousel-item <?php if($item==0){echo('active');} else {echo('');};?>">
        <div class="bg-success" style="width:100%; height:100%">
            <img src="slide/img/<?php echo($rows['Imagen']);?>" alt="" style="width:100%; height:100%">
        </div>
        <div class="carousel-caption d-none d-md-block">
            <h3><?php echo($rows['Titulo']);?></h3>
            <p><?php echo($rows['Subtitulo']);?></p>
        </div>
    </div>
    
    <?php
            $item=$item+1;
        }
    ?>
    
    <!--<div class="carousel-item active">
        <div class="bg-success" style="width:100%; height:100%">
            <img src="slide/img/admision.jpg" alt="" style="width:100%; height:100%">
        </div>
    </div>
    <div class="carousel-item">
    <div class="bg-success" style="width:100%; height:100%">
        <img src="slide/img/baner.jpg" alt="" style="width:100%; height:100%">
    </div>
    </div>
    <div class="carousel-item">
        <div class="bg-success" style="width:100%; height:100%">
            <img src="slide/img/local.jpg" alt="" style="width:100%; height:100%">
        </div>
        <div class="carousel-caption d-none d-md-block">
            <h3>Titulo de Slide</h3>
            <p>Contenido de Slide.</p>
        </div>
    </div>-->
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
<!--    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script> -->
    <script src="assets/js/bootstrap.js"></script>
<!--    <script src="js/jquery-3.2.1.js"></script>-->
    
