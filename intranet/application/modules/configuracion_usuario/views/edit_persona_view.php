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
    	// if(confirm("Desea Actualizar El persona")){
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
	$("#label_errorpersona").html('');
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
					<h4 class="alert-heading">Editar persona</h4>
				</h4>
			</div>
			<div class="modal-body">
				<form id="smart-form-register" class="smart-form" name="frm_persona" action="configuracion_persona/updatePersona" method="post">
                			<div class="panel panel-default">
							<fieldset class="modifica-fieldset-modales">
								<input type="hidden"  name="id_cuenta" value="<?php  echo $persona->id_cuenta  ?>">
										
							
                                <section>
									<div class="row">
										<label class="label col col-3">Nombres</label>
										<div class="col col-9">
											<label class="input"> <i class="icon-append fa fa-user"></i>
												<input type="text" required="" name="nombre" value="<?php  echo $persona->nombre ?>" >
											</label>
										</div>
									</div>
								</section>

								<section>
									<div class="row">
										<label class="label col col-3">Apellidos</label>
										<div class="col col-9">
											<label class="input"> <i class="icon-append fa fa-user"></i>
												<input type="text" required="" name="apellido" value="<?php  echo $persona->apellido ?>" >
											</label>
										</div>
									</div>
								</section>

								<section>
									<div class="row">
										<label class="label col col-3">Dni</label>
										<div class="col col-9">
											<label class="input"> <i class="icon-append fa fa-envelope"></i>
												<input type="text" name="dni" value="<?php  echo $persona->dni ?>">
											</label>
										</div>
									</div>
								</section>

								<section>
									<div class="row">
										<label class="label col col-3">Teléfono</label>
										<div class="col col-9">
											<label class="input"> <i class="icon-append fa fa-envelope"></i>
												<input type="text" name="telefono" value="<?php  echo $persona->telefono ?>">
											</label>
										</div>
									</div>
								</section>

								<section>
									<div class="row">
										<label class="label col col-3">Dirección</label>
										<div class="col col-9">
											<label class="input"> <i class="icon-append fa fa-envelope"></i>
												<input type="text" name="direccion" value="<?php  echo $persona->direccion ?>">
											</label>
										</div>
									</div>
								</section>

                                <section>
									<div class="row">
										<label class="label col col-3">Email</label>
										<div class="col col-9">
											<label class="input"> <i class="icon-append fa fa-envelope"></i>
												<input type="email" name="correo" value="<?php  echo $persona->correo ?>">
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
