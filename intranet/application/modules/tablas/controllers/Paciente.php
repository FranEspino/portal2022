<?php 
class Cliente extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("cliente_model");
		
		    }
    
    public function gridCliente(){
		
        $data['grid'] =  $this->cliente_model->gridCliente();
		$data['titulotabla'] = 'Lista de Clientes';
        $this->load->view("gridCliente_view",$data);
    }   
 	
	public function mantClienteForm($idcliente = ''){
		$data['pers_autoretiro_id'] = $this->cliente_model->gridCliente();	
		$data['tb_razonsocial'] = $this->cliente_model->rowCliente($idcliente);
				if($idcliente ==""){
			$data['titulofrm'] = "Agregar Registros";
		}else{
			$data['titulofrm'] = "Editar Registros";
			}
        $this->load->view("form_MantCliente_view",$data);
    }
	    public function mantCliente(){		 
		 
		 $post['id_razonsocial'] = $this->input->post('id_razonsocial');
		 $post['cliente_ruc'] = $this->input->post('cliente_ruc');
		 $post['nombres'] = $this->input->post('nombres');
		 $post['appaterno'] = $this->input->post('appaterno');
		 $post['apmaterno'] = $this->input->post('apmaterno');
		 $post['cedula'] = $this->input->post('cedula');
		 $post['fechanacimiento'] = $this->input->post('fechanacimiento');
		 $post['sexo'] = $this->input->post('sexo');
		 $post['nacionalidad'] = $this->input->post('nacionalidad');
		 		 $post['correo'] = $this->input->post('correo');
		 $post['poblacion'] = $this->input->post('poblacion');
		 $post['direccion'] = $this->input->post('direccion');
		 $post['comuna'] = $this->input->post('comuna');
		 $post['municipalidad'] = $this->input->post('municipalidad');
		 $post['referencias'] = $this->input->post('referencias');
		 $post['telefonos'] = $this->input->post('telefonos');
		 $post['sistemasalud_id'] = $this->input->post('sistemasalud_id');
		 $post['pers_autoretiro_id'] = $this->input->post('pers_autoretiro_id');
		
		 $x_post['id_razonsocial'] = $this->input->post('id_razonsocial');
		 $mensaje = '';
		 if ($x_post['id_razonsocial']==''){
			$post['id_razonsocial'] = $x_post['id_razonsocial'];
			$this->cliente_model->insertCliente($post);
			$mensaje = 'Cliente Registrado';		
		 }else{
			$this->cliente_model->updateCliente($x_post['id_razonsocial'],$post);
			$mensaje = 'Cliente actualizado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridCliente();
		    }
	
	public function eliminarCliente($idcliente = ''){	    
		$idcliente ='';
		$idcliente = $this->input->post('idtabla');	
		if(strlen(trim($idcliente))>0){
        $mensajeEliminacion = $this->cliente_model->eliminarCliente($idcliente);
		}
		//echo json_encode($mensajeEliminacion);
		echo json_encode('Eliminado');
    }	
 
}

?>
