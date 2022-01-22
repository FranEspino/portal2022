<?php 

class Formapago_model extends CI_Model {

    private $dbadmin = "";
	

    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridFormapago() {
		 
        $query = $this->dbadmin->get("formapago");
		
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
	
	
		public function rowFormapago($idformapago) {
        $this->dbadmin->where("formapago.formapago_id ", $idformapago);
        $query = $this->dbadmin->get("formapago");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updateFormapago($idformapago, $post) {
        $this->dbadmin->where("formapago_id ", $idformapago);
        $this->dbadmin->update("formapago", $post);
    }

    public function insertFormapago($post) {
        $this->dbadmin->insert("formapago", $post);
		$idformapago = $this->dbadmin->insert_id();    
		return $idformapago;    
    }
	function eliminarFormapago($idformapago = '')
	{
		$this->dbadmin->where('formapago_id',$idformapago);
		return $this->dbadmin->delete('formapago');
	}

    public function nombreFormaPago() {
        $query_str = "SELECT (SELECT formapago FROM `formapago` WHERE formapago_id = 2) AS formapago2,
(SELECT formapago FROM `formapago` WHERE formapago_id = 3) AS formapago3,
(SELECT formapago FROM `formapago` WHERE formapago_id = 4) AS formapago4";
        $query = $this->dbadmin->query($query_str); 
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
    }

}

?>
