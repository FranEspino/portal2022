<?php // $this->load->view('jquery.js'); ?>    
<script>
      $(function(){        
        var optionsx = {
            target:        '#div_Ejecutar', 
            beforeSubmit:  showRequest,  
            success:       showResponse  
        };
        $('#checkout-formx').ajaxForm(optionsx);  
        $('#ModalMante').modal('show');
		   
      //  $("#nombre").focus();
	//	$("#myModal" ).dialog( "destroy" );		
		
    });
    function showRequest(formData, jqForm) {
     //   $("#capa_tabulador_area").html("<p class='loading'></p>");
	// $('#myModal').modal('hide'); 
		if(confirm("Desea registrar el Usuario?")){
		//	$('#myModal').modal('hide');
			//$("body").removeClass("modal-open");
			
           
	
        }else{
            return false;
        }   

    }
    function showResponse(responseText, statusText)  {
		// $('#myModal').modal('hide'); 
		/*
		$('#ModalMante').modal('hide');
	        if ($('.modal-backdrop').is(':visible')) {
	          $('body').removeClass('modal-open'); 
	          $('.modal-backdrop').remove(); 
	        };
		*/
		}      
    
   
	$("#username").keydown(function(){
		$("#label_errorusuario").html('');
	})
	 
</script>
<div id="div_Ejecutar" class="hidden"></div>
<div class="modal container fade" id="ModalMante" role="dialog"  > 
<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
						<h4 class="alert-heading">Nuevo Usuario</h4>
				</h4>
			</div>
			<div class="modal-body"> 
                <form id="checkout-formx" name="frm_usuario" class="smart-form" action="configuracion_usuario/insertUsuario" method="post" validate autocomplete="new-password">

				<input type="hidden" name="status_usuario" value="AC" />
                  
                  			<div class="panel panel-default">   
							<fieldset class="modifica-fieldset-modales">
								<section>
									<div class="row">
										<label class="label col col-3" style="color:#305d88">Username</label>
										<div class="col col-9">
											<label class="input"> <i class="icon-append fa fa-user"></i>
												<input type="text" required="" id="username" name="username" value="" autocomplete="new-password">
											</label>
											<span class="text-danger" id="label_errorusuario"></span>
										</div>

									</div>
								</section>

								<section>
									<div class="row">
										<label class="label col col-3" style="color:#305d88">Password</label>
										<div class="col col-9">
											<label class="input"> <i class="icon-append fa fa-lock"></i>
												<input type="password" required="" name="password" autocomplete="new-password" >
											</label>
											<!--<div class="note">
												<a href="javascript:void(0)">Forgot password?</a>
											</div>-->
										</div>
									</div>
								</section>
                                <section>
									<div class="row">
										<label class="label col col-3">Nombres y Apellidos</label>
										<div class="col col-9">
											<label class="input"> <i class="icon-append fa fa-user"></i>
												<input type="text" required="" id="nombre_usuario" name="nombre_usuario" >
											</label>
										</div>
									</div>
								</section>
                                   
                                <section>
									<div class="row">
										<label class="label col col-3">Email usuario</label>
										<div class="col col-9">
											<label class="input"> <i class="icon-append fa fa-envelope"></i>
												<input type="email" id="email_usuario" name="email_usuario"  >
											</label>
										</div>
									</div>
                                    
                                 
								</section>
 
                                 <section>
									<div class="row"> 
                                   
                                <label class="label col col-3">Perfil</label>
													<div class="col col-9">
										               <label class="select">            
								<?php 
                                foreach ($usuario_tipo as $fila) {
                                    $opciones_usuario[$fila->idusuario_tipo] = $fila->nombre_usuario_tipo;
                                }
                                echo form_dropdown("idusuario_tipo", $opciones_usuario,'' , 'class="form-control"');
                                ?>  
								  <i></i> </label>
										               
													</div>
								 </div>
                                 </section>
                                 
                          

					
								
							</fieldset>
							</div>
							<footer>
								<input type="submit" class="btn btn-primary" id="btnguardar" name="btnguardar" value="Guardar"/>
							
								<button type="button" class="btn btn-default" data-dismiss="modal">
									Cancelar
								</button>

							</footer>
						</form>						
						

			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->


<?php
	$this->load->view('mi-script.php');
?>
<?php   $this->load->view('validate.js'); ?>
<script type="text/javascript"> 
	$('#username').keydown(function(e) {
	 // alert (e.keyCode);
	  if (e.keyCode == 32) { 
	  	return false; 
	  } 
	});
</script>