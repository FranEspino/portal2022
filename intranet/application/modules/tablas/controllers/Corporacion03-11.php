<?php 
class Corporacion extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("corporacion_model");
        $this->load->model("caja_correlativo/correlativo_model");		
    }
     
	public function mantCorporacionForm(){
		//echo $_SESSION['db_empresa'];
		$idempresa_corp = $this->session->userdata('idempresa_corp');
		$data['empresa'] = $this->corporacion_model->rowCorporacion($idempresa_corp);
		$data['cliente'] = $this->corporacion_model->infoCliente($idempresa_corp);
		$data['api'] = $this->corporacion_model->infoApirest($data['empresa']->iduser_apirest);
		$data['cert'] = $this->corporacion_model->infoCertificado($data['empresa']->ruc);
		$data['gridTipoComprobanteAct'] = $this->correlativo_model->gridTipoComprobanteVenta();
		//$data['gridTipoComprobanteAct'] = $this->correlativo_model->gridTipoComprobanteAct();
        $this->load->view("form_MantCorporacion_view",$data);
    }
	public function mantCorporacion(){
		
		  $post['ruc'] = $this->input->post('ruc');

		 $post['nombre_empresa'] = $this->input->post('nombre_empresa');
		 $post['direccion_fiscal'] = $this->input->post('direccion_fiscal');
		 $post['referencia'] = $this->input->post('referencia');
		 $post['nombre_small'] = $this->input->post('nombre_small');
		 $post['ubigeo'] = $this->input->post('ubigeo');
		 $post['nomcomercial_emp'] = $this->input->post('nomcomercial_emp');
		 $post['telefono_emp'] = $this->input->post('telefono_emp');
		 $post['cel_emp'] = $this->input->post('cel_emp');
		 $post['email_emp'] = $this->input->post('email_emp');
		 $post['descripcion_emp'] = $this->input->post('descripcion_emp');
		 $post['displayprice'] = $this->input->post('displayprice');
		 $post['defaultprice'] = $this->input->post('defaultprice');
		 $post['system'] = $this->input->post('system');
		 $post['defaultcomp'] = $this->input->post('defaultcomp'); 
		 $post['defaultformat'] = $this->input->post('defaultformat'); 
		 $post['tipoigv'] = $this->input->post('tipoigv'); 
		 $post['flg_codprod'] = $this->input->post('flg_codprod'); 

		 $post['iduser_apirest'] = $this->input->post('iduser_apirest'); 
		 $post['token_apirest'] = $this->input->post('token_apirest'); 

		 $post['pagweb'] = $this->input->post('pagweb'); 
		 $post['tipomoneda'] = $this->input->post('tipomoneda'); 
		 $post['flg_ventafchpasada'] = $this->input->post('flg_ventafchpasada'); 
		 $post['flg_ventaconcero'] = $this->input->post('flg_ventaconcero');
		 $post['flg_boletaruc'] = $this->input->post('flg_boletaruc'); 
		 $post['flg_duplicaritem'] = $this->input->post('flg_duplicaritem'); 
		 $post['flg_reststock'] = $this->input->post('flg_reststock'); 
		 $post['flg_restprecmin'] = $this->input->post('flg_restprecmin'); 
		 $post['flg_guiamanual'] = $this->input->post('flg_guiamanual'); 
		 $post['flg_impulsador'] = $this->input->post('flg_impulsador'); 

		 

		 $x_post['idempresa_corp'] = $this->input->post('idempresa_corp');
		 
		$this->corporacion_model->updateCorporacion($x_post['idempresa_corp'],$post);
		
		//Almacenar las ultimas configuraciones
		$_SESSION['X_DISPLAYPRICE'] = $post['displayprice'] ;
        $_SESSION['X_DEFAULTPRICE'] = $post['defaultprice'];
        $_SESSION['X_DEFAULTCOMP'] = $post['defaultcomp'];
        $_SESSION['X_SYSTEM'] = $post['system']; 
        $_SESSION['X_DEFAULTFORMAT'] = $post['defaultformat']; 
        $_SESSION['X_TIPOIGV'] = $post['tipoigv'];
        $_SESSION['X_CODPROD'] = $post['flg_codprod'];
        if($post['tipoigv']=='10'){
        	$_SESSION['X_PORCIGV'] = 18;
            $_SESSION['X_SACARIGV'] = 1.18;
            $_SESSION['X_IGV'] = 0.18;
        }else{
        	$_SESSION['X_PORCIGV'] = 0;// 18;
            $_SESSION['X_SACARIGV'] = 0;//1.18;
            $_SESSION['X_IGV'] = 0;//0.18;
        }

		$mensaje = 'Información actualizado<br>Actualiza la página para ver los cambios';	
	 
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 5000,
								icon : 'fa fa-check swing animated'
							}); </script>";
		//	$this->gridCorporacion();
	}
	
	public function mantSubirImagen($idpagina = '',$nombreimagen=''){	
		$data['idpagina'] =$idpagina  ;
		$this->load->view("modalSubirImagen_view",$data);
    }
	

 function cargar_archivo() {
		$ruc_corp =  $this->session->userdata('ruc_corp');
		$idregistro = $this->input->post('id_pagina');
		$nombrearchivo = 'logo_'.$ruc_corp.'_'.$idregistro.'_'.date('d-m-Y').'_'.rand(5, 15);
		//$tempFile = $_FILES['file']['tmp_name']; 
		
        $mi_imagen = 'mi_imagen';//$_FILES['file'];
        $config['upload_path'] = "file/img/";
        $config['file_name'] = $nombrearchivo;
        $config['allowed_types'] = "gif|jpg|jpeg|png";
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";

		$this->load->library('upload', $config);
		/*foreach ($_FILES as $key => $value) {
		 $this->upload->do_upload($key);
		}*/
        if (!$this->upload->do_upload($mi_imagen)) {
           // *** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;
        }

        $data['upload_data'] = $this->upload->data();
		$file_name = $data['upload_data']['file_name'];
		
		if($data['upload_data']){
			$post['logocorp'] = $file_name;
			$x_post['IdPagina'] = $idregistro;
			$this->corporacion_model->updateCorporacion($x_post['IdPagina'],$post);
		}
		//echo $data['uploadSuccess'];
		//$this->load->view("upload_success",$data);
		echo '<img width="100%" src="'.$this->config->item('web_url').'file/img/'.$file_name.'" alt="">';
	}
}

?>
