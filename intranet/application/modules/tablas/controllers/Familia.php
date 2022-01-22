<?php 
class Familia extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("familia_model");		
    }
    
    public function gridFamilia(){
		
        $data['grid'] =  $this->familia_model->gridFamilia();
		$data['titulotabla'] = 'Lista de Familias';
        $this->load->view("gridFamilia_view",$data);
    }   
 	
	public function mantFamiliaForm($idfamilia = ''){	
		$data['familia'] = $this->familia_model->rowFamilia($idfamilia);
				if($idfamilia ==""){
			$data['titulofrm'] = "Agregar Registros";
		}else{
			$data['titulofrm'] = "Editar Registros";
			}
        $this->load->view("form_MantFamilia_view",$data);
    }
	    public function mantFamilia(){		 
		 $post['descripcion_fam'] = $this->input->post('descripcion_fam');
		
		 $x_post['id_familia'] = $this->input->post('id_familia');
		 $mensaje = '';
		 if ($x_post['id_familia']==''){
			$post['id_familia'] = $x_post['id_familia'];
			$this->familia_model->insertFamilia($post);
			$mensaje = 'Familia Registrado';		
		 }else{
			$this->familia_model->updateFamilia($x_post['id_familia'],$post);
			$mensaje = 'Familia actualizado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridFamilia();
		    }
	
	public function eliminarFamilia($idfamilia = ''){	    
		$idfamilia ='';
		$idfamilia = $this->input->post('idtabla');	
		if(strlen(trim($idfamilia))>0){
        $mensajeEliminacion = $this->familia_model->eliminarFamilia($idfamilia);
		}
		//echo json_encode($mensajeEliminacion);
		echo json_encode('Eliminado');
    }	
 
}

?>
