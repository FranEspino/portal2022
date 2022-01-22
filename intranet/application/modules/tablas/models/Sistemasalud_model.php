<?php 

class Sistemasalud_model extends CI_Model {

    private $dbadmin = "";
	

    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridSistemasalud() {
		 
        $query = $this->dbadmin->get("sistemasalud");
		
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
	
	
		public function rowSistemasalud($idsistemasalud) {
        $this->dbadmin->where("sistemasalud.sistemasalud_id ", $idsistemasalud);
        $query = $this->dbadmin->get("sistemasalud");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updateSistemasalud($idsistemasalud, $post) {
        $this->dbadmin->where("sistemasalud_id ", $idsistemasalud);
        $this->dbadmin->update("sistemasalud", $post);
    }

    public function insertSistemasalud($post) {
        $this->dbadmin->insert("sistemasalud", $post);
		$idsistemasalud = $this->dbadmin->insert_id();    
		return $idsistemasalud;    
    }
	function eliminarSistemasalud($idsistemasalud = '')
	{
		$this->dbadmin->where('sistemasalud_id',$idsistemasalud);
		return $this->dbadmin->delete('sistemasalud');
	}

}

?>
