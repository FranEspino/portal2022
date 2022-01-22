<?php 
class Claseproducto extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("claseproducto_model");
    }
    
    public function gridClaseproducto(){
		
        $data['grid'] =  $this->claseproducto_model->gridClaseproducto();
		$data['titulotabla'] = 'Lista de Clases';
        $this->load->view("gridClaseproducto_view",$data);
    }   
 	
	public function mantClaseproductoForm($idclaseproducto = ''){	
		$data['claseproducto'] = $this->claseproducto_model->rowClaseproducto($idclaseproducto);
				if($idclaseproducto ==""){
			$data['titulofrm'] = "Agregar Registros";
		}else{
			$data['titulofrm'] = "Editar Registros";
			}
        $this->load->view("form_MantClaseproducto_view",$data);
    }
	    public function mantClaseproducto(){		 
		 $post['claseproducto'] = $this->input->post('claseproducto');
		
		 $x_post['claseproducto_id'] = $this->input->post('claseproducto_id');
		 $mensaje = '';
		 if ($x_post['claseproducto_id']==''){
			$post['claseproducto_id'] = $x_post['claseproducto_id'];
			$this->claseproducto_model->insertClaseproducto($post);
			$mensaje = 'Producto Registrado';		
		 }else{
			$this->claseproducto_model->updateClaseproducto($x_post['claseproducto_id'],$post);
			$mensaje = 'Producto actualizado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridClaseproducto();
		    }
	
	public function eliminarClaseproducto($idclaseproducto = ''){	    
		$idclaseproducto ='';
		$idclaseproducto = $this->input->post('idtabla');	
		if(strlen(trim($idclaseproducto))>0){
			$verif = $this->claseproducto_model->verifClaseProd($idclaseproducto);
			if($verif->cant ==0){
        		$mensajeEliminacion = $this->claseproducto_model->eliminarClaseproducto($idclaseproducto);
        		echo json_encode('Eliminado');
        	}else{
				echo json_encode('No se puede eliminar<br>Existen registros relacionados');
			}
		} 		
    }	
 
}

?>
