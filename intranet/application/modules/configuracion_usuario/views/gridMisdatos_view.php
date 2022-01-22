<script>
      $(function(){        
        var options = {
            target:        '#div_capa_pagina', 
            beforeSubmit:  showRequest,  
            success:       showResponse  
        };
        $('#smart-form-register').ajaxForm(options);  
           
      //  $("#nombre").focus();
    //  $("#myModal" ).dialog( "destroy" );     
    });
    function showRequest(formData, jqForm) {
        // if(confirm("Desea Actualizar El usuario")){
        // }else{
        //  return false;
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
</script>  
<div id="content">			
    
     <div class="alert alert-warning fade in">
								<button class="close" data-dismiss="alert">
									×
								</button>
								<i class="fa-fw fa fa-warning"></i>
								<strong>.: AVISO!:</strong> Estimado usuario, si necesita <strong>actualizar otros datos</strong> por favor comuniquese con el <strong>responsable del sistema</strong>, gracias.
							</div>
                            
    <!-- widget grid -->
    <section id="widget-grid" class="">        
        <!-- row -->
        <div class="row">
            <!-- Columna 1 -->
            <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

               
               
               <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-greenDark" id="wid-id-92" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false">
                
                    <header>
                        <h2><strong>Datos</strong> <i>de usuario</i></h2>
                    </header>

                    <!-- widget div-->
                    <div>		
                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            
                                            
 <form id="smart-form-register" class="smart-form" name="frm_usuario" action="configuracion_usuario/updateMisdatos" method="post"   autocomplete="new-password">

                            <div class="panel panel-default smart-form ">									

                                 <?php 			
				$editar = '';
				if(isset($usuario))
				{	if($usuario){ 							 
					$editar = 'SI';
					}
				}
				?>				
                
            
             
                <fieldset class="smart-form" >  
                
                <section>
                    <div class="row">
                        <label class="label col col-3">Nombre</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-user"></i>
                               <input autofocus type="text" name="nombre_usuario"  value="<?php  echo ($editar == 'SI')? $usuario->nombre_usuario:'';  ?>"  class="form-control"   >                               
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Correo</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                               <input  type="email" id="email_usuario" name="email_usuario" maxlength="40" value="<?php  echo ($editar == 'SI')? $usuario->email_usuario:'';  ?>"  class="form-control"   >                               
                            </label>
                        </div>
                    </div>
                </section>  
                <section>
                    <div class="row">
                        <label class="label col col-3">Tel/Cel</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-phone"></i>
                               <input autofocus type="text" name="usu_tel"  value="<?php  echo ($editar == 'SI')? $usuario->usu_tel:'';  ?>"  class="form-control"   >                               
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Usuario</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-user"></i>
                               <input autofocus type="text"   value="<?php  echo ($editar == 'SI')? $usuario->username:'';  ?>"  class="form-control" disabled="disabled"  >                               
                            </label>
                        </div>
                    </div>
                </section>   
       
                 <section>
                    <div class="row">
                        <label class="label col col-3">Tipo de usuario:</label>
                        <div class="col col-9">  
                            <label class="input"> <i class="icon-append fa fa-address-book"></i>
                               <input autofocus type="text"   value="<?php  echo ($editar == 'SI')? $usuario->nombre_usuario_tipo:'';  ?>"  class="form-control" disabled="disabled"  >                               
                            </label>                           
                          
                        </div>
                    </div>
                </section>
      
                
                <section>
                    <div class="row">
                        <label class="label col col-3">Fecha de ingreso</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-calendar"></i>
                               <input  type="text" id="usu_fch_ingreso" name="usu_fch_ingreso" value="<?php  echo ($editar == 'SI')?$this->load->help_date->fechaUsuario($usuario->usu_fch_ingreso):'';  ?>"  class="form-control" disabled="disabled"  >                               
                            </label>
                        </div>
                    </div>
                </section> 
                <section class="hidden">
                    <div class="row">
                        <label class="label col col-3">Fecha de expiración</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-calendar"></i>
                               <input  type="text" id="usu_fch_expira" name="usu_fch_expira"  value="<?php  echo ($editar == 'SI')? $this->load->help_date->fechaUsuario($usuario->usu_fch_expira):'';  ?>"   class="form-control" disabled="disabled"   >                               
                            </label>
                        </div>
                    </div>
                </section> 
               
                <section>
                    <div class="row">                                   
                        <label class="label col col-3">Estado</label>
                        <div class="col col-9">
                        <?php $estado = ($editar == 'SI')?$usuario->status_usuario:''?>
                        <label>
                            <input  type="radio" checked="checked" id="usu_estado1" class="radiobox style-0"  value="AC"  <?php   echo ($estado =='AC')?'checked="true" ':'';?>  name="usu_estado" disabled>
                            <span>Activo</span> 
                        </label>
                        <label>
                            <input type="radio" id="usu_estado2" class="radiobox style-0"  value="DS"  <?php  echo ($estado =='DS')?'checked="true" ':'';?>  name="usu_estado" disabled>
                            <span>Desactivado</span> 
                        </label>            
                    </div>
                    </div>
                </section>
                  <section class="hidden">
                    <div class="row">
                        <label class="label col col-3">Ingresar al sistema desde cualquier lugar</label>
                        <div class="col col-9">
                          <?php if ($usuario->token_pc){?>
                            <span style="background:aqua;">Ativado solo en este equipo</span>
                          <?php
                          }else{ ?>
                            <span class="onoffswitch" onclick="activar_usuario_pc();">
                            <input type="checkbox"  class="onoffswitch-checkbox" id="btn_activar_pc" checked="">
                              <label class="onoffswitch-label" for="btn_fondo">
                                  <span class="onoffswitch-inner"  data-swchon-text="SI" data-swchoff-text="NO"></span>
                                  <span class="onoffswitch-switch"></span>
                              </label>
                            </span>
                            <br>
                            <em>Si deshabilita solo ingresará al sistema con éste usuario <b>desde éste equipo</b>,<br> pero en cualquier momento puede activar desde la opción <b>Usuarios / Lista de usuario</b></em>


                        <?php  } ?>
                        </div>
                    </div>
                </section>
                      
                
                </fieldset> 
                
                            </div>
                            <footer>
                                <input type="submit" class="btn btn-primary" id="btnguardar_e" name="btnguardar_e" value="Guardar" />
                            
                              
                            </footer>
                            
                                </form>
                        
                        </div>
                        <!-- end widget content -->                        
                    </div>
                    <!-- end widget div -->                    
                </div>
                <!-- end widget -->
               
           
                
            </article>
            <!-- Fin colummna 1 -->
            
         
               					

                                 
                    </div>        
                           
                            
                            
                        
                        </div>
                        <!-- end widget content -->                         
                    </div>
                    <!-- end widget div -->                    
                </div>
                <!-- end widget -->

                
                
                
            </article>
            <!--Fin columna 2-->
        </div>				
        <!-- end row -->   
        
    </section>
    <!-- end widget grid -->
    
<!-- Modal -->
<div id="div_ModalMant">
</div><!-- /.modal -->                    
    
</div> 
  
<!--================================================== -->	
<script>
pageSetUp();
	
</script>
<style>
	 .select2-dropdown
	 {
		 width:400px !important;
	 }
 </style>
 
 