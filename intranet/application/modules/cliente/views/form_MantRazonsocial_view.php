<script> 
$(document).ready(function() {
		$('#ModalRegRazon').modal('show');		 
});	
</script> 
   <?php 			
$editar = '';
$idTipoRS = '';
if(isset($rs))
{	if($rs){ 							 
	$editar = 'SI';
	$idTipoRS = $rs->id_tiporazonsocial;
	}
}
?>	  
<div class="modal container fade" id="ModalRegRazon" role="dialog"> 
    <form id="frm_regRazonSocial" class="" name="frm_"  >
    	<div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header ">
                        <button type="button" class="close" id="cerrarModalSpot" onClick="cerrarmodal('ModalRegRazon');"  aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"> <?php  echo $tituloform; ?></h4>
                    <!--<h4 class="modal-title"><i class="icon-append fa fa-plus"></i> Registrar Razón Social</h4>     -->
                    </div>
                    <div class="modal-body"> 
                        <div id="mostrar_mensaje">
                        </div>
                        <div class="smart-form">
                        
                               
                             
                            <input type="hidden" maxlength="6" id="rs_id_tiporazonsocial" value="<?php  echo ($editar == 'SI')? $rs->id_tiporazonsocial:$TipoRazonSocial;  ?>">  
                          

                           <!-- <h6 style="background-color:#d6dde7">Información Personal</h6>-->
                            <div class="panel panel-default">
                                <fieldset class="" id="rs_div_datosmedico"> 
                                    <div class="row" > 
                                        <div class="col col-2 ">
                                            <label class="input">
                                                <input type="text"  min="0" maxlength="6" id="rs_cmp" required placeholder="CMP" class="form-control" value="<?php  echo ($editar == 'SI')? $rs->cmp:'';  ?>">
                                            </label>
                                        </div> 
                                        <div class="col col-2 ">
                                            <label class="input">
                                                <input type="text"  min="0" maxlength="6" id="rs_rne" required placeholder="RNE" class="form-control" value="<?php  echo ($editar == 'SI')? $rs->rne:'';  ?>">
                                            </label>
                                        </div>
                                        
                                            <div class="col col-2 ">
                                                    Especialidad:
                                            </div>
                                            <div class="col col-6 ">
                                                             
												<?php 
                                                if($especialidad){
                                                    foreach ($especialidad as $fila) {
                                                        $opciones_especialidad[$fila->id_especialidad] = $fila->especialidad;
                                                    }
													if($editar=='SI'){
													   echo form_dropdown("rs_id_especialidad", $opciones_especialidad, $rs->id_especialidad, 'class="select2"');
													   }else{
	                                                    echo form_dropdown("rs_id_especialidad", $opciones_especialidad,'' , 'class="select2"');
													}
                                                }
                                                ?>   
                                            </div>        
                                          
                                                <div class="col col-2 smart-form  ">
                                                    <label class="checkbox">
                                                    <input type="checkbox" value="1" id="flg_medico" name="flg_medico" checked="checked"><!--name="checkbox-inline"-->
                                                    <i></i>MEDICO</label>
                                                </div>
                                                <div class="col col-6 smart-form  ">
                                                    <label class="checkbox">
                                                    <input type="checkbox" value="1" id="flg_tecnologo" name="flg_tecnologo" checked="checked"><!--name="checkbox-inline"-->
                                                    <i></i>TECNOLOGO</label>
                                                </div>

                                        
                                            
                                    </div> 
                                </fieldset>
                                <fieldset class=""> 
                                    <div class="row">
                                        <div class="col col-2 no-padding-r">
                                            Tipo Doc.:
                                        </div>
                                        <div class="col col-3 ">
                                            <?php 
                                                $id_tipodocumento = '1';
                                                if($editar == 'SI'){
                                                    $id_tipodocumento = $rs->id_tipodocumento;
                                                }
                                             ?>
                                            <select class="form-control" required="required" name="id_tipodocumento" id="rs_id_tipodocumento" <?php  echo ($cantventa > 0)?'readonly':''; ?> >
                                                <option value="">-- SELECCIONE TIPO DOC.--</option>
                                                <option value="1" <?php  if($id_tipodocumento == '1'){ echo 'selected';} ?>>DNI</option>
                                                <option value="6" <?php  if($id_tipodocumento == '6'){ echo 'selected';} ?>>RUC</option>
                                                <option value="0" <?php  if($id_tipodocumento == '0'){ echo 'selected';} ?>>OTROS</option>
                                                <option value="4" <?php  if($id_tipodocumento == '4'){ echo 'selected';} ?>>CE - CARNET DE EXTRANJERÍA</option>
                                                <option value="7" <?php  if($id_tipodocumento == '7'){ echo 'selected';} ?>>PASAPORTE</option>
                                                
                                            </select>
                                        </div>
                                        <div class="col col-1">
                                            Num.:
                                        </div>
                                        <div class="col col-4 ">
                                            
                                                <input  type="text" maxlength="12"   autocomplete="off"  id="rs_numdocumento" name="numdocumento" placeholder="DNI" class="form-control font-md" value="<?php  echo ($editar == 'SI')? $rs->numdocumento:'';  ?>"  onkeypress="return fn_SoloNumeros(event);" <?php  echo ($cantventa > 0)?'readonly':''; ?>>
                                            
                                        </div>
                                        <div class="col col-2 no-padding-l <?php  echo ($cantventa > 0)?'hidden':''; ?>">
                                            <button title="Extraer" type="button" id="btn_extraer" class="btn btn-xs  text-primary  "><i class="fa fa-search"></i> EXTRAER DE <br><div id="div_extraer">
                                                
                                            </div>
                                            </button>
                                            <button title="Generar Número" type="button" id="rs_generardni" class="btn btn-sm text-primary  pull-right">&nbsp;
                                                <i class="fa fa-magic"></i>&nbsp; GENERAR
                                            </button>
                                        </div>

                                    </div>
                                    <?php  if($cantventa > 0){ ?>
                                        <div class="alert alert-info fade in">
                                            <button class="close" data-dismiss="alert">
                                                ×
                                            </button>
                                            <i class="fa-fw fa fa-info"></i>
                                            <strong>Aviso</strong> No puede modificar el número de documento, por que existe <?php echo $cantventa; ?> ventas realizadas a éste cliente
                                        </div>
                                    <?php } ?>
                                        <div class="row hidden">
                                            <div class="col col-2 ">
                                                Nombres:
                                            </div>
                                            <div class="col col-10 hidden">
                                                <label class="input"><i class="icon-append fa fa-user"></i>
                                                    <input type="text" class="form-control" id="rs_nombre" name="rs_nombre" placeholder="Nombres" onKeyUp="generarRazon();" value="<?php  echo ($editar == 'SI')? $rs->nombre:'';  ?>">
                                                </label>
                                            </div>                                                     
                                        </div> 
                                        <div class="row hidden">
                                            <div class="col col-2 ">
                                                Apellido Paterno                                        
                                            </div>
                                            <div class="col col-4 ">
                                                <label class="input"><i class="icon-append fa fa-user"></i>
                                                        <input type="text" placeholder="Ap. Paterno" id="rs_appaterno" name="rs_appaterno" class="form-control" onKeyUp="generarRazon();" value="<?php  echo ($editar == 'SI')? $rs->appaterno:'';  ?>">
                                                 </label>
                                            </div>
                                            <div class="col col-2 ">
                                                    Apellido Materno
                                            </div>
                                            <section class="col col-4">
                                                    <label class="input"><i class="icon-append fa fa-user"></i>
                                                        <input type="text" placeholder="Ap. Materno" id="rs_apmaterno" name="rs_apmaterno" class="form-control" onKeyUp="generarRazon();" value="<?php  echo ($editar == 'SI')? $rs->apmaterno:'';  ?>">
                                                     </label>
                                            </section>                                      
                                        </div>
	                                <div class="row">
                                            <section class="col col-2 ">
                                                    Razón Social:
                                            </section>
                                            <section class="col col-10 ">
                                                    <label class="input"><i class="icon-append fa fa-user"></i>
                                                        <input type="text" class="form-control" id="rs_razonsocial" name="rs_razonsocial" required placeholder="Razón Social" value="<?php  echo ($editar == 'SI')? $rs->razonsocial:'';  ?>">
                                                    </label>
                                            </section>                                        
                                    </div>   
                                     <section id="div_nacimiento">
                                        <div class="row">
                                            <label class="label col col-2">Fecha de Nacimiento</label>
                                            <div class="col col-4" style="padding-right: 0px">
                                                <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                                   <input  type="date" id="fechanacimiento" name="fechanacimiento" maxlength="40" onchange="getAge(this.value);" value="<?php  echo ($editar == 'SI')? $rs->fechanacimiento:'';  ?>"  > 
                                                </label>
                                                <div id="div_msgfecha" class="text-primary"></div>
                                            </div>
                                            <?php  echo ($editar == 'SI')? $rs->sexo:'';  ?>
                                         
                                            <label class="label col col-1">Sexo:</label>
                                            <div class="col col-2">
                                                <label class="radio state-success"><input type="radio" value="M" name="sexo" checked=""><i></i>Masculino</label>
                                               
                                            </div>
                                            <div class="col col-1"> 
                                                <label class="radio state-success"><input type="radio" value="F" name="sexo"><i></i>Femenino</label>
                                            </div>
                                                
                                        </div>

                                       
                                        <div class="row">
                                        <div class="col col-2 ">
                                            Edad:
                                        </div>
                                        <div class="col col-3 ">
                                            <label class="input">
                                                <input  type="number" min="0"  id="rs_edad" name="rs_edad" placeholder="Edad" class="form-control" value="<?php  echo ($editar == 'SI')? $rs->edad:'';  ?>">
                                            </label>
                                        </div>
                                        <div class="col col-7">
                                            <button title="Extraer F. Nacimiento" type="button" id="btn_extraerfecha" class="btn btn-sm  text-primary  "><i class="fa fa-search"></i> EXTRAER FECHA DE NACIMIENTO
                                            </button>
                                        </div>
                                         <div class="col col-4 hidden">
                                            <label class="input"><i class="icon-append fa fa-user"></i>
                                                    <input type="text" maxlength="11" placeholder="Número" id="rs_numafiliciacionsis" name="rs_numafiliciacionsis" class="form-control"  value="<?php  echo ($editar == 'SI')? $rs->numafiliciacionsis:'';  ?>">
                                             </label>
                                        </div>
                                      </div>
                                    </section>  


                                    <div class="row">
                                                <?php 
                                                $checkinvestigador="";
                                                    if($editar == 'SI'){
                                                    $checkinvestigador = $rs->cb_investigador;
                                                     }
                                                ?>

                                                <?php 
                                                $checkasesor="";
                                                    if($editar == 'SI'){
                                                    $checkasesor = $rs->cb_asesor;
                                                     }
                                                ?>

                                            <section class="col col-2 ">
                                                    Tipo:
                                            </section>
                                            
                                            <section class="col col-10 ">
    
                                                    <input type="checkbox" name="cb_investigador" id="cb_investigador" value="" <?php echo ($checkinvestigador == 'Investigador' ? 'checked' : '')?>>Investigador<br>

                                                    <input type="checkbox" name="cb_asesor" id="cb_asesor" value="" <?php  echo ($checkasesor == 'Asesor' ? 'checked' : '')?>>Asesor<br>
                                            </section>                                        
                                    </div>

                                    
                                    <div class="row">
                                            <section class="col col-2 ">
                                                    Carrera profesional:
                                            </section>
                                            <section class="col col-10 ">
                                                    <label class="input"><i class="icon-append fa fa-user"></i>
                                                        <input type="text" class="form-control" id="carrera_profesional" name="carrera_profesional" value="<?php  echo ($editar == 'SI')? $rs->carrera_profesional:'';  ?>">
                                                    </label>
                                            </section>                                        
                                    </div>   
                                    
                                                   
                                </fieldset>
                            </div>
                            <br>
                           <strong>Direccion/Contacto</strong>
                            <div class="panel panel-default"> 
                                <fieldset>                
                                    <div class="row">
                                        <div class="col col-2 ">
                                            Dirección:
                                        </div>
                                        <div class="col col-20 ">
                                            <label class="input"><i class="icon-append fa fa-map-marker"></i>
                                                <input type="text" class="form-control" id="rs_direccion" name="rs_direccion" placeholder="Dirección"  value="<?php  echo ($editar == 'SI')? $rs->direccion:'';  ?>">
                                            </label>
                                        </div>  
                                    </div>

                                    <div class="row">
                                        <div class="col col-2 ">
                                            Distrito:
                                        </div>
                                        <div class="col col-10 ">
                                            <select id="rs_ubigeo" name='rs_ubigeo' style="width: 100%;" class="select2AjaxUbigeo" >
                                                <?php  if ($editar == 'SI'){  
                                                        if($rs->ubigeo!=''){
                                                        ?>
                                                        <<option value="<?php echo $rs->ubigeo; ?>"><?php echo $rs->ubigeo; ?> | <?php echo $rs->distrito; ?> | <?php echo $rs->provincia; ?> | <?php echo $rs->departamento; ?></option>                                                        
                                                    <?php  }} ?>
                                            </select>
                                        </div>  
                                    </div>

                                    <div class="row">  
                                        <div class="col col-2 ">
                                            Referencia:
                                        </div>
                                        <div class="col col-10 ">
                                            <label class="input"><i class="icon-append fa fa-map-signs"></i>
                                                <input type="text" class="form-control" id="rs_referencia" placeholder="Referencia" value="<?php  echo ($editar == 'SI')? $rs->referencia:'';  ?>">
                                            </label>
                                        </div>                                        
                                    </div>
                                    <div class="row">
                                        <div class="col col-2 ">
                                            Teléfono
                                        </div>
                                        <div class="col col-4 ">
                                            <label class="input"><i class="icon-append fa fa-phone"></i>
                                                <input type="text"  placeholder="Teléfono" id="rs_telefono" class="form-control" value="<?php  echo ($editar == 'SI')? $rs->telefono:'';  ?>">
                                            </label>
                                        </div>
                                        <div class="col col-2 ">
                                            Celular
                                        </div>
                                        <div class="col col-4 ">
                                            <label class="input"><i class="icon-append fa fa-mobile"></i>
                                                <input type="text"  placeholder="Celular" id="rs_celular" class="form-control" value="<?php  echo ($editar == 'SI')? $rs->celular:'';  ?>">
                                            </label>
                                        </div>                   
                                    </div>
                                    <div class="row">
                                        <div class="col col-2" style="padding-right: 0px">
                                            Persona de contacto:
                                        </div>
                                        <div class="col col-10 ">
                                            <label class="input"><i class="icon-append fa fa-user"></i>
                                                <input type="text" class="form-control" id="rs_contacto" name="rs_contacto" placeholder="contacto" value="<?php  echo ($editar == 'SI')? $rs->contacto:'';  ?>">
                                            </label>
                                        </div>                                        
                                    </div>
                                    <div class="row">
                                        <div class="col col-2 ">
                                            E-mail:
                                        </div>
                                        <div class="col col-10 ">
                                            <label class="input"><i class="icon-append fa fa-envelope-open-o"></i>
                                                <input type="email" class="form-control"  id="rs_email" name="rs_email" placeholder="E-mail" value="<?php  echo ($editar == 'SI')? $rs->email:'';  ?>">
                                            </label>
                                        </div>                                        
                                    </div>
                                </fieldset>
                            </div>

                                     <br>
                                     <div class="hidden panel-group smart-accordion-default" id="accordion-2">
                    <div class="panel panel-default ">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion-2" href="#collapseOne-1" class="collapsed"> <i class="fa fa-fw fa-plus-circle txt-color-green"></i> <i class="fa fa-fw fa-minus-circle txt-color-red"></i> Mas datos (opcional)</a></h4>
                        </div>

                        <div id="collapseOne-1" class="panel-collapse collapse">
                        <div class="panel-body">


                                <div class="panel panel-default"> 
                                <fieldset> 
                                    
                                    <div class="row">
                                        <div class="col col-2 ">
                                            Coordinador:
                                        </div>
                                        <div class="col col-4 no-padding-r">
                                            <?php 
                                                $op_co[''] = '-- Seleccione --';
                                                foreach ($vendedor as $fila) {
                                                    $op_co[$fila->idusuario] = $fila->nombre_usuario;
                                                }
                                                if($editar=='SI'){
                                                   echo form_dropdown("rs_id_coordinador", $op_co, $rs->id_coordinador, 'class="select2"');
                                                   }else{
                                                    echo form_dropdown("rs_id_coordinador", $op_co,'' , 'class="select2"');
                                                }
                                            ?>   
                                        </div>  
                                        <div class="col col-2 ">
                                            Vendedor:
                                        </div>
                                        <div class="col col-4 ">
                                            <?php 
                                                $op_v1[''] = '-- Seleccione --';
                                                foreach ($vendedor as $fila) {
                                                    $op_v1[$fila->idusuario] = $fila->nombre_usuario;
                                                }
                                                if($editar=='SI'){
                                                   echo form_dropdown("rs_id_vendedor", $op_v1, $rs->id_vendedor, 'class="select2"');
                                                   }else{
                                                    echo form_dropdown("rs_id_vendedor", $op_v1,'' , 'class="select2"');
                                                }
                                            ?>   
                                        </div>                                                
                                    </div>

                                    <div class="row">
                                        <div class="col col-2 ">
                                            Dirección 2:
                                        </div>
                                        <div class="col col-4 no-padding-r">
                                             <label class="input"><i class="icon-append fa fa-map-marker"></i>
                                                <input type="text" class="form-control" id="rs_direccion2" name="rs_direccion2" placeholder="Dirección 2"  value="<?php  echo ($editar == 'SI')? $rs->direccion2:'';  ?>">
                                            </label>
                                        </div>  
                                        <div class="col col-2 ">
                                            Vendedor 2:
                                        </div>
                                        <div class="col col-4 ">
                                            <?php 
                                                $op_v4[''] = '-- Seleccione --';
                                                foreach ($vendedor as $fila) {
                                                    $op_v4[$fila->idusuario] = $fila->nombre_usuario;
                                                }
                                                if($editar=='SI'){
                                                   echo form_dropdown("rs_id_vendedor2", $op_v4, $rs->id_vendedor2, 'class="select2"');
                                                   }else{
                                                    echo form_dropdown("rs_id_vendedor2", $op_v4,'' , 'class="select2"');
                                                }                                            
                                            ?>   
                                        </div>                                                
                                    </div>
                                    <div class="row">
                                        <div class="col col-2 ">
                                            Dirección 3:
                                        </div>
                                        <div class="col col-4 no-padding-r">
                                             <label class="input"><i class="icon-append fa fa-map-marker"></i>
                                                <input type="text" class="form-control" id="rs_direccion3" name="rs_direccion3" placeholder="Dirección 3"  value="<?php  echo ($editar == 'SI')? $rs->direccion3:'';  ?>">
                                            </label>
                                        </div>  
                                        <div class="col col-2 ">
                                            Vendedor 3:
                                        </div>
                                        <div class="col col-4 ">
                                            <?php 
                                                $op_v3[''] = '-- Seleccione --';
                                                foreach ($vendedor as $fila) {
                                                    $op_v3[$fila->idusuario] = $fila->nombre_usuario;
                                                }
                                                if($editar=='SI'){
                                                   echo form_dropdown("rs_id_vendedor3", $op_v3, $rs->id_vendedor3, 'class="select2"');
                                                   }else{
                                                    echo form_dropdown("rs_id_vendedor3", $op_v3,'' , 'class="select2"');
                                                }
                                            
                                            ?>   
                                        </div>                                                
                                    </div>

                                </fieldset> 
                            </div>  
                             
                              </div>
                        </div>
                    </div>
                </div>

                        </div>
                        <div class="modal-footer no-padding">      
                            <button type="button" class="btn btn-default" onClick="cerrarmodal('ModalRegRazon');">Cancelar</button> 
                            <button type="submit" class="btn btn-primary" id="btnGuardarRS" ><i class="icon-append fa fa-save"></i> Guardar </button>
                            <input type="hidden"  name="rs_id_razonsocial" id="rs_id_razonsocial" value="<?php  echo ($editar == 'SI')? $rs->id_razonsocial:'';  ?>"> 
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal --> 
	</form> 
</div><!-- /.modal -->
<?php
	$this->load->view('tablas/mi-script.php');
?>
 <script>
 /*Ocultar y mostrar cmp y rne*/
 
	
 
 function generarRazon(){
	$("#rs_razonsocial").val($("#rs_nombre").val()+' '+$("#rs_appaterno").val()+' '+$("#rs_apmaterno").val());
}

$(document).ready(function() {
	// $('#ModalRegRazon').modal('show'); 

    if($("#rs_id_tiporazonsocial").val()=='2')
    { 
        $("#rs_div_datosmedico").show(300);     
    }else{
        $("#rs_div_datosmedico").hide(300);
        $("#rs_rne").val("");
        $("#rs_cmp").val("");
    }
	
});
var consultando = true;
 $("#rs_ruc").keyup(function(){ 	
    if(consultando==false){
        return;
    }
	var numruc = $("#rs_ruc").val();
	if(numruc.length == 11){
        consultando = false;
        $("#btnGuardarRS").attr("disabled","disabled"); 
		//consultadatosSUNAT(numruc);
       // consultaRUCaqpfact(numruc);
      // consultaApiRUC(numruc);   
      //consultaApiDevRUC(numruc);   
        $("#btnGuardarRS").attr("disabled",false); 
	}	
 });
 
 
  $("#rs_dni").keyup(function(){
	var numdni = $("#rs_dni").val();
    if(consultando==false){
        return;
    }
	if(numdni.length == 8){	
        consultando = false;
		$("#rs_ruc").val('');	
        $("#btnGuardarRS").attr("disabled","disabled"); 
		//consultadatosSUNAT(numdni);
        //consultaApiDevDNI(numdni);
        consultaApiSutranDNI(numdni);
       // consultaApiDNI(numdni);
        //consultaelDNI(numdni)

        $("#btnGuardarRS").attr("disabled",false); 
	}

    $("#rs_numafiliciacionsis").val('2-'+numdni);
 });


$("#rs_numdocumento").keyup(function(){
    $("#btn_extraer").trigger('click');
})

$("#btn_extraer").click(function(event){
    var id_tipodocumento = $("#rs_id_tipodocumento").val();
    var num = $("#rs_numdocumento").val();
    //console.log(id_tipodocumento);
    if(id_tipodocumento=='6'){
        if(num.length == 11){
            $("#rs_numdocumento").attr("disabled","disabled"); 
            $("#btn_extraer").attr("disabled","disabled"); 
            //consultaApiRUC(num);
           consultaApiDevRUC(num);
        }else{
            $("#rs_numdocumento").focus();
        }
    }else if(id_tipodocumento=='1'){
        if(num.length == 8){
            $("#rs_numdocumento").attr("disabled","disabled"); 
            $("#btn_extraer").attr("disabled","disabled"); 
            consultaApiSutranDNI(num);
            //consultaApiDNI(num);
        }else{
            $("#rs_numdocumento").focus();
        }
    }
   
});


$("#rs_id_tipodocumento").change(function(){
    var id_tipodocumento = $(this).val();
   // console.log(id_tipodocumento);
    $("#btn_extraer").hide();
    $("#rs_generardni").hide();
    $("#rs_numdocumento").attr("placeholder","Ingrese Número");
    $("#div_nacimiento").show();

    if(id_tipodocumento=='1'){
        $("#btn_extraer").show();
        $("#rs_numdocumento").attr("placeholder","Ingrese DNI");
        $("#div_extraer").html("RENIEC");
        
    }else if(id_tipodocumento=='6'){
        $("#btn_extraer").show();
        $("#rs_numdocumento").attr("placeholder","Ingrese RUC");
        $("#div_extraer").html("SUNAT");
        $("#div_nacimiento").hide();
    }else if(id_tipodocumento=='0'){
        $("#rs_generardni").show();
    }else{

    }

})


$("#btn_extraerfecha").click(function(event){
    var id_tipodocumento = $("#rs_id_tipodocumento").val();
    var num = $("#rs_numdocumento").val();
    if(id_tipodocumento=='1' && num.length==8){
        consultaFchNacDNI(num);
    }
})

 function consultadatosSUNAT(numeroDNI_RUC){
	  var numruc = numeroDNI_RUC;
 		$.ajax({ 
			type: "get",
			url: "http://siempreaqui.com/json-sunat/consulta.php", cache: false, 
			data:'nruc='+numruc, 
			success: function (data) {
						var dataObject = jQuery.parseJSON(data);
						 
						if (dataObject.success == true) {					 	 
						  $("#rs_razonsocial").val(dataObject.result.RazonSocial);
						  $("#rs_direccion").val(dataObject.result.Direccion);
						  $("#rs_telefono").val(dataObject.result.Telefono);
						  $("#rs_ruc").val(dataObject.result.RUC);
                         // $("#rs_dni").val(dataObject.result.DNI); No devuelve DNI
						}else{
						  $("#rs_razonsocial").val('');
						  $("#rs_direccion").val('');
						  $("#rs_telefono").val('');
						 // 	
						}
                        $("#btnGuardarRS").attr("disabled",false); 
				 
			 } 
		}); 
 }

  // Validar y registrar razón social 
var x_idrs  = ''
$(document).ready(function() {
	 
    $("#frm_regRazonSocial").validate({
        rules: {
           rs_razonsocial: { required: true, minlength: 6},
		   //rs_dni: { required: false,minlength: 8},
		  // rs_ruc: { required: false,minlength: 11, maxlength:11},		   
        },
        messages: {
           rs_razonsocial: "Debe introducir la Razón Social."           
        },
        submitHandler: function(form){	
            var id_tipodocumento = $("#rs_id_tipodocumento").val();
            var num = $("#rs_numdocumento").val();    
            var msgnum = '';
            if(id_tipodocumento=='1' && num.length != 8){
                msgnum = 'Ingrese DNI correcto';
            }else if(id_tipodocumento=='6' && num.length != 11){
                msgnum = 'Ingrese RUC correcto';
            }else if(id_tipodocumento=='4' && num.length != 9){
                msgnum = 'Ingrese CE correcto';
            }else if(id_tipodocumento=='7' && num.length < 9){
                msgnum = 'Ingrese Pasaporte correcto';
            }else if(num.length < 1){
                msgnum = 'Ingrese un número';
            }
            if(msgnum!=''){
                $.smallBox({
                    title : '<i class="botClose fa fa-times"></i> Aviso !',
                    content : '* '+msgnum,
                    color : "#dd4b39",
                    timeout : 5000,
                    icon : "fa fa-info-circle swing animated"
                });
            }else{
            var checked_option_sexo = $('input:radio[name=sexo]:checked').val();

            var flgtecnologo = '0';
             if($('#flg_tecnologo').is(':checked')){
                flgtecnologo = '1';
             }
            var flgmedico = '0';
             if($('#flg_medico').is(':checked')){
                flgmedico = '1';
             }


             var cb_asesor = '';
             if($('#cb_asesor').is(':checked')){
                cb_asesor = 'Asesor';
             }
            var cb_investigador = '';
             if($('#cb_investigador').is(':checked')){
                cb_investigador = 'Investigador';
             }

        
            $.ajax({
                type: "post",
                url:"<?php  echo base_url() ?>cliente/insertRazonSocial",
				data:{ 
				id_razonsocial: $("#rs_id_razonsocial").val(),
				id_tiporazonsocial: $("#rs_id_tiporazonsocial").val(),
				cmp: $("#rs_cmp").val(),
				rne: $("#rs_rne").val(),
				//dni: $("#rs_dni").val(),
				//ruc: $("#rs_ruc").val(),
                
                id_tipodocumento: $("#rs_id_tipodocumento").val(),
                numdocumento: $("#rs_numdocumento").val(),
				nombre: $("#rs_nombre").val(),
            	appaterno: $("#rs_appaterno").val(),
				apmaterno: $("#rs_apmaterno").val(),
				razonsocial: $("#rs_razonsocial").val(),
				id_especialidad: $("#rs_id_especialidad").val(),
				direccion: $("#rs_direccion").val(),
				referencia: $("#rs_referencia").val(),
				telefono: $("#rs_telefono").val(),
				celular: $("#rs_celular").val(),
				contacto: $("#rs_contacto").val(),
				email: $("#rs_email").val(),
                edad: $("#rs_edad").val(),
                flg_tecnologo: flgtecnologo,
                flg_medico: flgmedico,
                numafiliciacionsis: $("#rs_numafiliciacionsis").val(),
                sexo: checked_option_sexo,
                fechanacimiento: $("#fechanacimiento").val(),

                id_coordinador: $("#rs_id_coordinador").val(),
                id_vendedor: $("#rs_id_vendedor").val(),
                direccion2: $("#rs_direccion2").val(),
                id_vendedor2: $("#rs_id_vendedor2").val(),
                direccion3: $("#rs_direccion3").val(),
                id_vendedor3: $("#rs_id_vendedor3").val(),

                ubigeo: $("#rs_ubigeo").val(),

                carrera_profesional: $("#carrera_profesional").val(),
                cb_asesor: cb_asesor,
                cb_investigador: cb_investigador
                
				},				
                success: function(response){					
					 obj_rs = JSON.parse(response); 
					x_idrs = obj_rs.substr(10, 20);		
					if(obj_rs.substr(0, 10) == 'Registrado')
						{	
							x_fn_insertRS();
							//$("#frm_regRazonSocial")[0].reset();
							cerrarmodal('ModalRegRazon');
							$.smallBox({
								title : '<i class="botClose fa fa-times"></i> Aviso !',
								content :'Se realizó el registro de manera satisfactorio',
								color : "#008d4c",
								timeout : 5000,
								icon : "fa fa-check swing animated"
							});	
						
					}else if(obj_rs.substr(0, 10) == 'Modificado'){
							x_fn_updateRS();
							cerrarmodal('ModalRegRazon');
							$.smallBox({
								title : '<i class="botClose fa fa-times"></i> Aviso !',
								content :'Se realizó la modificación de manera satisfactorio',
								color : "#008d4c",
								timeout : 5000,
								icon : "fa fa-check swing animated"
							});	
					}else{ 
						$.smallBox({
							title : '<i class="botClose fa fa-times"></i> Aviso !',
							content : obj_rs,
							color : "#dd4b39",
							timeout : 5000,
							icon : "fa fa-info-circle swing animated"
						});
					} 				
                }				
            });
		  }
        }
    });
});

 function getAge(dateString) {
   var today = new Date(); var birthDate = new Date(dateString);
   var age = today.getFullYear() - birthDate.getFullYear();
   var m = today.getMonth() - birthDate.getMonth();
   if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) { age--; }
   $("#rs_edad").val(age);
   // console.log(age);
   // return age;
 } 


function consultaRUCaqpfact(RUC){
     $("#rs_razonsocial").val('Consultando...');
    $.ajax({ 
        type: "get",
        url: "cliente/ruc/"+RUC, cache: false, 
        //data:'ruc='+numruc, 
        success: function (data){
             try{
                    var dataObject = jQuery.parseJSON(data);
                   
                    if (dataObject.success == false) {                        
                      $("#rs_razonsocial").val('');
                      $("#rs_direccion").val('');
                     // $("#rs_telefono").val('');
                     //     
                    }else{
                        //if(RUC.substr(0,2)=='10'){
                        //if (window.dataObject.result){
                        if (dataObject.success == true) {
                          $("#rs_razonsocial").val(dataObject.result.RazonSocial);
                          $("#rs_direccion").val(dataObject.result.DireccionCompleta);
                        }else{
                          $("#rs_razonsocial").val(dataObject.RazonSocial);
                          $("#rs_direccion").val(dataObject.DireccionCompleta);
                        }
                     // $("#rs_telefono").val(dataObject.result.Telefono);
                     // $("#rs_ruc").val(dataObject.result.RUC);
                     // $("#rs_dni").val(dataObject.result.DNI); No devuelve DNI
                    }
                } catch (error) { 
                    $("#rs_razonsocial").val('');
                }
                $("#btnGuardarRS").attr("disabled",false); 


             
         } 
    }); 
 }


function consultaApiDNI(dni){
     $("#rs_razonsocial").val('Consultando...');
     $("#rs_direccion").val('');
     $("#fechanacimiento").val("");
    $.ajax({ 
        type: "get",
        url: "cliente/apiperu_dni/"+dni, cache: false, 
        //data:'ruc='+numruc, 
        success: function (data) { 
            consultando = true;
            $("#rs_razonsocial").val('');
            $("#rs_ruc").val('');
            $("#rs_dni").val(dni);
            $('#rs_ubigeo').val(null).trigger('change');
            if(data){
                var dataObject = jQuery.parseJSON(data);
              //  var txtnombre = dataObject.data.nombre_completo;
                var fchnac = dataObject.data.fecha_nacimiento;
                var sexo = dataObject.data.sexo;
                
                var nombre = dataObject.data.nombre_completo;// +' '+ dataObject.data.apellido_paterno +' '+ dataObject.data.apellido_materno;
                 
                 
                $("#rs_razonsocial").val(nombre);
                $("#fechanacimiento").val(fchnac);

                getAge(fchnac);

               // $('input:radio[name=cols]'+" #"+newcol).attr('checked',true);
               if(sexo=='FEMENINO'){
                    $('input:radio[name=sexo]').val(['F']);
               }else{
                    $('input:radio[name=sexo]').val(['M']);
                }

            }
                $("#btnGuardarRS").attr("disabled",false); 
             
         } 
    }).fail( function( jqXHR, textStatus, errorThrown ) {
        consultando = true;
        $("#rs_razonsocial").val(''); 
    });  
 }

 function consultaApiRUC(ruc){
     $("#rs_razonsocial").val('Consultando...');
     $("#rs_direccion").val('');
     $("#fechanacimiento").val("");
     $("#rs_dni").val('');
     $("#rs_edad").val('');
     $("#rs_numafiliciacionsis").val('');

    $.ajax({ 
        type: "get",
        url: "cliente/apiperu_ruc/"+ruc, cache: false, 
        //data:'ruc='+numruc, 
        success: function (data) {
        	$("#rs_razonsocial").val(''); 
            $("#rs_ruc").val(ruc);            
            $('#rs_ubigeo').val(null).trigger('change');

            consultando = true;
            if(data){
                var dataObject = jQuery.parseJSON(data);
                $("#rs_razonsocial").val(dataObject.data.nombre_o_razon_social);
                if(dataObject.data.direccion_completa == ' -  -  - '){
                    $("#rs_direccion").val('');
                }else{
                     $("#rs_direccion").val(dataObject.data.direccion_completa);
                }

                if (dataObject.infoubigeo.ubigeo) {
                    var ubig = dataObject.infoubigeo.ubigeo +' | '+dataObject.infoubigeo.distrito+' | '+dataObject.infoubigeo.provincia +' | '+dataObject.infoubigeo.departamento;
                    var option = $("<option selected></option>").val(dataObject.infoubigeo.ubigeo).text(ubig);
                    $('#rs_ubigeo').append(option).trigger('change');
                 }
             }

                $("#btnGuardarRS").attr("disabled",false);
                $("#rs_numdocumento").attr("disabled",false); 
                $("#btn_extraer").attr("disabled",false); 

             
         } 
    }).fail( function( jqXHR, textStatus, errorThrown ) {
        consultando = true;
        $("#rs_razonsocial").val('');
        
    });  
 }

 function consultaApiDevRUC(ruc){
     $("#rs_razonsocial").val('Consultando...');
     $("#rs_direccion").val('');
     $("#fechanacimiento").val("");
     $("#rs_dni").val('');
     $("#rs_edad").val('');
     $("#rs_numafiliciacionsis").val('');

    $.ajax({ 
        type: "get",
        url: "cliente/apidev_ruc/"+ruc, cache: false, 
        //data:'ruc='+numruc, 
        success: function (data) {
            $("#rs_razonsocial").val(''); 
            $("#rs_ruc").val(ruc);            
            $('#rs_ubigeo').val(null).trigger('change');

            consultando = true;
            if(data){
                var dataObject = jQuery.parseJSON(data);
                $("#rs_razonsocial").val(dataObject.data.nombre_o_razon_social);
                console.log(ruc.substr(1,2));
                if(ruc.substr(0,2) =='10'){
                    $("#rs_direccion").val('');//$("#rs_direccion").val(dataObject.data.domicilio_direccion_completa);
                }else 
                if(dataObject.data.direccion_completa == ' -  -  - '){
                    $("#rs_direccion").val('');
                }else{
                     $("#rs_direccion").val(dataObject.data.direccion_completa);
                }

                if (dataObject.infoubigeo.ubigeo) {
                    var ubig = dataObject.infoubigeo.ubigeo +' | '+dataObject.infoubigeo.distrito+' | '+dataObject.infoubigeo.provincia +' | '+dataObject.infoubigeo.departamento;
                    var option = $("<option selected></option>").val(dataObject.infoubigeo.ubigeo).text(ubig);
                    $('#rs_ubigeo').append(option).trigger('change');
                 }
             }

                $("#btnGuardarRS").attr("disabled",false);

             
         } 
    }).fail( function( jqXHR, textStatus, errorThrown ) {
        consultando = true;
        $("#rs_razonsocial").val('');
        
    });  
 }

function consultaelDNI(RUC){
     $("#rs_razonsocial").val('Consultando...');
     $("#rs_direccion").val('');
    $.ajax({ 
        type: "get",
        url: "cliente/eldni/"+RUC, cache: false, 
        //data:'ruc='+numruc, 
        success: function (data) {
                 //   var dataObject = jQuery.parseJSON(data);
                   
                         $("#rs_razonsocial").val(data);
                  $("#btnGuardarRS").attr("disabled",false); 
             
         } 
    });  
 }
 
 
 $("#rs_generardni").click(function(){
      $.ajax({ 
        type: "get",
        url: "cliente/jsonMaxDNI/", cache: false, 
        //data:'ruc='+numruc, 
        success: function (data) {
            var dataObject = jQuery.parseJSON(data);
            $("#rs_numdocumento").val(dataObject);
             
         } 
    });
 });

 function consultaApiDevDNI(dni){
     $("#rs_razonsocial").val('Consultando...');
     $("#rs_direccion").val('');
    $.ajax({ 
        type: "get",
        url: "cliente/apidev_dni/"+dni, cache: false, 
        //data:'ruc='+numruc, 
        success: function (data) {
            consultando = true;
            $("#rs_razonsocial").val('');
            $("#fechanacimiento").val("");
            $("#rs_ruc").val('');
            $("#rs_dni").val(dni);
            $('#rs_ubigeo').val(null).trigger('change');

                var dataObject = jQuery.parseJSON(data);
                var txtnombre = dataObject.data.nombre_completo;
                var fchnac = dataObject.data.fecha_nacimiento;
                
                var nombre = dataObject.data.nombres +' '+ dataObject.data.apellido_paterno +' '+ dataObject.data.apellido_materno;
                 
                 
                $("#rs_razonsocial").val(nombre);
                $("#fechanacimiento").val(fchnac);

                getAge(fchnac);
                
                $("#btnGuardarRS").attr("disabled",false); 
             
         } 
    }).fail( function( jqXHR, textStatus, errorThrown ) {
        consultando = true;
        $("#rs_razonsocial").val('');
        $("#fechanacimiento").val("");
    });  
 }

 function consultaApiSutranDNI(dni){
     $("#rs_razonsocial").val('Consultando...');
     $("#rs_direccion").val('');
    $.ajax({ 
        type: "get",
        url: "cliente/apisutran_dni/"+dni, cache: false, 
        //data:'ruc='+numruc, 
        success: function (data) {
            consultando = true;
            $("#rs_razonsocial").val('');
            $("#fechanacimiento").val("");
            $("#rs_edad").val("");
            $("#rs_direccion").val('');
            var data = data.replace("[", "");
            var data = data.replace("]", "");

                var dataObject = jQuery.parseJSON(data); 
                
                var nombre = dataObject.nombres +' '+ dataObject.apepat +' '+ dataObject.apemat;
                 
                 
                $("#rs_razonsocial").val(nombre);
                $("#rs_direccion").val(dataObject.direccion);
              //  $("#fechanacimiento").val(fchnac);
                $("#btnGuardarRS").attr("disabled",false); 
                $("#rs_numdocumento").attr("disabled",false); 
                $("#btn_extraer").attr("disabled",false);

                if(dataObject.apepat==''){
                    //consultaApiDevDNI(dni);
                    consultaApiDNI(dni);

                }
             
         } 
    }).fail( function( jqXHR, textStatus, errorThrown ) {
        consultando = true;
        $("#rs_razonsocial").val('');
        $("#fechanacimiento").val("");
    });  
 }

 function consultaFchNacDNI(dni){
     
     $("#fechanacimiento").val("");
     $("#div_msgfecha").html("Consultando...");     
    $.ajax({ 
        type: "get",
        url: "<?php echo base_url() ?>cliente/apiperu_dni/"+dni, cache: false, 
        //data:'ruc='+numruc, 
        success: function (data) { 
            
            if(data){
                var dataObject = jQuery.parseJSON(data);
              //  var txtnombre = dataObject.data.nombre_completo;
                var fchnac = dataObject.data.fecha_nacimiento;
                var sexo = dataObject.data.sexo;
                 
               
                $("#fechanacimiento").val(fchnac);

                getAge(fchnac);

               // $('input:radio[name=cols]'+" #"+newcol).attr('checked',true);
               if(sexo=='FEMENINO'){
                    $('input:radio[name=sexo]').val(['F']);
               }else{
                    $('input:radio[name=sexo]').val(['M']);
                }

            }
            
            $("#div_msgfecha").html("");
             
         } 
    }).fail( function( jqXHR, textStatus, errorThrown ) {
       $("#div_msgfecha").html("");        
    });  
 }

 $("#rs_id_tipodocumento").trigger('change');

<?php  if($cantventa > 0){ ?>
    $('#rs_id_tipodocumento').attr("style", "pointer-events: none;");
<?php } ?>


 </script>