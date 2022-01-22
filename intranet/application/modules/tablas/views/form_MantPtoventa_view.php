<script> 
$(function(){        
	var options = {
		target:        '#div_capa_pagina', 
		beforeSubmit:  showRequest,  
		success:       showResponse  
	};
		$('#frm_mant').ajaxForm(options);  
		$('#ModalMante').modal('show');
		$('#nombre_ptoventa').focus();		
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
<form id="frm_mant" class="" name="frm_usuario" action="<?php  echo base_url() ?>tablas/ptoventa/mantPtoventa" method="post" enctype="multipart/form-data">
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
				if(isset($bodega))
				{	if($bodega){ 							 
					$editar = 'SI';
					}
				}
				?>				
                <div class="panel panel-default ">
                <fieldset >    
                
                <section>
                    <div class="row">
                        <label class="  text-primary  col col-3">Punto de venta</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-home"></i>
                                <input autofocus type="text" id="nombre_ptoventa" name="nombre_ptoventa" maxlength="250" value="<?php  echo ($editar == 'SI')? $bodega->nombre_ptoventa:'';  ?>" required >                               
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="text-primary col col-3">Dirección</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-info"></i>
                                <input autofocus type="text" id="direccion_ptoventa" name="direccion_ptoventa" maxlength="250" value="<?php  echo ($editar == 'SI')? $bodega->direccion_ptoventa:'';  ?>">                               
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Descripción</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-info"></i>
                                <input autofocus type="text" id="pto_desc" name="pto_desc" maxlength="250" value="<?php  echo ($editar == 'SI')? $bodega->pto_desc:'';  ?>">                               
                            </label>
                        </div>
                    </div>
                </section>
                
                <section>
                    <div class="row">
                        <label class="label col col-3 ">Ubigeo<br> (Distrito | Prov.)</label>
                        <div class="col col-9">
                           <select name="id_ubigeopto"  style="width: 100%;" class="select2AjaxUbigeo">
                            <?php if($editar == 'SI'){?>
                                <option value="<?php  echo $bodega->ubigeo; ?>"><?php  echo $bodega->ubigeo.' | '.$bodega->distrito.' | '.$bodega->provincia.' | '.$bodega->departamento; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <small class=" col col-3 " style="padding-right: 0px">Cod. establecimiento (SUNAT)</small>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-hashtag"></i>
                                <input autofocus type="text" id="cod_ptosunat" name="cod_ptosunat" maxlength="4" value="<?php  echo ($editar == 'SI')? $bodega->cod_ptosunat:'';  ?>">                               
                            </label>
                        </div>
                    </div>
                </section>

                <section>
                    <div class="row">
                        <label class="label col col-3">Logo <em>(Opcional)</em><br><small><em>Recomendado: 40x200 px</em></small></label>
                        <div class="col col-9">
                            <input type="file" accept="image/*" class="btn btn-default" onchange="loadFilePto(event)" name="mi_imagen">  
                            <?php if($editar == 'SI'){?>   
                                <img style="min-height: 40px; max-width: 100%" src="<?php echo base_url(); ?>file/img/<?php  echo $bodega->pto_logo; ?>"  id="ptologo">
                            <?php }else{ ?>
                                <img width="100%" style="min-height: 40px" id="ptologo"/>
                            <?php } ?>
                        </div>
                    </div>
                </section>

                <section>
                    <div class="row">                                   
                        <label class="label col col-3">Estado</label>
                        <div class="col col-9">

                        <label>
                            <input  type="radio" id="status_correlativo1" class="radiobox style-0"  value="AC"  <?php  echo @($bodega->status_ptoventa=='AC')?'checked="true" ':'';?> <?php  echo ($editar != 'SI')? 'checked="true" ':'';  ?>  name="status_ptoventa" required>
                            <span>Activo</span> 
                        </label> 
                        <label>
                            <input type="radio" id="status_correlativo3" class="radiobox style-0"  value="DS"  <?php  echo @($bodega->status_ptoventa=='DS')?'checked="true" ':'';?>  name="status_ptoventa" required>
                            <span>Desactivado</span> 
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
                <input type="hidden"  name="id_ptoventa" value="<?php  echo ($editar == 'SI')? $bodega->id_ptoventa :'';  ?>"> 
                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
   </form> 
</div><!-- /.modal -->
<?php
	$this->load->view('mi-script.php');
?>
 <script>
  var loadFilePto = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('ptologo');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>