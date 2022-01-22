<?php 

class Alergia_model extends CI_Model {

    private $dbadmin = "";
	

    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridAlergia() {
		 
        $query = $this->dbadmin->get("alergia");
		
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
	
	
		public function rowAlergia($idalergia) {
        $this->dbadmin->where("alergia.alergia_id ", $idalergia);
        $query = $this->dbadmin->get("alergia");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updateAlergia($idalergia, $post) {
        $this->dbadmin->where("alergia_id ", $idalergia);
        $this->dbadmin->update("alergia", $post);
    }

    public function insertAlergia($post) {
        $this->dbadmin->insert("alergia", $post);
		$idalergia = $this->dbadmin->insert_id();    
		return $idalergia;    
    }
	function eliminarAlergia($idalergia = '')
	{
		$this->dbadmin->where('alergia_id',$idalergia);
		return $this->dbadmin->delete('alergia');
	}

}

?>
