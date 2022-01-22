<?php 
class Profesiones extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("profesiones_model");
		
    }
    
    public function gridProfesiones(){
		
        $data['grid'] =  $this->profesiones_model->gridProfesiones();
		$data['titulotabla'] = 'Lista de Profesioness';
        $this->load->view("gridProfesiones_view",$data);
    }   
 	
	public function mantProfesionesForm($idcargo = ''){	
		$data['cargo'] = $this->profesiones_model->rowProfesiones($idcargo);
				if($idcargo ==""){
			$data['titulofrm'] = "Agregar Registros";
		}else{
			$data['titulofrm'] = "Editar Registros";
			}
        $this->load->view("form_MantProfesiones_view",$data);
    }
	    public function mantProfesiones(){		 
		 $post['nombre_profesion'] = $this->input->post('cargo');
		
		 $x_post['id_profesion'] = $this->input->post('id_profesion');
		 $mensaje = '';
		 if ($x_post['id_profesion']==''){ 
			$this->profesiones_model->insertProfesiones($post);
			$mensaje = 'Profesiones Registrado';		
		 }else{
			$this->profesiones_model->updateProfesiones($x_post['id_profesion'],$post);
			$mensaje = 'Profesiones actualizado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridProfesiones();
		    }
	
	public function eliminarProfesiones($idcargo = ''){	    
		$idcargo ='';
		$idcargo = $this->input->post('idtabla');	
		if(strlen(trim($idcargo))>0){
        $mensajeEliminacion = $this->profesiones_model->eliminarProfesiones($idcargo);
		}
		//echo json_encode($mensajeEliminacion);
		echo json_encode('Eliminado');
    }	
 
}

?>
