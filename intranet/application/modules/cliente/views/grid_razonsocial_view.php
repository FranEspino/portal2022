<?php  //$this->load->view('jquery.js'); ?> 
 
<script>
 	$(".editardato2").click(function(event){
        event.preventDefault();
        var url_editar = "<?php  echo base_url();  ?>contable_tablas/formRazonSocial/"+$(this).val();
        $("#div_ModalMant").load(url_editar);
    })
	
	function btnModificar(idrsocial){
		 
			var url_editar = "<?php  echo base_url();  ?>contable_tablas/formRazonSocial/"+idrsocial;        
			$("#div_ModalMant").load(url_editar);
    	 	
	}
	
	$("#btnnuevo").click(function(event){
        event.preventDefault();
        var url_editar = "<?php  echo base_url();  ?>contable_tablas/formRazonSocial/"+$(this).val();
        //$("#capa_produccion_area").html("<p class='loading'></p>");
        $("#div_ModalMant").load(url_editar);
    })   
	
	function x_fn_insertRS(){
		
		// x_idrs Es una variable Global que se crea en el formulario form_MantRazonsocial_view
		btneditar = '<button id="btneditar2_'+x_idrs+'" name="btneditar2_'+x_idrs+'" value="'+x_idrs+'" onClick="btnModificar('+x_idrs+')" class="btn btn-info btn-xs header-btn "><i class="fa fa-edit"></i></button>';
		
		var comboTipoRS = document.getElementById("rs_id_tiporazonsocial");
		nombreTipoRS = comboTipoRS.options[comboTipoRS.selectedIndex].text;	
	
		dTable.fnAddData([x_idrs, nombreTipoRS,$("#rs_razonsocial").val(),$("#rs_ruc").val(),$("#rs_dni").val(),$("#rs_direccion").val(),'',btneditar]);								 
	}
	function x_fn_updateRS(){
		 
		var comboTipoRS = document.getElementById("rs_id_tiporazonsocial");
		nombreTipoRS = comboTipoRS.options[comboTipoRS.selectedIndex].text;	
		//$('#d_0_'+x_idrs).html();		
		$('#d_1_'+x_idrs).html(nombreTipoRS);
		$('#d_2_'+x_idrs).html($("#rs_razonsocial").val());
		$('#d_3_'+x_idrs).html($("#rs_ruc").val());
		$('#d_4_'+x_idrs).html($("#rs_dni").val());
		$('#d_5_'+x_idrs).html($("#rs_direccion").val());
		
		// Ya no actualizar tabla por que se supone estando ahi hace clic
		//dTable.rows().invalidate().draw();
		 
	}
</script>
<!-- Modal -->
<div id="div_ModalMant">

</div><!-- /.modal -->    
<article class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
				
            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget jarviswidget-color-teal" id="wid-id-0" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-deletebutton="false">								
                <header>
                    <span class="widget-icon"> <i class="fa fa-book"></i> </span>
                    <h2>Razón Social (Proveedores / Clientes / Trabajadores)</h2>
                    <?php
                      //  if (in_array("con_tabla_razonsocial_registrar", $_SESSION['Ujj_privilegio'])) {  
                    ?>
                    <div class="widget-toolbar" role="menu">
                        <a rel="tooltip" data-original-title="Agregar Razón Social" class="btn btn-success bounceInLeft animated" id="btnnuevo"><i class="fa fa-plus"></i><span class="hidden-mobile"> Nuevo registro</span></a>
                    </div>
                    <?php
                     //   }                    
                    ?>

                </header> 

                <!-- widget div-->
                <div> 
                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box --> 
                    </div>
                    <!-- end widget edit box -->

                    <!-- widget content -->
                    <div class="widget-body no-padding">
                    
                  <!--   <div class="widget-body-toolbar">
                    <div class="row">
                        <div class="col-xs-3 col-sm-12 col-md-12 col-lg-12"> 
                          <a rel="tooltip" data-original-title="Agregar" class="btn btn-success btn-md pull-right" id="btnnuevo"><i class="fa fa-plus"></i><span class="hidden-mobile"> Nuevo registro</span></a>
                        </div> 
                        </div>
                    </div> -->

                    <table id="dt_basic" class="table mitabla  thead tr table-bordered table-hover" width="100%">
                        <thead>	
                            <tr class="mitabla thead tr">  
                                <th>N.</th>
								<th>ID RS</th>
                                <th>Tipo</th>
                                <th>Razón Social</th>
                                
                                <th>RUC</th>
                                <th>DNI</th>
                                <th>Dirección</th>
                                <th>Ubigeo</th>
                                <th>-</th>
                            </tr>
                            </thead>
                        <tbody>
                          
                         <?php  if ($grid) { ?>
                         <?php  $i=1;?>
                         <?php  foreach ($grid as $fila) {
                             $idrs = $fila->id_razonsocial;  ?>
                            <tr>
                                <th id="d_0_<?php echo $idrs;?>"><?php  echo $i; ?></th>
								<td id="d_8_<?php echo $idrs;?>"><?php  echo $fila->id_razonsocial; ?></td>
                                <td id="d_1_<?php echo $idrs;?>"><?php  echo $fila->tiporazonsocial; ?></td>
                                <td id="d_2_<?php echo $idrs;?>"><?php  echo $fila->razonsocial; ?></td>
                                <td id="d_3_<?php echo $idrs;?>"><?php  echo $fila->ruc; ?></td>
                                <td id="d_4_<?php echo $idrs;?>"><?php  echo $fila->dni; ?></td>
                                <td id="d_5_<?php echo $idrs;?>"><?php  echo $fila->direccion; ?></td>
                                <td id="d_6_<?php echo $idrs;?>"><?php  echo $fila->ubigeo; ?></td>
                                <td id="d_7_<?php echo $idrs;?>">  
                                <?php
                                   // if (in_array("con_tabla_razonsocial_editar", $_SESSION['Ujj_privilegio'])) {  
                                ?>
                                    <button id="btneditar2_<?php  echo $fila->id_razonsocial; ?>" name="btneditar2_<?php  echo $fila->id_razonsocial; ?>" value="<?php  echo $fila->id_razonsocial; ?>" class="editardato2 btn btn-info btn-xs header-btn "><i class="fa fa-edit"></i></button>
                                <?php
                                  //  }                    
                                ?>
                                </td>                                                    
                            </tr>
                            <?php  $i++; ?>
                        <?php  } ?>
                    <?php  } ?>
                        
                        </tbody>
                    </table>

                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->
                                           </div>
            <!-- end widget -->
 </article>
 <?php  $this->load->view('tablas.js'); ?>