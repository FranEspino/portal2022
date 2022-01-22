<script> 
$(function(){        
	var options = {
		target:        '#div_capa_pagina', 
		beforeSubmit:  showRequest,  
		success:       showResponse  
	};
		$('#frm_mantPagina').ajaxForm(options);  
		$('#ModalMantePagina').modal('show');
		$('#pagina').focus();		
	});	
function showRequest(formData, jqForm){		
		$('#btnguardar').html('Grabando...');
		$("#btnguardar").attr("disabled","disabled"); 
	};
function showResponse(responseText, statusText){
	$('#ModalMantePagina').modal('hide');
	if ($('.modal-backdrop').is(':visible')){
	  $('body').removeClass('modal-open'); 
	  $('.modal-backdrop').remove(); 
	};
};
</script>
      

<div class="modal container fade" id="ModalMantePagina" role="dialog" data-backdrop="static" data-keyboard="false"> 
<form id="frm_mantPagina" class="" name="frm_" action="<?php  echo base_url() ?>pagina/mantPagina" method="post"  enctype="multipart/form-data">
<div class="modal-dialog ui-front modal-lg" style="width:100%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="alert-heading" id="myModalLabel"><i class="fa fa-edit"></i> <?php  echo $titulofrm; ?></h4>
            </div>
            <div class="modal-body padding-7 ">
            <?php 			
				$editar = '';
				if(isset($pagina))
				{	if($pagina){ 							 
					$editar = 'SI';
					}
				}
				?>	
             
            <input type="hidden" class="form-control" value ="<?php  echo ($editar == 'SI')? $pagina->IdPagina:'';  ?>" id="IdPagina"  name = "IdPagina">        
            	 
                <div class="row ">             
                
                <section class="col-sm-1 ">
                    <div class="text-primary"><strong>Titulo:</strong></div>
                   </section>
                    <section class="col-sm-5">
                        
                        <input type="text" class="form-control" value ="<?php  echo ($editar == 'SI')? $pagina->Titulo:'';  ?>" onKeyUp="" placeholder="Ingrese título" id="Titulo"  name = "Titulo">
                    
                </section>
                
                
                <section class="col-sm-1">
                    <div class="text-primary"><strong>Sub titulo:</strong></div>
                </section>
                <section class="col-sm-5">
                        
                        <input type="text" class="form-control" value ="<?php  echo ($editar == 'SI')? $pagina->SubTitulo:'';  ?>" onKeyUp="" placeholder="Sub titulo" id="SubTitulo"  name = "SubTitulo">
                        
                </section>
                
                </div>
				<br>

                <div class="row">    
                    <section class="col-sm-12">
                        <textarea class="summernote" name ='Contenido'><?php  echo ($editar == 'SI')? $pagina->Contenido:'';  ?></textarea>    
                    </section>
                </div>
                <div class="row ">
                	<section class="col-sm-1">
                    	<div class="text-primary"><strong>Menu:</strong></div>
               		 </section>
                     <section class="col-sm-2">
                    	<?php 
                    $opciones_c[''] ='-- Seleccione menu --';  
                    if(isset($menu)){
						
                        foreach ($menu as $fila_c) {
                            $opciones_c[$fila_c->id_primermenu] =$fila_c->primermenu;
                        }	
                        if($editar == 'SI'){ 
                            echo form_dropdown("IdMenu", $opciones_c, $pagina->IdMenu, ' class="form-control" required');
                        }else{
                            echo form_dropdown("IdMenu", $opciones_c, '', ' class="form-control" required');
                        } 
                         
                    } 
                    ?>   
               		 </section>
                     <section class="col-sm-1">
                    	<div class="text-primary"><strong>Publicado:</strong></div>
               		 </section>
                      
                     <section class="col-sm-1 smart-form">
                        <?php  
                            $estado = ($editar == 'SI')? $pagina->EstadoPublicacion:'1'; 
                        ?>
                        <label class="checkbox">
                        <input type="checkbox" id="EstadoPublicacion" name="EstadoPublicacion" <?php if ($estado=='1'){echo 'checked';} ?>>
                        <i></i>SI
                        </label>                         
                    </section>
                    <section class="col-sm-1">
                    	<div class="text-primary"><strong>Fecha publicación:</strong></div>
               		 </section>
                      
                     <section class="col-sm-2 smart-form">   
                            <label class="input"> <i class="icon-append fa fa-calendar"></i>
                               <input autofocus type="text" id="FPublicacion" name="FPublicacion" maxlength="40" value="<?php  echo ($editar == 'SI')? $this->load->help_date->fechaUsuario($pagina->FPublicacion):date('d-m-Y');  ?>" required readonly >                               
                            </label> 
                  
                    </section>
                  <div id="div_fechaevento">   
                    <section class="col-sm-1">
                    	<div class="text-primary"><strong>Evento: Inicio - 	Fin</strong></div>
               		</section>
                    <section class="col-sm-1 smart-form no-padding">  
                    	  
                            <label class="input"> 
                               <input title="Fecha inicio del evento"type="text" id="FechaInicio" name="FechaInicio" maxlength="40" value="<?php  echo ($editar == 'SI')? $this->load->help_date->fechaUsuario($pagina->FechaInicio):date('d-m-Y');  ?>" required readonly >                               
                            </label>  
                    </section>
                    
                    <section class="col-sm-2 smart-form">   
                            <label class="input"> <i class="icon-append fa fa-calendar"></i>
                               <input title="Fecha fín del evento" type="text" id="FechaFin" name="FechaFin" maxlength="40" value="<?php  echo ($editar == 'SI')? $this->load->help_date->fechaUsuario($pagina->FechaFin):date('d-m-Y');  ?>" required readonly >                               
                            </label>  
                    </section> 
                 </div>
                
              </div>
        
                        
                 
            <div class="modal-footer">
            	<div class="col-sm-6 text-primary " style="text-align: left">
            		* Si necesitas subir imagenes; las imágenes deben tener un máximo de <b>400 píxeles de ancho y en formato JPEG, JPG o PNG<b>
            	</div>
            	<div>
	                <button title="Cancelar" type="button" class="btn btn-default" data-dismiss="modal">
	                   Cancelar
	                </button>
	                <button title="Guardar" type="submit" class="btn btn-primary" id="btnguardar" name="btnguardar" >
	                   <span class="glyphicon glyphicon-floppy-disk"></span> Guardar
	                </button>
	                <!--Campos ocultos-->
	                <input type="hidden"  name="id_pagina" value="<?php  echo ($editar == 'SI')? $pagina->IdPagina :'';  ?>"> 
	            </div>
                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
   </form> 
</div><!-- /.modal -->
<?php
	//$this->load->view('usuario/mi-script.php');
?>
<script src="<?php  echo base_url(); ?>assets/js/plugin/summernote/summernote.min.js"></script>

<!--<script src="<?php // echo base_url(); ?>assets/js/plugin/dropzone/dropzone.min.js"></script>-->
		<script type="text/javascript">
		
			// DO NOT REMOVE : GLOBAL FUNCTIONS!
			
			$(document).ready(function() {
				
				pageSetUp();

				/*
				 * SUMMERNOTE EDITOR
				 */
				
				$('.summernote').summernote({
					 dialogsInBody: true,
					height: 320,
					toolbar: [
				    ['style', ['style']],
				    ['font', ['bold', 'italic', 'underline', 'clear']],
				    ['fontname', ['fontname']],
				    ['color', ['color']],
				    ['para', ['ul', 'ol', 'paragraph']],
				    ['height', ['height']],
				    ['table', ['table']],
				    ['insert', ['link',  'hr']],
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
					 $('div.note-group-select-from-files').remove();
	
			
			})

$("#IdMenu").change(function(){  

	var idcategoria = $("#IdMenu").val();
	if(idcategoria==6){ //Tramites
		$('#div_fechaevento').show();
		
	}else{
		$('#div_fechaevento').hide();
		
	}

  });
		</script> 
<script>
 $(document).ready(function() {
	
			
	$('#FPublicacion').datepicker({
		dateFormat : 'dd/mm/yy',
		prevText : '<i class="fa fa-chevron-left"></i>',
		nextText : '<i class="fa fa-chevron-right"></i>',
		onSelect : function(selectedDate) {	
		}
	});			
	//Subir de nivel el z-index
	$('#FPublicacion').on('focus', function (e) {
		e.preventDefault();
		$(this).datepicker('show');
		$(this).datepicker('widget').css('z-index', 1051);
	});
	$('#FechaInicio').datepicker({
		dateFormat : 'dd/mm/yy',
		prevText : '<i class="fa fa-chevron-left"></i>',
		nextText : '<i class="fa fa-chevron-right"></i>',
		onSelect : function(selectedDate) {	
		}
	});			
	//Subir de nivel el z-index
	$('#FechaInicio').on('focus', function (e) {
		e.preventDefault();
		$(this).datepicker('show');
		$(this).datepicker('widget').css('z-index', 1051);
	});
	$('#FechaFin').datepicker({
		dateFormat : 'dd/mm/yy',
		prevText : '<i class="fa fa-chevron-left"></i>',
		nextText : '<i class="fa fa-chevron-right"></i>',
		onSelect : function(selectedDate) {	
		}
	});			
	//Subir de nivel el z-index
	$('#FechaFin').on('focus', function (e) {
		e.preventDefault();
		$(this).datepicker('show');
		$(this).datepicker('widget').css('z-index', 1051);
	});
	
	 
 	var idcategoria = $("#IdMenu").val();
	if(idcategoria==6){ //Evento
		$('#div_fechaevento').show();
		
	}else{
		$('#div_fechaevento').hide();
		
	}
});
</script>