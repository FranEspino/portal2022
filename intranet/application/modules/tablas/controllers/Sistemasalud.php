<?php 
class Sistemasalud extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("sistemasalud_model");
		
    }
    
    public function gridSistemasalud(){
		
        $data['grid'] =  $this->sistemasalud_model->gridSistemasalud();
		$data['titulotabla'] = 'Lista de Sistemas de Salud';
        $this->load->view("gridSistemasalud_view",$data);
    }   
 	
	public function mantSistemasaludForm($idsistemasalud = ''){	
		$data['sistemasalud'] = $this->sistemasalud_model->rowsistemasalud($idsistemasalud);
				if($idsistemasalud ==""){
			$data['titulofrm'] = "Agregar Sistemas de Salud";
		}else{
			$data['titulofrm'] = "Editar Sistemas de Salud";
			}
        $this->load->view("form_MantSistemasalud_view",$data);
    }
	    public function mantSistemasalud(){		 
		 $post['sistemasalud'] = $this->input->post('sistemasalud');
		
		 $x_post['sistemasalud_id'] = $this->input->post('sistemasalud_id');
		 $mensaje = '';
		 if ($x_post['sistemasalud_id']==''){
			$post['sistemasalud_id'] = $x_post['sistemasalud_id'];
			$this->sistemasalud_model->insertSistemasalud($post);
			$mensaje = 'Registrado';		
		 }else{
			$this->sistemasalud_model->updateSistemasalud($x_post['sistemasalud_id'],$post);
			$mensaje = 'Actualizado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridSistemasalud();
		    }
	
	public function eliminarSistemasalud($idsistemasalud = ''){	    
		$idsistemasalud ='';
		$idsistemasalud = $this->input->post('idtabla');	
		if(strlen(trim($idsistemasalud))>0){
        $mensajeEliminacion = $this->sistemasalud_model->eliminarsistemasalud($idsistemasalud);
		}
		//echo json_encode($mensajeEliminacion);
		echo json_encode('Eliminado');
    }	
 
}

?>
