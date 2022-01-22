<?php 
class Laboratorio extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("laboratorio_model");		
    }
    
    public function gridLaboratorio(){
		
        $data['grid'] =  $this->laboratorio_model->gridLaboratorio();
		$data['titulotabla'] = 'Lista de Laboratorios';
        $this->load->view("gridLaboratorio_view",$data);
    }   
 	
	public function mantLaboratorioForm($idlaboratorio = ''){	
		$data['laboratorio'] = $this->laboratorio_model->rowLaboratorio($idlaboratorio);
				if($idlaboratorio ==""){
			$data['titulofrm'] = "Agregar Registros";
		}else{
			$data['titulofrm'] = "Editar Registros";
			}
        $this->load->view("form_MantLaboratorio_view",$data);
    }
	    public function mantLaboratorio(){		 
		 $post['laboratorio'] = $this->input->post('laboratorio');
		
		 $x_post['laboratorio_id'] = $this->input->post('laboratorio_id');
		 $mensaje = '';
		 if ($x_post['laboratorio_id']==''){
			$post['laboratorio_id'] = $x_post['laboratorio_id'];
			$this->laboratorio_model->insertLaboratorio($post);
			$mensaje = 'Laboratorio Registrado';		
		 }else{
			$this->laboratorio_model->updateLaboratorio($x_post['laboratorio_id'],$post);
			$mensaje = 'Laboratorio actualizado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridLaboratorio();
		    }
	
	public function eliminarLaboratorio($idlaboratorio = ''){	    
		$idlaboratorio ='';
		$idlaboratorio = $this->input->post('idtabla');	
		if(strlen(trim($idlaboratorio))>0){
        $mensajeEliminacion = $this->laboratorio_model->eliminarLaboratorio($idlaboratorio);
		}
		//echo json_encode($mensajeEliminacion);
		echo json_encode('Eliminado');
    }	
 
}

?>
