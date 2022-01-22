<?php 

class Centrocosto_model extends CI_Model {

    private $dbadmin = "";
	

    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridCentrocosto() {
		 
        $query = $this->dbadmin->get("centrocosto");
		
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
	
	
		public function rowCentrocosto($idcentrocosto) {
        $this->dbadmin->where("centrocosto.centrocosto_id ", $idcentrocosto);
        $query = $this->dbadmin->get("centrocosto");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updateCentrocosto($idcentrocosto, $post) {
        $this->dbadmin->where("centrocosto_id ", $idcentrocosto);
        $this->dbadmin->update("centrocosto", $post);
    }

    public function insertCentrocosto($post) {
        $this->dbadmin->insert("centrocosto", $post);
		$idcentrocosto = $this->dbadmin->insert_id();    
		return $idcentrocosto;    
    }
	function eliminarCentrocosto($idcentrocosto = '')
	{
		$this->dbadmin->where('centrocosto_id',$idcentrocosto);
		return $this->dbadmin->delete('centrocosto');
	}

}

?>
