<?php 
class Generico extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("generico_model");
		
    }
    
    public function gridGenerico(){
		
        $data['grid'] =  $this->generico_model->gridGenerico();
		$data['titulotabla'] = 'Lista de Genéricos';
        $this->load->view("gridGenerico_view",$data);
    }   
 	
	public function mantGenericoForm($idgenerico = ''){	
		$data['generico'] = $this->generico_model->rowGenerico($idgenerico);
				if($idgenerico ==""){
			$data['titulofrm'] = "Agregar Registros";
		}else{
			$data['titulofrm'] = "Editar Registros";
			}
        $this->load->view("form_MantGenerico_view",$data);
    }
	    public function mantGenerico(){		 
		 $post['generico'] = $this->input->post('generico');
		
		 $x_post['generico_id'] = $this->input->post('generico_id');
		 $mensaje = '';
		 if ($x_post['generico_id']==''){
			$post['generico_id'] = $x_post['generico_id'];
			$this->generico_model->insertGenerico($post);
			$mensaje = 'Producto Registrado';		
		 }else{
			$this->generico_model->updateGenerico($x_post['generico_id'],$post);
			$mensaje = 'Producto actualizado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridGenerico();
		    }
	
	public function eliminarGenerico($idgenerico = ''){	    
		$idgenerico ='';
		$idgenerico = $this->input->post('idtabla');	
		if(strlen(trim($idgenerico))>0){
        $mensajeEliminacion = $this->generico_model->eliminarGenerico($idgenerico);
		}
		//echo json_encode($mensajeEliminacion);
		echo json_encode('Eliminado');
    }	
 
}

?>
