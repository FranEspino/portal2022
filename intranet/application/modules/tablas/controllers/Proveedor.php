<?php 
class Proveedor extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("proveedor_model");
		    }
    
    public function gridProveedor(){
		
        $data['grid'] =  $this->proveedor_model->gridProveedor();
		$data['titulotabla'] = 'Lista de Proveedores';
        $this->load->view("gridProveedor_view",$data);
    }   
 	
	public function mantProveedorForm($idproveedor = ''){	
		$data['proveedor'] = $this->proveedor_model->rowProveedor($idproveedor);
				if($idproveedor ==""){
			$data['titulofrm'] = "Agregar Registros";
		}else{
			$data['titulofrm'] = "Editar Registros";
			}
        $this->load->view("form_MantProveedor_view",$data);
    }
	
	public function mantProveedor(){		 
		 
		 $post['proveedor_ruc'] = $this->input->post('proveedor_ruc');
		 $post['proveedor'] = $this->input->post('proveedor');
		 $post['telefono'] = $this->input->post('telefono');
		 $post['contacto'] = $this->input->post('contacto');
		 $post['correo'] = $this->input->post('correo');
		 $post['giro'] = $this->input->post('giro');
		 $post['direccion'] = $this->input->post('direccion');
		 $post['ciudad'] = $this->input->post('ciudad');
		 $post['condicioncompra'] = $this->input->post('condicioncompra');
		
		 $x_post['proveedor_id'] = $this->input->post('proveedor_id');
		 $mensaje = '';
		 if ($x_post['proveedor_id']==''){
			//$post['proveedor_id'] = $x_post['proveedor_id'];
			$x_post['proveedor_id'] = $this->proveedor_model->insertProveedor($post);
			$mensaje = 'Proveedor Registrado';		
		 }else{
			$this->proveedor_model->updateProveedor($x_post['proveedor_id'],$post);
			$mensaje = 'Proveedor actualizado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
		
		$frm_origen = $this->input->post('frm_origen');
		if($frm_origen=='COMPRA'){
			echo "<script language='javascript'> var newOption = new Option('".$post['proveedor_ruc'].' - '.$post['proveedor']."', '".$x_post['proveedor_id']."', true, true);$('#proveedor_id').append(newOption).trigger('change');</script>";
		}else{
			$this->gridProveedor();			
		}			
	}
	
	public function eliminarProveedor($idproveedor = ''){	    
		$idproveedor ='';
		$idproveedor = $this->input->post('idtabla');	
		if(strlen(trim($idproveedor))>0){
        $mensajeEliminacion = $this->proveedor_model->eliminarProveedor($idproveedor);
		}
		//echo json_encode($mensajeEliminacion);
		echo json_encode('Eliminado');
    }	
 
}

?>
