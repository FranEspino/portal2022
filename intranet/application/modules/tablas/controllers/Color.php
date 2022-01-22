<?php 
class Color extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("color_model");
		
    }
    
    public function gridColor(){
		
        $data['grid'] =  $this->color_model->gridColor();
		$data['titulotabla'] = 'Lista de Colors';
        $this->load->view("gridColor_view",$data);
    }   
 	
	public function mantColorForm($idcolor = ''){	
		$data['color'] = $this->color_model->rowColor($idcolor);
				if($idcolor ==""){
			$data['titulofrm'] = "Agregar Registros";
		}else{
			$data['titulofrm'] = "Editar Registros";
			}
        $this->load->view("form_MantColor_view",$data);
    }
	    public function mantColor(){		 
		 $post['color'] = $this->input->post('color');
		
		 $x_post['color_id'] = $this->input->post('color_id');
		 $mensaje = '';
		 if ($x_post['color_id']==''){
			$post['color_id'] = $x_post['color_id'];
			$this->color_model->insertColor($post);
			$mensaje = 'Color Registrado';		
		 }else{
			$this->color_model->updateColor($x_post['color_id'],$post);
			$mensaje = 'Color actualizado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridColor();
		    }
	
	public function eliminarColor($idcolor = ''){	    
		$idcolor ='';
		$idcolor = $this->input->post('idtabla');	
		if(strlen(trim($idcolor))>0){
        $mensajeEliminacion = $this->color_model->eliminarColor($idcolor);
		}
		//echo json_encode($mensajeEliminacion);
		echo json_encode('Eliminado');
    }	
 
}

?>
