<?php 
class Centrocosto extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("centrocosto_model");
		
    }
    
    public function gridCentrocosto(){
		
        $data['grid'] =  $this->centrocosto_model->gridCentrocosto();
		$data['titulotabla'] = 'Lista de Centro de Costos';
        $this->load->view("gridCentrocosto_view",$data);
    }   
 	
	public function mantCentrocostoForm($idcentrocosto = ''){	
		$data['centrocosto'] = $this->centrocosto_model->rowCentrocosto($idcentrocosto);
				if($idcentrocosto ==""){
			$data['titulofrm'] = "Agregar Registros";
		}else{
			$data['titulofrm'] = "Editar Registros";
			}
        $this->load->view("form_MantCentrocosto_view",$data);
    }
	    public function mantCentrocosto(){		 
		 $post['centrocosto'] = $this->input->post('centrocosto');
		
		 $x_post['centrocosto_id'] = $this->input->post('centrocosto_id');
		 $mensaje = '';
		 if ($x_post['centrocosto_id']==''){
			$post['centrocosto_id'] = $x_post['centrocosto_id'];
			$this->centrocosto_model->insertCentrocosto($post);
			$mensaje = 'Centro de Costo Registrado';		
		 }else{
			$this->centrocosto_model->updateCentrocosto($x_post['centrocosto_id'],$post);
			$mensaje = 'Centro de Costo actualizado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridCentrocosto();
		    }
	
	public function eliminarCentrocosto($idcentrocosto = ''){	    
		$idcentrocosto ='';
		$idcentrocosto = $this->input->post('idtabla');	
		if(strlen(trim($idcentrocosto))>0){
        $mensajeEliminacion = $this->centrocosto_model->eliminarCentrocosto($idcentrocosto);
		}
		//echo json_encode($mensajeEliminacion);
		echo json_encode('Eliminado');
    }	
 
}

?>
