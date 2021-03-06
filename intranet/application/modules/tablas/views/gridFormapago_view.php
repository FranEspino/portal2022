<?php  //include('ribbon.php'); ?>
<div id="content">			
    <div class="row ">     
        <div class="col-xs-12">
            <h1>
                <i class="fa fa-money fa-fw "></i> Formas de Pago
            </h1>   
        </div>   
    </div>
     
    <!-- widget grid -->
    <section id="widget-grid" class="">        
        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-teal" id="wid-id-0" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-deletebutton="false">	
                    <header>
                        <span class="padding-gutter titulo-jarvis">
                        	<i class="fa fa-list"></i> <?php  echo $titulotabla ; ?> 
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
                                        <th>N.</th>
                                        <th><i class="fa fa-fw fa-credit-card text-muted"></i>Formas de Pago</th>
                                        
                                        <th style=" width:42px" class="hidden-print"><i class="fa fa-fw fa-cog txt-color-blue"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php  if ($grid) {
										$i=1;
										foreach ($grid as $fila) { ?>
                                     <tr id="<?php echo $fila->formapago_id; ?>">
                                        <td><?php  echo $i; ?></td>
                                        <td><?php  echo $fila->formapago  ; ?></td>
                                        
                                        <td class="pull-right opciones hidden-print">
                                        	<?php if($fila->formapago_id>1){ ?>
	                                         <button  id="btn_editardato_<?php  echo $fila->formapago_id ; ?>" name="editardato_<?php  echo $fila->formapago_id ; ?>" value="<?php  echo $fila->formapago_id ; ?>" class="editardato btn btn-primary btn-circle"  data-placement="left" rel="tooltip" data-original-title="Editar"><i class="glyphicon glyphicon-edit"></i></button>
	                                        
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
<script>
pageSetUp();
  
function elim_reg(id){	
	var idtabla = id;
	if(idtabla.length<1){  
		//event.preventDefault();  
		$.smallBox({
			title : '<i class="botClose fa fa-times"></i> Aviso !',
			content : "No hay registro para anular.<br>*Si el problema continua, comun??quese con el programador",
			color : "#dd4b39",
			timeout : 3000,
			icon : "fa fa-exclamation-triangle swing animated"
		});
	}else{		
		$('#btn_si_eliminar').html('Eliminan...');
		$("#btn_si_eliminar").attr("disabled","disabled"); 
		$.ajax({ 
			type: "post",
			url: "<?php  echo base_url() ?>tablas/formapago/eliminarFormapago", cache: false, 
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
								color : "#008d4c",
								timeout : 2500,
								icon : "fa fa-trash-o swing animated"
							});			
						}else{
							//event.preventDefault();  
							$.smallBox({
								title : '<i class="botClose fa fa-times"></i> Aviso !',
								content : obj_mensaje,
								color : "#dd4b39",
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
	var url = "<?php  echo base_url() ?>tablas/formapago/mantFormapagoForm/"+idtablas;
	$( "#div_ModalMant" ).load(url);
});  

$("#btnnuevo").click(function(event){ 
	event.preventDefault();        
	var urlnuevo = "<?php  echo base_url() ?>tablas/formapago/mantFormapagoForm/";
	$( "#div_ModalMant" ).load(urlnuevo );
}); 	
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
 