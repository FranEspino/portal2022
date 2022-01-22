<?php 

class Empresa_model extends CI_Model {

    private $dbadmin = "";
	

    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridEmpresa() {
		$this->dbadmin->join("tb_ubigeo", "tb_ubigeo.ubigeo = sist_tb_empresa.id_ubigeo");
        $query = $this->dbadmin->get("sist_tb_empresa");		
       // $query = $this->dbadmin->get();
		return $query->result();
    }
	
	public function gridUbigeo() {
		 
        $query = $this->dbadmin->get("tb_ubigeo");
		
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $fila) {
                $data[] = $fila;
            }
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }
	
	public function rowEmpresa($idempresa) { 
        $this->dbadmin->where("id_empresa ", $idempresa);
        $query = $this->dbadmin->get("sist_tb_empresa");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }
	
	public function gridArea() {		 
        $query = $this->dbadmin->get("sist_tb_area");		
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $fila) {
                $data[] = $fila;
            }
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }
	
	public function gridCargo() {
		 
        $query = $this->dbadmin->get("sist_tb_cargo");		
       // $query = $this->dbadmin->get();
		return $query->result();
    }
	 

    public function updateEmpresa($idempresa, $post) { 
        $this->dbadmin->where("id_empresa", $idempresa);
        $this->dbadmin->update("sist_tb_empresa", $post);
    }

    public function insertEmpresa($post) {
        $this->dbadmin->insert("sist_tb_empresa", $post);
		$idempresa = $this->dbadmin->insert_id();    
		return $idempresa;    
    }
	
	public function insertEmpresaCargo($post) {
        $this->dbadmin->insert("sist_tb_empresa_cargo", $post);
		$idempresa = $this->dbadmin->insert_id();    
		return $idempresa;    
    }
	public function updateEmpresaCargo($idempresacargo, $post) { 
        $this->dbadmin->where("id_empresa_cargo ", $idempresacargo);
        $this->dbadmin->update("sist_tb_empresa_cargo", $post);
    }
	
	
	function eliminarEmpresa($idempresa = '')
	{	
		$this->dbadmin->where("id_empresa", $idempresa);	
		return $this->dbadmin->delete('sist_tb_empresa');
	}
	 
}

?>
