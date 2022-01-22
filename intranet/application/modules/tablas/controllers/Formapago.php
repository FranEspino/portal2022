<?php 
class Formapago extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("formapago_model");		
    }
    
    public function gridFormapago(){
		
        $data['grid'] =  $this->formapago_model->gridFormapago();
		$data['titulotabla'] = 'Lista de Formas de Pago';
        $this->load->view("gridFormapago_view",$data);
    }   
 	
	public function mantFormapagoForm($idformapago = ''){	
		$data['formapago'] = $this->formapago_model->rowformapago($idformapago);
				if($idformapago ==""){
			$data['titulofrm'] = "Agregar Forma de Pago";
		}else{
			$data['titulofrm'] = "Editar Forma de Pago";
			}
        $this->load->view("form_MantFormapago_view",$data);
    }
	
	public function mantFormapago(){		 
		 $post['formapago'] = $this->input->post('formapago');		
		 $x_post['formapago_id'] = $this->input->post('formapago_id');
		 $mensaje = '';
		 if ($x_post['formapago_id']==''){
			$post['formapago_id'] = $x_post['formapago_id'];
			$this->formapago_model->insertFormapago($post);
			$mensaje = 'Registrado';		
		 }else{
			$this->formapago_model->updateFormapago($x_post['formapago_id'],$post);
			$mensaje = 'Actualizado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridFormapago();
		    }
	
	public function eliminarFormapago($idformapago = ''){	    
		$idformapago ='';
		$idformapago = $this->input->post('idtabla');	
		if(strlen(trim($idformapago))>0){
        $mensajeEliminacion = $this->formapago_model->eliminarformapago($idformapago);
		}
		//echo json_encode($mensajeEliminacion);
		echo json_encode('Eliminado');
    }	
 
}

?>
