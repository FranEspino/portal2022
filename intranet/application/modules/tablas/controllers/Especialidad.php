<?php 
class Especialidad extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("especialidad_model");
		
    }    
    public function gridEspecialidad(){
		
        $data['grid'] =  $this->especialidad_model->gridEspecialidad();
		$data['titulotabla'] = 'Lista de Especialidades';
        $this->load->view("gridEspecialidad_view",$data);
    }   
 	
	public function mantEspecialidadForm($idespecialidad = ''){	
		$data['especialidad'] = $this->especialidad_model->rowEspecialidad($idespecialidad);
				if($idespecialidad ==""){
			$data['titulofrm'] = "Agregar Registros";
		}else{
			$data['titulofrm'] = "Editar Registros";
			}
        $this->load->view("form_MantEspecialidad_view",$data);
    }
	    public function mantEspecialidad(){		 
		 $post['especialidad'] = $this->input->post('especialidad');
		
		 $x_post['id_especialidad'] = $this->input->post('id_especialidad');
		 $mensaje = '';
		 if ($x_post['id_especialidad']==''){
			$post['id_especialidad'] = $x_post['id_especialidad'];
			$this->especialidad_model->insertEspecialidad($post);
			$mensaje = 'Especialidad Registrado';		
		 }else{
			$this->especialidad_model->updateEspecialidad($x_post['id_especialidad'],$post);
			$mensaje = 'Especialidad actualizado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridEspecialidad();
		    }
	
	public function eliminarEspecialidad($idespecialidad = ''){	    
		$idespecialidad ='';
		$idespecialidad = $this->input->post('idtabla');	
		if(strlen(trim($idespecialidad))>0){
        $mensajeEliminacion = $this->especialidad_model->eliminarEspecialidad($idespecialidad);
		}
		//echo json_encode($mensajeEliminacion);
		echo json_encode('Eliminado');
    }	
 
}

?>
