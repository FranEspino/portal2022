 


<section  classs="descargas" id="descargas">
<div class=" bg-faded" style=" background-color: rgb(0 94 68); color:#F7F0F0">
    <br>
<h4 classs="animated bounceInDown"> &nbsp;&nbsp;Enlace de Descargas</h4>&nbsp;
</div>
    <div class="row" style="width:98% !important">
<?php 
	if ($archivo) { 
	?> 
     
	<?php  foreach ($archivo as $fila_ar) { ?>  
    
  
<div class="card col-lg-2 col-md-4 col-sm-6  sb-effect-displayed animated zenFadeInLeftBig" dzata-sb="zenFadeInLeftBig" datza-sb-hide="zenFadeOutDown" stylxe="opacity: 1; margin-left:30px">
  <ul class="list-group list-group-flush">
    <li class="list-group-item" style="background-color: rgb(0 94 68)">
    
              <span style="font-size:11px;  " class="text-white text-right"><?php echo substr($fila_ar->area,0,20);?></span>
             
             
    </li>
    <li class="list-group-item">
     <span class="bg-color-white" style=" color:#161616; position:absolute; font-size:11px !important; bottom:0px; right:0px" ><?php
			echo  $this->load->help_date->fechaHoraUsu($fila_ar->fch_regarchivo);
			  ?></span>
    <?php echo $fila_ar->comentario;?>
    </li>
    <li class="list-group-item text-center">
   
              <div class="text-center">
    <a href="<?php echo base_url().'archivo/descarga/'.$fila_ar->archivo;?>" target="_blank" title="Descargar archivo"    class="btn btn-primary"><i class="fa fa-download"></i> Descargar</a>
    </div>
    </li>
  </ul>
</div>

 	<?php
	} 
}
?> 
	</div>
 
    
</section>
 

 
 
 <footer class="foother  bg-inverse">

<div class="container bg-muted mt-3 pt-3 pb-3">
    <div class="row">
        <div class="col-sm-6 col-md-4" style="">
          <div class="">
            <h5 class="text-white">OPCIONES</h5>
            <hr style="height:1px;" class="bg-warning">
            <ul class="list-unstyled pl-4" style="text-decoration:none">
            <li><a href="<?php echo base_url(); ?>proyecto/lista-de-proyectos" style="text-decoration:none" class="text-info"><i class="fa fa-angle-double-right"></i> LISTA DE PROYECTOS</a></li>
             <!--   <li><a href="#" style="text-decoration:none" class="text-info"><i class="fa fa-angle-double-right"></i> ÁREAS</a></li>
              <li><a href="#" style="text-decoration:none" class="text-info"><i class="fa fa-angle-double-right"></i> ACADÉMICO</a></li>
              <li><a href="#" style="text-decoration:none" class="text-info"><i class="fa fa-angle-double-right"></i> INVESTIGACIÓN</a></li>
              <li><a href="#" style="text-decoration:none" class="text-info"><i class="fa fa-angle-double-right"></i> CONVENIOS</a></li>
              <li><a href="#" style="text-decoration:none" class="text-info"><i class="fa fa-angle-double-right"></i> CONTÁCTENOS</a></li>
            -->

            </ul>
          </div>
        </div>
        
        <div class="col-sm-6 col-md-4">
        </div>
        
        <div class="col-sm-6 col-md-4">
          <div class="">
            <h5 class="text-white">INFORMES</h5>
            <hr style="height:1px;" class="bg-warning">
            <ul class="list-unstyled pl-4" style="text-decoration:none">
              <li><p class="text-white mb-0" style="text-align: left"><span class="text-white"><i class="fa fa-map-marker"></i> Dirección:</span>
              <p class="text-white pl-3">Mariscal Castilla 3909, Huancayo</p>
              </p>
              </li>
              <li><p class="text-white mb-0" style="text-align: left"><span class="text-white"><i class="fa fa-phone"></i> Teléfono:</span> <br>
              <p class="text-white pl-3">(064) 481062</p>
              </p>
              </li>
              <li><p class="text-white mb-0" style="text-align: left mb-0"><span class="text-white"><i class="fa fa-envelope"></i> Corréo:</span> <br>
              <p class="text-white pl-3">parquecientifico@email.com</p>
              </p>
              </li>

            </ul>
          </div>
        </div>

        
    </div>
    <hr style="height:1px; background-color:#fff;">

    <div class="container-fluid copy-right p-20">
      <div class="row text-center">
        <div class="col-md-12">
          <p class="font-11 text-white m-0"><small>Copyright &copy;2021 PARQUE CIENTIFICO - UNCP.</small></p>
        </div>
      </div>
    </div>
<div id='IrArriba'>
<a href='#Arriba' title="Subir Arriba"><img height="50px" class="" src="<?php  echo base_url() ?>assets/img/Subir.png" alt=""></a>
</div>

</div>
   
 </footer>
    </div>
   
    <script src="<?php  echo base_url() ?>assets/js/bootstrapv4.js"></script>
    <script src="<?php  echo base_url() ?>assets/story-box/story-box.min.js"></script>
    <!--<script src="<?php  //echo base_url() ?>assets/js/jquery-3.2.1.js"></script> El jQuery se llevo al head-->
    <script src="<?php  echo base_url() ?>assets/js/chrinteco.js"></script>
    <script>
      $('#modalProyectos').modal('show');
      
    </script>
</body>
</html>