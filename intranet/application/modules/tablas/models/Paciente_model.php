<?php 

class Cliente_model extends CI_Model {

    private $dbadmin = "";
	

    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridCliente() {
		 
        $query = $this->dbadmin->get("tb_razonsocial");
		
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
	
	
		public function rowCliente($idcliente) {
        $this->dbadmin->where("tb_razonsocial.id_razonsocial ", $idcliente);
        $query = $this->dbadmin->get("tb_razonsocial");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updateCliente($idcliente, $post) {
        $this->dbadmin->where("id_razonsocial ", $idcliente);
        $this->dbadmin->update("tb_razonsocial", $post);
    }

    public function insertCliente($post) {
        $this->dbadmin->insert("tb_razonsocial", $post);
		$idcliente = $this->dbadmin->insert_id();    
		return $idcliente;    
    }
	function eliminarCliente($idcliente = '')
	{
		$this->dbadmin->where('id_razonsocial',$idcliente);
		return $this->dbadmin->delete('tb_razonsocial');
	}

}

?>
