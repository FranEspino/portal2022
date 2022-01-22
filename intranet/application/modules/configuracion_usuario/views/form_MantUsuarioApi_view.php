<?php // $this->load->view('jquery.js'); ?>    
<script>
      $(function(){        
        var optionsx = {
            target:        '#div_Ejecutar', 
            beforeSubmit:  showRequest,  
            success:       showResponse  
        };
        $('#form_usuariootros').ajaxForm(optionsx);  
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
    	//console.log(responseText);
    	 $.smallBox({
				title : '<i class="botClose fa fa-times"></i> Aviso !',
				content :'Registro correcto',
				color : '#739E73',
				timeout : 3000,
				icon : 'fa fa-check swing animated'
			});
			$( '#div_capa_pagina' ).load('<?php echo base_url(); ?>configuracion_usuario/gridOtrosUsuario');
			$('#ModalMante').modal('hide');
	        if ($('.modal-backdrop').is(':visible')) {
	          $('body').removeClass('modal-open');
	          $('.modal-backdrop').remove();
	        }; 
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
                <form id="form_usuariootros" name="frm_usuario" class="smart-form" action="http://3.140.135.200:8080/api/usuarios" method="post" validate autocomplete="new-password"  enctype="multipart/form-data">

				<input type="hidden" name="status_usuario" value="AC" />
                  
                  			<div class="panel panel-default">   
							<fieldset class="modifica-fieldset-modales">
								<section>
									<div class="row">
										<label class="label col col-3">Tipo Cuenta</label>
										<div class="col col-9">
											<select name="tipo_cuenta" id="tipo_cuenta" class="form-control">
												<option value="asesor">Asesor</option>
												<option value="investigador">Investigador</option>
											</select>
										</div>
									</div>
								</section>

                                <section>
									<div class="row">
										<label class="label col col-3">Nombres</label>
										<div class="col col-9">
											<label class="input"> <i class="icon-append fa fa-user"></i>
												<input type="text" required="" id="nombre" name="nombre" >
											</label>
										</div>
									</div>
								</section>
								<section>
									<div class="row">
										<label class="label col col-3">Apellidos</label>
										<div class="col col-9">
											<label class="input"> <i class="icon-append fa fa-user"></i>
												<input type="text" required="" id="apellido" name="apellido" >
											</label>
										</div>
									</div>
								</section>
								<section>
									<div class="row">
										<label class="label col col-3">DNI</label>
										<div class="col col-9">
											 
												<input type="number" required="" id="dni" name="dni" class="form-control">
											 
										</div>
									</div>
								</section>

								<section>
									<div class="row">
										<label class="label col col-3">Cel - Tlf.</label>
										<div class="col col-9">
											<label class="input"> <i class="icon-append fa fa-envelope"></i>
												<input type="text" name="telefono" value="">
											</label>
										</div>
									</div>
								</section>


                                   
                                 <section>
									<div class="row">
										<label class="label col col-3">Email usuario</label>
										<div class="col col-9">
											<label class="input"> <i class="icon-append fa fa-envelope"></i>
												<input type="email" name="correo" value="">
											</label>
										</div>
									</div>
								</section>

								<section>
									<div class="row">
	                                    <div class="col col-3 ">
	                                        Dirección:
	                                    </div>
	                                    <div class="col col-9 ">
	                                        <label class="input"><i class="icon-append fa fa-map-marker"></i>
	                                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder=""  value="">
	                                        </label>
	                                    </div>  
	                                </div>
                                </section>

                                <div id="div_investigador">
                                	
	                                <section>
										<div class="row">
											<label class="label col col-3">Carrera</label>
											<div class="col col-9">
												<input type="text" name="carrera" id="carrera" value="" class="form-control">
											</div>
										</div>
									</section>

									<section>
										<div class="row">
											<label class="label col col-3">Facultad</label>
											<div class="col col-9">
												<input type="text" name="facultad" id="facultad" value="" class="form-control">
											</div>
										</div>
									</section>
								</div>


                                <div id="div_asesor">
                                	<section>
										<div class="row">
											<label class="label col col-3">Profesión</label>
											<div class="col col-9">
												<input type="text" name="profesion" id="profesion" value="" class="form-control">
											</div>
										</div>
									</section>
                                </div>


								<section>
									<div class="row">
										<label class="label col col-3" style="color:#305d88">Password</label>
										<div class="col col-9">
											<label class="input"> <i class="icon-append fa fa-lock"></i>
												<input type="text" required="" name="clave" autocomplete="new-password" >
											</label>
										</div>
									</div>
								</section>

								<section>
									<div class="row">
										<label class="label col col-3">Foto</label>
										<div class="col col-9">
											<input type="file" name="avatar" id="avatar" value="" class="form-control">
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
//	$this->load->view('mi-script.php');
?>
<?php //  $this->load->view('validate.js'); ?>
<script type="text/javascript"> 
$("#tipo_cuenta").change(function(){
    var tipo_cuenta = $(this).val();
   // var form = document.forms.form_usuariootros;
    if(tipo_cuenta=='asesor'){
        $("#div_asesor").show();
        $("#div_investigador").hide();
    }else{
        $("#div_investigador").show();
        $("#div_asesor").hide();
 
       // form.action ='{{ route('xls.formato_licenciamiento') }}';
    }
})

$("#tipo_cuenta").trigger('change');

	$('#username').keydown(function(e) {
	 // alert (e.keyCode);
	  if (e.keyCode == 32) { 
	  	return false; 
	  } 
	});
</script>