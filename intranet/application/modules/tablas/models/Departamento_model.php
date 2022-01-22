<?php 

class Departamento_model extends CI_Model {

    private $dbadmin = "";
	

    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridDepartamento() {
		 
        $query = $this->dbadmin->get("departamento");
		
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
	
	
		public function rowDepartamento($iddepartamento) {
        $this->dbadmin->where("departamento.departamento_id ", $iddepartamento);
        $query = $this->dbadmin->get("departamento");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updateDepartamento($iddepartamento, $post) {
        $this->dbadmin->where("departamento_id ", $iddepartamento);
        $this->dbadmin->update("departamento", $post);
    }

    public function insertDepartamento($post) {
        $this->dbadmin->insert("departamento", $post);
		$iddepartamento = $this->dbadmin->insert_id();    
		return $iddepartamento;    
    }
	function eliminarDepartamento($iddepartamento = '')
	{
		$this->dbadmin->where('departamento_id',$iddepartamento);
		return $this->dbadmin->delete('departamento');
	}

}

?>
