<?php 
class Ptoventa extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("ptoventa_model");
		
    }
    
    public function gridPtoventa(){
		
        $data['grid'] = $this->ptoventa_model->gridPtoventa();
		$data['titulotabla'] = 'Lista de Puntos de venta';
        $this->load->view("gridPtoventa_view",$data);
    }   
 	
	public function mantPtoventaForm($idbodega = ''){	
		$data['bodega'] = $this->ptoventa_model->rowPtoventa($idbodega);
		 if($idbodega ==""){
			$data['titulofrm'] = "Agregar Registro";
		}else{
			$data['titulofrm'] = "Editar Registro";
			}
        $this->load->view("form_MantPtoventa_view",$data);
    } 
	public function mantPtoventa(){		 
		 $ruc_corp =  $this->session->userdata('ruc_corp');
		 $post['nombre_ptoventa'] = $this->input->post('nombre_ptoventa');
		 $post['direccion_ptoventa'] = $this->input->post('direccion_ptoventa');
		 $post['pto_desc'] = $this->input->post('pto_desc');
		 $post['id_ubigeopto'] = $this->input->post('id_ubigeopto');
		 $post['cod_ptosunat'] = $this->input->post('cod_ptosunat');

		 $post['status_ptoventa'] = $this->input->post('status_ptoventa');
		 $post['idempresa_corp'] = $this->session->userdata('idempresa_corp');
	   	 $post['id_unidadnegocio'] = 1; //1 Local
		
		 $x_post['id_ptoventa'] = $this->input->post('id_ptoventa');

		 //Logo
		 if (isset($_FILES['mi_imagen']['name']) && !empty($_FILES['mi_imagen']['name'])) {

			$nombrearchivo = 'logo_'.$ruc_corp.'_pto_'.date('d-m-Y').'_'.rand(5, 15);
			 
	        $mi_imagen = 'mi_imagen';//$_FILES['file'];
	        $config['upload_path'] = "file/img/";
	        $config['file_name'] = $nombrearchivo;
	        $config['allowed_types'] = "gif|jpg|jpeg|png";
	        $config['max_size'] = "50000";
	        $config['max_width'] = "2000";
	        $config['max_height'] = "2000";

			$this->load->library('upload', $config);
			 
	        if (!$this->upload->do_upload($mi_imagen)) {
	           // *** ocurrio un error
	            $data['uploadError'] = $this->upload->display_errors();
	            $msg = $this->upload->display_errors();
	            echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'No se ha subido el logo<br>".$msg."',
								color : '#C46A69',
								timeout : 3500,
								icon : 'fa fa-check swing animated'
							}); </script>";
	           // return;
	        }else{
		        $data['upload_data'] = $this->upload->data();
				$file_name = $data['upload_data']['file_name'];
				if($data['upload_data']){
					$post['pto_logo'] = $file_name;
				}
	        }
	    }
 
		 //.Logo

		 $mensaje = '';
		 if ($x_post['id_ptoventa']==''){
			$post['id_ptoventa'] = $x_post['id_ptoventa'];
			$this->ptoventa_model->insertPtoventa($post);
			$mensaje = 'Ptoventa Registrado';		
		 }else{
			$this->ptoventa_model->updatePtoventa($x_post['id_ptoventa'],$post);
			$mensaje = 'Ptoventa actualizado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridPtoventa();
	}
	
	public function eliminarPtoventa($idbodega = ''){	    
		$idbodega ='';
		$idbodega = $this->input->post('idtabla');	
		if(strlen(trim($idbodega))>0){
			$verifPtoVenta = $this->ptoventa_model->verifPtoVenta($idbodega);
			if($verifPtoVenta->cant ==0){
	        	$mensajeEliminacion = $this->ptoventa_model->eliminarPtoventa($idbodega);
	        	echo json_encode('Eliminado');
	        }else{
				echo json_encode('No se puede eliminar<br>Existen registros relacionados');
			}
		}
		//echo json_encode($mensajeEliminacion);
    }

    public function eliminarLogo(){		
		$idbodega = $this->input->post('idtabla');

		if(strlen(trim($idbodega))>0){
			$post['pto_logo'] = '';
        	$mensajeEliminacion = $this->ptoventa_model->updatePtoventa($idbodega,$post);
		}
		//echo json_encode($mensajeEliminacion);
		echo json_encode('Eliminado');
    }


	public function json_InfoPtoVenta($id_ptoventa = ''){	
		$info = $this->ptoventa_model->rowPtoventa($id_ptoventa);
		echo json_encode($info);
    }    
 
}

?>
