<?php
	$titulo = '';
	$contenido = '';
	$fechapublicacion = '';
	$imagen = '';
	$subtitulo = '';
	$autor = '';
	$area = '';
	 if (isset($pagina)) { 
	 if ($pagina) { 
	// foreach ($pagina as $fila) { 
	 	$titulo = $pagina->Titulo;
	 	$contenido = $pagina->Contenido;
		$fechapublicacion = $this->load->help_date->fechaHoraUsu($pagina->FPublicacion);
		$imagen = $pagina->Imagen;
		$subtitulo = $pagina->SubTitulo;
		$autor = $pagina->Autor;
		$area = $pagina->area;
	    } ?>
<?php  } ?> 

        <div class="container">
            
            <section class="content pt-2 ">
                
                <div class="row justify-content-center">             
                
                    
                    
                    <div class="col-md-8 pt-0">  
                        <div class="col-md-12 pt-1">
                            <div class="row " style="text-align: center;">
                                <div class="title-block">
                                    <h3 class="title animated bounce"> <?php echo $titulo; ?> </h3>
                                </div>
                            </div>
                                                
                        </div>


                        
                       
                        <div class="row">
                            <p class ="text-justify text-danger p-0 m-0">
							   <?php //echo $fechapublicacion;?>
                             </p>
                        </div>
                         <?php if( $imagen!=''){?>
                       
                        <div class="row justify-content-center">
                            
                           
                            <div class="card p-2" style="width: 30rem;">
                                
                                <img height="" width="100%" class="card-img-top" src="<?php echo base_url()?>imagenes/pagina/<?php echo $imagen;?>" alt="">
                                 
                            </div>
                            
                        </div>
                        <?php }?>
                        <?php if(strlen($subtitulo >0 )){?>
                        <hr class="p-0 m-0 bg-success">
                        <div class="row">
                            <h6 class ="text-justify"><?php echo $subtitulo; ?></h6>
                        </div>
                        <?php }?>
                        <hr class="p-0 m-0 bg-success">
                        <div class="row" style="">
                            <?php echo nl2br(trim($contenido)); ?>
                        </div>
                        <hr class="p-0 m-0 bg-success">
                        <div class="row">
                            <p class ="text-right text-primary p-0 m-0">F. Publicación: <?php echo $fechapublicacion; ?></p>
                            <p class ="text-right text-primary p-0 m-0"><?php echo $area; ?></p>
                        </div>
                        
                        <hr class="p-0 m-0 bg-success">
                        
                                              
                                              
                        
                    </div>
                    
                    <div class="col-md-4 ">                        
                        <?php include("aside.php") ?>                        
                    </div>
                    
                </div>

            </section>

        </div> 