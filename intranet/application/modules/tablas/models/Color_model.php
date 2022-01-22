<?php 

class Color_model extends CI_Model {

    private $dbadmin = "";
	

    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridColor() {
		 
        $query = $this->dbadmin->get("tb_color");
		
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
	
	
		public function rowColor($idcolor) {
        $this->dbadmin->where("tb_color.color_id ", $idcolor);
        $query = $this->dbadmin->get("tb_color");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updateColor($idcolor, $post) {
        $this->dbadmin->where("color_id ", $idcolor);
        $this->dbadmin->update("tb_color", $post);
    }

    public function insertColor($post) {
        $this->dbadmin->insert("tb_color", $post);
		$idcolor = $this->dbadmin->insert_id();    
		return $idcolor;    
    }
	function eliminarColor($idcolor = '')
	{
		$this->dbadmin->where('color_id',$idcolor);
		return $this->dbadmin->delete('tb_color');
	}

}

?>
