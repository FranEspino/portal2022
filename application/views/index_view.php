<!--<body> esta en el head.php-->
 <!--header esta en header.hhp-->
   <!--nav esta en nav.php-->
  
         
        <slide>
            <?php //include("slider.html") ?>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active" ></li>
    
  </ol>
  <div class="carousel-inner" role="listbox">
  
 
    <div class="carousel-item active">
        <div class="bg-success" style="width:100%;">
            <img src="slide/img/portada1.jpg" alt="" style="width:100%;">
        </div>
         <div class="carousel-caption d-none d-md-block ">
            <h3 class=" ">INFRAESTRUCTURA</h3>
            <p>Contamos con diferentes laboratorios de ultima generación</p>
        </div>
    </div>


    <div class="carousel-item ">
        <div class="bg-success" style="width:100%;">
        <img src="slide/img/portada2.jpg" alt="" style="width:100%;">
        </div>
         <div class="carousel-caption d-none d-md-block ">
            <h3 class="text-danger"></h3>
            <p class="text-primary"></p>
        </div>
    </div>

    
 

<!--   <div class="carousel-item ">
        <div class="bg-success" style="width:100%;">
            <a href="http://www.episunh.com/evento/vi-congreso-internacional-en-tecnologias-de-informacion-y-comunicacion/" title="Clic para ver evento"><img src="slide/img/vi-congreso.jpg" alt="" style="width:100%;"></a>
        </div>
         <div class="carousel-caption d-none d-md-block ">
            <h3 class="text-danger">VI CONGRESO INTERNACIONAL</h3>
            <p class="text-primary">sadsadsa</p>
        </div>
    </div> -->

    
    
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
        </slide>


 <?php
   $titulo = '';
   $contenido = '';
    if ($pagina) { 
  // foreach ($pagina as $fila) { 
    $titulo = $pagina->Titulo;
    $contenido = $pagina->Contenido;
       } ?>
<?php // } ?> 
        <div class="container">
            
            <section class="content pt-1 m-2">
                
                <div class="row justify-content-center">
                
                    <div class="col-md-12 pt-1">
                        
                        
<div class="p-2"  sdtyle="padding-top:20px; padding-bottom:20px">
  <div class="container">
    <h1 class="text-primary text-center" data-sb="fadeInLeftBig" data-sb-hide="fadeOutUp"><?php echo $titulo; ?></h1>    
    
    <blockquote class="blockquote text-center"  data-sb="fadeInLeftBig" data-sb-hide="fadeOutUp">
  <p class="mb-0"></p>
  <footer class="blockquote-footer"> <cite title="Source Title"><?php echo $pagina->SubTitulo; ?></cite></footer>
</blockquote>
  </div>
</div>                        
                    </div>
					 <div class="col-md-7 pt-0">     
		 
					 </div>
                    
                    <div class="col-md-7 pt-0">                     
                           <div class="row justify-content-center">                            

                             <?php echo trim($contenido); ?>     
                    </div>  
                    
          
          
 
                    </div>
                    
                    <div class="col-md-5 ">                        
                        <?php include("aside.php") ?>                        
                    </div>
                    
                </div>            
               
                <div class="row">
                    
                </div>

            </section>

        </div>

<!-- Proyectos culminados -->
<?php if ($grid) { ?>
<div class="modal fade" id="modalProyectos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header " style="background-color: teal; color: #fff">
        <h5 class="modal-title" id="exampleModalLongTitle">Proyectos culminados</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
                            <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                <thead>                         
                                    <tr>
                                        <th style="width:1%">N.</th>
                                        <th >NOMBRES</th>
                                        
                                      
                                        
                                            
                                            <th >PROYECTO</th>
                                            <th >IMAGEN</th>
                                       
                                        <th style=" width:27px !important">PDF</th>

                                      
                                    </tr>
                                </thead>
                                <tbody>
                                <?php  if ($grid) {
                                        $i=1;
                                        foreach ($grid as $fila) { 
                                          if($i>3){
                                            break;
                                          }
                                          ?>
                                     <tr id="p_<?php echo $fila->id_proyecto; ?>">
                                        <td><?php  echo $i; ?></td>
                                        <td style="line-height: 1;"><strong class="text-primary"><?php  echo $fila->razonsocial; ?></strong>
                                            <br><strong class=""><?php  echo $fila->numdocumento; ?></strong>
                                            <br />
                                            <?php  echo $fila->carrera_profesional; ?>

                                            <br><br>
                                            <small class="text-muted" style="">
                                              
                                            <em>Asesor:</em></small>
                                            <br>
                                            <small class="text-muted"><em><?php  echo $fila->asesor; ?></em></small>
                                           
                                        </td>
                                       
                                       
                                        
                                        
                                            
                                      
                                            <td><span class=""><?php  echo $fila->rubro_investigacion; ?></span>
                                                <br><small class="text-muted"><em><?php  echo nl2br($fila->descripcion); ?></em></small>
                                            </td>
                                        
                                        <td class="p-0">
                                            
                                          
                                            <?php 
                                                $nombre_fichero = base_url().'archivo/proyecto/'. $fila->imagen; 
                                                if($fila->imagen!=''){
                                            ?>

                                                <a href="<?php  echo $nombre_fichero ;?>" class="font-md" target="_blank" title="Ver imagen " style="color: orange; ">
                                                    <img width="100" src="<?php  echo $nombre_fichero ;?>" alt="Imagen">
                                                </a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            
                                            <?php 
                                                $nombre_fichero = base_url().'archivo/proyecto/'. $fila->proyecto_doc; 
                                                if($fila->proyecto_doc!=''){
                                            ?>
                                                <a href="<?php  echo $nombre_fichero ;?>" class="" target="_blank" title="Ver proyecto " style="color: green; font-size: 20px"><i class="fa fa-file"></i></a>
                                            <?php } ?>
                                           
                                        </td>
                                  
                                    </tr> 
                                   <?php
                                   $i++; 
                                   }
                                 } ?>
                                </tbody>
                            </table>
                        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <a href="<?php echo base_url().'proyecto/lista-de-proyectos' ?>" type="button" class="btn btn-success">Ver más</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!-- .Proyectos culminados -->

<!-- footer
 body
 html esta en foter.php-->