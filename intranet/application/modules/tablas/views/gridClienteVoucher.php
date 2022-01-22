<?php  //include('ribbon.php'); ?>
<div id="content">			
    <div class="row ">     
        <div class="col-md-8">
            <h1>
                <i class="fa fa-edit fa-fw "></i> Clientes De Pago Voucher
            </h1>   
        </div>        
        <div class="col-md-4 ">   
         <div class="padding-7 hidden-print">      
            <a href='javascript:window.print(); void 0;' rel="tooltip" data-original-title="Imprimir" class="btn btn-default btn-md pull-right " ><i class="glyphicon glyphicon-print"></i> Imprimir</a> 
            <a href="#" rel="tooltip" disabled data-original-title="Descargar" class="btn btn-warning btn-md pull-right "><i class="glyphicon glyphicon-download-alt"></i> Descargar</a>
         </div>
        </div>	 
    </div>
     
    <!-- widget grid -->
    <section id="widget-grid" class="">        
        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-teal" id="wid-id-0" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-deletebutton="false">	
                    <header>
                        <span class="padding-gutter titulo-jarvis">
                        	<i class="fa fa-table"></i> <?php  echo $titulotabla ; ?> 
                        </span>	
                    </header>
                    <!-- widget div-->
                    <div>
                        <!-- widget content -->
                        <div class="widget-body no-padding ">
                        <div class="table-responsive">
                            <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                            	<thead>			                
                                    <tr>
                                        <th>N.</th>
                                        <!-- <th>RUC</th>-->
                                      <!--  <th><iclass="fa fa-fw fa-user text-muted"></i>Proveedor</th>-->
                                         <th>Monto Pagado</th>
                                         <th>Captura de Pago</th>
                                         <th>Fecha de Pago</th>
                                         <th>Producto</th>
                                          <th>Estado</th>
                                          <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php  
                                    $resta = 0;


                                if ($grid) {
										$i=1;
										foreach ($grid as $fila) { 

                                        $dato1 = $fila->monto;
                                        $dato2 = $fila->totalventa;
                                        $dato3 = $dato2 - $dato1;
                                            ?>

                                     <tr id="<?php echo $fila->id_voucher; ?>">
                                        <td style="width: 20px;"><?php  echo $i; ?></td>
                                     <!--   <td><?php  //echo $fila->proveedor_ruc; ?></td>-->
                                      <!--  <td><?php  //echo $fila->proveedor; ?></td>-->
                                        <td align="center" ><?php  
                                          if($dato1== $dato2){?>
                                         <span class=' padding-5 label label-success '><?php echo 'Pagó: S/.'.$fila->monto;?></span>
                                         <?php }elseif($dato2 > $dato1){ ?>
                                          <span class='padding-5 label label-warning '>     
                                          <?php echo 'Resta: S/.'.$dato3.'.00';?></span></br>
&nbsp;
                                      </br>
                                          <span class=' padding-5 label label-danger'>  
                                          <?php echo'De: S/.'.$dato2 ;}?></span>
                                           </td>
                                        
                                        <td align="center"><!-- Button trigger modal -->
                                            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModalCenter<?php echo $fila->id_voucher; ?>">
                                              Ver Voucher
                                            </button>
<div class="modal fade" id="exampleModalCenter<?php echo $fila->id_voucher; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalCenterTitle">Comprobante de Pago </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img width="60%" src="<?php echo base_url('file/recibos_voucher/'.$fila->capturapago);?>" >
      </div>
    </div>
  </div>
</div>
                                            <?php if ($fila->estado == "Aceptado"){ ?>
                                               <button style="display : none" id="btn_editardato" name="editardato<?php  echo $fila->id_voucher ; ?>" value="<?php  echo $fila->id_voucher ; ?>" class="editardato btn btn-primary btn-circle"  data-placement="left" rel="tooltip" data-original-title="Editar"><i class="glyphicon glyphicon-edit"></i></button> 
                                            <?php }  ?>

                                            <!--<img width="10%" src="<?  //php echo base_url('file/recibos_voucher/'.$fila->capturapago);?>" class="zoom">-->

                                        </td>
                                        <td style="width: 220px;"><?php  echo $fila->fecharegistro; ?></td>
                                        <td style="width: 270px;"><?php  echo $fila->detalleproducto; ?></td>
                                        <td align="center" style="width: 60px;"><?php if ($fila->estado=='Pendiente' || $fila->estado=='pendiente') {?> 
                                            <span class='center-block padding-5 label label-info'><?php echo $fila->estado ?></span>
                                            <?php   }elseif($fila->estado=='Error' || $fila->estado=='error'){ ?>
                                              <span class='center-block padding-5 label label-danger'><?php echo $fila->estado ?></span>
                                              <?php   }elseif($fila->estado=='Aceptado' || $fila->estado=='aceptado'){ ?>
                                              <span class='center-block padding-5 label label-success'><?php echo $fila->estado ?></span>
                                            <?php  }else{ ?>
                                            <span class='center-block padding-5 label label-danger'><?php echo $fila->estado ?></span>  
                                            <?php  } ?>
                                           </td>
                                          
                                        <td align="center" style="width: 30px;">
                                            <?php if ($fila->estado == "Pendiente"){ ?>
                                               <button id="pagar_voucher_<?php  echo $fila ->ventas_id ?>"" class="pagar_voucher" 
                                                value="<?php echo $fila->ventas_id ?> " ><i class="glyphicon glyphicon-edit"> <a href="<?php echo base_url() ?>tablas/clientevoucher/gridclientevoucher" ></a> </i></button> 
                                            <?php }  ?>
                                        <!--<?php if ($fila->estado == "Error" || $fila->estado == "Aceptado"){ ?>
                                               <button  id="btn_editardato" name="editardato<?php  echo $fila->id_voucher ; ?>" value="<?php  echo $fila->id_voucher ; ?>" class="editardato btn btn-primary btn-circle"  data-placement="left" rel="tooltip" data-original-title="Editar"><i class="glyphicon glyphicon-edit"></i></button> 
                                            <?php }  ?>-->
                                        </td>

                                    </tr>
    
                                   <?php
								   $i++; 
								   }
								 } ?>
                                </tbody>
                            </table>
                        </div>
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
    
<!-- Modal -->
<div id="div_ModalMant">
</div><!-- /.modal -->                    
    
</div> 
  
<!--================================================== -->	
<script type="text/javascript" language="javascript" class="init">


   $(".pagar_voucher").click(function(event){
       event.preventDefault();
       var url_editar = "<?php  echo base_url () ?>caja_cancelacion/pagarComprobanteCredito/"+$(this).val();
       $("#div_capa_pagina").load(url_editar);
   }); 
   


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
 