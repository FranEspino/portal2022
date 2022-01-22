<?php 
class Empresa extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("empresa_model");
		//$this->load->model("tablas/producto_model");
		//$this->load->model("tablas/enfermedad_model");
		//$this->load->model("configuracion_usuario/usuario_model");
		
		    }
    
    public function gridEmpresa(){		
        $data['grid'] =  $this->empresa_model->gridEmpresa();
		$data['titulotabla'] = 'Lista de Empresaes';
        $this->load->view("gridEmpresa_view",$data);
    }   
 	
	public function mantEmpresaForm($idempresa = ''){	
		$data['ubigeo'] = $this->empresa_model->gridUbigeo();	
		if($idempresa ==""){
			$data['titulofrm'] = "Agregar Registros";
			 
			
		}else{
			$data['titulofrm'] = "Editar Registros";
			$data['empresa'] = $this->empresa_model->rowEmpresa($idempresa);
			}
        $this->load->view("form_MantEmpresa_view",$data);
    }
	
	public function mantEmpresa(){			 
		// $post['id_empresa'] = $this->input->post('id_empresa');
		 $post['razonsocial'] = $this->input->post('razonsocial');
		 $post['ruc'] = $this->input->post('ruc');
		 $post['id_ubigeo'] = $this->input->post('id_ubigeo');
		 $post['direccion'] = $this->input->post('direccion');
		 $post['referencia'] = $this->input->post('referencia'); 
		 $post['telefono'] = $this->input->post('telefono'); 
		 $post['celular'] = $this->input->post('celular'); 
		 $post['correo'] = $this->input->post('correo');
		 $post['web'] = $this->input->post('web'); 
		 
		 $x_post['id_empresa'] = $this->input->post('id_empresa');
		 $mensaje = '';
		 if ($x_post['id_empresa']==''){ 
			//Insertar datos del empresa
			$post['idusuario_regemp'] = $this->session->userdata('idusuario');
		 	$post['fecharegistro'] = date('Y-m-d H:i:s');
			$idempresa = $this->empresa_model->insertEmpresa($post);
			 
			$mensaje = 'Empresa Registrado';		
		 }else{
			 
			$post['fechamodificacion'] = date('Y-m-d H:i:s');
			$this->empresa_model->updateEmpresa($x_post['id_empresa'],$post);
			$mensaje = 'Empresa actualizado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2500,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridEmpresa();
	}
	
	public function eliminarEmpresa($idempresa = ''){	    
		$idempresa ='';
		$idempresa = $this->input->post('idtabla');	
		if(strlen(trim($idempresa))>0){
        $mensajeEliminacion = $this->empresa_model->eliminarEmpresa($idempresa);
		}
		//echo json_encode($mensajeEliminacion);
		echo json_encode('Eliminado');
    }	
 
 //Datos clinicos
 
	 public function gridEmpresaCargo($idempresa = ''){		
		 
		$data['empresacargo'] = $this->empresa_model->gridEmpresaCargo($idempresa);
		$data['empresa'] = $this->empresa_model->rowEmpresa($idempresa);
		$data['id_empresa'] = $idempresa;
        $this->load->view("gridEmpresaCargo_view",$data );
    } 
	
	public function mantEmpresaCargoForm($idempresa = '',$idempresacargo=''){
		$data['cargo'] = $this->empresa_model->gridCargo();
		$data['area'] = $this->empresa_model->gridArea();
		$data['empresa'] = $this->empresa_model->rowEmpresa($idempresa);
		$data['id_empresa'] = $idempresa;
		if($idempresacargo ==""){
			$data['titulofrm'] = "Agregar cargo del empresa";
			 
		}else{
			$data['titulofrm'] = "Editar cargo del empresa";
			$data['empresacargo'] = $this->empresa_model->rowEmpresaCargo($idempresacargo);
			}
        $this->load->view("form_MantEmpresaCargo_view",$data);
    }
	
	public function mantEmpresaCargo(){			 
		
		$post_c['id_empresa'] = $this->input->post('id_empresa');		  
		$post_c['id_cargo'] = $this->input->post('id_cargo');
		$post_c['id_area'] = $this->input->post('id_area');
		$post_c['fch_iniciocontrato'] = $this->load->help_date->fechaMysql($this->input->post('fch_iniciocontrato'));
		$post_c['fch_fincontrato'] = $this->load->help_date->fechaMysql($this->input->post('fch_fincontrato')); 
		//$post_c['idusuario_regcargoper'] = $this->session->userdata('idusuario');
		$post_c['fch_modcargoper'] = date('Y-m-d H:i:s');
		 
		 $x_post['id_empresa_cargo'] = $this->input->post('id_empresa_cargo');
		 $mensaje = '';
		 if ($x_post['id_empresa_cargo']==''){ 			
			$this->empresa_model->insertEmpresaCargo($post_c);			
			$mensaje = 'Se agregó nuevo cargo al empresa';		
		 }else{
			$this->empresa_model->updateEmpresaCargo($x_post['id_empresa_cargo'],$post_c);
			$mensaje = 'Su cargo fue editado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2500,
								icon : 'fa fa-check swing animated'
							}); </script>";
		//	$this->gridEmpresaCargo($post_c['id_empresa']);
		 
	}
	
						
	public function eliminarEmpresaCargo($idEmpresaCargo = ''){	    
		$idEmpresaCargo ='';
		$idEmpresaCargo = $this->input->post('idtabla');	
		if(strlen(trim($idEmpresaCargo))>0){
        $mensajeEliminacion = $this->empresa_model->eliminarEmpresaCargo($idEmpresaCargo);
		} 
		echo json_encode('Eliminado');
    }	
	
		
 
 
}

?>
