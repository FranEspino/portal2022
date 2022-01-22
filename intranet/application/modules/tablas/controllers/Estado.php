<?php 
class Estado extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("estado_model");
		
    }
    
    public function gridEstado(){
		
        $data['grid'] =  $this->estado_model->gridEstado();
		$data['titulotabla'] = 'Lista de estados';
        $this->load->view("gridEstado_view",$data);
    }   
 	
	public function mantEstadoForm($idestado = ''){	
		$data['estado'] = $this->estado_model->rowestado($idestado);
				if($idestado ==""){
			$data['titulofrm'] = "Agregar Estado";
		}else{
			$data['titulofrm'] = "Editar Estado";
			}
        $this->load->view("form_MantEstado_view",$data);
    }
	    public function mantEstado(){		 
		 $post['estado'] = $this->input->post('estado');
		
		 $x_post['estado_id'] = $this->input->post('estado_id');
		 $mensaje = '';
		 if ($x_post['estado_id']==''){
			$post['estado_id'] = $x_post['estado_id'];
			$this->estado_model->insertEstado($post);
			$mensaje = 'Estado Registrado';		
		 }else{
			$this->estado_model->updateEstado($x_post['estado_id'],$post);
			$mensaje = 'Estado actualizado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridEstado();
		    }
	
	public function eliminarEstado($idestado = ''){	    
		$idestado ='';
		$idestado = $this->input->post('idtabla');	
		if(strlen(trim($idestado))>0){
        $mensajeEliminacion = $this->estado_model->eliminarEstado($idestado);
		}
		//echo json_encode($mensajeEliminacion);
		echo json_encode('Eliminado');
    }	
 
}

?>
