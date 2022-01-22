<?php // $this->load->view('jquery.js'); ?>
<script>
$(function(){
    var options = {
        target:        '#div_Ejecutar',
        beforeSubmit:  showRequest,
        success:       showResponse
    };
        $('#smart-form-register').ajaxForm(options);
      //  $("#nombre").focus();
	//	$("#myModal" ).dialog( "destroy" );
});
function showRequest(formData, jqForm) {
    	// if(confirm("Desea Actualizar El usuario")){
    	// }else{
    	// 	return false;
    	// }
        //$("#capa_tabulador_area").html("<p class='loading'></p>");
		// $('#myModal').modal('hide');
}
function showResponse(responseText, statusText)  {
		// $('#myModal').modal('hide');
}
$("#username").keydown(function(){
	$("#label_errorusuario").html('');
})
</script>
<div id="div_Ejecutar" class="hidden"></div>
<div class="modal-dialog ">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					<h4 class="alert-heading">Editar Usuario</h4>
				</h4>
			</div>
			<div class="modal-body">
				<form id="smart-form-register" class="smart-form" name="frm_usuario" action="configuracion_usuario/updateUsuario" method="post"   autocomplete="new-password">
                			<div class="panel panel-default">
							<fieldset class="modifica-fieldset-modales">
								<input type="hidden"  name="idusuario" value="<?php  echo $usuario->idusuario ?>">
								<section>
									<div class="row">
										<label class="label col col-3" style="color:#305d88">Usuario</label>
										<div class="col col-9">
											<label class="input"> <i class="icon-append fa fa-user"></i>
												<input type="text" required="" name="username" value="<?php  echo $usuario->username ?>"  autocomplete="new-password" >
											</label>
											<span class="text-danger" id="label_errorusuario"></span>
										</div>
									</div>
								</section>

								<section>
									<div class="row">
										<a class="btn btn-primary col col-3" onclick="nuevacontra();" style="padding-left: 0.2rem;" id="btn-cambioc">
											Cambiar <br>Nueva Contraseña
										</a>

										<div class="col col-9">
											<label class="input"> <i class="icon-append fa fa-lock"></i>
												<input id="contranueva" type="hidden" disabled  required="" name="contranueva" value="<?php // echo $usuario->password?>"  autocomplete="new-password" placeholder="Nueva Contraseña">
												<!--<input type="hidden" required="" name="password" value="<?php   echo $usuario->password ?>"  autocomplete="new-password">-->
											</label>
											<!--<div class="note">
												<a href="javascript:void(0)">Forgot password?</a>
											</div>-->
										</div>
									</div>
								</section>
								<section>
									<div class="row">
										<div id="message">
  											<b>La contraseña debe contener lo siguiente: </b>
  											<p id="letter" class="invalid"><b>Minuscula</b></p>
  											<p id="capital" class="invalid"><b>Mayuscula</b></p>
  											<p id="number" class="invalid"><b>Número</b></p>
  											<p id="length" class="invalid">Minimo <b>6 caracteres</b></p>
										</div>
									</div>
								</section>
                                <section>
									<div class="row">
										<label class="label col col-3">Nombres y Apellidos</label>
										<div class="col col-9">
											<label class="input"> <i class="icon-append fa fa-user"></i>
												<input type="text" required="" name="nombre_usuario" value="<?php  echo $usuario->nombre_usuario ?>" >
											</label>
										</div>
									</div>
								</section>

                                <section>
									<div class="row">
										<label class="label col col-3">Email usuario</label>
										<div class="col col-9">
											<label class="input"> <i class="icon-append fa fa-envelope"></i>
												<input type="email" name="email_usuario" value="<?php  echo $usuario->email_usuario ?>">
											</label>
										</div>
									</div>
								</section>
								<section>
									<div class="row">
										<label class="label col col-3">Cel - Tlf.</label>
										<div class="col col-9">
											<label class="input"> <i class="icon-append fa fa-envelope"></i>
												<input type="text" name="usu_tel" value="<?php  echo $usuario->usu_tel ?>">
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

                                echo form_dropdown("idusuario_tipo", $opciones_usuario, $usuario->idusuario_tipo, 'class="form-control"');
                                ?>
								 <i></i> </label>

													</div>
								 </div>
                                 </section>
                                 <section>
									<div class="row">
										<label class="label col col-3">Status</label>
										<div class="col col-9">
                                        <label>
											<input  type="radio" id="status_usuario1" class="radiobox style-0"  value="AC"  <?php  echo ($usuario->status_usuario=='AC')?'checked="true" ':'';?>  name="status_usuario">
											<span>Activo</span>
										</label>
                                        <label>
											<input type="radio" id="status_usuario2" class="radiobox style-0"  value="AN"  <?php  echo ($usuario->status_usuario=='AN')?'checked="true" ':'';?>  name="status_usuario">
											<span>Anulado</span>
										</label>
										</div>
									</div>
								</section>




							</fieldset>
							</div>
							<footer>
								<input type="submit" class="btn btn-primary" id="btnguardar_e" name="btnguardar_e" value="Guardar" />

								<button type="button" class="btn btn-default" data-dismiss="modal">
									Cancelar
								</button>

							</footer>
						</form>


			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
<style type="text/css" media="screen">
#message {
  display:none;
  background:#d6dde7;
  color: #000;
  position: relative;
  padding: 0.3rem;
  /*margin-top: 10px;*/
}
#message p {
  padding: 2px 20px;
  font-size: 13px;
}
/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}
.valid:before {
  position: relative;
  left: -20px;
  content: "Correcto :";
}
/* Add a red text color and an "x" icon when the requirements are wrong */
.invalid {
  color: red;
}
.invalid:before {
  position: relative;
  left: -20px;
  content: "Falta :";
}
</style>
     <?php  $this->load->view('validate.js'); ?>
<script>
function nuevacontra()
{
	$('#contranueva').val('');
	if ($('#contranueva').attr('type')=='hidden'){
		//cambiar
		document.getElementById("message").style.display = "block";
		$('#contranueva').attr('type','text');
   	$('#contranueva').removeAttr("disabled");
   	$('#btn-cambioc').html('No Cambiar <br> Contraseña');
   	$('#btnguardar_e').attr("disabled", true);
   	validarcontraa();
	}else if($('#contranueva').attr('type')=='text'){
		//No Cambiar
		document.getElementById("message").style.display = "none";
		$('#contranueva').attr('type','hidden');
		$('#contranueva').val('');
		$('#btn-cambioc').html('Cambiar <br>Nueva Contraseña');
		$('#btnguardar_e').removeAttr("disabled");

	}

}
    var myInput = document.getElementById("contranueva");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");
// When the user clicks on the password field, show the message box
/*myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";

}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "block";
}*/
// When the user starts to type something inside the password field
var validate = true;
myInput.onkeyup = function()
{
 validarcontraa();
}
function validarcontraa(){
  // Validate lowercase letters
  validate =true;
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");

  } else {
    validate =false;
    letter.classList.remove("valid");
    letter.classList.add("invalid");
    $('#btnguardar_e').attr("disabled", true);
}
// Validate capital letters
var upperCaseLetters = /[A-Z]/g;
if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    validate =false;
    capital.classList.remove("valid");
    capital.classList.add("invalid");

    $('#btnguardar_e').attr("disabled", true);
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");

  } else {
    validate =false;
    number.classList.remove("valid");
    number.classList.add("invalid");


    $('#btnguardar_e').attr("disabled", true);
  }

  // Validate length
  if(myInput.value.length >= 6) {
    length.classList.remove("invalid");
    length.classList.add("valid");

  } else {
    validate =false;
    length.classList.remove("valid");
    length.classList.add("invalid");
    $('#btnguardar_e').attr("disabled", true);

  }
if (validate == true) {
    $('#btnguardar_e').attr("disabled", false);
}else{

}
}
</script>
