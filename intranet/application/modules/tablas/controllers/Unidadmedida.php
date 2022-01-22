<?php 
class Unidadmedida extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("unidadmedida_model"); 
    }
    
    public function gridUnidadmedida(){
		
        $data['grid'] =  $this->unidadmedida_model->gridUnidadmedida();
		$data['titulotabla'] = 'Lista de Unidades de medidas';
        $this->load->view("gridUnidadmedida_view",$data);
    }   
 	
	public function mantUnidadmedidaForm($idunidadmedida = ''){	
		$data['unidadmedida'] = $this->unidadmedida_model->rowUnidadmedida($idunidadmedida);

				if($idunidadmedida ==""){
			$data['titulofrm'] = "Agregar Registros";
		}else{
			$data['titulofrm'] = "Editar Registros";
			}
        $this->load->view("form_MantUnidadmedida_view",$data);
    }
	    public function mantUnidadmedida(){		 
		 $post['unidadmedida'] = $this->input->post('unidadmedida');
		 $post['abrevunidadmed'] = $this->input->post('abrevunidadmed');
		
		 $x_post['unidadmedida_id'] = $this->input->post('unidadmedida_id');
		 $mensaje = '';
		 if ($x_post['unidadmedida_id']==''){
			$post['unidadmedida_id'] = $x_post['unidadmedida_id'];
			$this->unidadmedida_model->insertUnidadmedida($post);
			$mensaje = 'Unidadmedida Registrado';		
		 }else{
			$this->unidadmedida_model->updateUnidadmedida($x_post['unidadmedida_id'],$post);
			$mensaje = 'Unidadmedida actualizado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridUnidadmedida();
		    }
	
	public function eliminarUnidadmedida(){
		$idunidadmedida = $this->input->post('idtabla');	
		if(strlen(trim($idunidadmedida))>0){
			$verif = $this->unidadmedida_model->verifUnidadMed($idunidadmedida);
			if($verif->cant ==0){
        		$mensajeEliminacion = $this->unidadmedida_model->eliminarUnidadmedida($idunidadmedida);
        		echo json_encode('Eliminado');
        	}else{
				echo json_encode('No se puede eliminar<br>Existen registros relacionados');
			}
		} 
    }	

    public function jsonUnidadMedida($idunidadmedida){	    	
 		$query = $this->unidadmedida_model->rowUnidadmedida($idunidadmedida);		  
 		echo json_encode ($query);		 		
	}
 
}

?>
