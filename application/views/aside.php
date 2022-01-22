
<aside class="hidden-print" >
<div class="card p-2 rounded" class="text-center">
  <a href="<?php echo base_url('index/registro'); ?>" class="btn btn-primary"> REGISTRO DE PLAN DE PROYECTO</a>
  <br> 
  <a href="<?php echo base_url('index/seguimiento'); ?>" class="btn btn-success"> SEGUIMIENTO DE PLAN DE PROYECTO</a>

 
</div>


                        
                        
                        <div class="card p-2 rounded">
                            <div class="bg-success rounded p-2 mb-2 text-center">
                                <h3 class="title m-0 text-white" style="font-size:18px"> EVENTOS </h3>
                            </div>
                           <!-- <marqusee direction="up" loop="infinite" scrolldelay="0" scrollamount="2" onmouseout="this.start()" onmouseover="this.stop()" style="">
						   -->
                                <div class="container rounded">
									<?php 
                                        if ($eventos) { 
                                        ?> 
                                        <?php  foreach ($eventos as $fila_ev) { ?>                                   
                                <div class="row d-flex"> 
                                	<div class="col-sm-2 p-1 d-flex align-items-center">
                                        <time datetime="<?php echo $fila_ev->FPublicacion;?>" class="icon">
                                            <strong> <?php echo $this->load->help_date->mesLetraCortoFecha($fila_ev->FechaInicio);?></strong>
                                            <span> <?php  echo $this->load->help_date->get_dia($fila_ev->FechaInicio);?></span>
                                        </time>
                                    </div>
                                   <!--<div class="col-sm-3 p-1 d-flex align-items-center">
                                       <a href="<?php //echo base_url().'actividad/'.$this->load->func_global->reemplazar(strtolower($fila_ev->CodPagina)).'/';?>"><img width="100%" class="" src="<?php //echo base_url()?>imagenes/pagina/<?php // echo $fila_ev->Imagen;?>" alt=""></a>
                                   </div>-->
                                   <div class="col-sm-10 p-1">
                                       <div class="p-0 m-0">
                                           <p class="p-0 m-0 text-primary" style="font-size: 0.7rem;">
										   Fecha de publicación: <?php echo $this->load->help_date->fechaHoraUsu($fila_ev->FPublicacion);?>
                                           </p>
                                       </div>
                                       <hr class="p-0 m-0">
                                       <div class="p-0 m-0">
                                           <a href="<?php echo base_url().'evento/'.strtolower($this->load->func_global->reemplazar($fila_ev->CodPagina)).'/';?>" title="<?php echo $fila_ev->Titulo;?>"><h6 class="p-0 m-0" style="font-size:14px"><?php echo substr($fila_ev->Titulo,0,75);?></h6></a>
                                       </div>
                                       <hr class="p-0 m-0">
                                       <div class="p-0 m-0">
                                           <p class="p-0 m-0 text-justify" style="font-size:12px;">
										   <?php
										    echo substr(strip_tags($fila_ev->Contenido),0,100);
											echo(strlen(strip_tags($fila_ev->Contenido)) > 100)?" ...":'';?></p>
											<small><?php
										    echo substr(strip_tags($fila_ev->SubTitulo),0,100);
											echo(strlen(strip_tags($fila_ev->SubTitulo)) > 100)?" ...":'';?></small>
                                       </div>
                                   </div>
            
                                </div> 
                                <?php
									} 
								}
								?> 
            
                            </div>
                          <!--  </marquese> -->
                        </div>
                        
                        
                        <div class="card p-2 rounded">
                            <div class="bg-warning rounded mb-2 text-center">
                                <h3 class="title m-1 text-white" style="font-size:18px"> NOTICIAS</h3>
                            </div>
                           <!-- <marqusee direction="up" loop="infinite" scrolldelay="0" scrollamount="2" onmouseout="this.start()" onmouseover="this.stop()" style=""> 
						   -->
                                <div class="container rounded">
									<?php 
                                        if ($noticias) { 
                                        ?> 
                                        <?php  foreach ($noticias as $fila_ac) { ?>                                   
                                <div class="row d-flex"> 
                                   <div class="col-sm-3 p-1 d-flex align-items-center">
                                       <a href="<?php echo base_url().'noticia/'.$this->load->func_global->reemplazar(strtolower($fila_ac->CodPagina)).'/';?>"><img width="100%" class="" src="<?php echo base_url()?>imagenes/pagina/<?php echo $fila_ac->Imagen;?>" alt=""></a>
                                   </div>
                                   <div class="col-sm-9 p-1">
                                       <div class="p-0 m-0">
                                           <p class="p-0 m-0 text-primary" style="font-size: 0.7rem;">
										   Fecha de publicación: <?php echo $this->load->help_date->fechaHoraUsu($fila_ac->FPublicacion);?>
                                           </p>
                                       </div>
                                       <hr class="p-0 m-0">
                                       <div class="p-0 m-0">
                                           <a href="<?php echo base_url().'noticia/'.strtolower($this->load->func_global->reemplazar($fila_ac->CodPagina)).'/';?>" title="<?php echo $fila_ac->Titulo;?>"><h6 class="p-0 m-0" style="font-size:14px"><?php echo substr($fila_ac->Titulo,0,70);?></h6></a>
                                       </div> 
                                       <div class="p-0 m-0">
                                           <p class="p-0 m-0 text-justify" style="font-size: 0.8rem;">
										   <?php
										    echo substr(strip_tags($fila_ac->Contenido),0,100);
											echo(strlen(strip_tags($fila_ac->Contenido)) > 100)?" ...":'';?></p>
                                       </div>
                                   </div>
            
                                </div> 
                                <?php
									} 
								}
								?> 
            
                            </div>
                           <!-- </marquese> -->
                        </div>
						
						<amp-auto-ads type="adsense"
              data-ad-client="ca-pub-1131342216841775">
</amp-auto-ads>    
                        

</aside>