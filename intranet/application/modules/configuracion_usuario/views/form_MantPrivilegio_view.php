<script> 
$(function(){        
 
      
        $('#ModalMante').modal('show');
        $('#btnnuevo').attr("disabled", false); 
        $('.editardato').attr("disabled", false);

});
</script>   
<style>
.material-switch > input[type="checkbox"] {
    display: none;   
}

.material-switch > label {
    cursor: pointer;
    height: 0px;
    position: relative; 
    width: 40px;  
}

.material-switch > label::before {
    background: rgb(0, 0, 0);
    box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
    border-radius: 8px;
    content: '';
    height: 16px;
    margin-top: -8px;
    position:absolute;
    opacity: 0.3;
    transition: all 0.4s ease-in-out;
    width: 40px;
}
.material-switch > label::after {
    background: rgb(255, 255, 255);
    border-radius: 16px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
    content: '';
    height: 24px;
    left: -4px;
    margin-top: -8px;
    position: absolute;
    top: -4px;
    transition: all 0.3s ease-in-out;
    width: 24px;
}
.material-switch > input[type="checkbox"]:checked + label::before {
    background: inherit;
    opacity: 0.5;
}
.material-switch > input[type="checkbox"]:checked + label::after {
    background: inherit;
    left: 20px;
}
</style>
 
<div class="modal fade in" id="ModalMante" tabindex="-1" role="dialog"  > 
<form id="frm_mant" class="" name="frm_usuario" action="#" method="post">
<div class="modal-dialog modal-lg ui-front">
    <div class="modal-content">
        <div class="modal-header modal-header-warning "  >               
            <button type="button" class="close btn btn-circle" data-dismiss="modal" aria-hidden="true">
                &times;
            </button>
            <h3 class="modal-title " id="myModalLabel"><i class="fa fa-wrench"></i> Privilegios del usuario</h3>
        </div>
        <div class="modal-body padding-7"> 


    <div id="content">          
 
           
                                <div class="row">                                               
                                     
                                    <div class="col-sm-8"> 
                                       <strong> Nombre: </strong><?php echo $usuario->nombre_usuario.' | <strong>Usuario: </strong>'.$usuario->username;?>
                                    </div>
                                     
                                    <div class="col-sm-4 text-right ">  
                                         
                                                            
                                    </div>                                              
                                </div>  
                       
                     
              
              <div class="card no-margin no-padding">
                         
                <div class="material-datatables">
                    <table id="dt_cargo" class="table display table-hover" width="100%">
                        <thead>                         
                            <tr data-background-color="orange" class="font-xs">
                                        <th></th>
                                        <th>N.</th>
                                        <th><i class="fa fa-fw fa-home text-muted"></i>Privilegio</th>
                                        <th>Nivel</th> 
                                        <th style=" width:45px; min-width:45px !important" class="hidden-print"><i class="fa fa-fw fa-sliders"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php  if (isset($privilegio)) {
                                        $i=1;
                                        foreach ($privilegio as $fila) { 
                                            if(strlen($fila->numposicion)==1){
                                            ?>

                                    <tr id="pc_<?php echo $fila->idprivilegio; ?>" class="text-primary">
                                        <?php }else if(strlen($fila->numposicion)<5){ ?>
                                    <tr id="pc_<?php echo $fila->idprivilegio; ?>" class="text-info">
                                        <?php }else{?>
                                    <tr id="pc_<?php echo $fila->idprivilegio; ?>" class="">
                                        <?php }?>
                                        <td></td>

                                        <th><?php  echo $fila->numposicion; ?></th>
                                        <td><?php  echo $fila->descprivilegio; ?></td>
                                        <td><?php  echo $fila->nivel; ?></td>                                         
                                        <td class="pull-right opciones hidden-print">
                                        <div class="material-switch">
                            <input  id="est_privilegio<?php echo $fila->idprivilegio; ?>" <?php if (in_array($fila->nomcontrol, $PrivUser)) {    echo "checked"; }?> name="checkbox[<?php echo $fila->idprivilegio; ?>]" type="checkbox" onclick="permiso(<?php echo $fila->idprivilegio; ?>);" value="<?php echo $fila->idprivilegio; ?>"/>
                            <label for="est_privilegio<?php echo $fila->idprivilegio; ?>" class="label-warning"></label>
                        </div>
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
            </div>

            <footer class="text-right">
                               
                                <button type="button" class="btn btn-default " data-dismiss="modal">
                                    Cancelar
                                </button>

                            </footer>

        </div><!-- /.body-->


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
   </form> 
</div><!-- /.modal -->
<!-- Modal -->
<div id="div_ModalCargo" >
</div><!-- /.modal -->                    
    
<?php
//  $this->load->view('usuario/mi-script.php');
?>
 
<script>
 
 
function permiso(id){  
    var estado = "";    
    if( $("#est_privilegio"+id).prop('checked') ) {
        estado = 1;
    }else{
        estado = 0;
    }   
      
    $.ajax({ 
        type: "post",
        url: "<?php  echo base_url() ?>configuracion_usuario/updatePermiso", cache: false, 
        data:{
            idprivilegio:id,
            estado:estado,
            idusuario   : <?php echo $usuario->idusuario;?>
        },
        success: function(response){    
                                
                var obj_mensaje = JSON.parse(response); 
                                
                if(obj_mensaje.length>0){                         
                    if(obj_mensaje.substr(0, 8) == 'Activado')
                    {                               
                        $.smallBox({
                                title : '<i class="botClose fa fa-times"></i> Aviso !',
                                content :'Se activo el privilegio de forma satisfactoria',
                                color : '#739E73',
                                timeout : 2000,
                                icon : 'fa fa-check swing animated'
                            }); 
                    }else{
                        event.preventDefault();  
                        $.smallBox({
                            title : '<i class="botClose fa fa-times"></i> Aviso !',
                            content : 'Se deshabilitó el privilegio de forma satisfactoria',
                            color : "#e08e0b",
                            timeout : 2500,
                            icon : "fa fa-info-circle swing animated"
                        }); 
                        
                    }                                               
                }       
         }
    }); 
  
}
</script> 
<script type="text/javascript" language="javascript" class="init">
 $(document).ready(function() {
  $('#dt_cargo').dataTable({ 
                    "oLanguage": {
                        "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i> Buscar:</span>'                      
                    }
    });    
 });
</script>
