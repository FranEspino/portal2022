<?php 
class Area extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("area_model"); 
    }
    
    public function gridArea(){
		
        $data['grid'] =  $this->area_model->gridArea();
		$data['titulotabla'] = 'Lista de Areas';
        $this->load->view("gridArea_view",$data);
    }   
 	
	public function mantAreaForm($idarea = ''){	
		$data['area'] = $this->area_model->rowArea($idarea);
				if($idarea ==""){
			$data['titulofrm'] = "Agregar Registros";
		}else{
			$data['titulofrm'] = "Editar Registros";
			}
        $this->load->view("form_MantArea_view",$data);
    }
	    public function mantArea(){		 
		 $post['area'] = $this->input->post('area');
		
		 $x_post['id_area'] = $this->input->post('id_area');
		 $mensaje = '';
		 if ($x_post['id_area']==''){ 
			$this->area_model->insertArea($post);
			$mensaje = 'Area Registrado';		
		 }else{
			$this->area_model->updateArea($x_post['id_area'],$post);
			$mensaje = 'Area actualizado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridArea();
		    }
	
	public function eliminarArea($idarea = ''){	    
		$idarea ='';
		$idarea = $this->input->post('idtabla');	
		if(strlen(trim($idarea))>0){
        $mensajeEliminacion = $this->area_model->eliminarArea($idarea);
		}
		//echo json_encode($mensajeEliminacion);
		echo json_encode('Eliminado');
    }	
 
}

?>
