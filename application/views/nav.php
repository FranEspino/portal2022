
<?php $activarmenu='index';?>
 <nav class="navbar navbar-toggleable-md navbar-inverse   bg-oscuro border-top-0 sticky-top" role="navigation">
 
 
<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
 
 
<a class="navbar-brand" href="<?php echo base_url() ?>"><img title ="Parque Científico - UNCP" src="<?php  echo base_url() ?>assets/img/logouncp.png" width="60" height="60" class="d-inline-block align-midle" alt="UNCP">
          <img title ="Parque Científico - UNCP" src="<?php  echo base_url() ?>assets/img/uncp-texto.png"    height="60" class="d-inline-block align-midle hidden-sm-down" alt="Parque científico - UNCP"><span class="hidden-md-up">Parque cientícico - UNCP</span></a>

 
 
<div class="collapse navbar-collapse justify-content-end" id="nav-content" >   

     <ul class="navbar-nav text-center">
          <li class="nav-item">
              <a class="nav-link <?php if ($activarmenu=='index'){echo 'active';}?>" href="<?php echo base_url() ?>"><i style ="font-size: 20px; width:100%; text-align:center;" class="fa fa-home"></i><br>INICIO</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle <?php if ($activarmenu=='laescuela'){echo 'active';}?>" href="#" id="navbarDropdownMenuLink" classs="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"  data-hover="dropdown"><i style ="font-size: 20px; width: 100%; text-align: center;" class="fa fa-users"></i>
            SOBRE NOSOTROS
            </a>
			<?php 
			$hayopciones = 'NO';
            if ($menu) { 
            ?>                      
				<?php  
            foreach ($menu as $fila_esc) { 
                $url = $fila_esc->vinculo;
                if(substr($url,0,4)!= 'http'){
                  $url =  base_url().$url;
                }
                    if($fila_esc->id_primermenu =='2'){							
                        if($hayopciones =='NO'){
                            $hayopciones = 'SI';
                            ?>                     
                            <ul class="dropdown-menu  submenu" aria-labelledby="navbarDropdownMenuLink">
                            <?php
                        }
                        ?>                     
                        <a class="dropdown-item" href="<?php echo ($fila_esc->vinculo !='')?$url:'#'; ?>"> <?php echo $fila_esc->menu; ?></a> 
                    <?php
                    }
                }
				if($hayopciones =='SI'){
				?>                     
					</ul>
				<?php
				}
                ?>                
            <?php
            }
            ?>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle <?php if ($activarmenu=='areas'){echo 'active';}?>" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"  data-hover="dropdown" aria-expanded="false"><i style ="font-size: 20px; width: 100%; text-align: center;" class="fa fa-university"></i>
            INFRAESTRUCTURA 
            </a>
			<?php 
			$hayopciones = 'NO';
            if ($menu) { 
            ?>                      
				<?php  foreach ($menu as $fila_esc) { 
           $url = $fila_esc->vinculo;
                if(substr($url,0,4)!= 'http'){
                  $url =  base_url().$url;
                }
                    if($fila_esc->id_primermenu =='3'){							
                        if($hayopciones =='NO'){
                            $hayopciones = 'SI';
                            ?>                     
                            <ul class="dropdown-menu  submenu" aria-labelledby="navbarDropdownMenuLink">
                            <?php
                        }
                        ?>                     
                        <a class="dropdown-item" href="<?php echo ($fila_esc->vinculo !='')?$url:'#'; ?>"> <?php echo $fila_esc->menu; ?></a> 
                    <?php
                    }
                }
				if($hayopciones =='SI'){
				?>                     
					</ul>
				<?php
				}
                ?>                
            <?php
            }
            ?>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle <?php if ($activarmenu=='academico'){echo 'active';}?>" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" data-hover="dropdown" aria-expanded="false"><i style ="font-size: 20px; width: 100%; text-align: center;" class="fa fa-briefcase"></i>
              EMPRESAS
            </a>
             <ul class="dropdown-menu  submenu" aria-labelledby="navbarDropdownMenuLink">
              
               <a class="dropdown-item" href="<?php echo base_url(); ?>proyecto/lista-de-proyectos">Lista de Proyectos</a> 
               
			<?php 
			$hayopciones = 'NO';
            if ($menu) { 
            ?>                      
				<?php  foreach ($menu as $fila_esc) { 
           $url = $fila_esc->vinculo;
                if(substr($url,0,4)!= 'http'){
                  $url =  base_url().$url;
                }
                    if($fila_esc->id_primermenu =='4'){		
                        ?>                     
                        <a class="dropdown-item" href="<?php echo ($fila_esc->vinculo !='')?$url:'#'; ?>"> <?php echo substr($fila_esc->menu,0,30);  ?></a> 
                    <?php
                    }
                }
				 
                ?>                
            <?php
            }
            ?>
            </ul>
          </li>



    


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle <?php if ($activarmenu=='convenios'){echo 'active';}?>" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" data-hover="dropdown" aria-haspopup="true" aria-expanded="false"><i style ="font-size: 20px; width: 100%; text-align: center;" class="fa fa-newspaper-o"></i>
              NOTICIAS
            </a>
			<?php 
			$hayopciones = 'NO';
            if ($menu) { 
            ?>                      
				<?php  foreach ($menu as $fila_esc) { 
           $url = $fila_esc->vinculo;
                if(substr($url,0,4)!= 'http'){
                  $url =  base_url().$url;
                }
                    if($fila_esc->id_primermenu =='5'){							
                        if($hayopciones =='NO'){
                            $hayopciones = 'SI';
                            ?>                     
                            <ul class="dropdown-menu  submenu" aria-labelledby="navbarDropdownMenuLink">
                            <?php
                        }
                        ?>                     
                        <a class="dropdown-item" href="<?php echo ($fila_esc->vinculo !='')?$url:'#'; ?>"> <?php 
                        echo substr($fila_esc->menu,0,30); 

                        ?></a> 
                    <?php
                    }
                }
				if($hayopciones =='SI'){
				?>                     
					</ul>
				<?php
				}
                ?>                
            <?php
            }
            ?>
          </li>


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle <?php if ($activarmenu=='convenios'){echo 'active';}?>" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" data-hover="dropdown" aria-haspopup="true" aria-expanded="false"><i style ="font-size: 20px; width: 100%; text-align: center;" class="fa fa-calendar"></i>
              EVENTOS
            </a>
			<?php 
			$hayopciones = 'NO';
            if ($menu) { 
            ?>                      
				<?php  foreach ($menu as $fila_esc) { 
           $url = $fila_esc->vinculo;
                if(substr($url,0,4)!= 'http'){
                  $url =  base_url().$url;
                }
                    if($fila_esc->id_primermenu =='6'){							
                        if($hayopciones =='NO'){
                            $hayopciones = 'SI';
                            ?>                     
                            <ul class="dropdown-menu  submenu" aria-labelledby="navbarDropdownMenuLink">
                            <?php
                        }
                        ?>                     
                        <a class="dropdown-item" href="<?php echo ($fila_esc->vinculo !='')?$url:'#'; ?>"> <?php echo substr($fila_esc->menu,0,30);  ?></a> 
                    <?php
                    }
                }
				if($hayopciones =='SI'){
				?>                     
					</ul>
				<?php
				}
                ?>                
            <?php
            }
            ?>
          </li>


          <li class="nav-item">
              <a class="nav-link <?php if ($activarmenu=='contactenos'){echo 'active';}?>" href="<?php  echo base_url() ?>contactanos/" data-hover="dropdown" ><i style ="font-size: 20px; width: 100%; text-align: center;" class="fa fa-map-marker"></i><br>CONTÁCTENOS</span></a>
          </li>
        </ul>
        
     </div>
    </nav>
