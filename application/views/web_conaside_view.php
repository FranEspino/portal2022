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
            
            <section class="content pt-2  ">
                
                <div class="row justify-content-center">
                
                     
                    
                   
                    
                    <div class="col-md-8 pt-0">    

                                <div class="col-md-12 pt-1">
                                    <div class="row " style="text-align: center;">
                                        <div class="title-block">
                                            <h3 class="title animated bounce"> <?php echo $titulo; ?> </h3>
                                        </div>
                                    </div>
                                  

                                </div>
                                <?php if($pagina->SubTitulo!=''){ ?>
                                <div class="col-md-8 pt-0">                                             
                                    <div class="row justify-content-center text-justify"> 
                                  <blockquote class="blockquote text-center"  data-sb="fadeInLeftBig" data-sb-hide="fadeOutUp">
              <p class="mb-0"></p>
              <footer class="blockquote-footer"> <cite title="Source Title"><?php echo $pagina->SubTitulo; ?></cite></footer>
            </blockquote>
                                    </div>       
                                </div>
                            <?php } ?>
                        
                        <div class="row justify-content-center text-justify" style="">                            
                             
                                <?php echo nl2br(trim($contenido)); ?>
                                                     
                        </div>                        
                        
                    </div>
                    
                    <div class="col-md-4 ">       
                                   
                        <?php 
						$this->load->view('aside.php');
						?>                        
                    </div>
                    
                </div>

            </section>

        </div>     