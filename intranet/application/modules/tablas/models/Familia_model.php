<?php 

class Familia_model extends CI_Model {

    private $dbadmin = "";
    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridFamilia() {		 
        $query = $this->dbadmin->get("tb_familia");		
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
	
	public function rowFamilia($idlaboratorio) {
        $this->dbadmin->where("id_familia ", $idlaboratorio);
        $query = $this->dbadmin->get("tb_familia");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updateFamilia($idlaboratorio, $post) {
        $this->dbadmin->where("id_familia ", $idlaboratorio);
        $this->dbadmin->update("tb_familia", $post);
    }

    public function insertFamilia($post) {
        $this->dbadmin->insert("tb_familia", $post);
		$idlaboratorio = $this->dbadmin->insert_id();    
		return $idlaboratorio;    
    }
	function eliminarFamilia($idlaboratorio = '')
	{
		$this->dbadmin->where('id_familia',$idlaboratorio);
		return $this->dbadmin->delete('tb_familia');
	}

}

?>
