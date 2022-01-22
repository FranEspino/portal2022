<?php 
class Tipoproducto extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("tipoproducto_model");
    }
    
    public function gridTipoproducto(){
		
        $data['grid'] =  $this->tipoproducto_model->gridTipoproducto();
		$data['titulotabla'] = 'Categoria de los Productos';
        $this->load->view("gridTipoproducto_view",$data);
    }   
 	
	public function manttipoproductoForm($idtipoproducto = ''){	
		$data['tipoproducto'] = $this->tipoproducto_model->rowTipoproducto($idtipoproducto);
				if($idtipoproducto ==""){
			$data['titulofrm'] = "Agregar Registros";
		}else{
			$data['titulofrm'] = "Editar Registros";
			}
        $this->load->view("form_Manttipoproducto_view",$data);
    }
	    public function manttipoproducto(){		 
		 $post['tipoproducto'] = $this->input->post('tipoproducto');
		
		 $x_post['tipoproducto_id'] = $this->input->post('tipoproducto_id');
		 $mensaje = '';
		 if ($x_post['tipoproducto_id']==''){
			$post['tipoproducto_id'] = $x_post['tipoproducto_id'];
			$this->tipoproducto_model->insertTipoproducto($post);
			$mensaje = 'Categoria Registrado';		
		 }else{
			$this->tipoproducto_model->updateTipoproducto($x_post['tipoproducto_id'],$post);
			$mensaje = 'Categoria actualizado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridtipoproducto();
		    }
	
	public function eliminartipoproducto($idtipoproducto = ''){	    
		$idtipoproducto ='';
		$idtipoproducto = $this->input->post('idtabla');	
		if(strlen(trim($idtipoproducto))>0){
			$verif = $this->tipoproducto_model->verifTipoProd($idtipoproducto);
			if($verif->cant ==0){
        		$mensajeEliminacion = $this->tipoproducto_model->eliminarTipoproducto($idtipoproducto);
        		echo json_encode('Eliminado');
        	}else{
				echo json_encode('No se puede eliminar<br>Existen registros relacionados');
			}
		} 		
    }	
 
}

?>
