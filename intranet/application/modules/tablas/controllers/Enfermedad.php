<?php 
class Enfermedad extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("enfermedad_model");
		
    }
    
    public function gridEnfermedad(){
		
        $data['grid'] =  $this->enfermedad_model->gridEnfermedad();
		$data['titulotabla'] = 'Lista de enfermedades';
        $this->load->view("gridEnfermedad_view",$data);
    }   
 	
	public function mantEnfermedadForm($idenfermedad = ''){	
		$data['enfermedad'] = $this->enfermedad_model->rowenfermedad($idenfermedad);
				if($idenfermedad ==""){
			$data['titulofrm'] = "Agregar Enfermedad";
		}else{
			$data['titulofrm'] = "Editar Enfermedad";
			}
        $this->load->view("form_MantEnfermedad_view",$data);
    }
	    public function mantEnfermedad(){		 
		 $post['enfermedad'] = $this->input->post('enfermedad');
		
		 $x_post['enfermedad_id'] = $this->input->post('enfermedad_id');
		 $mensaje = '';
		 if ($x_post['enfermedad_id']==''){
			$post['enfermedad_id'] = $x_post['enfermedad_id'];
			$this->enfermedad_model->insertEnfermedad($post);
			$mensaje = 'Enfermedad Registrado';		
		 }else{
			$this->enfermedad_model->updateEnfermedad($x_post['enfermedad_id'],$post);
			$mensaje = 'Enfermedad actualizado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridEnfermedad();
		    }
	
	public function eliminarEnfermedad($idenfermedad = ''){	    
		$idenfermedad ='';
		$idenfermedad = $this->input->post('idtabla');	
		if(strlen(trim($idenfermedad))>0){
        $mensajeEliminacion = $this->enfermedad_model->eliminarEnfermedad($idenfermedad);
		}
		//echo json_encode($mensajeEliminacion);
		echo json_encode('Eliminado');
    }	
 
}

?>
