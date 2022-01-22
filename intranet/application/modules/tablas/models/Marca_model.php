<?php 

class Marca_model extends CI_Model {

    private $dbadmin = "";
	

    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridMarca() {
		 
        $query = $this->dbadmin->get("marca");
		
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
	
	
		public function rowMarca($idmarca) {
        $this->dbadmin->where("marca.marca_id ", $idmarca);
        $query = $this->dbadmin->get("marca");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updateMarca($idmarca, $post) {
        $this->dbadmin->where("marca_id ", $idmarca);
        $this->dbadmin->update("marca", $post);
    }

    public function insertMarca($post) {
        $this->dbadmin->insert("marca", $post);
		$idmarca = $this->dbadmin->insert_id();    
		return $idmarca;    
    }
	function eliminarMarca($idmarca = '')
	{
		$this->dbadmin->where('marca_id',$idmarca);
		return $this->dbadmin->delete('marca');
	}

}

?>
