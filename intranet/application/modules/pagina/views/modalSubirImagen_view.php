<script> 
$(function(){        
	var options = {
		target:        '#div_imagen_<?php  echo $idpagina;  ?>', 
		beforeSubmit:  showRequest,  
		success:       showResponse  
	};
	$('#frm_mant').ajaxForm(options);  
		$('#ModalMante<?php  echo $idpagina;  ?>').modal('show'); 		
	});	
function showRequest(formData, jqForm){		
		$('#btnguardar').html('Grabando...');
		$("#btnguardar").attr("disabled","disabled"); 
	};
function showResponse(responseText, statusText){
	$('#ModalMante<?php  echo $idpagina;  ?>').modal('hide');
	if ($('.modal-backdrop').is(':visible')){
	  $('body').removeClass('modal-open'); 
	  $('.modal-backdrop').remove(); 
	};
};
</script>
      

<div class="modal container fade" id="ModalMante<?php  echo $idpagina;  ?>" role="dialog" data-backdrop="static" data-keyboard="false"> 
<form action="<?php  echo base_url() ?>pagina/cargar_archivo" id="frm_mant" method="post" enctype="multipart/form-data">
<div class="modal-dialog ui-front "  >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="alert-heading" id="myModalLabel"><i class="fa fa-edit"></i> Subir nueva imagen</h4>
            </div>
            <div class="modal-body padding-7 ">
    <input type="file" accept="image/*" onchange="loadFile(event)" name="mi_imagen">
 
 <input type="hidden"  name="id_pagina" value="<?php  echo $idpagina;  ?>"> 
  <img width="100%" style="min-height:100px" id="output<?php  echo $idpagina;  ?>"/>
 
<!-- <input type="hidden"  name="nombreimagen" value="<?php // echo $nombreimagen;  ?>"> -->
             </div>
      
                        
                 
            <div class="modal-footer">
            <div class="col-sm-6 text-primary " style="text-align: left">
            		* La Imágen debe tener un máximo de <b>400 píxeles de ancho y en formato JPEG, JPG o PNG<b>
            	</div>
              <button title="Cancelar" type="button" class="btn btn-default" data-dismiss="modal">
                   Cancelar
                </button>
                   <button title="Subir imagen" type="submit" class="btn btn-primary" id="btnguardar" name="btnguardar" >
                   <span class="glyphicon glyphicon-floppy-disk"></span> Guardar
                </button>
               
                
                
                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
   </form> 
   
</div><!-- /.modal -->
  
<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output<?php  echo $idpagina;  ?>');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>