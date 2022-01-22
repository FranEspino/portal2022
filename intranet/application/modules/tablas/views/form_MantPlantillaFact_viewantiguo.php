<script> 
$(function(){        
	var options_frm_misdatos = {
		//target:        '#div_ModalMant', 
        target:        '#div_capa_pagina', 
		beforeSubmit:  showRequestMisdatos,  
		success:       showResponse  
	};
    
		$('#frm_ventaticket').ajaxForm(options_frm_misdatos);
        $('#frm_empresa').ajaxForm(options_frm_misdatos);
        $('#frm_guiaA4').ajaxForm(options_frm_misdatos);
        $('#frm_cotA4').ajaxForm(options_frm_misdatos);
        
	});	
function showRequestMisdatos(formData, jqForm){	
 
	};
function showResponse(responseText, statusText){
       
};

 

</script>  
<link rel="stylesheet" type="text/css" href="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<div id="content">	 
                            
    <!-- widget grid -->
    <section id="widget-grid" class="">        
        <!-- row -->
        <div class="row">

            <!-- Columna 1 -->
            <form id="frm_ventaticket" method="post" class="" action="<?php echo base_url().'tablas/plantilla/mantVentaT'; ?>" name="frm_plantilla"  enctype="multipart/form-data" >            
            <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
               <!-- Widget ID (each widget will need unique ID)-->

                <div class="jarviswidget jarviswidget-color-teal" id="wid-id-600" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-sortable="false" data-widget-deletebutton="false" style="margin-bottom: 5px;" >
                    <header>
                        <span class="padding-gutter ">
                            <i class="fa fa-file-o"></i> Tamaño Ticket - Venta  
                        </span> 
                    </header>
                    <!-- widget div-->
                    <div>       
                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <div class="panel panel-default smart-form ">            
                            <fieldset class="smart-form" >
                            <section>
                                        <div class="row">
                                           
                <?php $tipo_nota = value_config('TipoVenta_NotaVentaT',$config) ?>
                <label class="label col col-4" >Mostrar: <b>VENTAS AL POR MAYOR Y MENOR</b></label>
                <div class="col col-2">
                    <span class="onoffswitch">
                      <input type="checkbox" name="TipoVenta_NotaVentaT" class="onoffswitch-checkbox" id="TipoVenta_NotaVentaT" value="1" <?php echo ($tipo_nota=='1')?'checked=""':''; ?>>
                        <label class="onoffswitch-label" for="TipoVenta_NotaVentaT"> 
                            <span class="onoffswitch-inner" data-swchon-text="SI" data-swchoff-text="NO"></span> 
                            <span class="onoffswitch-switch"></span> 
                        </label> 
                    </span>
                </div> 
                <?php $tcocina = value_config('TCocina_VentaT',$config) ?>
                <label class="label col col-4" >Mostrar Ticket de Cocina:</label>
                <div class="col col-2">
                    <span class="onoffswitch">
                      <input type="checkbox" name="TCocina_VentaT" class="onoffswitch-checkbox" id="TCocina_VentaT" value="1" <?php echo ($tcocina=='1')?'checked=""':''; ?>>
                        <label class="onoffswitch-label" for="TCocina_VentaT"> 
                            <span class="onoffswitch-inner" data-swchon-text="SI" data-swchoff-text="NO"></span> 
                            <span class="onoffswitch-switch"></span> 
                        </label> 
                    </span>
                </div> 
                                        </div>
                                    </section>
                                    <section>
                                        <div class="row">
                                           
                <?php $ruc_nota = value_config('RUC_NotaVentaT',$config) ?>
                <label class="label col col-4" >Mostrar RUC en Notas de venta:</label>
                <div class="col col-2">
                    <span class="onoffswitch">
                      <input type="checkbox" name="RUC_NotaVentaT" class="onoffswitch-checkbox" id="RUC_NotaVentaT" value="1" <?php echo ($ruc_nota=='1')?'checked=""':''; ?>>
                        <label class="onoffswitch-label" for="RUC_NotaVentaT"> 
                            <span class="onoffswitch-inner" data-swchon-text="SI" data-swchoff-text="NO"></span> 
                            <span class="onoffswitch-switch"></span> 
                        </label> 
                    </span>
                </div> 
                 <?php $flgqr = value_config('QR_NotaVentaT',$config) ?>
                <label class="label col col-4" >Mostrar QR en Notas de Venta:</label>
                <div class="col col-2"> 
                    <span class="onoffswitch">
                      <input type="checkbox" name="QR_NotaVentaT" class="onoffswitch-checkbox" id="flg_duplicaritem" value="1" <?php echo ($flgqr=='1')?'checked=""':''; ?>>
                        <label class="onoffswitch-label" for="flg_duplicaritem"> 
                            <span class="onoffswitch-inner" data-swchon-text="SI" data-swchoff-text="NO"></span> 
                            <span class="onoffswitch-switch"></span> 
                        </label> 
                    </span>
                </div>
                                        </div>
                                    </section>

                            <section class="col-sm-12">
                                <span class="text-primary">Nota (Posicionado en la parte inferior)</span>
                                <textarea class="summernote" name ='nameconfig'><?php echo ( value_config('nota_pdfventaT',$config)) ?></textarea>    
                            </section>  
             
                            
                            </fieldset> 
                            <footer>
                                
                                <!--Campos ocultos-->
                                <input type="hidden"  name="idempresa_corp" value="<?php  echo $empresa->idempresa_corp;  ?>"> 
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                                
                            </footer>

                            </div>
                        </div>
                        <!-- end widget content -->                        
                    </div>
                    <!-- end widget div -->                    
                </div>
                <!-- end widget -->
            </article>
             </form>
            <!-- Fin colummna 1 -->   

            <!-- Columna 1 -->
            <form id="frm_empresa" method="post" class="" action="<?php echo base_url().'tablas/plantilla/mantFacturaA4'; ?>" name="frm_plantilla"  enctype="multipart/form-data" >            
            <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
               <!-- Widget ID (each widget will need unique ID)-->

                <div class="jarviswidget jarviswidget-color-teal" id="wid-id-600" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-sortable="false" data-widget-deletebutton="false" style="margin-bottom: 5px;" >
                    <header>
                        <span class="padding-gutter ">
                            <i class="fa fa-file-o"></i> Tamaño A4 - Venta  
                        </span> 
                    </header>
                    <!-- widget div-->
                    <div>		
                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <div class="panel panel-default smart-form ">			 
                            <fieldset class="smart-form smart-accordion-default" >  


                            <section>
                                <div class="row">
                                    <label class="label col col-3">Color de relleno</label>
                                    <div class="col col-4">
                                        <?php $FillColor_VentaA4 = value_config('FillColor_VentaA4',$config);
                                            if($FillColor_VentaA4 ==''){
                                               $FillColor_VentaA4 = 'rgba(46, 134, 193)';
                                            }
                                        ?>
                                        <div class="form-group">
                                            <div class="input-group my-colorpicker2 colorpicker-element">
                                              <input type="text" name="FillColor" class="form-control" value="<?php echo $FillColor_VentaA4; ?>">
                                              <div class="input-group-addon">
                                                <i style="background-color: <?php echo $FillColor_VentaA4; ?>;"></i>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="label col col-2 no-padding-r no-padding-l">Color de texto</label>
                                    <div class="col col-3">
                                        <div class="form-group">
                                            <div class="input-group my-colorpicker2 colorpicker-element">
                                              <input type="text" name="TextColor" class="form-control" value="<?php echo value_config('TextColor_VentaA4',$config) ?>">
                                              <div class="input-group-addon">
                                                <i style="background-color: <?php echo value_config('TextColor_VentaA4',$config) ?>;"></i>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="col-sm-12">
                    <span class="text-primary">Nota (Posicionado en la parte inferior)</span>
                    <textarea class="summernote" name ='nameconfig'><?php echo value_config('nota_pdfventaA4',$config) ?></textarea>    
                </section>  

                <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseVentaA4" class="collapsed"> <i class="fa fa-lg fa-plus-circle  txt-color-green"></i> <i class="fa fa-lg fa-minus-circle  txt-color-red"></i> Adicionar plantilla </a></h4>
                                </div>
                                <div id="collapseVentaA4" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <!-- Inicio contenido-->



                            <section>
                                <div class="row">
                                    <label class="label col col-3">Nombre de plantilla</label>
                                    <div class="col col-9">
                                        <input readonly="" name="plantillafact" required="" type="text" placeholder="Se creará automaticamente" value="<?php  echo $empresa->plantillafact;  ?>"  class="form-control">  
                                    </div>
                                </div>
                            </section>

                            <section>
                                <div class="row">
                                    <label class="label col col-3">Plantilla .pdf</label>
                                    <div class="col col-9">
                                        <input type="file" accept=".pdf" class="btn btn-default"  name="plantillafact_pdf">
                                        <?php 
                                         if (file_exists('file/plantilla/'.$empresa->plantillafact.'.pdf' )) {
                                         //if($empresa->plantillafact!=''){  ?>
                                            <a href="<?php  echo base_url().'file/plantilla/'.$empresa->plantillafact ;?>.pdf" target="_blank" title="Ver imagen">Ver archivo</a>
                                        <?php }?> 
                                    </div>
                                </div>
                            </section>
                            <section>
                                <div class="row">
                                    <label class="label col col-3">Plantilla .php</label>
                                    <div class="col col-9">
                                        <input type="file" accept=".php" class="btn btn-default"  name="plantillafact_php">  
                                        <?php  if (file_exists('application/modules/reporte/controllers/plantilla/'.$empresa->plantillafact.'.php' )) {
                                         //if($empresa->plantillafact!=''){  ?>
                                            <a href="<?php  echo base_url().'tablas/plantilla/downloadphp/'.$empresa->plantillafact ;?>" target="_blank" title="Ver imagen">Ver archivo</a>
                                        <?php }?> 
                                    </div>
                                </div>
                            </section>
                            <!-- Fin Contenido-->                   
                                    </div>
                                </div>
                            </div>
             
                            
                            </fieldset> 
                            <footer>
                                
                                <!--Campos ocultos-->
                                <input type="hidden"  name="idempresa_corp" value="<?php  echo $empresa->idempresa_corp;  ?>"> 
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                                
                            </footer>

                            </div>
                        </div>
                        <!-- end widget content -->                        
                    </div>
                    <!-- end widget div -->                    
                </div>
                <!-- end widget -->
            </article>
             </form>
            <!-- Fin colummna 1 -->    

            <!-- Columna 2 -->
            <form id="frm_guiaA4" method="post" class="" action="<?php echo base_url().'tablas/plantilla/mantGuiaA4'; ?>" name="frm_plantilla"  enctype="multipart/form-data" >            
            <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
               <!-- Widget ID (each widget will need unique ID)-->

                <div class="jarviswidget jarviswidget-color-teal" id="wid-id-600" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-sortable="false" data-widget-deletebutton="false" style="margin-bottom: 5px;" >
                    <header>
                        <span class="padding-gutter ">
                            <i class="fa fa-file-o"></i> Tamaño A4 - Guia remisión  
                        </span> 
                    </header>
                    <!-- widget div-->
                    <div>       
                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <div class="panel panel-default smart-form ">            
                            <fieldset class="smart-form smart-accordion-default" >  
                                <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseGuiaA4" class="collapsed"> <i class="fa fa-lg fa-plus-circle  txt-color-green"></i> <i class="fa fa-lg fa-minus-circle  txt-color-red"></i> Adicionar plantilla </a></h4>
                                </div>
                                <div id="collapseGuiaA4" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <!-- Inicio contenido-->
                            <section>
                                <div class="row">
                                    <label class="label col col-3">Nombre de plantilla</label>
                                    <div class="col col-9">
                                        <input readonly="" name="plant_guiaA4" required="" type="text" placeholder="Se creará automaticamente" value="<?php  echo $empresa->plant_guiaA4;  ?>"  class="form-control">  
                                    </div>
                                </div>
                            </section>

                            <section>
                                <div class="row">
                                    <label class="label col col-3">Plantilla .pdf</label>
                                    <div class="col col-9">
                                        <input type="file" accept=".pdf" class="btn btn-default"  name="plantilla_pdf">
                                        <?php 
                                         if (file_exists('file/plantilla/'.$empresa->plant_guiaA4.'.pdf' )) {
                                         //if($empresa->plantillafact!=''){  ?>
                                            <a href="<?php  echo base_url().'file/plantilla/'.$empresa->plant_guiaA4 ;?>.pdf" target="_blank" title="Ver imagen">Ver archivo</a>
                                        <?php }?> 
                                    </div>
                                </div>
                            </section>
                            <section>
                                <div class="row">
                                    <label class="label col col-3">Plantilla .php</label>
                                    <div class="col col-9">
                                        <input type="file" accept=".php" class="btn btn-default"  name="plantilla_php">  
                                        <?php  if (file_exists('application/modules/reporte/controllers/plantilla/'.$empresa->plant_guiaA4.'.php' )) {
                                         //if($empresa->plantillafact!=''){  ?>
                                            <a href="<?php  echo base_url().'tablas/plantilla/downloadphp/'.$empresa->plant_guiaA4 ;?>" target="_blank" title="Ver imagen">Ver archivo</a>
                                        <?php }?> 
                                    </div>
                                </div>
                            </section>
                            <!-- Fin Contenido-->                   
                                    </div>
                                </div>
                            </div>
             
                            
                            </fieldset> 
                            <footer>
                                
                                <!--Campos ocultos-->
                                <input type="hidden"  name="idempresa_corp" value="<?php  echo $empresa->idempresa_corp;  ?>"> 
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                                
                            </footer>

                            </div>
                        </div>
                        <!-- end widget content -->                        
                    </div>
                    <!-- end widget div -->                    
                </div>
                <!-- end widget -->
            </article>
             </form>
            <!-- Fin colummna 2 -->    

            <!-- Columna 3 -->
            <form id="frm_cotA4" method="post" class="" action="<?php echo base_url().'tablas/plantilla/mantCotA4'; ?>" name="frm_plantilla"  enctype="multipart/form-data" >            
            <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
               <!-- Widget ID (each widget will need unique ID)-->

                <div class="jarviswidget jarviswidget-color-teal" id="wid-id-600" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-sortable="false" data-widget-deletebutton="false" style="margin-bottom: 5px;" >
                    <header>
                        <span class="padding-gutter ">
                            <i class="fa fa-file-o"></i> Tamaño A4 - Cotización  
                        </span> 
                    </header>
                    <!-- widget div-->
                    <div>       
                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <div class="panel panel-default smart-form ">            
                            <fieldset class="smart-form smart-accordion-default" >  
                                

                            <section>
                                <div class="row">
                                    <label class="label col col-3">Color de relleno</label>
                                    <div class="col col-4">
                                        <div class="form-group">
                                            <div class="input-group my-colorpicker2 colorpicker-element">
                                              <input type="text" name="FillColor" class="form-control" value="<?php echo value_config('FillColor_CotA4',$config) ?>">
                                              <div class="input-group-addon">
                                                <i style="background-color: rgb(0, 58, 193);"></i>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="label col col-2 no-padding-r no-padding-l">Color de texto</label>
                                    <div class="col col-3">
                                        <div class="form-group">
                                            <div class="input-group my-colorpicker2 colorpicker-element">
                                              <input type="text" name="TextColor" class="form-control" value="<?php echo value_config('TextColor_CotA4',$config) ?>">
                                              <div class="input-group-addon">
                                                <i style="background-color: rgb(0, 58, 193);"></i>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section>
                                <div class="row">
                                    <label class="label col col-2 no-padding-r">Relleno del encabezado</label>
                                    <div class="col col-4">
                                        <div class="form-group">
                                            <div class="input-group my-colorpicker2 colorpicker-element">
                                              <input type="text" name="ColorCabecera1_CotA4" class="form-control" value="<?php echo value_config('ColorCabecera1_CotA4',$config) ?>">
                                              <div class="input-group-addon">
                                                <i style="background-color: rgb(0, 58, 193);"></i>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col col-3 no-padding-l">  
                                        <?php $dircab = value_config('DirCabecera_CotA4',$config) ?>
                                                <select class="form-control" name="DirCabecera_CotA4">
                                                    <option value="ABAJO" <?php  if($dircab == 'ABAJO'){ echo 'selected';} ?>>Hacia abajo</option>
                                                    <option value="DERECHA" <?php  if($dircab == 'DERECHA'){ echo 'selected';} ?>>Hacia la derecha</option>
                                                    <option value="DERECHAINF" <?php  if($dircab == 'DERECHAINF'){ echo 'selected';} ?>>Hacia la derecha inferior</option>
                                                    <option value="DERECHASUP" <?php  if($dircab == 'DERECHASUP'){ echo 'selected';} ?>>Hacia la derecha superior</option>
                                                </select>
                                            </div>
                                    <div class="col col-3">
                                        <div class="form-group">
                                            <div class="input-group my-colorpicker2 colorpicker-element">
                                              <input type="text" name="ColorCabecera2_CotA4" class="form-control" value="<?php echo value_config('ColorCabecera2_CotA4',$config) ?>">
                                              <div class="input-group-addon">
                                                <i style="background-color: rgb(0, 58, 193);"></i>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section>
                                <div class="row">
                                    <label class="label col col-3">Mostrar imagen de producto:</label>
                                    <?php $imgprod = value_config('ImgProd_CotA4',$config) ?>
                                    <div class="col col-3 no-padding-l">  
                                        <select class="form-control" name="ImgProd_CotA4">
                                            <option value="NO" <?php  if($imgprod == 'NO'){ echo 'selected';} ?>>NO</option>
                                            <option value="IZQUIERDA" <?php  if($imgprod == 'IZQUIERDA'){ echo 'selected';} ?>>A la izquierda</option>
                                            <option value="CENTRO" <?php  if($imgprod == 'CENTRO'){ echo 'selected';} ?>>Al centro</option>
                                        </select>
                                    </div>
                                </div>
                            </section>
                            <section class="col-sm-12">
                    <span class="text-primary">Nota (Posicionado en la parte inferior)</span>
                    <textarea class="summernote" name ='nameconfig'><?php echo value_config('nota_pdfcotA4',$config) ?></textarea>    
                </section>  
                <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseCotA4" class="collapsed"> <i class="fa fa-lg fa-plus-circle  txt-color-green"></i> <i class="fa fa-lg fa-minus-circle  txt-color-red"></i> Adicionar plantilla </a></h4>
                                </div>
                                <div id="collapseCotA4" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <!-- Inicio contenido-->
                            <section>
                                <div class="row">
                                    <label class="label col col-3">Nombre de plantilla</label>
                                    <div class="col col-9">
                                        <input readonly="" name="plant_cotA4" required="" type="text" placeholder="Se creará automaticamente" value="<?php  echo $empresa->plant_cotA4;  ?>"  class="form-control">  
                                    </div>
                                </div>
                            </section>

                            <section>
                                <div class="row">
                                    <label class="label col col-3">Plantilla .pdf</label>
                                    <div class="col col-9">
                                        <input type="file" accept=".pdf" class="btn btn-default"  name="plantilla_pdf">
                                        <?php 
                                         if (file_exists('file/plantilla/'.$empresa->plant_cotA4.'.pdf' )) {
                                         //if($empresa->plantillafact!=''){  ?>
                                            <a href="<?php  echo base_url().'file/plantilla/'.$empresa->plant_cotA4 ;?>.pdf" target="_blank" title="Ver imagen">Ver archivo</a>
                                        <?php }?> 
                                    </div>
                                </div>
                            </section>
                            <section>
                                <div class="row">
                                    <label class="label col col-3">Plantilla .php</label>
                                    <div class="col col-9">
                                        <input type="file" accept=".php" class="btn btn-default"  name="plantilla_php">  
                                        <?php  if (file_exists('application/modules/reporte/controllers/plantilla/'.$empresa->plant_cotA4.'.php' )) {
                                         //if($empresa->plantillafact!=''){  ?>
                                            <a href="<?php  echo base_url().'tablas/plantilla/downloadphp/'.$empresa->plant_cotA4 ;?>" target="_blank" title="Ver imagen">Ver archivo</a>
                                        <?php }?> 
                                    </div>
                                </div>
                            </section>
                             <!-- Fin Contenido-->                   
                                    </div>
                                </div>
                            </div>
             
                            
                            </fieldset> 
                            <footer>
                                
                                <!--Campos ocultos-->
                                <input type="hidden"  name="idempresa_corp" value="<?php  echo $empresa->idempresa_corp;  ?>"> 
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                                
                            </footer>

                            </div>
                        </div>
                        <!-- end widget content -->                        
                    </div>
                    <!-- end widget div -->                    
                </div>
                <!-- end widget -->
            </article>
             </form>
            <!-- Fin colummna 3 -->    


       
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
LinkPagina();

pageSetUp();
$('#displayprice').change(function() {
    selectpreciodefecto();
})
function selectpreciodefecto(){
    if($("#displayprice").val()>'1')
    { 
        $("#div_preciodefecto").show(300);     
    }else{
        $("#div_preciodefecto").hide(300); 
        $("#defaultprice").val('PUBLICO');               
    }
}
selectpreciodefecto();
function subirimagen(idtabla, nomimagen){     
    var url = "<?php  echo base_url() ?>tablas/Corporacion/mantSubirImagen/"+idtabla+"/"+nomimagen;
    $( "#div_ModalMant").load(url);
};
</script>
<style>
	 .select2-dropdown
	 {
		 width:400px !important;
	 }
 </style>
<script src="<?php  echo base_url(); ?>assets/js/plugin/summernote/summernote.min.js"></script>
<!-- <script src="<?php // echo base_url(); ?>assets/js/plugin/colorpicker/bootstrap-colorpicker.min.js"></script> -->
<script src="<?php  echo base_url(); ?>assets/js/bootstrap-colorpicker.min.js"></script>

   <script type="text/javascript">
        
            // DO NOT REMOVE : GLOBAL FUNCTIONS!
            
            $(document).ready(function() {
                
                pageSetUp();

                /*
                 * SUMMERNOTE EDITOR
                 */
                
                $('.summernote').summernote({
                    height: 100,
                    toolbar: [
                   // ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    //['fontname', ['fontname']],
                    //['color', ['color']],
                    //['para', ['ul', 'ol', 'paragraph']],
                    //['height', ['height']],
                    ['table', ['table']],
                    //['insert', ['link', 'picture', 'hr']],
                    ['view', ['fullscreen', 'codeview', 'help']]

                  ]
                });

                //$('#colorpicker-1').colorpicker();
                //color picker with addon
    $('.my-colorpicker2').colorpicker();
                    
            
            })

        </script> 