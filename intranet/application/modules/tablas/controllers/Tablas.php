<?php 
class Tablas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("tablas_model");		
    }
    
    public function jsonUbigeoSelect2(){
		$ubigeo = $this->tablas_model->buscarUbigeo($this->input->get('term'));
		echo json_encode($ubigeo);
    }
 
}
?>