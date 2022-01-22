<script> 
$(function(){        
	var options = {
		target:        '#div_capa_pagina', 
		beforeSubmit:  showRequest,  
		success:       showResponse  
	};
		$('#frm_mant').ajaxForm(options);  
		$('#ModalMante').modal('show');
		$('#elem_descripcion').focus();		
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
<form id="frm_mant" class="" name="frm_usuario" action="<?php  echo base_url() ?>tablas/mantElemento" method="post">
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
				if(isset($tablas))
				{	if($tablas){ 							 
					$editar = 'SI';
					}
				}
				?>				
                <div class="panel panel-default ">
                <fieldset >    
                
                <section>
                    <div class="row">
                        <label class="label col col-3">Descripción</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-user"></i>
                                <input autofocus type="text" id="elem_descripcion" name="elem_descripcion" maxlength="200" value="<?php  echo ($editar == 'SI')? $tablas->elem_descripcion:'';  ?>" required >                               
                            </label>
                        </div>
                    </div>
                </section>               
                <section>
                    <div class="row">
                        <label class="label col col-3">Accesorios</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-user"></i>
                                <input type="text" name="elem_desc_accesorios" value="<?php  echo($editar == 'SI')? $tablas->elem_desc_accesorios:''; ?>" >
                            </label>
                        </div>
                    </div>
                </section>                
                <section>
                    <div class="row">
                        <label class="label col col-3">Medida</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-envelope"></i>
                                <input type="text" name="elem_medida" value="<?php  echo($editar == 'SI')? $tablas->elem_medida:''; ?>">
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Cantidad</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-envelope"></i>
                                <input type="number" name="elem_cantidad" value="<?php  echo($editar == 'SI')? $tablas->elem_cantidad:''; ?>">
                            </label>
                        </div>
                    </div>
                </section>
                
                <section>
                    <div class="row">
                        <label class="label col col-3">Foto</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-lock"></i>
                                <input type="text" name="elem_foto" value="<?php  echo($editar == 'SI')? $tablas->elem_foto:''; ?>">
                            </label>
                        </div>
                    </div>
                </section>               
                <section>
                    <div class="row">                    
                    <label class="label col col-3">Marca</label>
                        <div class="col col-9">
                            <label class="select">               
						<?php 
						if($marca){
                        foreach ($marca as $fila) {
                            $opciones_marca[$fila->marca_id] = $fila->marca_descripcion;
                        }
                        if($editar == 'SI'){
                        echo form_dropdown("marca_id", $opciones_marca, $tablas->marca_id, 'class="form-control"');
                        }else{
                        echo form_dropdown("marca_id", $opciones_marca,  'class="form-control"');
                        } 
						}
                        ?>  
                         <i></i></label>                            
                        </div>
                 	</div>
                 </section>
                 <section>
                    <div class="row">                    
                    <label class="label col col-3">Estado</label>
                        <div class="col col-9">
                            <label class="select">               
						<?php 
						if($estado){
                        foreach ($estado as $fila) {
                            $opciones_est[$fila->est_id] = $fila->est_descripcion;
                        }
                        if($editar == 'SI'){
                        echo form_dropdown("est_id", $opciones_est, $tablas->est_id, 'class="form-control"');
                        }else{
                        echo form_dropdown("est_id", $opciones_est,  'class="form-control"');
                        } 
						}
                        ?>  
                         <i></i></label>                            
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
                <input type="hidden"  name="tablas_id" value="<?php  echo ($editar == 'SI')? $tablas->tablas_id :'';  ?>"> 
                <input type="hidden"  name="ttablas_id" value="<?php  echo ($editar == 'SI')? $tablas->ttablas_id:$tipotablas;  ?>"> 
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
   </form> 
</div><!-- /.modal -->
<?php
	$this->load->view('mi-script.php');
?>
 