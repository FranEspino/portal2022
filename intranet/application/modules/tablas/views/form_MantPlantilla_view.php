<script> 
$(function(){        
	var options = {
		target:        '#div_capa_pagina', 
		beforeSubmit:  showRequest,  
		success:       showResponse  
	};
		$('#frm_mant').ajaxForm(options);  
		$('#ModalMante').modal('show');
		$('#plantilla').focus();		
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
<form id="frm_mant" class="" name="frm_usuario" action="<?php  echo base_url() ?>tablas/plantilla/mantPlantilla" method="post">
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
				if(isset($plantilla))
				{	if($plantilla){ 							 
					$editar = 'SI';
					}
				}
				?>				
                <div class="panel panel-default ">
                <fieldset >    
                
                <section>
                    <div class="row">
                        <label class="label col col-3">Plantilla</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-user"></i>
                                <input autofocus type="text" id="plantilla" name="plantilla" maxlength="100" value="<?php  echo ($editar == 'SI')? $plantilla->plantilla:'';  ?>" required >                               
                            </label>
                        </div>
                    </div>
                </section>  
                <section class="col-sm-12">
                    <span class="text-primary">Condición de pago:</span>
                    <textarea class="summernote" name ='condicionpago'><?php // echo ($editar == 'SI')? $ordenservicio->condicionpago:'';  ?></textarea>    
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
                <input type="hidden"  name="plantilla_id" value="<?php  echo ($editar == 'SI')? $plantilla->plantilla_id :'';  ?>"> 
                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
   </form> 
</div><!-- /.modal -->
<?php
	$this->load->view('mi-script.php');
?>
 <script src="<?php  echo base_url(); ?>assets/js/plugin/summernote/summernote.min.js"></script>
   <script type="text/javascript">
        
            // DO NOT REMOVE : GLOBAL FUNCTIONS!
            
            $(document).ready(function() {
                
                pageSetUp();

                /*
                 * SUMMERNOTE EDITOR
                 */
                
                $('.summernote').summernote({
                    height: 320,
                    toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'hr']],
                    ['view', ['fullscreen', 'codeview', 'help']]

                  ]
                });
            
                /*
                 * MARKDOWN EDITOR
                 */
                 
                /* Dropzone.autoDiscover = false;
            $("#mydropzone").dropzone({
                //url: "/file/post",
                addRemoveLinks : true,
                maxFilesize: 0.5,
                maxFiles: 1,
                dictDefaultMessage: '<span class="text-center"><span class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span class="font-lg"><i class="fa fa-caret-right text-danger"></i> Drop files <span class="font-xs">to upload</span></span><span>&nbsp&nbsp<h4 class="display-inline"> (Or Click)</h4></span>',
                dictResponseError: 'Error uploading file!'
            });
*/
                        
            
            })

        </script> 