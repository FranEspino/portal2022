<?php 

class Area_model extends CI_Model {

    private $dbadmin = "";
	

    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
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
	
	
		public function rowArea($idarea) {
        $this->dbadmin->where("id_area", $idarea);
        $query = $this->dbadmin->get("sist_tb_area");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updateArea($idarea, $post) {
        $this->dbadmin->where("id_area ", $idarea);
        $this->dbadmin->update("sist_tb_area", $post);
    }

    public function insertArea($post) {
        $this->dbadmin->insert("sist_tb_area", $post);
		$idarea = $this->dbadmin->insert_id();    
		return $idarea;    
    }
	function eliminarArea($idarea = '')
	{
		$this->dbadmin->where('id_area',$idarea);
		return $this->dbadmin->delete('sist_tb_area');
	}

}

?>
