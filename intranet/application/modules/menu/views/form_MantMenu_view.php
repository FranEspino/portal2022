<script> 
$(function(){        
	var options = {
		target:        '#div_capa_pagina', 
		beforeSubmit:  showRequest,  
		success:       showResponse  
	};
		$('#frm_mant').ajaxForm(options);  
		$('#ModalMante').modal('show');
		$('#menu').focus();		
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
<form id="frm_mant" class="" name="frm_" action="<?php  echo base_url() ?>menu/mantMenu" method="post">
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
				if(isset($menu))
				{	if($menu){ 							 
					$editar = 'SI';
					}
				}
				?>				
                <div class="panel panel-default ">
                <fieldset >    
                
                <section>
                    <div class="row">
                        <label class="label col col-3">Sub Menu</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-user"></i>
                                <input autofocus type="text" id="menu" name="menu" maxlength="100" value="<?php  echo ($editar == 'SI')? $menu->menu:'';  ?>" required >                               
                            </label>
                        </div>
                    </div>
                </section> 
                <section>
                    <div class="row">
                        <label class="label col col-3">Menú:</label>
                        <div class="col col-9">                             
                         <?php 
						$opciones_mp[''] ='-- Seleccione menu --'; 
						if(isset($primermenu)){
							foreach ($primermenu as $fila_mp) {
								$opciones_mp[$fila_mp->id_primermenu] =$fila_mp->primermenu;
							}	
							if($editar == 'SI'){ 
								echo form_dropdown("id_primermenu", $opciones_mp, $menu->id_primermenu, 'class="form-control" required');
							}else{
								echo form_dropdown("id_primermenu", $opciones_mp, '', 'class="form-control" required');
							} 
							 
						} 
                        ?>    
                        </div>
                    </div>
                </section>  
                <section>
                    <div class="row">
                        <label class="label col col-3">Vinculo</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-user"></i>
                                <input autofocus type="text" id="vinculo" name="vinculo"  value="<?php  echo ($editar == 'SI')? $menu->vinculo:'';  ?>" required >                               
                            </label>
                        </div>
                    </div>
                </section>               
                <section class=" smart-form">
                	<div class="row">
                        <label class="label col col-3">Estado:</label>
                        <div class="col col-9">
                        <?php  
                            $estado = ($editar == 'SI')? $menu->est_menu:'1'; 
                        ?>
                        <label class="checkbox">
                        <input type="checkbox" id="est_menu" name="est_menu" <?php if ($estado=='1'){echo 'checked';} ?>>
                        <i></i>ACTIVO
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
                <input type="hidden"  name="id_menu" value="<?php  echo ($editar == 'SI')? $menu->id_menu :'';  ?>"> 
                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
   </form> 
</div><!-- /.modal -->
<?php
//	$this->load->view('usuario/mi-script.php');
?>
 