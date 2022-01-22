<?php 
class Tipocomprobante extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("tipocomprobante_model");
		
    }    
    public function gridTipocomprobante(){
		
        $data['grid'] =  $this->tipocomprobante_model->gridTipocomprobante();
		$data['titulotabla'] = 'Lista de tipo de comprobantes';
        $this->load->view("gridTipocomprobante_view",$data);
    }   
 	
	public function mantTipocomprobanteForm($idtipocomprobante = ''){	
		$data['tipocomprobante'] = $this->tipocomprobante_model->rowTipocomprobante($idtipocomprobante);
				if($idtipocomprobante ==""){
			$data['titulofrm'] = "Agregar Registros";
		}else{
			$data['titulofrm'] = "Editar Registros";
			}
        $this->load->view("form_MantTipocomprobante_view",$data);
    }
	    public function mantTipocomprobante(){		 
		 $post['tipocomprobante'] = $this->input->post('tipocomprobante');
		
		 $x_post['id_tipocomprobante'] = $this->input->post('id_tipocomprobante');
		 $mensaje = '';
		 if ($x_post['id_tipocomprobante']==''){
			$post['id_tipocomprobante'] = $x_post['id_tipocomprobante'];
			$this->tipocomprobante_model->insertTipocomprobante($post);
			$mensaje = 'Tipo de comprobante Registrado';		
		 }else{
			$this->tipocomprobante_model->updateTipocomprobante($x_post['id_tipocomprobante'],$post);
			$mensaje = 'Tipo de comprobante actualizado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridTipocomprobante();
		    }
	
	public function eliminarTipocomprobante($idtipocomprobante = ''){	    
		$idtipocomprobante ='';
		$idtipocomprobante = $this->input->post('idtabla');	
		if(strlen(trim($idtipocomprobante))>0){
        	$mensajeEliminacion = $this->tipocomprobante_model->eliminarTipocomprobante($idtipocomprobante);
		}
		//echo json_encode($mensajeEliminacion);
		echo json_encode('Eliminado');
    }	
 
}

?>
