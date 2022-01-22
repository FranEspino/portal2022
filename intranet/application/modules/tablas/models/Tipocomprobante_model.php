<?php 

class Tipocomprobante_model extends CI_Model {

    private $dbadmin = "";
    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridTipocomprobante() {
		$this->dbadmin->where("status_tipocomp", 'AC'); 
        $query = $this->dbadmin->get("tb_tipocomprobante");
		
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
	
	
		public function rowTipocomprobante($idtipocomprobante) {
        $this->dbadmin->where("id_tipocomprobante ", $idtipocomprobante);
        $query = $this->dbadmin->get("tb_tipocomprobante");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updateTipocomprobante($idtipocomprobante, $post) {
        $this->dbadmin->where("id_tipocomprobante ", $idtipocomprobante);
        $this->dbadmin->update("tb_tipocomprobante", $post);
    }

    public function insertTipocomprobante($post) {
        $this->dbadmin->insert("tb_tipocomprobante", $post);
		$idtipocomprobante = $this->dbadmin->insert_id();    
		return $idtipocomprobante;    
    }
	function eliminarTipocomprobante($idtipocomprobante = '')
	{
		$this->dbadmin->where('id_tipocomprobante',$idtipocomprobante);
		return $this->dbadmin->delete('tb_tipocomprobante');
	}

       public function selectTipocomprobante() {
        $query = $this->dbadmin->get("tb_tipocomprobante");
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
