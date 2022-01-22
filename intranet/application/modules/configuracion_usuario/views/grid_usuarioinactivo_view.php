<script>
  $(function(){
  	  // $('.modal-backdrop fade in').modal('hide');
	  //  	$( "#myModal" ).dialog('close');  
	  //$(".modal-backdrop").css("display", "none");
	 /* $(".modal-backdrop").css({
		   "display": "none",
		   "overflow": "hidden",
		   "z-index": "1050",
		   "top": "100px",
		   "left": "200px"
		})*/
  })
  
	 $(".editardato").click(function(){
	    var idusuario = $(this).val();
        var url = "<?php  echo base_url() ?>configuracion_usuario/editUsuario";
	//	$( "#myModal" ).dialog('open');
        $( "#myModal" ).load(url,{
        	  idusuario: idusuario
        });
       // $("#capa_tabulador_reporte").load(url_editar);
    })  
	
	$("#btnnuevo").click(function(event){
        event.preventDefault();        
        var url_regresar = "<?php  echo base_url() ?>configuracion_usuario/newusuario";
		$( "#myModal" ).load(url_regresar,{
        //	  idusuario: idusuario
        });
        //$("#capa_tabulador_sistema").html("<p class='loading'></p>");
        //$("#capa_tabulador_sistema").load(url_regresar);
    })  
	
	
	
   /* $(".editardato").click(function(event){
        event.preventDefault();
        var url_editar = "<?php // echo base_url() ?>configuracion_usuario/editUsuario/"+$(this).val();	
        $("#myModal").html("<p class='loading'></p>");
        $("#myModal").load(url_editar);
    })*/
 
</script>
<!-- row -->
					<div class="row">
<!-- NEW WIDGET START -->
						<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-color-teal" id="wid-id-0" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-deletebutton="false">
								<!-- widget options:
								usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
				
								data-widget-colorbutton="false"
								data-widget-editbutton="false"
								data-widget-togglebutton="false"
								data-widget-deletebutton="false"
								data-widget-fullscreenbutton="false"
								data-widget-custombutton="false"
								data-widget-collapsed="true"
								data-widget-sortable="false"
				
								-->
								<header>
									<span class="widget-icon"> <i class="fa fa-table"></i> </span>
									<h2>Gestionar de Usuarios Inactivos</h2>
				
								</header>
				
								<!-- widget div-->
								<div>
				
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
				
									</div>
									<!-- end widget edit box -->
				
									<!-- widget content -->
									<div class="widget-body no-padding">
                                    
                                   <!-- <div class="widget-body-toolbar">
                                    		<div class="row">
												<div class="col-xs-3 col-sm-12 col-md-12 col-lg-12">
												<button data-toggle="modal" href="#myModal" class="btn btn-success" id="btnnuevo" name="btnnuevo">
														<i class="fa fa-plus"></i> <span class="hidden-mobile">Nuevo Usuario</span>
												</button>
                                                  
													
												</div>
												
											</div>
										</div>-->
				
										<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
											<thead>			                
												<tr>
													<th data-hide="phone">ID</th>
													<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Username</th>
													<th data-hide="phone"><i class="fa fa-fw fa-male text-muted hidden-md hidden-sm hidden-xs"></i> Nombre Usuario</th>
													<th><i class="fa fa-fw fa-envelope-o text-muted hidden-md hidden-sm hidden-xs"></i> Correo Electronico</th>
													<th data-hide="phone,tablet"><i class="fa fa-fw fa-check-square-o text-muted hidden-md hidden-sm hidden-xs"></i> Status</th>
													<th data-hide="phone,tablet"><i class="fa fa-fw fa-group text-muted"></i> Perfil</th>
													<th data-hide="phone,tablet"><i class="fa fa-fw fa-list-alt text-muted hidden-md hidden-sm hidden-xs"></i> Acciones</th>
												</tr>
											</thead>
											<tbody>
                                             <?php  if ($grid) { ?>
                    						 <?php  $i=1;?>
                        					 <?php  foreach ($grid as $fila) { ?>
												<tr>
													<td><?php  echo $i; ?></td>
													<td><?php  echo $fila->username; ?></td>
													<td><?php  echo $fila->nombre_usuario; ?></td>
													<td><?php  echo $fila->email_usuario; ?></td>
													<td><?php  echo $fila->status_usuario; ?></td>
													<td><?php  echo $fila->nombre_usuario_tipo; ?></td>
													<td><button  data-toggle="modal" href="#myModal" id="btneditar_<?php  echo $fila->idusuario; ?>" name="btneditar_<?php  echo $fila->idusuario; ?>" value="<?php  echo $fila->idusuario; ?>" class="editardato btn btn-primary btn-xs header-btn"><i class="fa fa-edit"></i> Editar</button>   
                                                    </td>
												</tr>
                                                <?php  $i++; ?>
                        <?php  } ?>
                    <?php  } ?>
											
											</tbody>
										</table>

									</div>
									<!-- end widget content -->
				
								</div>
								<!-- end widget div -->
                                                           </div>
							<!-- end widget -->
                                                    </article>
						<!-- WIDGET END -->
				
					</div>
                    
                    
                    
           
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
</div><!-- /.modal -->

<?php  $this->load->view('tablas.js'); ?>           
