<script> 
$(function(){        
	var options = {
		target:        '#div_capa_pagina', 
		beforeSubmit:  showRequest,  
		success:       showResponse  
	};
		$('#frm_mant').ajaxForm(options);  
		$('#ModalMante').modal('show');
		$('#dni').focus();		
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
  

<div class="modal container fade" id="ModalMante" role="dialog"> 
 
<form id="frm_mant" class="" name="frm_empresa" action="<?php  echo base_url() ?>empresa/mantEmpresa" method="post">
<div class="modal-dialog ui-front ">
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
				if(isset($empresa))
				{	if($empresa){ 							 
					$editar = 'SI';
					}
				}
				?>				
                <div class="panel panel-default  ">
                <fieldset >    
                
                <section>
                    <div class="row">
                        <label class="label col col-3">Razón social:</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-address-card"></i>
                                <input autofocus type="text" id="razonsocial" name="razonsocial"   value="<?php  echo ($editar == 'SI')? $empresa->razonsocial:'';  ?>" required   placeholder="Ingrese Razon social" >                               
                            </label>
                        </div>
                    </div>
                </section>  
                <section>
                    <div class="row">
                        <label class="label col col-3">RUC</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-address-card"></i>
                                <input autofocus type="text" id="ruc" name="ruc" maxlength="11" value="<?php  echo ($editar == 'SI')? $empresa->ruc:'';  ?>" placeholder="Ingrese RUC" >                               
                            </label>
                        </div>
                    </div>
                </section>  
                
                        
                   
                <section>
                    <div class="row">
                        <label class="label col col-3">Telefono</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-home"></i>
                               <input autofocus type="text" id="telefono" name="telefono" maxlength="40" value="<?php  echo ($editar == 'SI')? $empresa->telefono:'';  ?>"  >                               
                            </label>
                        </div>
                    </div>
                </section> 
                 <section>
                    <div class="row">
                        <label class="label col col-3">Celular</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-thumb-tack"></i>
                               <input autofocus type="text" id="celular" name="celular" maxlength="40" value="<?php  echo ($editar == 'SI')? $empresa->celular:'';  ?>" >                               
                            </label>
                        </div>
                    </div>
                </section> 
                <section>
                    <div class="row">
                        <label class="label col col-3">Correo</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                               <input autofocus type="email" id="correo" name="correo" maxlength="40" value="<?php  echo ($editar == 'SI')? $empresa->correo:'';  ?>"  >                               
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Direccion:</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-address-card-o"></i>
                               <input autofocus type="text" id="direccion" name="direccion" value="<?php  echo ($editar == 'SI')? $empresa->direccion:'';  ?>" required >                               
                            </label>
                        </div>
                    </div>
                </section> 
                  <section>
                    <div class="row">
                        <label class="label col col-3">Referencia</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-address-card-o"></i>
                               <input autofocus type="text" id="referencia" name="referencia" value="<?php  echo ($editar == 'SI')? $empresa->referencia:'';  ?>"   >                               
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Web</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-location-arrow"></i>
                               <input autofocus type="text" id="web" name="web"  value="<?php  echo ($editar == 'SI')? $empresa->web:'';  ?>"  >                               
                            </label>
                        </div>
                    </div>
                </section> 
                <section class="hidden">
                    <div class="row">
                        <label class="label col col-3">Ubigeo:</label>
                        <div class="col col-9">     
                        <<input type="hiden" name="id_ubigeo" value="">                        
                         <?php 
						$opciones_ub[''] ='-- Seleccione Departamento / Prov. / Distrito --'; 
						if(isset($ubigeo)){
							foreach ($ubigeo as $fila_ub) {
								$opciones_ub[$fila_ub->ubigeo] =$fila_ub->ubigeo;
							}	
							if($editar == 'SI'){ 
							//	echo form_dropdown("id_ubigeo", $opciones_ub, $empresa->id_ubigeo, 'class="select2" required');
							}else{
							//	echo form_dropdown("id_ubigeo", $opciones_ub, '', 'class="select2" required');
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
                <input type="hidden"  name="id_empresa" value="<?php  echo ($editar == 'SI')? $empresa->id_empresa :'';  ?>"> 
                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
   </form> 
</div><!-- /.modal -->
<?php
	//$this->load->view('usuario/mi-script.php');
?>

<script>
 $(document).ready(function() {
	
			
	$('#fch_nacimiento').datepicker({
		dateFormat : 'dd/mm/yy',
		prevText : '<i class="fa fa-chevron-left"></i>',
		nextText : '<i class="fa fa-chevron-right"></i>',
		onSelect : function(selectedDate) {	
		}
	});			
	//Subir de nivel el z-index
	$('#fch_nacimiento').on('focus', function (e) {
		e.preventDefault();
		$(this).datepicker('show');
		$(this).datepicker('widget').css('z-index', 1051);
	});
	$('#fch_iniciocontrato').datepicker({
		dateFormat : 'dd/mm/yy',
		prevText : '<i class="fa fa-chevron-left"></i>',
		nextText : '<i class="fa fa-chevron-right"></i>',
		onSelect : function(selectedDate) {	
		}
	});			
	//Subir de nivel el z-index
	$('#fch_iniciocontrato').on('focus', function (e) {
		e.preventDefault();
		$(this).datepicker('show');
		$(this).datepicker('widget').css('z-index', 1051);
	});
	$('#fch_fincontrato').datepicker({
		dateFormat : 'dd/mm/yy',
		prevText : '<i class="fa fa-chevron-left"></i>',
		nextText : '<i class="fa fa-chevron-right"></i>',
		onSelect : function(selectedDate) {	
		}
	});			
	//Subir de nivel el z-index
	$('#fch_fincontrato').on('focus', function (e) {
		e.preventDefault();
		$(this).datepicker('show');
		$(this).datepicker('widget').css('z-index', 1051);
	});
	
	 
 
});
</script>