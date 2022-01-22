<?php 
class Courier extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("courier_model");		
    }
        
    public function gridCourier(){		
        $data['grid'] =  $this->courier_model->gridCourier();
		$data['titulotabla'] = 'Lista de Courier';
        $this->load->view("gridCourier_view",$data);
    }   
 	
	public function mantCourierForm($idcourier = ''){	
		$data['courier'] = $this->courier_model->rowCourier($idcourier);
				if($idcourier ==""){
			$data['titulofrm'] = "Agregar Registros";
		}else{
			$data['titulofrm'] = "Editar Registros";
		}
        $this->load->view("form_MantCourier_view",$data);
    }
	    public function mantCourier(){		 
		 $post['courier'] = $this->input->post('courier');
		
		 $x_post['id_courier'] = $this->input->post('id_courier');
		 $mensaje = '';
		 if ($x_post['id_courier']==''){
			$post['id_courier'] = $x_post['id_courier'];
			$this->courier_model->insertCourier($post);
			$mensaje = 'Courier Registrado';		
		 }else{
			$this->courier_model->updateCourier($x_post['id_courier'],$post);
			$mensaje = 'Courier actualizado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridCourier();
	}
	
	public function eliminarCourier($idcourier = ''){	    
		$idcourier ='';
		$idcourier = $this->input->post('idtabla');	
		if(strlen(trim($idcourier))>0){
        $mensajeEliminacion = $this->courier_model->eliminarCourier($idcourier);
		}
		//echo json_encode($mensajeEliminacion);
		echo json_encode('Eliminado');
    }

    public function json_InfoCourier($idcourier = ''){
		$info = $this->courier_model->rowCourier($idcourier);
		echo json_encode($info);
    }  
 
}

?>
