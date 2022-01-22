<?php 

class Profesiones_model extends CI_Model {

    private $dbadmin = "";
	

    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridProfesiones() {
		 
        $query = $this->dbadmin->get("tb_profesiones");
		
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
	
	
		public function rowProfesiones($idcargo) {
        $this->dbadmin->where("id_profesion", $idcargo);
        $query = $this->dbadmin->get("tb_profesiones");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updateProfesiones($idcargo, $post) {
        $this->dbadmin->where("id_profesion ", $idcargo);
        $this->dbadmin->update("tb_profesiones", $post);
    }

    public function insertProfesiones($post) {
        $this->dbadmin->insert("tb_profesiones", $post);
		$idcargo = $this->dbadmin->insert_id();    
		return $idcargo;    
    }
	function eliminarProfesiones($idcargo = '')
	{
		$this->dbadmin->where('id_profesion',$idcargo);
		return $this->dbadmin->delete('tb_profesiones');
	}

}

?>
