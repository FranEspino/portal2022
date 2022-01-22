<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactanos extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("web_model");
	}
		
	private function _render_page($view, $data = null)
	{
		$this->viewdata = (empty($data)) ? $this->data : $data;

		$this->load->view('head.php', $this->viewdata);
		$this->load->view('header.php', $this->viewdata);
		$this->load->view('nav.php', $this->viewdata);
		$this->load->view($view, $this->viewdata);
		$this->load->view('footer.php', $this->viewdata);
	}

	public function index($pag = '')
	{
		 
		 

		$data['pagina'] = $this->web_model->gridPagina('contactanos');	
		$titulo = '';
		if ($data['pagina']) { 
	 	//foreach ($data['pagina'] as $fila) { 
			$titulo = $data['pagina']->Titulo.' - ';
			 
	     //}
		  }
		$data['title_pag'] = $titulo.'Parque cientício - UNCP' ;
		 
		$data['menu'] = $this->web_model->selectMenuActivo();	
		$data['eventos'] = $this->web_model->selectAsidePagina('6');	
		$data['noticias'] = $this->web_model->selectAsidePagina('5');
		$data['archivo'] = $this->web_model->gridArchivo();	
		//$this->_render_page('contactanos_view', $data);
		$this->_render_page('web_conaside_view', $data);
	}
	
	 
}
