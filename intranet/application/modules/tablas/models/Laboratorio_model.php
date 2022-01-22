<?php 

class Laboratorio_model extends CI_Model {

    private $dbadmin = "";
	

    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridLaboratorio() {
		 
        $query = $this->dbadmin->get("tb_laboratorio");
		
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
	
	
		public function rowLaboratorio($idlaboratorio) {
        $this->dbadmin->where("laboratorio_id ", $idlaboratorio);
        $query = $this->dbadmin->get("tb_laboratorio");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updateLaboratorio($idlaboratorio, $post) {
        $this->dbadmin->where("laboratorio_id ", $idlaboratorio);
        $this->dbadmin->update("tb_laboratorio", $post);
    }

    public function insertLaboratorio($post) {
        $this->dbadmin->insert("tb_laboratorio", $post);
		$idlaboratorio = $this->dbadmin->insert_id();    
		return $idlaboratorio;    
    }
	function eliminarLaboratorio($idlaboratorio = '')
	{
		$this->dbadmin->where('laboratorio_id',$idlaboratorio);
		return $this->dbadmin->delete('tb_laboratorio');
	}

}

?>
