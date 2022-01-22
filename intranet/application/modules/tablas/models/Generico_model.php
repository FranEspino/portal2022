<?php 

class Generico_model extends CI_Model {

    private $dbadmin = "";
	

    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridGenerico() {
		 
        $query = $this->dbadmin->get("tb_generico");
		
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
	
	
	public function rowGenerico($idgenerico) {
        $this->dbadmin->where("generico_id ", $idgenerico);
        $query = $this->dbadmin->get("tb_generico");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updateGenerico($idgenerico, $post) {
        $this->dbadmin->where("generico_id ", $idgenerico);
        $this->dbadmin->update("tb_generico", $post);
    }

    public function insertGenerico($post) {
        $this->dbadmin->insert("tb_generico", $post);
		$idgenerico = $this->dbadmin->insert_id();    
		return $idgenerico;    
    }
	function eliminarGenerico($idgenerico = '')
	{
		$this->dbadmin->where('generico_id',$idgenerico);
		return $this->dbadmin->delete('tb_generico');
	}

}

?>
