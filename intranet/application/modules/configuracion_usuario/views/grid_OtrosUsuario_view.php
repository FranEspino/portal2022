<?php  //include('ribbon.php'); ?>
<div id="content">

    <div class="row vertical-align">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <h1 class="page-title" >
                <i class="fa fa-user fa-fw "></i>
                Usuarios
            </h1>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
         <div class="botones hidden-print">

            <!--<a href="#" rel="tooltip" data-original-title="Descargar" class="btn btn-warning btn-md pull-right "><i class="glyphicon glyphicon-download-alt"></i> Descargar</a> -->
            <a rel="tooltip" data-original-title="Agregar" data-placement="left" class="btn btn-success btn-md pull-right "  id="btnnuevo"><i class="glyphicon glyphicon-plus" ></i> Nuevo</a>
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
                        	<i class="fa fa-list"></i> <?php  echo $titulotabla ; ?>
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
                                                    <th data-hide="phone">ID</th>
                                                    <th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Username</th>
                                                    <th data-hide="phone"><i class="fa fa-fw fa-male text-muted hidden-md hidden-sm hidden-xs"></i> Nombre Usuario</th>
                                                    <th><i class="fa fa-fw fa-envelope-o text-muted hidden-md hidden-sm hidden-xs"></i> Correo Electronico</th>
                                                     <th data-hide="phone,tablet"><i class="fa fa-fw fa-group text-muted"></i> Perfil</th>
                                                 
                                                  

                                                    <th data-hide="phone,tablet"><i class="fa fa-fw fa-list-alt text-muted hidden-md hidden-sm hidden-xs"></i> Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                             <?php  if ($grid) { ?>
                                             <?php  $i=1;?>
                                             <?php  foreach ($grid as $fila) {

                                                ?>
                                                <tr id="<?php echo $fila->id_cuenta; ?>">
                                                    <td><?php  echo $i; ?></td>
                                                    <td><?php  echo $fila->dni; ?></td>
                                                    <td><?php  echo $fila->nombre.' '.$fila->apellido; ?></td>
                                                    <td><?php  echo $fila->correo; ?></td>
                                                    <td><?php  echo $fila->tipocuenta; ?></td>

                                                  
 

                                        <td class="pull-right opciones"> 
                                        <button  id="editarpersona_<?php  echo $fila->id_cuenta; ?>"  data-toggle="modal" href="#myModal" name="editarpersona_<?php  echo $fila->id_cuenta; ?>" value="<?php  echo $fila->id_cuenta; ?>" class="editarpersona btn btn-primary btn-circle hidden-print"  data-placement="left" rel="tooltip" data-original-title="Editar"><i class="glyphicon glyphicon-user"></i></button>
                                        <button  id="editardato_<?php  echo $fila->id_cuenta; ?>"  data-toggle="modal" href="#myModal" name="editardato_<?php  echo $fila->id_cuenta; ?>" value="<?php  echo $fila->id_cuenta; ?>" class="hidden editardato btn btn-primary btn-circle hidden-print"  data-placement="left" rel="tooltip" data-original-title="Editar"><i class="glyphicon glyphicon-edit"></i></button>
                                        <a href="javascript:void(0);" onclick="elim_reg(<?php echo $fila->id_cuenta;?>);" class="hidden btn btn-danger btn-circle" rel="tooltip" data-placement="bottom" title="Eliminar" ><i class="glyphicon glyphicon-trash"></i></a>
                                        </td>
                                                </tr>
                                                <?php  $i++; ?>
                        <?php  } ?>
                    <?php  } ?>

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

<script>
pageSetUp();
function eliminar_token_pc(id,username){
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('Configuracion_usuario/update_token_pc'); ?>",
        data:{
          token_pc : '',
          id_cuenta:id
        },
        success: function (res){
        var persona = JSON.parse(localStorage.getItem("USUARIO"+username+""));
          $.smallBox({
            title : '<i class="botClose fa fa-times"></i> Usuario Activado',
            content : 'Puedes utilizar en cualquier equipo',
            color : "#00a65a",
            timeout : 4500,
            icon : "fa fa-exclamation-triangle swing animated"
          });
          $("#btn_token_"+id+"").hide();
         }
    });
}
function elim_reg(id){
 var texto  = $("#" + id).find("td")[1].innerHTML.trim();

 Swal.fire({
  title: 'Estás seguro eliminar?',
  text: texto,
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Sí, eliminar'
}).then((result) => {

  if (result.value) {
    Swal.fire(
      'Correcto!',
      'Se está eliminado',
      'success'
    )

	var idtabla = id;
	if(idtabla.length<1){
		//event.preventDefault();
		$.smallBox({
			title : '<i class="botClose fa fa-times"></i> Aviso !',
			content : "No hay registro para anular.<br>*Si el problema continua, comuníquese con el programador",
			color : "#dd4b39",
			timeout : 3000,
			icon : "fa fa-exclamation-triangle swing animated"
		});
	}else{
		$('#btn_si_eliminar').html('Eliminan...');
		$("#btn_si_eliminar").attr("disabled","disabled");
		$.ajax({
			type: "post",
			url: "<?php  echo base_url() ?>configuracion_usuario/eliminarUsuario", cache: false,
			data:'idtabla='+idtabla,
			success: function(response){

					var obj_mensaje = JSON.parse(response);

					if(obj_mensaje.length>0){

						if(obj_mensaje.substr(0, 9) == 'Eliminado')
						{
							var index = idtabla;
							$("#" + index).remove();

							//event.preventDefault();
							$.smallBox({
								title : '<i class="botClose fa fa-times"></i> Aviso !',
								content :'Se ha eliminado el registro de forma satisfactoria',
								color : "#008d4c",
								timeout : 2500,
								icon : "fa fa-trash-o swing animated"
							});
						}else{
							event.preventDefault();
							$.smallBox({
								title : '<i class="botClose fa fa-times"></i> Aviso !',
								content : obj_mensaje,
								color : "#dd4b39",
								timeout : 2500,
								icon : "fa fa-exclamation-triangle swing animated"
							});
						}
					}
			 }
		});
	}
}
})
}


     $(".editardato").click(function(event){
          event.preventDefault();
        var id_cuenta = $(this).val();
        var url = "<?php  echo base_url() ?>configuracion_usuario/editUsuario";
    //  $( "#myModal" ).dialog('open');
        $( "#myModal" ).load(url,{
              id_cuenta: id_cuenta
        });
       // $("#capa_tabulador_reporte").load(url_editar);
    })

    $(".editarpersona").click(function(event){
          event.preventDefault();
        var id_cuenta = $(this).val();
        var url = "<?php  echo base_url() ?>configuracion_usuario/editPersona";
    //  $( "#myModal" ).dialog('open');
        $( "#myModal" ).load(url,{
              id_cuenta: id_cuenta
        });
       // $("#capa_tabulador_reporte").load(url_editar);
    })

    $("#btnnuevo").click(function(event){
        event.preventDefault();
        var url_regresar = "<?php  echo base_url() ?>configuracion_usuario/newOtroUsuario";
        $( "#div_ModalMant" ).load(url_regresar,{
        //    id_cuenta: id_cuenta
        });
        //$("#capa_tabulador_sistema").html("<p class='loading'></p>");
        //$("#capa_tabulador_sistema").load(url_regresar);
    })




	 $(".editardatoX").click(function(event){
		event.preventDefault();
	    var id_cuenta = $(this).val();
        var url = "<?php  echo base_url() ?>configuracion_usuario/mantUsuarioForm/"+id_cuenta;
        $( "#div_ModalMant" ).load(url);
    })

	$("#btnnuevoA").click(function(event){
        event.preventDefault();
        var urlnuevo = "<?php  echo base_url() ?>configuracion_usuario/mantUsuarioForm";
		$( "#div_ModalMant" ).load(urlnuevo );
    })

    $(".editarpriv").click(function(event){
        event.preventDefault();
        var id_cuenta = $(this).val();
        var url = "<?php  echo base_url() ?>configuracion_usuario/mantPrivilegioForm/"+id_cuenta;
        $( "#div_ModalMant" ).load(url);
    })


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


 } );
</script>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
</div><!-- /.modal -->
