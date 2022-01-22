<?php 
class Pagina extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("pagina_model");
		
    }
    
    public function gridPagina($idmenu = ''){
		
        $data['grid'] =  $this->pagina_model->gridPagina($idmenu);
		$data['menu'] =  $this->pagina_model->rowMenu($idmenu);
		
		$data['titulotabla'] = 'Lista de Paginas - '. @$data['menu']->primermenu;
		
        $this->load->view("gridPagina_view",$data);
		
    }   
 	
	public function mantPaginaForm($idpagina = ''){	
		$data['pagina'] = $this->pagina_model->rowPagina($idpagina);
		$data['menu'] = $this->pagina_model->gridMenu();
		
		
		 
		$tipousuario = $this->session->userdata('id_tipopersona');
		$idpersona = $this->session->userdata('idpersona_sist');
		$data['personalArea'] = '';
		
		if($idpagina ==""){
			$data['titulofrm'] = "Agregar Registros";
		}else{
			$data['titulofrm'] = "Editar Registros";
			}
       $this->load->view("form_MantPagina_view",$data);
		
    }
	
	public function mantSubirImagen($idpagina = '',$nombreimagen=''){	
		$data['idpagina'] =$idpagina  ;
		$this->load->view("modalSubirImagen_view",$data);
    }
	
	
	public function mantPagina(){		 
		$post['Titulo'] = trim($this->input->post('Titulo'));
		$post['SubTitulo'] = $this->input->post('SubTitulo');
		$post['Contenido'] = $this->input->post('Contenido');
		
		$post['IdMenu'] = $this->input->post('IdMenu');
		$post['IdArea'] = $this->input->post('IdArea');
		
		$post['FPublicacion'] = $this->load->help_date->fechaMysql($this->input->post('FPublicacion'));
		$post['FechaInicio'] = $this->load->help_date->fechaMysql($this->input->post('FechaInicio'));
		$post['FechaFin'] = $this->load->help_date->fechaMysql($this->input->post('FechaFin')); 
		 
		$estadop = $this->input->post('EstadoPublicacion');
		$post['EstadoPublicacion'] = ($estadop =='on')? 1: 0;
		
		 $x_post['IdPagina'] = $this->input->post('IdPagina');
		 $mensaje = '';
		 if ($x_post['IdPagina']==''){			 
			$post['CodPagina'] = $this->servicio_js->reemplazar($post['Titulo']);
			$post['IdUsuarioReg'] = $this->session->userdata('idusuario');
			$post['FCreacion'] = date('Y-m-d H:i:s'); 
			
			$cantCodPag = $this->pagina_model->getExistCodpagina($post['CodPagina']);
			if($cantCodPag >0){
				$post['CodPagina'] = $post['CodPagina'].'-'.rand(1,100);
			}
			$this->pagina_model->insertPagina($post);
			$mensaje = 'Pagina Registrado';		
		 }else{
			
			if($x_post['IdPagina']>2){
				$post['CodPagina'] = $this->servicio_js->reemplazar($post['Titulo']);
				$cantCodPag = $this->pagina_model->getExistCodpaginaUpdate($post['CodPagina'],$x_post['IdPagina']);
				if($cantCodPag >0){
					$post['CodPagina'] = $post['CodPagina'].'-'.rand(1,100);
				} 
			} 

			$post['FModificacion'] = date('Y-m-d H:i:s'); 
			
			
			$this->pagina_model->updatePagina($x_post['IdPagina'],$post);
			$mensaje = 'Pagina actualizado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridPagina();
		    }
	
	public function eliminarPagina($idpagina = ''){	    
		$idpagina ='';
		$idpagina = $this->input->post('idtabla');	
		if(strlen(trim($idpagina))>0){
        $mensajeEliminacion = $this->pagina_model->eliminarPagina($idpagina);
		}
		//echo json_encode($mensajeEliminacion);
		echo json_encode('Eliminado');
    }	
 
 function cargar_archivo() {
		
		$idregistro = $this->input->post('id_pagina');
		$nombrearchivo = $idregistro.'_'.date('d-m-Y').'_'.rand(5, 15);
		//$tempFile = $_FILES['file']['tmp_name']; 
		
        $mi_imagen = 'mi_imagen';//$_FILES['file'];
        $config['upload_path'] = "../imagenes/pagina/";
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
			$post['Imagen'] = $file_name;
			$x_post['IdPagina'] = $idregistro;
			$this->pagina_model->updatePagina($x_post['IdPagina'],$post);
		}
		//echo $data['uploadSuccess'];
		//$this->load->view("upload_success",$data);
		echo '<img width="100%" src="'.$this->config->item('web_url').'imagenes/pagina/'.$file_name.'" alt="">';
	}
}

?>
