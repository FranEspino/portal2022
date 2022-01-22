<script> 
$(function(){        
	var options = {
		target:        '#div_capa_pagina', 
		beforeSubmit:  showRequest,  
		success:       showResponse  
	};
		$('#frm_mant').ajaxForm(options);  
		$('#ModalMante').modal('show');
		$('#cliente').focus();		
	});	
function showRequest(formData, jqForm){		
		
		$('#btnguardar').html('Grabando...');
		$("#btnguardar").attr("disabled","disabled"); 
	};
function showResponse(responseText, statusText){
	$('#ModalMante').modal('hide');
	if ($('.modal-backdrop').is(':visible')){
	  $('body').removeClass('modal-open'); 
	  $('.modal-backdrop').remove(); 
	};
};
</script>   
<?php
	$this->load->view('validarrut.php');
?>   

<div class="modal container fade" id="ModalMante" role="dialog"> 
 
<form id="frm_mant" class="" name="frm_usuario" action="<?php  echo base_url() ?>cliente/mantCliente" method="post"  enctype="multipart/form-data">
<div class="modal-dialog ui-front modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="alert-heading" id="myModalLabel"><i class="fa fa-edit"></i> <?php  echo $titulofrm; ?></h4>
            </div>
            <div class="modal-body padding-7">
            <div class="smart-form">
				<?php 			
				$editar = '';
				if(isset($cliente))
				{	if($cliente){ 							 
					$editar = 'SI';
					}
				}
				?>				
                <div class="panel panel-default col col-6 ">
                <fieldset >    
                
                <section>
                    <div class="row">
                        <label class="label col col-3">RUC del Cliente</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-address-card"></i>
                                <input autofocus type="text" id="cliente_ruc" name="cliente_ruc" maxlength="20" value="<?php  echo ($editar == 'SI')? $cliente->ruc:'';  ?>" required oninput="checkRut(this)" placeholder="Ingrese RUT" >                               
                            </label>
                        </div>
                    </div>
                </section>  
                <section>
                    <div class="row">
                        <label class="label col col-3">Nombre del Cliente</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-address-card-o"></i>
                               <input autofocus type="text" id="nombres" name="nombres" maxlength="40" value="<?php  echo ($editar == 'SI')? $cliente->nombres:'';  ?>" required >                               
                            </label>
                        </div>
                    </div>
                </section>
                 <section>
                    <div class="row">
                        <label class="label col col-3">Apellido Paterno</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-address-card-o"></i>
                               <input autofocus type="text" id="appaterno" name="appaterno" maxlength="40" value="<?php  echo ($editar == 'SI')? $cliente->appaterno:'';  ?>" required >                               
                            </label>
                        </div>
                    </div>
                </section> 
                  <section>
                    <div class="row">
                        <label class="label col col-3">Apellido Materno</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-address-card-o"></i>
                               <input autofocus type="text" id="apmaterno" name="apmaterno" maxlength="40" value="<?php  echo ($editar == 'SI')? $cliente->apmaterno:'';  ?>" required >                               
                            </label>
                        </div>
                    </div>
                </section> 
                <section>
                    <div class="row">
                        <label class="label col col-3">Cédula</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-photo"></i>   
                                <input type="file" accept="image/*" name="cedula">                        
                            </label>
                        </div>
                    </div>
                </section> 
                <section>
                    <div class="row">
                        <label class="label col col-3">Comprobante de domicilio</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-photo"></i>   
                                <input type="file" accept="image/*" name="compdomicilio">                        
                            </label>
                        </div>
                    </div>
                </section> 
                <section>
                    <div class="row">
                        <label class="label col col-3">Comprobante de contrato</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-photo"></i>   
                                <input type="file" accept="image/*" name="compcontrato">                        
                            </label>
                        </div>
                    </div>
                </section>     
                  <section>
                    <div class="row">
                        <label class="label col col-3">Fecha de Nacimiento</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-calendar"></i>
                               <input autofocus type="text" id="fechanacimiento" name="fechanacimiento" maxlength="40" value="<?php  echo ($editar == 'SI')? $cliente->fechanacimiento:'';  ?>" required >                               
                            </label>
                        </div>
                    </div>
                </section>      
                 <section>
                    <div class="row">
                        <label class="label col col-3">Sexo</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-users"></i>
                               <input autofocus type="text" id="sexo" name="sexo" maxlength="40" value="<?php  echo ($editar == 'SI')? $cliente->sexo:'';  ?>" required >                               
                            </label>
                        </div>
                    </div>
                </section>    
                  <section>
                    <div class="row">
                        <label class="label col col-3">Correo</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                               <input autofocus type="email" id="correo" name="correo" maxlength="40" value="<?php  echo ($editar == 'SI')? $cliente->correo:'';  ?>" required >                               
                            </label>
                        </div>
                    </div>
                </section>  
                  
                
                </fieldset> 
            </div>
            
            
            <div class="panel panel-default col col-6 ">
                <fieldset >  
                <section>
                    <div class="row">
                        <label class="label col col-3">Nacionalidad</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-map-marker"></i>
                               <input autofocus type="text" id="nacionalidad" name="nacionalidad" maxlength="40" value="<?php  echo ($editar == 'SI')? $cliente->nacionalidad:'';  ?>" required >                               
                            </label>
                        </div>
                    </div>
                </section> 
                 <section>
                    <div class="row">
                        <label class="label col col-3">Población</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-street-view"></i>
                                <input autofocus type="text" id="poblacion" name="poblacion" maxlength="40" value="<?php  echo ($editar == 'SI')? $cliente->poblacion:'';  ?>" required >                               
                            </label>
                        </div>
                    </div>
                </section>  
                <section>
                    <div class="row">
                        <label class="label col col-3">Dirección</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-location-arrow"></i>
                               <input autofocus type="text" id="direccion" name="direccion" maxlength="40" value="<?php  echo ($editar == 'SI')? $cliente->direccion:'';  ?>" required >                               
                            </label>
                        </div>
                    </div>
                </section>
                 <section>
                    <div class="row">
                        <label class="label col col-3">Comuna</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-thumb-tack"></i>
                               <input autofocus type="text" id="comuna" name="comuna" maxlength="40" value="<?php  echo ($editar == 'SI')? $cliente->comuna:'';  ?>" required >                               
                            </label>
                        </div>
                    </div>
                </section> 
                  <section>
                    <div class="row">
                        <label class="label col col-3">Municipalidad</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-home"></i>
                               <input autofocus type="text" id="	municipalidad" name="municipalidad" maxlength="40" value="<?php  echo ($editar == 'SI')? $cliente->municipalidad:'';  ?>" required >                               
                            </label>
                        </div>
                    </div>
                </section> 
                   <section>
                    <div class="row">
                        <label class="label col col-3">Referencias</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-users"></i>
                               <input autofocus type="text" id="referencias" name="referencias" maxlength="40" value="<?php  echo ($editar == 'SI')? $cliente->referencias:'';  ?>" required >                               
                            </label>
                        </div>
                    </div>
                </section>     
                  <section>
                    <div class="row">
                        <label class="label col col-3">Telefonos</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-phone"></i>
                               <input autofocus type="number" id="telefonos" name="telefonos" maxlength="40" value="<?php  echo ($editar == 'SI')? $cliente->celular:'';  ?>" required >                               
                            </label>
                        </div>
                    </div>
                </section>      
                 <section>
                    <div class="row">
                        <label class="label col col-3">S. de Salud</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-ambulance"></i>
                               <input autofocus type="text" id="sistemasalud_id" name="sistemasalud_id" maxlength="40" value="<?php  echo ($editar == 'SI')? $cliente->sistemasalud_id:'';  ?>" required >                               
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Persona Autorizada para Retirar</label>
                        <div class="col col-9">
                             
                         <?php 
						 $opciones_p[''] ='-- No tiene--'; 
						if($pers_autoretiro_id){
                        foreach ($pers_autoretiro_id as $fila_p) {
                            $opciones_p[$fila_p->id_razonsocial] = $fila_p->appaterno.' '.$fila_p->apmaterno.' '.$fila_p->nombres;
                        }
                        if($editar == 'SI'){
                        echo form_dropdown("pers_autoretiro_id", $opciones_p, $cliente->pers_autoretiro_id, 'class="select2"');
                        }else{
                        echo form_dropdown("pers_autoretiro_id", $opciones_p, '', 'class="select2"');
                        } 
						}
                        ?>    
                        </div>
                    </div>
                </section>   
                      
                
                </fieldset> 
            </div>
            
            
            </div>
            </div>
            <div class="modal-footer">
                <button title="Cancelar" type="button" class="btn btn-default" data-dismiss="modal">
                   Cancelar
                </button>
                <button title="Guardar" type="submit" class="btn btn-primary" id="btnguardar" name="btnguardar" >
                   <span class="glyphicon glyphicon-floppy-disk"></span> Guardar
                </button>
                <!--Campos ocultos-->
                <input type="hidden"  name="id_razonsocial" value="<?php  echo ($editar == 'SI')? $cliente->id_razonsocial :'';  ?>"> 
                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
   </form> 
</div><!-- /.modal -->
<?php
	$this->load->view('tablas/mi-script.php');
?>

<script>
 $(document).ready(function() {
	
			
	$('#fechanacimiento').datepicker({
		dateFormat : 'dd/mm/yy',
		prevText : '<i class="fa fa-chevron-left"></i>',
		nextText : '<i class="fa fa-chevron-right"></i>',
		onSelect : function(selectedDate) {	
		}
	});			
	//Subir de nivel el z-index
	$('#fechanacimiento').on('focus', function (e) {
		e.preventDefault();
		$(this).datepicker('show');
		$(this).datepicker('widget').css('z-index', 1051);
	});
	
	 
 
});
</script>