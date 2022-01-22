<?php 
class Usuario_tipo extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("usuario_tipo_model");
		
    }
    
    public function gridUsuario_tipo(){
		
        $data['grid'] =  $this->usuario_tipo_model->gridUsuario_tipo();
		$data['titulotabla'] = 'Lista de Tipos de Usuario';
        $this->load->view("gridUsuario_tipo_view",$data);
    }   
 	
	public function mantUsuario_tipoForm($idusuario_tipo = ''){	
		$data['usuario_tipo'] = $this->usuario_tipo_model->rowUsuario_tipo($idusuario_tipo);
				if($idusuario_tipo ==""){
			$data['titulofrm'] = "Agregar Registros";
		}else{
			$data['titulofrm'] = "Editar Registros";
			}
        $this->load->view("form_MantUsuario_tipo_view",$data);
    }
	    public function mantUsuario_tipo(){		 
		 $post['nombre_usuario_tipo'] = $this->input->post('nombre_usuario_tipo');
		
		 $x_post['idusuario_tipo'] = $this->input->post('idusuario_tipo');
		 $mensaje = '';
		 if ($x_post['idusuario_tipo']==''){
			$post['idusuario_tipo'] = $x_post['idusuario_tipo'];
			$this->usuario_tipo_model->insertUsuario_tipo($post);
			$mensaje = 'Tipo de Usuario Registrado';		
		 }else{
			$this->usuario_tipo_model->updateUsuario_tipo($x_post['idusuario_tipo'],$post);
			$mensaje = 'Tipo de Usuario actualizado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridUsuario_tipo();
		    }
	
	public function eliminarUsuario_tipo(){
		$idusuario_tipo = $this->input->post('idtabla');	
		if(strlen(trim($idusuario_tipo))>0){
			$verif = $this->usuario_tipo_model->verifTipoUs($idusuario_tipo);
			if($verif->cant ==0){
        		$mensajeEliminacion = $this->usuario_tipo_model->eliminarUsuario_tipo($idusuario_tipo);
        		echo json_encode('Eliminado');
        	}else{
				echo json_encode('No se puede eliminar<br>Existen registros relacionados');
			}
		}
    }	
 
}

?>
