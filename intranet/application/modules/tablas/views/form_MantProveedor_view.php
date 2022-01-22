<script> 
$(function(){    
  if ( $("#div_ModalMantPR").length > 0 ) {
       div_ejecutar = '#div_ModalMantPR';
       $('#frm_origen').val('COMPRA');
    }else{
       div_ejecutar = '#div_capa_pagina';       
    }

	var options = {
    target:        div_ejecutar, 
		beforeSubmit:  showRequest,  
		success:       showResponse  
	};
		$('#frm_mantPR').ajaxForm(options);  
		$('#ModalMantePR').modal('show');
		$('#proveedor_ruc').focus();		
	});	
function showRequest(formData, jqForm){		
		$('#btnguardarPR').html('Grabando...');
		$("#btnguardarPR").attr("disabled","disabled"); 
  
	};
function showResponse(responseText, statusText){
    $('#ModalMantePR').modal('hide');
      if ($('.modal-backdrop').is(':visible')){
        $('body').removeClass('modal-open'); 
        $('.modal-backdrop').remove(); 
      };
};
</script>      

<div class="modal container fade" id="ModalMantePR" role="dialog"> 
<form id="frm_mantPR" class="" name="frm_usuario" action="<?php  echo base_url() ?>tablas/proveedor/mantProveedor" method="post">
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
				if(isset($proveedor))
				{	if($proveedor){ 							 
					$editar = 'SI';
					}
				}
				?>				
                <div class="panel panel-default ">
                <fieldset >    
                
                <section>
                    <div class="row">
                        <label class="label col col-3">RUC del Proveedor</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-building"></i>
                                <input autofocus type="text" id="proveedor_ruc" name="proveedor_ruc" maxlength="11" value="<?php  echo ($editar == 'SI')? $proveedor->proveedor_ruc:'';  ?>" required >                               
                            </label>
                        </div>
                    </div>
                </section>  
                <section>
                    <div class="row">
                        <label class="label col col-3">Nombre del Proveedor</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-building-o"></i>
                               <input autofocus type="text" id="proveedor" name="proveedor" maxlength="150" value="<?php  echo ($editar == 'SI')? $proveedor->proveedor:'';  ?>" required >                               
                            </label>
                        </div>
                    </div>
                </section>
                 <section>
                    <div class="row">
                        <label class="label col col-3">Teléfono / Cel</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-phone"></i>
                               <input autofocus type="text" id="telefono" name="telefono" maxlength="40" value="<?php  echo ($editar == 'SI')? $proveedor->telefono:'';  ?>"  >                               
                            </label>
                        </div>
                    </div>
                </section> 
                  <section>
                    <div class="row">
                        <label class="label col col-3">Contacto</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-address-card"></i>
                               <input autofocus type="text" id="contacto" name="contacto" maxlength="40" value="<?php  echo ($editar == 'SI')? $proveedor->contacto:'';  ?>"  >                               
                            </label>
                        </div>
                    </div>
                </section> 
                   <section>
                    <div class="row">
                        <label class="label col col-3">Correo</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-envelope"></i>
                               <input autofocus type="email" id="correo" name="correo" maxlength="40" value="<?php  echo ($editar == 'SI')? $proveedor->correo:'';  ?>"  >                               
                            </label>
                        </div>
                    </div>
                </section>     
                  <section>
                    <div class="row">
                        <label class="label col col-3">Giro</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-archive"></i>
                               <input autofocus type="text" id="giro" name="giro" maxlength="40" value="<?php  echo ($editar == 'SI')? $proveedor->giro:'';  ?>"  >                               
                            </label>
                        </div>
                    </div>
                </section>      
                 <section>
                    <div class="row">
                        <label class="label col col-3">Direccion</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-map-marker"></i>
                               <input autofocus type="text" id="direccion" name="direccion" maxlength="40" value="<?php  echo ($editar == 'SI')? $proveedor->direccion:'';  ?>"  >                               
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Ciudad</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-location-arrow"></i>
                               <input autofocus type="text" id="ciudad" name="ciudad" maxlength="40" value="<?php  echo ($editar == 'SI')? $proveedor->ciudad:'';  ?>"  >                               
                            </label>
                        </div>
                    </div>
                </section>   
                  <section>
                    <div class="row">
                        <label class="label col col-3">Condición de Compra</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-briefcase"></i>
                               <input autofocus type="text" id="condicioncompra" name="condicioncompra" placeholder="Ejm: Da a crédito, pago en cuotas, prov. cumplido, etc" maxlength="40" value="<?php  echo ($editar == 'SI')? $proveedor->condicioncompra:'';  ?>"   >                               
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
                <button title="Guardar" type="submit" class="btn btn-primary" id="btnguardarPR" name="btnguardarPR" >
                   <span class="glyphicon glyphicon-floppy-disk"></span> Guardar
                </button>
                <!--Campos ocultos-->
                <input type="hidden"  name="proveedor_id" value="<?php  echo ($editar == 'SI')? $proveedor->proveedor_id :'';  ?>"> 
                <input type="hidden"  name="frm_origen" id="frm_origen" value="">
                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
   </form> 
</div><!-- /.modal -->
<?php
	//$this->load->view('mi-script.php');
?>
 <script type="text/javascript">
     
    $("#proveedor_ruc").keyup(function(){    
        var numruc = $("#proveedor_ruc").val();
        if(numruc.length == 11){
            $("#proveedor").val('Extraendo datos de SUNAT...');
            //consultadatosSUNAT(numruc);
            //consultaRUCaqpfact(numruc);
            consultando = false;
            //consultaApiRUC(numruc);
            consultaApiDevRUC(numruc);
        }   
    });
 
 
 function consultadatosSUNAT(numeroDNI_RUC){
      var numruc = numeroDNI_RUC;
        $.ajax({ 
            type: "get",
            url: "http://siempreaqui.com/json-sunat/consulta.php", cache: false, 
            data:'nruc='+numruc, 
            success: function (data) {
                        var dataObject = jQuery.parseJSON(data);
                         
                        if (dataObject.success == true) {                        
                          $("#proveedor").val(dataObject.result.RazonSocial);
                          $("#direccion").val(dataObject.result.Direccion);
                          $("#telefono").val(dataObject.result.Telefono);
                         // $("#rs_ruc").val(dataObject.result.RUC);
                         // $("#rs_dni").val(dataObject.result.DNI); No devuelve DNI
                        }else{
                          $("#proveedor").val('');
                          $("#direccion").val('');
                          $("#telefono").val('');
                         //     
                        }
                 
             } 
        }); 
 }


function consultaRUCaqpfact(RUC){
     $("#proveedor").val('Consultando...');
    $.ajax({ 
        type: "get",
        url: "cliente/ruc/"+RUC, cache: false, 
        //data:'ruc='+numruc, 
        success: function (data) {
            try{
                    var dataObject = jQuery.parseJSON(data);
                   
                    if (dataObject.success == false) {                        
                      $("#proveedor").val('');
                      $("#rs_direccion").val('');
                     // $("#rs_telefono").val('');
                     //     
                    }else{
                        //if(RUC.substr(0,2)=='10'){
                        //if (window.dataObject.result){
                        if (dataObject.success == true) {
                          $("#proveedor").val(dataObject.result.RazonSocial);
                          $("#rs_direccion").val(dataObject.result.DireccionCompleta);
                        }else{
                          $("#proveedor").val(dataObject.RazonSocial);
                          $("#rs_direccion").val(dataObject.DireccionCompleta);
                        }
                     // $("#rs_telefono").val(dataObject.result.Telefono);
                     // $("#rs_ruc").val(dataObject.result.RUC);
                     // $("#rs_dni").val(dataObject.result.DNI); No devuelve DNI
                    }
                } catch (error) { 
                    $("#proveedor").val('');
                }
             
         } 
    }); 
 }


 function consultaApiRUC(ruc){
     $("#proveedor").val('Consultando...');
     $("#direccion").val('');
     //$("#fechanacimiento").val("");

    $.ajax({ 
        type: "get",
        url: "cliente/apiperu_ruc/"+ruc, cache: false, 
        //data:'ruc='+numruc, 
        success: function (data) {
          $("#proveedor").val(''); 
            consultando = true;
 
                var dataObject = jQuery.parseJSON(data);
                $("#proveedor").val(dataObject.data.nombre_o_razon_social);
                if(dataObject.data.direccion_completa == ' -  -  - '){
                    $("#direccion").val('');
                }else{
                     $("#direccion").val(dataObject.data.direccion_completa);
                }
                //  $("#btnGuardarRS").attr("disabled",false);
 
         } 
    }).fail( function( jqXHR, textStatus, errorThrown ) {
        consultando = true;
        $("#proveedor").val('');
        
    });  
 }


 function consultaApiDevRUC(ruc){
     $("#proveedor").val('Consultando...');
     $("#direccion").val('');

    $.ajax({ 
        type: "get",
        url: "cliente/apidev_ruc/"+ruc, cache: false, 
        //data:'ruc='+numruc, 
        success: function (data) {
            $("#rs_razonsocial").val(''); 
            $("#rs_ruc").val(ruc);            
            $('#rs_ubigeo').val(null).trigger('change');

            consultando = true;
        

                var dataObject = jQuery.parseJSON(data);
                $("#proveedor").val(dataObject.data.nombre_o_razon_social);
                if(ruc.substr(0,2) =='10'){
                    $("#direccion").val(dataObject.data.domicilio_direccion_completa);
                }else 
                if(dataObject.data.direccion_completa == ' -  -  - '){
                    $("#direccion").val('');
                }else{
                     $("#direccion").val(dataObject.data.direccion_completa);
                }
                //  $("#btnGuardarRS").attr("disabled",false);
             
         } 
    }).fail( function( jqXHR, textStatus, errorThrown ) {
        consultando = true;
        $("#rs_razonsocial").val('');
        
    });  
 }

 </script>