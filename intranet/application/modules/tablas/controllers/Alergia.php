<?php 
class Alergia extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("alergia_model");		
    }
        
    public function gridAlergia(){		
        $data['grid'] =  $this->alergia_model->gridAlergia();
		$data['titulotabla'] = 'Lista de Alergia';
        $this->load->view("gridAlergia_view",$data);
    }   
 	
	public function mantAlergiaForm($idalergia = ''){	
		$data['alergia'] = $this->alergia_model->rowAlergia($idalergia);
				if($idalergia ==""){
			$data['titulofrm'] = "Agregar Registros";
		}else{
			$data['titulofrm'] = "Editar Registros";
		}
        $this->load->view("form_MantAlergia_view",$data);
    }
	    public function mantAlergia(){		 
		 $post['alergia'] = $this->input->post('alergia');
		
		 $x_post['alergia_id'] = $this->input->post('alergia_id');
		 $mensaje = '';
		 if ($x_post['alergia_id']==''){
			$post['alergia_id'] = $x_post['alergia_id'];
			$this->alergia_model->insertAlergia($post);
			$mensaje = 'Alergia Registrado';		
		 }else{
			$this->alergia_model->updateAlergia($x_post['alergia_id'],$post);
			$mensaje = 'Alergia actualizado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridAlergia();
	}
	
	public function eliminarAlergia($idalergia = ''){	    
		$idalergia ='';
		$idalergia = $this->input->post('idtabla');	
		if(strlen(trim($idalergia))>0){
        $mensajeEliminacion = $this->alergia_model->eliminarAlergia($idalergia);
		}
		//echo json_encode($mensajeEliminacion);
		echo json_encode('Eliminado');
    }	
 
}

?>
