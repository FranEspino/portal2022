<?php 
class Departamento extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("departamento_model");
		
    }
    
    public function gridDepartamento(){
		
        $data['grid'] =  $this->departamento_model->gridDepartamento();
		$data['titulotabla'] = 'Lista de materiales';
        $this->load->view("gridDepartamento_view",$data);
    }   
 	
	public function mantDepartamentoForm($iddepartamento = ''){	
		$data['departamento'] = $this->departamento_model->rowDepartamento($iddepartamento);
				if($iddepartamento ==""){
			$data['titulofrm'] = "Agregar Registros";
		}else{
			$data['titulofrm'] = "Editar Registros";
			}
        $this->load->view("form_MantDepartamento_view",$data);
    }
	    public function mantDepartamento(){		 
		 $post['departamento'] = $this->input->post('departamento');
		
		 $x_post['departamento_id'] = $this->input->post('departamento_id');
		 $mensaje = '';
		 if ($x_post['departamento_id']==''){
			$post['departamento_id'] = $x_post['departamento_id'];
			$this->departamento_model->insertDepartamento($post);
			$mensaje = 'Departamento Registrado';		
		 }else{
			$this->departamento_model->updateDepartamento($x_post['departamento_id'],$post);
			$mensaje = 'Departamento actualizado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridDepartamento();
		    }
	
	public function eliminarDepartamento($iddepartamento = ''){	    
		$iddepartamento ='';
		$iddepartamento = $this->input->post('idtabla');	
		if(strlen(trim($iddepartamento))>0){
        $mensajeEliminacion = $this->departamento_model->eliminarDepartamento($iddepartamento);
		}
		//echo json_encode($mensajeEliminacion);
		echo json_encode('Eliminado');
    }	
 
}

?>
