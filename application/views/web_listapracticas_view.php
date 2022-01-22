        <div class="container-fluid">
            
            <section class="content ">
                
                <div class="row justify-content-center">             
                
                    <div class="col-md-12 pt-1">
                        <div class="row justify-content-center">

                            <div class="title-block">
                                <br>
                                <h2 class="title animated bounce"> LISTA DE PROYECTOS CULMINADOS</h2>
                            </div>
                        </div>
                        <hr>                        
                    </div>
                    
                    
                    
                    <div class="col-md-9 pt-0">                     
                        <div class="table-responsive">
                            <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                <thead>                         
                                    <tr>
                                        <th style="width:1%">N.</th>
                                        <th >NOMBRES</th>
                                        
                                        <th >CEL/CORREO</th>
                                      
                                        
                                            <th >ASESOR</th>
                                        
                                            <th >PROYECTO</th>
                                            <th >IMAGEN</th>
                                       
                                        <th style=" width:27px !important">PDF</th>

                                      
                                    </tr>
                                </thead>
                                <tbody>
                                <?php  if ($grid) {
                                        $i=1;
                                        foreach ($grid as $fila) { ?>
                                     <tr id="p_<?php echo $fila->id_proyecto; ?>">
                                        <td><?php  echo $i; ?></td>
                                        <td><strong class="text-primary"><?php  echo $fila->razonsocial; ?></strong>
                                            <br><strong class=""><?php  echo $fila->numdocumento; ?></strong>
                                            <br />
                                            <?php  echo $fila->carrera_profesional; ?>
                                           
                                        </td>
                                       
                                        <td><?php  echo $fila->celular; ?><br><?php  echo $fila->email; ?></td>
                                        
                                        
                                        
                                            <td><strong class=""><?php  echo $fila->asesor; ?></strong>
                                                <br><span class=""><?php  echo $fila->doc_asesor; ?></span>
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
                    
                    <div class="col-md-3 ">                        
                        <?php include("aside.php") ?>                        
                    </div>
                    
                </div>

            </section>

        </div> 
        
 
 
<style>
.navbar-brand{
	padding:0px !important;
}
</style>
<script src="<?php  echo base_url() ?>intranet/assets/js/plugin/datatables/jquery.dataTables.min.js"></script>

<script type="text/javascript" language="javascript" class="init">
 $(document).ready(function() {
  //$('#dt_basic').dataTable();   
 });
</script>