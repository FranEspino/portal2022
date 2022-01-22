<?php  //include('ribbon.php'); ?>
<script type="text/javascript">
  //$('#ModalReporteLetras').modal('hide');
  if ($('.modal-backdrop').is(':visible')){
      $('body').removeClass('modal-open'); 
      $('.modal-backdrop').remove();
      $('body').css('padding-right','0');
  };
  
</script>
<div id="content">			
    <div class="row ">     
        <div class="col-md-8">
            <h1>
                <i class="fa fa-edit fa-fw "></i> Razón Social
            </h1>   
        </div>        
        <div class="col-md-4 ">   
         <div class="padding-7 hidden-print">      
            <a href='javascript:window.print(); void 0;' rel="tooltip" data-original-title="Imprimir" class="btn btn-default btn-md pull-right " ><i class="glyphicon glyphicon-print"></i> Imprimir</a> 
            <a href="#" rel="tooltip" disabled data-original-title="Descargar" class="btn btn-warning btn-md pull-right "><i class="glyphicon glyphicon-download-alt"></i> Descargar</a> 
            <a rel="tooltip" data-original-title="Agregar" class="btn btn-success btn-md pull-right" id="btnnuevo"><i class="glyphicon glyphicon-plus"></i> Nuevo</a>
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
                <div class="jarviswidget jarviswidget-color-teal" id="wid-id-0" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-deletebutton="false">	
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
                                        <th>N.</th>
                                        <th style="width:1px">DNI</th> 
                                        <th><i class="fa fa-fw fa-user text-muted"></i>Cliente</th>
                                        <th >CMP</th>
                                        <th >RNE</th>
                                        <th >Especialidad</th>
                                              <th style="width:1px">Cel/Tlf</th>
                                               
                                              <th style="width:1px">Medico</th>
                                              <th style="width:1px">Tecnologo</th>
                                              <!--<th style="width:1px"></th>-->
                                              
                                        <th style=" width:60px" class="hidden-print"><i class="fa fa-fw fa-cog txt-color-blue"></i></th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
								<?php  if ($grid) {
										$i=1;
										foreach ($grid as $fila) { ?>
                                     <tr id="<?php echo $fila->id_razonsocial; ?>">
                                        <td><?php  echo $i; ?></td>
                                        <td><?php  echo $fila->dni . ' '.$fila->ruc; ?></td>
                                        <td><?php  echo $fila->razonsocial; ?></td> 
                                        <td><?php  echo $fila->cmp; ?></td>
                                        <td><?php  echo $fila->rne; ?></td>
                                        <td><?php  echo $fila->especialidad; ?></td>
                                        
                                        <td><?php  echo $fila->celular.' '.$fila->telefono; ?></td>  
                                      
                                       
                                     
                                          
                                         <td><?php   if($fila->flg_medico==1){ echo '✓';} ?></td>
                                         <td><?php   if($fila->flg_tecnologo==1){ echo '✓';} ?></td>
                                         <!--<td class="opciones"><button  id="btn_editardato_<?php  echo $fila->id_razonsocial ; ?>" name="editardato_<?php  echo $fila->id_razonsocial ; ?>" value="<?php  echo $fila->id_razonsocial ; ?>" class="datosclinicos btn btn-sm btn-info "  data-placement="left" rel="tooltip" data-original-title="Datos clinicos"><i class="glyphicon glyphicon-eye-open"></i></button></td>-->
                                        <td class="pull-right opciones hidden-print">                                        
                                        <button  id="btn_editardato_<?php  echo $fila->id_razonsocial ; ?>" name="editardato_<?php  echo $fila->id_razonsocial ; ?>" value="<?php  echo $fila->id_razonsocial ; ?>" class="editardato btn btn-primary btn-circle"  data-placement="left" rel="tooltip" data-original-title="Editar"><i class="glyphicon glyphicon-edit"></i></button>
                                        <a href="javascript:void(0);" class="btn btn-danger btn-circle" data-trigger="focus" rel="popover" data-placement="bottom" data-original-title="<i class='fa fa-warning'></i> ¿Eliminar?" data-content='<button type="button" class="btn btn-default btn-sm" title="No eliminar"><span class="glyphicon glyphicon-menu-left"></span>Cancelar</button><legend class="no-padding no-margin" style="margin:2px !important"></legend><button onclick="elim_reg(<?php echo $fila->id_razonsocial;?>);" type="button" class="btn btn-danger btn-sm" title="Si eliminar" id="btn_si_eliminar"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>' data-html="true"><i class="glyphicon glyphicon-trash"></i></a>
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
			content : "No hay registro para anular.<br>*Si el problema continua, comuníquese con el programador",
			color : "#dd4b39",
			timeout : 3000,
			icon : "fa fa-exclamation-triangle swing animated"
		});
	}else{		
		$('#btn_si_eliminar').html('Eliminan...');
		$("#btn_si_eliminar").attr("disabled","disabled"); 
		$.ajax({ 
			type: "post",
			url: "<?php  echo base_url() ?>cliente/eliminarCliente", cache: false, 
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
							event.preventDefault(); 
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

$(".datosclinicos").click(function(event){
	event.preventDefault();     
	var idtablas = $(this).val();
	var url = "<?php  echo base_url() ?>cliente/gridDatosClinicos/"+idtablas;
	$( "#div_capa_pagina" ).load(url);
});

$(".editardatoXXXX").click(function(event){
	event.preventDefault();     
	var idtablas = $(this).val();
	var url = "<?php  echo base_url() ?>cliente/mantClienteForm/"+idtablas;
	$( "#div_ModalMant" ).load(url);
});  

$("#btnnuevoXXX").click(function(event){ 
	event.preventDefault();        
	var urlnuevo = "<?php  echo base_url() ?>cliente/mantClienteForm/";
	$( "#div_ModalMant" ).load(urlnuevo );
}); 	

//Razon social
  $("#btnnuevo").click(function(event){
        event.preventDefault();
        var url_editar = "<?php  echo base_url();  ?>cliente/formRazonSocialM/"+$(this).val();
        $("#div_ModalMantRS").load(url_editar);
  })  

  $(".editardato").click(function(event){
    var idrsoc = $(this).val(); 
    if(idrsoc > 0){
      //Si es mayor a 0 quiere decir que hay un ID para editar
      var url_editar = "<?php  echo base_url();  ?>cliente/formRazonSocialM/"+idrsoc;
      $("#div_ModalMantRS").load(url_editar);
    }else{
      $("#vv_razons").focus();
      $.smallBox({
        title : '<i class="botClose fa fa-times"></i> Aviso !',
        content : '- Para realizar la <strong>modificación</strong> primero <strong>Busca y Seleccione razón social</strong>',
        color : "#dd4b39",
        timeout : 5000,
        icon : "fa fa-info-circle swing animated"
        });  
      return false      
    }
    })
  
  function x_fn_insertRS(){    
    // x_idrs Es una variable Global que se crea en el formulario form_MantRazonsocial_view
    event.preventDefault();     
 //   var idtablas = $(this).val();
    var url = "<?php  echo base_url() ?>cliente/gridTodoMedico";
    $( "#div_capa_pagina" ).load(url);
  }
  
  function x_fn_updateRS(){
    event.preventDefault();     
    var url = "<?php  echo base_url() ?>cliente/gridTodoMedico";
    $( "#div_capa_pagina" ).load(url);

  }
//.Razon social
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
<!-- Ejecutar RazonSocial -->
<div id="div_ModalMantRS">
</div><!-- /. Ejecutar RazonSocial -->   