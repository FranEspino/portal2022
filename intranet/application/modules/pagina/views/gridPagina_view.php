<?php  //include('ribbon.php'); ?>
<div id="content">			
    <div class="row ">     
        <div class="col-md-8">
            <h1>
                <i class="fa fa-edit fa-fw "></i> Paginas
            </h1>   
        </div>        
        <div class="col-md-4 ">   
         <div class="padding-7 hidden-print">      
            <a href='javascript:window.print(); void 0;' rel="tooltip" data-original-title="Imprimir" class="btn btn-default btn-md pull-right " ><i class="glyphicon glyphicon-print"></i> Imprimir</a> 
           <!-- <a href="#" rel="tooltip" disabled data-original-title="Descargar" class="btn btn-warning btn-md pull-right "><i class="glyphicon glyphicon-download-alt"></i> Descargar</a> -->
            <a rel="tooltip" data-original-title="Crear contenido de página" class="btn btn-success btn-md pull-right" id="btnnuevo"><i class="glyphicon glyphicon-plus"></i> Nuevo</a>
         </div>
        </div>	 
    </div>
     
    <!-- widget grid -->
    <section id="widget-grid" class="">        
        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" >	
                    <header>
                        <span class="padding-gutter titulo-jarvis">
                        	<i class="fa fa-table"></i> <?php  echo $titulotabla ; ?> 
                        </span>	
                    </header>
                    <!-- widget div-->
                    <div>
                        <!-- widget content -->
                        <div class="widget-body no-padding ">
                        <div class="table-responsive">
                            <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                            	<thead>			                
                                    <tr>
                                        <th style="width:1%">N.</th>
                                        <th width="10%" class="centrar">TITULO</th>
                                        <th width="10%" class="centrar">SUBTITULO</th>
                                        <th width="10%" class="centrar">IMAGEN</th>
                                        <th width="" class="centrar">CONTENIDO</th>
                                        <!--<th width="5%" class="centrar">AUTOR</th>-->
                                        <th width="5%" class="centrar">F. PUBLIC.</th>
                                        <th width="5%" class="centrar">MENU</th>
                                        <th width="5%" class="centrar">URL</th>                                        <th width="1%" class="centrar">VISITAS</th>
                                        <th style=" width:42px; min-width:42px !important" class="hidden-print"><i class="fa fa-fw fa-cog txt-color-blue"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php  if ($grid) {
										$i=1;
										foreach ($grid as $fila) { ?>
                                     <tr id="<?php echo $fila->IdPagina; ?>">
                                        <td><?php  echo $i; ?></td>
                                        <td><?php  echo substr($fila->Titulo,0,50); ?></td>
                                        <td><?php  echo  $fila->SubTitulo; ?></td>
                                        <td>
                                        <div id="div_imagen_<?php echo $fila->IdPagina; ?>">                                        
                                        <?php 
										$nombre_fichero = $this->config->item('web_url').'imagenes/pagina/'. $fila->Imagen;
										//echo $nombre_fichero;
										//$AgetHeaders = @get_headers($nombre_fichero);
										//if (@GetImageSize($nombre_fichero)) {
										?>
                                        <a href="<?php  echo $nombre_fichero ;?>" target="_blank" title="Ver imagen">	<img width="100%" src="<?php  echo $nombre_fichero ;?>" alt=""></a>
                                        <?php //}?> 
                                        </div>
                                        <a href="javascript:void(0);" rel="tooltip"  data-placement="left" data-original-title="Cambiar imagen" class="" id="btnsubirimagen" onclick="subirimagen('<?php echo $fila->IdPagina; ?>','<?php echo $fila->IdCategoria.'_'.$fila->Imagen; ?>');"><i class="glyphicon glyphicon-undo"></i> Cambia</a>
                                          
                                       </td>
                                        <td> 
                                        	<?php
										    	echo substr(strip_tags($fila->Contenido),0,100);
												echo(strlen(strip_tags($fila->Contenido)) > 100)?" ...":'';
											?>
                                        </td>
                                        <!--<td><?php //echo $fila->Autor; ?></td>-->
                                        <td><?php  echo $fila->FPublicacion; ?><br />
                                        <?php  echo ($fila->EstadoPublicacion=='1')?'PUBLICADO':'INACTIVO'; ?>
                                        </td>
                                        <td><?php  echo $fila->primermenu; ?></td>
                                        <td> 
                                        <?php 
										$actividad = 'pagina';
										switch ($fila->IdCategoria) {											
											case 1:
												$actividad = "tramite";
												break;
											case 2:
												$actividad = "evento";
												break;
											case 3:
												$actividad = "actividad";
												break;
										}
																	 ?>
                                        	
                                             <a href="javascript:void(0);" class="btn btn-default" rel="popover" data-placement="left"  data-html="true" data-original-title="Copia la URL " data-content="<?php  echo $this->config->item('web_url').$actividad.'/'.$fila->CodPagina;  ?><br /><br /><a target='_blank' title='Se abrira en otra página' href='<?php  echo $this->config->item('web_url').$actividad.'/'.$fila->CodPagina;  ?>'>Abrir página</a>" value="<?php  echo $this->config->item('web_url').$actividad.'/'.$fila->CodPagina;  ?>"><i class="fa fa-eye"></i></a>
                                       </td>
                                        <td><a title="Cantidad de visitas" rel="tooltip"><?php  echo ($fila->CantVisita>0)?$fila->CantVisita:0; ?> Visit.</a></td>
                                        <td class="pull-right opciones hidden-print">
                                        <button  id="btn_editardato_<?php  echo $fila->IdPagina ; ?>" name="editardato_<?php  echo $fila->IdPagina ; ?>" value="<?php  echo $fila->IdPagina ; ?>" class="editardato btn btn-primary btn-circle"  data-placement="left" rel="tooltip" data-original-title="Editar"><i class="glyphicon glyphicon-edit"></i></button>
                                        <?php if($fila->IdPagina>2){ ?>
                                            <a href="javascript:void(0);" class="btn btn-danger btn-circle" data-trigger="focus" rel="popover" data-placement="bottom" data-original-title="<i class='fa fa-warning'></i> ¿Eliminar?" data-content='<button type="button" class="btn btn-default btn-sm" title="No eliminar"><span class="glyphicon glyphicon-menu-left"></span>Cancelar</button><legend class="no-padding no-margin" style="margin:2px !important"></legend><button onclick="elim_reg(<?php echo $fila->IdPagina;?>);" type="button" class="btn btn-danger btn-sm" title="Si eliminar" id="btn_si_eliminar"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>' data-html="true"><i class="glyphicon glyphicon-trash"></i></a>
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
                        <!-- end widget content -->
                    </div>
                    <!-- end widget div -->
                </div>
                <!-- end widget -->		
            </article>
            <!-- WIDGET END -->
        </div>				
        <!-- end row -->   
        
    </section>
    <!-- end widget grid -->
    
<!-- Modal -->
<div id="div_ModalMant">
</div><!-- /.modal -->                    
    
</div> 

<!--================================================== -->	
<script src="<?php echo base_url(); ?>assets/js/plugin/dropzone/dropzone.min.js"></script>
<script>
pageSetUp();
  
function elim_reg(id){	
	var idtabla = id;
	if(idtabla.length<1){  
		//event.preventDefault(); 
		$.smallBox({
			title : '<i class="botClose fa fa-times"></i> Aviso !',
			content : "No hay registro para anular.<br>*Si el problema continua, comuníquese con el programador",
			color : "#C46A69",
			timeout : 3000,
			icon : "fa fa-exclamation-triangle swing animated"
		});
	}else{		
		$('#btn_si_eliminar').html('Eliminan...');
		$("#btn_si_eliminar").attr("disabled","disabled"); 
		$.ajax({ 
			type: "post",
			url: "<?php  echo base_url() ?>pagina/eliminarPagina", cache: false, 
			data:'idtabla='+idtabla, 
			success: function(response){	
									
					var obj_mensaje = JSON.parse(response);	
									
					if(obj_mensaje.length>0){ 
						
						if(obj_mensaje.substr(0, 9) == 'Eliminado')
						{	
							var index = idtabla;							
							$("#" + index).remove();	
														
							//event.preventDefault();
							$.smallBox({
								title : '<i class="botClose fa fa-times"></i> Aviso !',
								content :'Se ha eliminado el registro de forma satisfactoria',
								color : "#739E73",
								timeout : 2500,
								icon : "fa fa-trash-o swing animated"
							});			
						}else{
							event.preventDefault(); 
							$.smallBox({
								title : '<i class="botClose fa fa-times"></i> Aviso !',
								content : obj_mensaje,
								color : "#C46A69",
								timeout : 2500,
								icon : "fa fa-exclamation-triangle swing animated"
							});
						}												
					}		
			 }
		}); 
	}		 
}

$(".editardato").click(function(event){
	event.preventDefault();     
	var idtablas = $(this).val();
	var url = "<?php  echo base_url() ?>pagina/mantPaginaForm/"+idtablas;
	$( "#div_ModalMant" ).load(url);
});  

$("#btnnuevo").click(function(event){ 
	event.preventDefault();        
	var urlnuevo = "<?php  echo base_url() ?>pagina/mantPaginaForm/";
	$( "#div_ModalMant" ).load(urlnuevo );
}); 

 

function subirimagen(idtabla, nomimagen){     
	var url = "<?php  echo base_url() ?>pagina/mantSubirImagen/"+idtabla+"/"+nomimagen;
	$( "#div_imagen_"+idtabla ).load(url);
};  	
</script>

<script type="text/javascript" language="javascript" class="init">
 $(document).ready(function() {
  $('#dt_basic').dataTable({
					"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
					"autoWidth" : true,
			        "oLanguage": {
					    "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
					}
	});   
 });
</script>
 