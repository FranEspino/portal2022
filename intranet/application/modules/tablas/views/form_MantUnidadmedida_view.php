<script> 
$(function(){        
	var options = {
		target:        '#div_capa_pagina', 
		beforeSubmit:  showRequest,  
		success:       showResponse  
	};
		$('#frm_mant').ajaxForm(options);  
		$('#ModalMante').modal('show');
		$('#unidadmedida').focus();		
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
<form id="frm_mant" class="" name="frm_usuario" action="<?php  echo base_url() ?>tablas/unidadmedida/mantUnidadmedida" method="post">
<div class="modal-dialog ui-front">
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
				if(isset($unidadmedida))
				{	if($unidadmedida){ 							 
					$editar = 'SI';
					}
				}
				?>				
                <div class="panel panel-default ">
                <fieldset >    
                
                <section>
                    <div class="row">
                        <label class="label col col-3">Unidad de medida</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-balance-scale"></i>
                                <input autofocus type="text" id="unidadmedida" name="unidadmedida" maxlength="100" value="<?php  echo ($editar == 'SI')? $unidadmedida->unidadmedida:'';  ?>" required >                               
                            </label>
                        </div>
                    </div>
                </section> 
                <section>
                    <div class="row">
                        <label class="label col col-3">Abreviatura</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-balance-scale"></i>
                                <input autofocus type="text" id="abrevunidadmed" name="abrevunidadmed" maxlength="100" value="<?php  echo ($editar == 'SI')? $unidadmedida->abrevunidadmed:'';  ?>" required >                               
                            </label>
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
                <input type="hidden"  name="unidadmedida_id" value="<?php  echo ($editar == 'SI')? $unidadmedida->unidadmedida_id :'';  ?>"> 
                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
   </form> 
</div><!-- /.modal -->
<?php
	$this->load->view('mi-script.php');
?>
 