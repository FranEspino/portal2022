<script>
$(function(){
	var options = {
		target:        '#div_manteCambioClave',
		beforeSubmit:  showRequest,
		success:       showResponse
	};
		$('#frm_mant').ajaxForm(options);
		$('#ModalMante').modal('show');
		$('#paciente').focus();
	});
function showRequest(formData, jqForm){
		if($('#nuevaclave0').val()!=$("#clave_usuario").val()){
			$.smallBox({
					title : '<i class="botClose fa fa-times"></i> Aviso !',
					content : "La clave actual no es correcta",
					color : "#dd4b39",
					timeout : 3000,
					icon : "fa fa-exclamation-triangle swing animated"
				});
			$('#claveactual').focus();
			return false
		}else if($('#nuevaclave0').val()==$("#nuevaclave1").val())
		{
			$.smallBox({
					title : '<i class="botClose fa fa-times"></i> Aviso !',
					content : "La nueva clave no debe ser igual a la clave actual, elige otra clave",
					color : "#dd4b39",
					timeout : 3000,
					icon : "fa fa-exclamation-triangle swing animated"
				});
			$('#nuevaclave').focus();
			return false
		}else if($('#nuevaclave1').val()!=$("#nuevaclave2").val())
		{
			$.smallBox({
					title : '<i class="botClose fa fa-times"></i> Aviso !',
					content : "Las claves nuevas no son iguales",
					color : "#dd4b39",
					timeout : 3000,
					icon : "fa fa-exclamation-triangle swing animated"
				});
			$('#nuevaclave2').focus();
			return false
		}
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

<div id="div_manteCambioClave"></div>

<div class="modal container fade" id="ModalMante" role="dialog">

<form id="frm_mant" class="" name="frm_usuario" action="<?php  echo base_url() ?>configuracion_usuario/mantCambioClave" method="post">
<div class="modal-dialog ui-front ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="alert-heading" id="myModalLabel"><i class="fa fa-edit"></i> Cambio de contraseña</h4>
            </div>
            <div class="modal-body padding-7">
            <div class="smart-form row">




            <div class="panel panel-default  ">
                <fieldset >

                <section>
                    <div class="row">
                        <label class="label col col-3">Clave actual:</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-eye-slash" id="ojo0" onclick="vercontra('0');" style="cursor: pointer;color: green;"></i>
                               <input autofocus class="oculto" type="text" autocomplete="off" id="nuevaclave0" name="claveactual" maxlength="20" value="" required >
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                   <div class="row">
                        <label class="label col col-3">Nueva clave:</label>
                        <div class="col col-9">
                            <label class="input"><i class="icon-append fa fa-eye" id="ojo1" onclick="vercontra('1');" style="cursor: pointer;color: green;"></i>
                                <input  onclick="compararcontra();" onkeyup="compararcontra();" onchange="compararcontra();" onkeydown="compararcontra()" onfocus="compararcontra();" class="oculto" type="password" autocomplete="off"  type="text" id="nuevaclave1" name="nuevaclave" maxlength="20" value="" required >
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Repite nueva clave:</label>
                        <div class="col col-9">
                            <label class="input"><i class="icon-append fa fa-eye" id="ojo2" onclick="vercontra('2');" style="cursor: pointer;color: green;"></i>
                                <input  onclick="compararcontra();" onkeyup="compararcontra();" onchange="compararcontra();" onkeydown="compararcontra()" onfocus="compararcontra();" class="oculto" type="password" autocomplete="off"  id="nuevaclave2" name="nuevaclave2" maxlength="20" value="" required >
                            </label>
                        </div>
                    </div>

                </section>
<section>
<style type="text/css" media="screen">
#mensage {
  display:block;
  background:#d6dde7;
  color: #000;
  position: relative;
  padding: 0.3rem;
  /*margin-top: 10px;*/
}

#mensage p {
  padding: 2px 20px;
  font-size: 13px;
}
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
  content: "Correcto";
}

/* Add a red text color and an "x" icon when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -20px;
  content: "Falta";
}
</style>
    <div id="message">
  		<b>La contraseña debe contener lo siguiente: </b>
        <p id="letter" class="invalid"><b>Minuscula</b></p>
  		<p id="capital" class="invalid"><b>Mayuscula</b></p>
  		<p id="number" class="invalid"><b>Número</b></p>
  		<p id="length" class="invalid">Minimo <b>6 caracteres</b></p>
	</div>
</section>
<section>
    <div id="mensage"></div>
</section>
</fieldset>
</div>
</div>
</div>
<div class="modal-footer">
<button title="Cancelar" type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
<button title="Guardar" type="submit" class="btn btn-primary" id="btnguardar" name="btnguardar" disabled>
    <span class="glyphicon glyphicon-floppy-disk"></span> Guardar
</button>
    <!--Campos ocultos-->
    <input type="hidden"  name="id_usuario" value="<?php  echo $this->session->userdata('idusuario');  ?>">
    <input type="hidden"  name="clave_usuario" id="clave_usuario" value="<?php   echo $usuario->password ?>">
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</form>
</div><!-- /.modal -->
<?php
	$this->load->view('mi-script.php');
?>

<script>

 $(document).ready(function() {

});
function vercontra(id){
	var inputpass = document.querySelector('#nuevaclave'+id);
	if ($('#nuevaclave'+id).attr('class')=='oculto') {
        $('#ojo'+id).removeClass('fa-eye');
        $('#ojo'+id).addClass('fa-eye-slash');
        $('#nuevaclave'+id).addClass('mostrar');
        $('#nuevaclave'+id).removeClass('oculto');
        inputpass.type = 'text';
}else if($('#nuevaclave'+id).attr('class')=='mostrar'){
        //mostrar
        $('#ojo'+id).removeClass('fa-eye-slash');
        $('#ojo'+id).addClass('fa-eye');
        $('#nuevaclave'+id).removeClass('mostrar');
        $('#nuevaclave'+id).addClass('oculto');
        inputpass.type = 'password';
}
}
    var myInput = document.getElementById("nuevaclave1");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");
// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
  document.getElementById("mensage").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "block";
}
// When the user starts to type something inside the password field
var validate = true;
myInput.onkeyup = function() {
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
    document.getElementById("mensage").style.display = "block";
    $('#mensage').html("<p style='color:red;'>Falta minuscula en tu contraseña</p>");
    $('#btnguardar').attr("disabled", true);
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
    document.getElementById("mensage").style.display = "block";
    $('#mensage').html("<p style='color:red;'>Falta mayuscula en tu contraseña</p>");
    $('#btnguardar').attr("disabled", true);
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
    document.getElementById("mensage").style.display = "block";
    $('#mensage').html("<p style='color:red;'>Falta Numero en tu contraseña</p>");
    $('#btnguardar').attr("disabled", true);
  }

  // Validate length
  if(myInput.value.length >= 6) {
    length.classList.remove("invalid");
    length.classList.add("valid");

  } else {
    validate =false;
    length.classList.remove("valid");
    length.classList.add("invalid");
    $('#btnguardar').attr("disabled", true);
    document.getElementById("mensage").style.display = "block";
    $('#mensage').html("<p style='color:red;'>Minimo 6 Caracteres</p>");

  }
if (validate == false) {
    document.getElementById("mensage").style.display = "block";
    $('#mensage').html("<p>La Contraseña tiene que contener todo los atributos requeridos</p>");
    $('#btnguardar').attr("disabled", true);
}
}

function compararcontra(){
    //alert($("#nuevaclave1").val());
    if ($("#nuevaclave1").val()!=''){
        if ($("#nuevaclave1").val()==$("#nuevaclave2").val() && $("#nuevaclave1").val()!='' && validate == true) {
            document.getElementById("mensage").style.display = "block";
            $('#mensage').html("<p style='color:green;'>Las contraseñas son iguales</p>");
            $('#btnguardar').removeAttr("disabled");
        }else{
            document.getElementById("mensage").style.display = "block";
            $('#mensage').html("<p style='color:red;'>Las contraseñas tienen que ser iguales</p>");
            $('#btnguardar').attr("disabled", true);
        }
    }else{
        document.getElementById("mensage").style.display = "block";
        $('#mensage').html("<p>No ingreso ninguna contraseña</p>");
        //falta contra en input 1
    }
}

</script>
