<?php  //include('ribbon.php'); ?>

<script> 
$(function(){        
	var options_frm_medico = {
		target:        '#div_capa_pagina', 
		beforeSubmit:  showRequestMedico,  
		success:       showResponse  
	};
		$('#frm_medico').ajaxForm(options_frm_medico);  	
	});	
function showRequestMedico(formData, jqForm){	
		var nuevomedico = $("#nuevomedico_id").val();
		if(nuevomedico ==''){	
		$.smallBox({
					title : '<i class="botClose fa fa-times"></i> Aviso !',
					content : "Seleccione médico",
					color : "#dd4b39",
					timeout : 2000,
					icon : "fa fa-exclamation-triangle swing animated"
				});
		return false;
		}else{		 
			//Buscar si el medico ya se encuentra en la lista
			var cantPacMedic = 0;
			$('input[name$="pm_medico_id[]"]').each(function(){
				if($(this).val() == nuevomedico)
					{
						cantPacMedic +=1;
					}
			})
			if(cantPacMedic >0){
				$.smallBox({
							title : '<i class="botClose fa fa-times"></i> Aviso !',
							content : "Él médico ya se encuentra en la lista<br /> Seleccione otro médico",
							color : "#dd4b39",
							timeout : 2500,
							icon : "fa fa-exclamation-triangle swing animated"
						});	  
						return false;// Detener si ya encuentra				
			}
		}
	};

$(function(){	
	var options_frm_receta = {
		target:        '#div_capa_pagina', 
		beforeSubmit:  showRequestReceta,  
		success:       showResponse  
	};
		$('#frm_receta').ajaxForm(options_frm_receta);  	
	});	
function showRequestReceta(formData, jqForm){	
		var nuevomedico = $("#recetamedic_id").val();
		 
		if(nuevomedico ==''){	
		$.smallBox({
					title : '<i class="botClose fa fa-times"></i> Aviso !',
					content : "Seleccione médico",
					color : "#dd4b39",
					timeout : 2000,
					icon : "fa fa-exclamation-triangle swing animated"
				});
		return false;
		} 
	};

$(function(){	
	var options_frm_enfer = {
		target:        '#div_capa_pagina', 
		beforeSubmit:  showRequestEnfer,  
		success:       showResponse  
	};
		$('#frm_enfermedad').ajaxForm(options_frm_enfer);  	
	});	
function showRequestEnfer(formData, jqForm){	
		var nuevomedico = $("#enfermedic_id").val();
		var enfermedad = $("#enf_enfermedad_id").val();
		if(enfermedad==''){	
		$.smallBox({
					title : '<i class="botClose fa fa-times"></i> Aviso !',
					content : "Seleccione enfermedad",
					color : "#dd4b39",
					timeout : 2000,
					icon : "fa fa-exclamation-triangle swing animated"
				});
		return false;
		}else if(nuevomedico ==''){	
		$.smallBox({
					title : '<i class="botClose fa fa-times"></i> Aviso !',
					content : "Seleccione médico",
					color : "#dd4b39",
					timeout : 2000,
					icon : "fa fa-exclamation-triangle swing animated"
				});
		return false;
		}else{	 	 
			//Buscar si el medico ya se encuentra en la lista
			var cantEnfermedad = 0;
			$('input[name$="penf_enfermedad_id[]"]').each(function(){
				if($(this).val() == enfermedad)
					{
						cantEnfermedad +=1;
					}
			}); 
			if(cantEnfermedad >0){
				$.smallBox({
							title : '<i class="botClose fa fa-times"></i> Aviso !',
							content : "Ya se encuentra en la lista la enfermedad",
							color : "#dd4b39",
							timeout : 2500,
							icon : "fa fa-exclamation-triangle swing animated"
						});	  
						return false;// Detener si ya encuentra				
			}
		}
	};
	
$(function(){	
	var options_frm_medica = {
		target:        '#div_capa_pagina', 
		beforeSubmit:  showRequestMedic,  
		success:       showResponse  
	};
		$('#frm_medicamento').ajaxForm(options_frm_medica);  	
	});	
function showRequestMedic(formData, jqForm){	
		var nuevomedico = $("#medicamemedic_id").val();
		var medicamento = $("#ppr_producto_id").val();
		if(medicamento==''){	
		$.smallBox({
					title : '<i class="botClose fa fa-times"></i> Aviso !',
					content : "Seleccione medicamento",
					color : "#dd4b39",
					timeout : 2000,
					icon : "fa fa-exclamation-triangle swing animated"
				});
		return false;
		}else if(nuevomedico ==''){	
		$.smallBox({
					title : '<i class="botClose fa fa-times"></i> Aviso !',
					content : "Seleccione médico",
					color : "#dd4b39",
					timeout : 2000,
					icon : "fa fa-exclamation-triangle swing animated"
				});
		return false;
		}else{	 	 
			//Buscar si el medico ya se encuentra en la lista
			var cantProducto = 0;
			$('input[name$="pme_medicamento_id[]"]').each(function(){
				if($(this).val() == medicamento)
					{
						cantProducto +=1;
					}
			}); 
			if(cantProducto >0){
				$.smallBox({
							title : '<i class="botClose fa fa-times"></i> Aviso !',
							content : "Ya se encuentra en la lista el producto",
							color : "#dd4b39",
							timeout : 2500,
							icon : "fa fa-exclamation-triangle swing animated"
						});	  
						return false;// Detener si ya encuentra				
			}
		}
	};
	
function showResponse(responseText, statusText){
};
</script>  
<div id="content">			
    <div class="row ">     
        <div class="col-md-8">
            <h1>
                <i class="fa fa-edit fa-fw "></i> Datos clinicos
                <?php 			
				$editar = '';
				if(isset($infocliente))
				{	if($infocliente){ 	 
					echo ' - '.$infocliente->nombres.' '.$infocliente->appaterno.' '.$infocliente->apmaterno;
					}
				}
				?> 
            </h1>   
        </div>        
        <div class="col-md-4 ">   
         <div class="padding-7 hidden-print">      
            <a href='javascript:window.print(); void 0;' rel="tooltip" data-original-title="Imprimir" class="btn btn-default btn-md pull-right " ><i class="glyphicon glyphicon-print"></i> Imprimir</a> 
            <a href="#" rel="tooltip" disabled data-original-title="Descargar" class="btn btn-warning btn-md pull-right " disabled><i class="glyphicon glyphicon-download-alt"></i> Descargar</a> 
            <a rel="tooltip" data-original-title="Regresar" class="btn btn-info btn-md pull-right" id="btnregresar"><i class="glyphicon glyphicon-menu-left"></i> Regresar</a>
         </div>
        </div>	 
    </div>
     
    <!-- widget grid -->
    <section id="widget-grid" class="">        
        <!-- row -->
        <div class="row">
            <!-- Columna 1 -->
            <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-greenDark" id="wid-id-100" data-widget-colorbutton="false" data-widget-editbutton="false">
                    <header>
                        <h2><strong>Medicos que prescriben</strong> <i>Del cliente</i></h2>	
                    </header>

                    <!-- widget div-->
                    <div>		
                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <div class="widget-body-toolbar">  
                            <form id="frm_medico" class="" name="frm_medico" action="<?php  echo base_url() ?>cliente/insertClienteMedico" method="post">     
                                                     
                                <div class="row">												
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"> 
                                        <?php 
										$opciones_m[''] = '-- Seleccione médico--';		 
										if($medicos){
										foreach ($medicos as $fila_m) {
											$opciones_m[$fila_m->medico_id] = $fila_m->medico_rut.' - '.$fila_m->nombres.' '.$fila_m->appaterno.' '.$fila_m->apmaterno;
										}                        
										echo form_dropdown("nuevomedico_id", $opciones_m, '', ' id="nuevomedico_id" class="select2"');
										}
										?>   
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-right">	
                                    	<input  name="id_razonsocial" type="hidden" value="<?php echo $id_razonsocial;?>" >												
                                        <button class="btn btn-success" title="Agregar médico">
                                            <i class="fa fa-plus"></i> <span class="hidden-mobile">Agregar</span>
                                        </button>													
                                    </div>												
                                </div> 
                            </form>
                            </div>
                            
                            <div class="custom-scroll table-responsive" style="height:150px; overflow-y: scroll;">										

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th><i class="fa fa-key text-success"></i> RUC</th>
                                            <th><i class="fa fa-user text-success"></i> Medico</th>
                                            <th><i class="fa fa-calendar text-success"></i> F. Registro</th>
                                            <th style=" width:1px" class="hidden-print"><i class="fa fa-fw fa-cog txt-color-blue"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  if ($gridClienteMedico) {
										$i=1;
										foreach ($gridClienteMedico as $fila) { ?>
                                     <tr id="pm_<?php echo $fila->clientemedico_id; ?>">
                                         
                                        <td><?php  echo $fila->medico_id; ?>
                                        <input type='hidden' id='pm_medico_id' name='pm_medico_id[]' value='<?php  echo $fila->medico_id; ?>' readonly />
                                        </td>
                                        <td><?php  echo $fila->medico_rut.' - '.$fila->nombres.' '.$fila->appaterno.' '.$fila->apmaterno; ?></td> 
                                        <td><?php  echo $this->load->help_date->fechaHoraUsu($fila->fch_regpacmed); ?></td> 
                                            <td class="pull-right opciones hidden-print"> 
                                        <a href="javascript:void(0);" class="btn btn-danger btn-circle" data-trigger="focus" rel="popover" data-placement="bottom" data-original-title="<i class='fa fa-warning'></i> ¿Eliminar?" data-content='<button type="button" class="btn btn-default btn-sm" title="No eliminar"><span class="glyphicon glyphicon-menu-left"></span>Cancelar</button><legend class="no-padding no-margin" style="margin:2px !important"></legend><button onclick="btneliminarPacMedic(<?php echo $fila->clientemedico_id;?>);" type="button" class="btn btn-danger btn-sm" title="Si eliminar" id="btn_si_eliminar"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>' data-html="true"><i class="glyphicon glyphicon-trash"></i></a>
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

                
               
               
               <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-greenDark" id="wid-id-100" data-widget-colorbutton="false" data-widget-editbutton="false">
                    <header>
                        <h2><strong>Receta médica</strong> <i>Del cliente</i></h2>	
                    </header>

                    <!-- widget div-->
                    <div>		
                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <div class="widget-body-toolbar">  
                            <form id="frm_receta" class="" name="frm_receta" action="<?php  echo base_url() ?>cliente/insertClienteReceta" method="post" enctype="multipart/form-data">     
                                                     
                                <div class="row">												
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-5"> 
                                  		<div class="input-group">
                                           <!--  <span class="input-group-addon"><i class="fa fa-font"></i></span>
                                           <input class="form-control" id="pr_receta" name="pr_receta" placeholder="Receta" type="text" >-->
                                            <input type="file" accept="image/*" required="required"   name="mi_imagen">
                                        </div>
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-5"> 
                                        <?php 
										$opciones_mr[''] = '-- Seleccione médico--';		 
										if($gridClienteMedico){
										foreach ($gridClienteMedico as $fila_rm) {
											$opciones_mr[$fila_rm->medico_id] = $fila_rm->medico_rut.' - '.$fila_rm->nombres.' '.$fila_rm->appaterno.' '.$fila_rm->apmaterno;
										}                        
										echo form_dropdown("recetamedic_id", $opciones_mr, '', ' id="recetamedic_id" class="select2"');
										}
										?>   
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-2 text-right">	
                                    	<input  name="id_razonsocial" type="hidden" value="<?php echo $id_razonsocial;?>" >												
                                        <button class="btn btn-success" title="Agregar receta">
                                            <i class="fa fa-plus"></i> <span class="hidden-mobile">Agre.</span>
                                        </button>													
                                    </div>												
                                </div> 
                            </form>
                            </div>
                            
                            <div class="custom-scroll table-responsive" style="height:150px; overflow-y: scroll;">										

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="1px"><i class="fa fa-hashtag text-success"></i> N.</th>
                                            <th> Receta</th> 
                                            <th style=" width:1px" class="hidden-print"><i class="fa fa-fw fa-cog txt-color-blue"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  if ($gridClienteReceta) {
										$i=1;
										foreach ($gridClienteReceta as $fila_r) { ?>
                                     <tr id="pr_<?php echo $fila_r->clientereceta_id; ?>">
                                         
                                        <td><?php  echo $i; ?></td>
                                        <td> <a target="_blank" href="<?php  echo base_url().'recetas/'.$fila_r->clientereceta; ?>" title="Abrir archivo"><?php  echo $fila_r->clientereceta; ?></a>
                                        <input type='hidden' id='pr_clientereceta' name='pr_clientereceta[]' value='<?php  echo $fila_r->clientereceta; ?>' readonly />
                                        </td>                                        
                                       <td class="pull-right opciones hidden-print"> 
                                        <a href="javascript:void(0);" class="btn btn-danger btn-circle" data-trigger="focus" rel="popover" data-placement="bottom" data-original-title="<i class='fa fa-warning'></i> ¿Eliminar?" data-content='<button type="button" class="btn btn-default btn-sm" title="No eliminar"><span class="glyphicon glyphicon-menu-left"></span>Cancelar</button><legend class="no-padding no-margin" style="margin:2px !important"></legend><button onclick="btneliminarPacRecet(<?php echo $fila_r->clientereceta_id;?>);" type="button" class="btn btn-danger btn-sm" title="Si eliminar" id="btn_si_eliminar"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>' data-html="true"><i class="glyphicon glyphicon-trash"></i></a>
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
            <!-- Fin colummna 1 -->
            
            <!-- Columna 2 -->
            <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-greenDark" id="wid-id-101" data-widget-colorbutton="false" data-widget-editbutton="false">
                    <header>
                        <h2><strong>Enfermedades</strong> <i>Del cliente</i></h2>	
                    </header>

                    <!-- widget div-->
                    <div>		
                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <div class="widget-body-toolbar">  
                            <form id="frm_enfermedad" class="" name="frm_enfermedad" action="<?php  echo base_url() ?>cliente/insertClienteEnfermedad" method="post">     
                                                     
                                <div class="row">												
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-5"> 
                                  		 <?php 
										$opciones_enf[''] = '-- Seleccione enferm.--';		 
										if($enfermedad){
											foreach ($enfermedad as $fila_enf) {
												$opciones_enf[$fila_enf->enfermedad_id] = $fila_enf->enfermedad  ;
											}                        
											echo form_dropdown("enf_enfermedad_id", $opciones_enf, '', ' id="enf_enfermedad_id" class="select2"');
										}
										?>
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-5"> 
                                        <?php 
										$opciones_meenf[''] = '-- Seleccione médico--';		 
										if($gridClienteMedico){
										foreach ($gridClienteMedico as $fila_meenf) {
											$opciones_meenf[$fila_meenf->medico_id] = $fila_meenf->medico_rut.' - '.$fila_meenf->nombres.' '.$fila_meenf->appaterno.' '.$fila_meenf->apmaterno;
										}                        
										echo form_dropdown("enfermedic_id", $opciones_meenf, '', ' id="enfermedic_id" class="select2"');
										}
										?>
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-2 text-right">	
                                    	<input  name="id_razonsocial" type="hidden" value="<?php echo $id_razonsocial;?>" >												
                                        <button class="btn btn-success" title="Agregar enfermedad">
                                            <i class="fa fa-plus"></i> <span class="hidden-mobile">Agre.</span>
                                        </button>													
                                    </div>												
                                </div> 
                            </form>
                            </div>
                            
                            <div class="custom-scroll table-responsive" style="height:150px; overflow-y: scroll;">										

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th><i class="fa fa-hashtag text-success"></i> N.</th>
                                            <th> Enfermedades</th> 
                                            <th style=" width:1px" class="hidden-print"><i class="fa fa-fw fa-cog txt-color-blue"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  if ($gridClienteEnfermedad) {
										$i=1;
										foreach ($gridClienteEnfermedad as $fila_pacenf) { ?>
                                     <tr id="enf_<?php echo $fila_pacenf->clienteenfermedad_id; ?>">
                                         
                                        <td><?php  echo $i; ?></td>
                                        <td><?php  echo $fila_pacenf->enfermedad; ?>
                                        <input type='hidden' id='penf_enfermedad_id' name='penf_enfermedad_id[]' value='<?php  echo $fila_pacenf->enfermedad_id; ?>' readonly />
                                        </td>                                        
                                       <td class="pull-right opciones hidden-print"> 
                                        <a href="javascript:void(0);" class="btn btn-danger btn-circle" data-trigger="focus" rel="popover" data-placement="bottom" data-original-title="<i class='fa fa-warning'></i> ¿Eliminar?" data-content='<button type="button" class="btn btn-default btn-sm" title="No eliminar"><span class="glyphicon glyphicon-menu-left"></span>Cancelar</button><legend class="no-padding no-margin" style="margin:2px !important"></legend><button onclick="btneliminarPacEnf(<?php echo $fila_pacenf->clienteenfermedad_id;?>);" type="button" class="btn btn-danger btn-sm" title="Si eliminar" id="btn_si_eliminar"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>' data-html="true"><i class="glyphicon glyphicon-trash"></i></a>
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

                
               
               
               <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-greenDark" id="wid-id-102" data-widget-colorbutton="false" data-widget-editbutton="false">
                    <header>
                        <h2><strong>Medicamentos</strong> <i>Del cliente</i></h2>	
                    </header>

                    <!-- widget div-->
                    <div>		
                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <div class="widget-body-toolbar">  
                            <form id="frm_medicamento" class="" name="frm_medicamento" action="<?php  echo base_url() ?>cliente/insertClienteMedicamento" method="post">     
                                                     
                                <div class="row">												
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-5"> 
                                  		<?php 
										$opciones_ppr[''] = '-- Seleccione medicam.--';		 
										if($productos){
											foreach ($productos as $fila_ppr) {
												$opciones_ppr[$fila_ppr->producto_id] = $fila_ppr->descripcion ;
											}                        
											echo form_dropdown("ppr_producto_id", $opciones_ppr, '', ' id="ppr_producto_id" class="select2"');
										}
										?> 
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-5"> 
                                        <?php 
										$opciones_pme[''] = '-- Seleccione médico--';		 
										if($gridClienteMedico){
										foreach ($gridClienteMedico as $fila_pme) {
											$opciones_pme[$fila_pme->medico_id] = $fila_pme->medico_rut.' - '.$fila_pme->nombres.' '.$fila_pme->appaterno.' '.$fila_pme->apmaterno;
										}                        
										echo form_dropdown("medicamemedic_id", $opciones_mr, '', ' id="medicamemedic_id" class="select2"');
										}
										?>   
                                    </div>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-2 text-right">	
                                    	<input  name="id_razonsocial" type="hidden" value="<?php echo $id_razonsocial;?>" >												
                                        <button class="btn btn-success" title="Agregar receta">
                                            <i class="fa fa-plus"></i> <span class="hidden-mobile">Agre.</span>
                                        </button>													
                                    </div>												
                                </div> 
                            </form>
                            </div>
                            
                            <div class="custom-scroll table-responsive" style="height:150px; overflow-y: scroll;">										

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th><i class="fa fa-hashtag text-success"></i> N.</th>
                                            <th>Medicamentos</th> 
                                            <th style=" width:1px" class="hidden-print"><i class="fa fa-fw fa-cog txt-color-blue"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  if ($gridClienteMedicam) {
										$i=1;
										foreach ($gridClienteMedicam as $fila_pmed) { ?>
                                     <tr id="pme_<?php echo $fila_pmed->clientemedicamento_id; ?>">
                                         
                                        <td><?php  echo $i; ?></td>
                                        <td><?php  echo $fila_pmed->descripcion; ?>
                                        <input type='hidden' id='pme_medicamento_id' name='pme_medicamento_id[]' value='<?php  echo $fila_pmed->medicamento_id; ?>' readonly />
                                        </td>                                        
                                       <td class="pull-right opciones hidden-print"> 
                                        <a href="javascript:void(0);" class="btn btn-danger btn-circle" data-trigger="focus" rel="popover" data-placement="bottom" data-original-title="<i class='fa fa-warning'></i> ¿Eliminar?" data-content='<button type="button" class="btn btn-default btn-sm" title="No eliminar"><span class="glyphicon glyphicon-menu-left"></span>Cancelar</button><legend class="no-padding no-margin" style="margin:2px !important"></legend><button onclick="btneliminarPacMedicam(<?php echo $fila_pmed->clientemedicamento_id;?>);" type="button" class="btn btn-danger btn-sm" title="Si eliminar" id="btn_si_eliminar"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>' data-html="true"><i class="glyphicon glyphicon-trash"></i></a>
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
            <!--Fin columna 2-->
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
function btneliminarPacMedic(idreg){	 
	tabla ='clientemedico';	
	ruta = "cliente/eliminarClienteMedico";
	idtabla = 'pm_'+idreg;	 
	elim_reg(idreg,ruta,idtabla);	
}

function btneliminarPacRecet(idreg){	 
	tabla ='clientereceta';	
	ruta = "cliente/eliminarClienteReceta";
	idtabla = 'pr_'+idreg;	 
	elim_reg(idreg,ruta,idtabla);	
} 

function btneliminarPacEnf(idreg){	 
	tabla ='clienteenfermedad';	
	ruta = "cliente/eliminarClienteEnferm";
	idtabla = 'enf_'+idreg;	 
	elim_reg(idreg,ruta,idtabla);	
} 
function btneliminarPacMedicam(idreg){	 
	tabla ='clientemedicamento';	
	ruta = "cliente/eliminarClienteMedicam";
	idtabla = 'pme_'+idreg;	 
	elim_reg(idreg,ruta,idtabla);	
} 



function elim_reg(idreg,ruta,idtabla){	
//	var idtabla = id;
	if(idreg.length<1){  
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
			url: "<?php  echo base_url() ?>"+ruta, cache: false, 
			data:'idtabla='+idreg, 
			success: function(response){	
									
					var obj_mensaje = JSON.parse(response);	
									
					if(obj_mensaje.length>0){ 
						
						if(obj_mensaje == 'Eliminado')
						{	
							//var index = idtabla;							
							$("#" + idtabla).remove();															
							//event.preventDefault();
							$.smallBox({
								title : '<i class="botClose fa fa-times"></i> Aviso !',
								content :'Se ha eliminado el registro de forma satisfactoria',
								color : "#008d4c",
								timeout : 2500,
								icon : "fa fa-trash-o swing animated"
							});			
						}else{  
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

 

$("#btnregresar").click(function(event){ 
	event.preventDefault();        
	var urlnuevo = "<?php  echo base_url() ?>cliente/gridCliente/";
	$( "#div_capa_pagina" ).load(urlnuevo );
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
 