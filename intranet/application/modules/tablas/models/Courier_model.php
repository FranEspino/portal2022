<?php 

class Courier_model extends CI_Model {

    private $dbadmin = "";
	

    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridCourier() {
		 
        $query = $this->dbadmin->get("tb_courier");
		
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
	
	
		public function rowCourier($idcourier) {
        $this->dbadmin->where("id_courier ", $idcourier);
        $query = $this->dbadmin->get("tb_courier");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updateCourier($idcourier, $post) {
        $this->dbadmin->where("id_courier ", $idcourier);
        $this->dbadmin->update("tb_courier", $post);
    }

    public function insertCourier($post) {
        $this->dbadmin->insert("tb_courier", $post);
		$idcourier = $this->dbadmin->insert_id();    
		return $idcourier;    
    }
	function eliminarCourier($idcourier = '')
	{
		$this->dbadmin->where('id_courier',$idcourier);
		return $this->dbadmin->delete('tb_courier');
	}

}

?>
