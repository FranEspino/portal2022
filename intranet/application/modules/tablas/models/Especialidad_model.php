<?php 

class Especialidad_model extends CI_Model {

    private $dbadmin = "";
    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridEspecialidad() {
		 
        $query = $this->dbadmin->get("tb_especialidad");
		
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
	
	
		public function rowEspecialidad($idespecialidad) {
        $this->dbadmin->where("id_especialidad ", $idespecialidad);
        $query = $this->dbadmin->get("tb_especialidad");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updateEspecialidad($idespecialidad, $post) {
        $this->dbadmin->where("id_especialidad ", $idespecialidad);
        $this->dbadmin->update("tb_especialidad", $post);
    }

    public function insertEspecialidad($post) {
        $this->dbadmin->insert("tb_especialidad", $post);
		$idespecialidad = $this->dbadmin->insert_id();    
		return $idespecialidad;    
    }
	function eliminarEspecialidad($idespecialidad = '')
	{
		$this->dbadmin->where('id_especialidad',$idespecialidad);
		return $this->dbadmin->delete('tb_especialidad');
	}

       public function selectEspecialidad() {
        $query = $this->dbadmin->get("tb_especialidad");
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
    

}

?>
