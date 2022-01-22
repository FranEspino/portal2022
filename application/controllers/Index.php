<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("web_model");
	}
		
	private function _render_page($view, $data = null)
	{
		$this->viewdata = (empty($data)) ? $this->data : $data;
		
		//Agregar la visita	
		$this->load->view('head.php', $this->viewdata);
		$this->load->view('header.php', $this->viewdata);
		$this->load->view('nav.php',$this->viewdata);
		$this->load->view($view, $this->viewdata);
		$this->load->view('footer.php', $this->viewdata);
	}

	public function index($pagina = '')
	{		  
		

		$data['pagina'] = $this->web_model->gridPagina('inicio');	
		$titulo = '';
		if ($data['pagina']) { 
	 	//foreach ($data['pagina'] as $fila) { 
			$titulo = $data['pagina']->Titulo.' - ';
			 
	     //}
		  }
		$data['title_pag'] = $titulo.'Parque cientício - UNCP' ;

		$data['menu'] = $this->web_model->selectMenuActivo();
		//$data['paginamenu'] = $this->web_model->selectPaginaMenu();
		
		
		$data['eventos'] = $this->web_model->selectAsidePagina('6');	
		$data['noticias'] = $this->web_model->selectAsidePagina('5'); 
		$data['archivo'] = $this->web_model->gridArchivo();	
		$data['grid'] =  $this->web_model->gridProyectoCulminado();	
		
		$this->_render_page('index_view', $data);
		$this->web_model->updateVisita('index');
	}


	public function registro()
	{		// echo $codpagina.'La escuela aquiiii/'.$parametros;
			$data = array(
				'title_pag' => 'UNCP'
			);	
			//1: tramites;2 eventos; 3 actividades
		$data['menu'] = $this->web_model->selectMenuActivo();	
		
		$data['eventos'] = $this->web_model->selectAsidePagina('6');	
		$data['noticias'] = $this->web_model->selectAsidePagina('5'); 

		$data['tipodocumento'] =  $this->web_model->gridTipodocumento();
		 
		$data['archivo'] = $this->web_model->gridArchivo();	
		 
		$this->web_model->updateVisita('registro');
		$this->_render_page('registro_view', $data);
	}

	public function seguimiento()
	{		// echo $codpagina.'La escuela aquiiii/'.$parametros;
			$data = array(
				'title_pag' => 'UNCP'
			);	
			//1: tramites;2 eventos; 3 actividades
		$data['menu'] = $this->web_model->selectMenuActivo();	
		
		$data['eventos'] = $this->web_model->selectAsidePagina('6');	
		$data['noticias'] = $this->web_model->selectAsidePagina('5');

		$data['tipodocumento'] =  $this->web_model->gridTipodocumento();
		 
		$data['archivo'] = $this->web_model->gridArchivo();	
		 
		$this->web_model->updateVisita('registro');
		$this->_render_page('seguimiento_view', $data);
	}



	public function guardar_registro(){
		$post_p['plan_proyecto_doc'] = '';
		if (isset($_FILES['plan_proyecto_doc']) && $_FILES['plan_proyecto_doc']['error'] === UPLOAD_ERR_OK) {
			$fileTmpPath = $_FILES['plan_proyecto_doc']['tmp_name'];
			$fileName = $_FILES['plan_proyecto_doc']['name'];
			$fileSize = $_FILES['plan_proyecto_doc']['size'];
			$fileType = $_FILES['plan_proyecto_doc']['type'];
			$fileNameCmps = explode(".", $fileName);
			$fileExtension = strtolower(end($fileNameCmps));
			$newFileName = 'Plan_'.rand(0,1000).date('YmdHis').'.'.$fileExtension;
			$allowedfileExtensions = array('pdf');

			if (in_array($fileExtension, $allowedfileExtensions)) {
				$uploadFileDir = 'archivo/plan_proyecto/';
				$dest_path = $uploadFileDir . $newFileName;

				if(move_uploaded_file($fileTmpPath, $dest_path))
				{
					//subido correctamente 
					$post_p['plan_proyecto_doc'] = $newFileName;
				}
				else
				{
					//error
				}
			}else{
				echo 'Error en formato';
			}
		}

		 $post['id_tipodocumento'] = $this->input->post('id_tipodocumento');
		 $post['numdocumento'] = $this->input->post('numdocumento');
		 $post['razonsocial'] = $this->input->post('razonsocial');
		 $post['direccion'] = $this->input->post('direccion');
		 $post['celular'] = $this->input->post('celular');
		 $post['email'] = $this->input->post('email'); 
		 $post['carrera_profesional'] = $this->input->post('carrera_profesional'); 

		 $post['fch_regrazonsocial'] = date('Y-m-d H:i:s');
		 $id_investigador = $this->web_model->insertRazonSocial($post);

		 $post_p['id_investigador'] = $id_investigador ;
		 $post_p['plan_proyecto'] = $this->input->post('plan_proyecto'); 

		 $post_p['fch_regp'] = date('Y-m-d H:i:s');
		 $this->web_model->insertProyecto($post_p);

		 //Direccionar a la WEB
	 	$data = array(
			'title_pag' => 'UNCP'
		);	
			//1: tramites;2 eventos; 3 actividades
		$data['menu'] = $this->web_model->selectMenuActivo();	
		
		$data['eventos'] = $this->web_model->selectAsidePagina('6');	
		$data['noticias'] = $this->web_model->selectAsidePagina('5');
 
		$data['archivo'] = $this->web_model->gridArchivo();	
		 
		$this->web_model->updateVisita('mensaje');
		$this->_render_page('mensaje_view', $data);

	
	}


	public function buscar_registro($numdocumento = ''){
		// $post['id_tipodocumento'] = $this->input->post('id_tipodocumento');
		 $numdocumento = $this->input->post('numdocumento');
		 //var_dump($numdocumento);
		
		 
		 //Direccionar a la WEB
	 	$data = array(
			'title_pag' => 'UNCP'
		);	
			//1: tramites;2 eventos; 3 actividades
		$data['menu'] = $this->web_model->selectMenuActivo();	
		
		$data['eventos'] = $this->web_model->selectAsidePagina('6');	
		$data['noticias'] = $this->web_model->selectAsidePagina('5');
 
		$data['archivo'] = $this->web_model->gridArchivo();	
		
		$data['grid'] = $this->web_model->buscar_registro($numdocumento);
 
		$this->web_model->updateVisita('mensaje');
		$this->_render_page('seguimiento_view', $data);
        //$this->load->view('seguimiento_view',$data);   

	
	}


	##################### HASTA AQUI
 		 
	public function laescuela($codpagina = '',$parametros='')
	{		// echo $codpagina.'La escuela aquiiii/'.$parametros;
			$data = array(
			'title_pag' => 'UNCP' 
			
			);	
			//1: tramites;2 eventos; 3 actividades
		$data['menu'] = $this->web_model->selectMenuActivo();	
		
		$data['eventos'] = $this->web_model->selectAsidePagina('6');	
		$data['noticias'] = $this->web_model->selectAsidePagina('5');
		 
		$data['pagina'] = $this->web_model->gridPagina($codpagina);	
		$data['archivo'] = $this->web_model->gridArchivo();	
		 
		$this->web_model->updateVisita($codpagina);
		$this->_render_page('web_conaside_view', $data);
	}
	
	public function tramite($codpagina = '',$parametros='')
	{		// echo $codpagina.'La escuela aquiiii/'.$parametros;
		 
			//$data['codpagina'] = $codpagina;
		  
		$data['menu'] = $this->web_model->selectMenuActivo();
		
		$data['eventos'] = $this->web_model->selectAsidePagina('6');	
		$data['noticias'] = $this->web_model->selectAsidePagina('5');	
		$data['pagina'] = $this->web_model->gridPagina($codpagina);	
		$titulo = '';
		if ($data['pagina']) { 
	 	//foreach ($data['pagina'] as $fila) { 
			$titulo = $data['pagina']->Titulo.' - ';
			 
	     //}
		  }
		$data['title_pag'] = $titulo.'Parque cientício - UNCP' ;
		
		$data['archivo'] = $this->web_model->gridArchivo();	
		$this->web_model->updateVisita($codpagina);	
		$this->_render_page('web_conaside_view', $data);
	}
	public function evento($codpagina = '',$parametros='')
	{		// echo $codpagina.'La escuela aquiiii/'.$parametros;
		 
			//$data['codpagina'] = $codpagina;
		$data['menu'] = $this->web_model->selectMenuActivo();
		
		$data['eventos'] = $this->web_model->selectAsidePagina('6');	
		$data['noticias'] = $this->web_model->selectAsidePagina('5');		
		$data['pagina'] = $this->web_model->gridPagina($codpagina);	
		$titulo = '';
		if ($data['pagina']) { 
	 //	foreach ($data['pagina'] as $fila) { 
			$titulo = $data['pagina']->Titulo.' - ';
			 
	   //  } 
		 }
		$data['title_pag'] = $titulo.'Parque cientício - UNCP' ;
		
		$data['archivo'] = $this->web_model->gridArchivo();	
		
		$this->web_model->updateVisita($codpagina);
		$this->_render_page('web_actividad_view', $data);
	}
	public function noticia($codpagina = '',$parametros='')
	{		// echo $codpagina.'La escuela aquiiii/'.$parametros;
			
			//$data['codpagina'] = $codpagina;
		$data['menu'] = $this->web_model->selectMenuActivo();
		
		$data['eventos'] = $this->web_model->selectAsidePagina('6');	
		$data['noticias'] = $this->web_model->selectAsidePagina('5');		
		$data['pagina'] = $this->web_model->gridPagina($codpagina);	
		$titulo = '';
		if ($data['pagina']) { 
	 	 
			$titulo =$data['pagina']->Titulo.' - ';
			 
	     }
		$data['title_pag'] = $titulo.'Parque cientício - UNCP' ;
			
		$data['archivo'] = $this->web_model->gridArchivo();	
		$this->web_model->updateVisita($codpagina);
		$this->_render_page('web_actividad_view', $data);
	}
	
		public function pagina($codpagina = '',$parametros='')
	{		// echo $codpagina.'La escuela aquiiii/'.$parametros;
				
			//$data['codpagina'] = $codpagina;
		  
		$data['menu'] = $this->web_model->selectMenuActivo();
		
		$data['eventos'] = $this->web_model->selectAsidePagina('6');	
		$data['noticias'] = $this->web_model->selectAsidePagina('5');	
		
		
			
		$data['pagina'] = $this->web_model->gridPagina($codpagina);	
		
		$titulo = '';
		if ($data['pagina']) { 
	 //	foreach ($data['pagina'] as $fila) { 
			$titulo = $data['pagina']->Titulo.' - ';
			 
	     //}
		  }
		$data['title_pag'] = $titulo.'Parque cientício - UNCP' ;
		
		$data['archivo'] = $this->web_model->gridArchivo();	
		$this->web_model->updateVisita($codpagina);
		$this->_render_page('web_conaside_view', $data);
	}
	
	public function proyecto($codpagina = '')
	{	 
		$this->web_model->updateVisita($codpagina);
		$data['menu'] = $this->web_model->selectMenuActivo();
		
		$data['eventos'] = $this->web_model->selectAsidePagina('6');	
		$data['noticias'] = $this->web_model->selectAsidePagina('5'); 
		$data['archivo'] = $this->web_model->gridArchivo();	
		 
		if($codpagina == 'Lista-de-practicas'){
			 
			
		}else if($codpagina == 'lista-de-proyectos'){
			$data['grid'] =  $this->web_model->gridProyectoCulminado();	
			$data['title_pag'] = 'Lista de proyectos' ;	
			$this->_render_page('web_listapracticas_view', $data);	
		}
		 
		
		
	}
 
}
