<?php
    $editar = false;
    if(isset($caja)){
        if($caja){                           
            $editar = true;
        }
    } 
?>
<?php  $this->load->view('tablas/jquery.js'); ?>
<script>
 $(function(){        
        var options4 = {
            target:        '#div_capa_pagina', 
            beforeSubmit:  showRequest,  
            success:       showResponse  
        };
        $('#frm_asistencia').ajaxForm(options4);               
        //$( "#tabuladores_ipad" ).tabs();          
    });    
    function showRequest(formData, jqForm) {
        $('#btnguardar').html('Guardando...');   
        $("#btnguardar").attr("disabled","disabled"); 
    }
    function showResponse(responseText, statusText)  {}	 
</script>
<br>
<div class="row " style="margin: unset;">     
    <!-- widget grid -->
    <section id="widget-grid" class="">        
        <!-- row -->
        <div class="row" style="margin: unset;">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 text-center">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-teal" id="wid-id-0" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-deletebutton="false">	
                    <header>
                        <span class="padding-gutter titulo-jarvis">
                                            	    
                                <i class="fa fa-clock-o"></i> Asistencia
                        </span>	
                    </header>
                    <!-- widget div-->
                    <div>
                        <!-- widget content -->
                        <div class="widget-body no-padding text-center"> 
                <form id="frm_asistencia" name="frm_caja" action="<?php echo base_url(); ?>configuracion_usuario/insertAsistencia" method="post"> 
              <div class="well well-sm well-light col-sm-6 col-sm-offset-3 text-center" style="background-color:#eeeeee">	
              			<div class="text-primary"><strong>Local</strong>: <?php echo $this->session->userdata('nombre_ptoventa'); ?></div>
                            <div class="form-group ">
                                 
                                <label class="text-primary" title="Fecha y hora del servidor">Fecha</label>
                                
                                <div class="input-group">
                                    <input class="form-control txt-color-blueDark" id="fch_asistencia"  name="fch_asistencia" readonly="" maxlength="10" required value="<?php echo date("Y-m-d");?>"  type="date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                                <br>
                                <label class="text-primary" title="">Comentario</label>
                                    <input class="form-control txt-color-blueDark" id="nota"  name="nota" type="text" maxlength="250" placeholder="Comentario..." >
                            </div>    
                             
                         <button type="submit" id="btnguardar" name="btnguardar"  class="btn btn-primary" title="Grabar" rel="tooltip" ><br>
                       <span class="glyphicon glyphicon-ok"></span> <br> &nbsp;&nbsp;GRABAR&nbsp;&nbsp; <br>ASISTENCIA
                       <br> <br> 
                                    </button>

                       
              </div>
			  </form>

                        </div>
                        <!-- end widget content -->
                    </div>
                    <!-- end widget div -->
                </div>
                <!-- end widget -->		
            </article>
            <!-- WIDGET END -->
        </div>				
        <!-- end row -->   
        
    </section>
    <!-- end widget grid -->

    <section > 
        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-1 text-center">
            <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Mis marcaciones</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table id="dt_basic" class="table table-condensed table-striped table-bordered table-hover">
                <thead> <tr>
                  <th style="width: 10px">#</th>
                  <th>Tipo</th>
                  <th>IP</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                  <th>Nota</th>
                </tr></thead>
                <tbody>
               <?php  if ($gridasistencia) {
                        $i=1;
                        foreach ($gridasistencia as $fila) { ?>
                     <tr <?php  if($fila->tipo=='Ingreso'){ echo 'class="info"'; } ?> id="<?php echo $fila->id_asistencia; ?>">
                        <td><?php  echo $i; ?></td>
                        <td><?php  echo $fila->tipo  ; ?></td>
                        <td><?php  echo $fila->ip ; ?></td>
                        <td><?php  echo $this->help_date->fechaUsuario($fila->fch_asistencia); ?></td>
                        <td><?php  echo $fila->hr_asistencia  ; ?></td>
                        <td><?php  echo $fila->nota  ; ?></td>
                    </tr> 
                   <?php
                   $i++; 
                   }
                 } ?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
    </section>
    
<!-- Modal -->
<div id="div_ModalMant">
</div><!-- /.modal -->                    
    
</div> 
 
<!--================================================== -->	
<script>
pageSetUp();
  
</script>
<script type="text/javascript" language="javascript" class="init">
 $(document).ready(function() {
  $('#dt_basic').dataTable({
                    "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
                        "t"+
                        "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
                    "autoWidth" : true,
                    "oLanguage": {
                        "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
                    }
    });   
 });
</script>
 