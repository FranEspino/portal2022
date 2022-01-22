<?php 

class Enfermedad_model extends CI_Model {

    private $dbadmin = "";
	

    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridEnfermedad() {
		 
        $query = $this->dbadmin->get("enfermedad");
		
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
	
	
		public function rowEnfermedad($idenfermedad) {
        $this->dbadmin->where("enfermedad.enfermedad_id ", $idenfermedad);
        $query = $this->dbadmin->get("enfermedad");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updateEnfermedad($idenfermedad, $post) {
        $this->dbadmin->where("enfermedad_id ", $idenfermedad);
        $this->dbadmin->update("enfermedad", $post);
    }

    public function insertEnfermedad($post) {
        $this->dbadmin->insert("enfermedad", $post);
		$idenfermedad = $this->dbadmin->insert_id();    
		return $idenfermedad;    
    }
	function eliminarEnfermedad($idenfermedad = '')
	{
		$this->dbadmin->where('enfermedad_id',$idenfermedad);
		return $this->dbadmin->delete('enfermedad');
	}

}

?>
