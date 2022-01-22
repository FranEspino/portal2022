<?php 

class Elemento_model extends CI_Model {

    private $dbadmin = "";
	

    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

    public function gridMateriales() {
		 
        $this->dbadmin->where("telemento_id", "1");
        $query = $this->dbadmin->get("elemento");
		
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
	public function gridHerramientas() {
		 
        $this->dbadmin->where("telemento_id", "2");
        $query = $this->dbadmin->get("elemento");
		
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
	
	
	public function selectTipoElemento() {
        $query = $this->dbadmin->get("tipo_elemento");
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
	public function selectMarca() {
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
	public function selectEstado() {
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
		public function rowElemento($idelemento) {
        $this->dbadmin->join("tipo_elemento", "tipo_elemento.telemento_id =elemento.telemento_id ");
		$this->dbadmin->join("marca", "marca.marca_id  =elemento.marca_id  ");
		$this->dbadmin->join("estado", "estado.est_id  =elemento.est_id  ");
        $this->dbadmin->where("elemento.elemento_id ", $idelemento);
        $query = $this->dbadmin->get("elemento");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updateElemento($idelemento, $post) {
        $this->dbadmin->where("elemento_id ", $idelemento);
        $this->dbadmin->update("elemento", $post);
    }

    public function insertElemento($post) {
        $this->dbadmin->insert("elemento", $post);
		$idelemento = $this->dbadmin->insert_id();    
		return $idelemento;    
    }
	function eliminarElemento($idelemento = '')
	{
		$this->dbadmin->where('elemento_id',$idelemento);
		return $this->dbadmin->delete('elemento');
	}

}

?>
