<?php 

class Plantilla_model extends CI_Model {

    private $dbadmin = "";
	

    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridPlantilla() {
		 
        $query = $this->dbadmin->get("plantilla");
		
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
	
	
		public function rowPlantilla($idplantilla) {
        $this->dbadmin->where("plantilla.plantilla_id ", $idplantilla);
        $query = $this->dbadmin->get("plantilla");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updatePlantilla($idplantilla, $post) {
        $this->dbadmin->where("plantilla_id ", $idplantilla);
        $this->dbadmin->update("plantilla", $post);
    }

    public function insertPlantilla($post) {
        $this->dbadmin->insert("plantilla", $post);
		$idplantilla = $this->dbadmin->insert_id();    
		return $idplantilla;    
    }
	function eliminarPlantilla($idplantilla = '')
	{
		$this->dbadmin->where('plantilla_id',$idplantilla);
		return $this->dbadmin->delete('plantilla');
	}

}

?>
