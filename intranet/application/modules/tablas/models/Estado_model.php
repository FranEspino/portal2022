<?php 

class Estado_model extends CI_Model {

    private $dbadmin = "";
	

    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridEstado() {
		 
        $query = $this->dbadmin->get("estado");
		
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
	
	
		public function rowEstado($idestado) {
        $this->dbadmin->where("estado.estado_id ", $idestado);
        $query = $this->dbadmin->get("estado");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updateEstado($idestado, $post) {
        $this->dbadmin->where("estado_id ", $idestado);
        $this->dbadmin->update("estado", $post);
    }

    public function insertEstado($post) {
        $this->dbadmin->insert("estado", $post);
		$idestado = $this->dbadmin->insert_id();    
		return $idestado;    
    }
	function eliminarEstado($idestado = '')
	{
		$this->dbadmin->where('estado_id',$idestado);
		return $this->dbadmin->delete('estado');
	}

}

?>
