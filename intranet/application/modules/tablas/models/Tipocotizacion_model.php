<?php 

class Tipocotizacion_model extends CI_Model {

    private $dbadmin = "";
	

    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridTipocotizacion() {
		 
        $query = $this->dbadmin->get("tb_tipocotizacion");
		
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
	
	
		public function rowTipocotizacion($idtipocotizacion) {
        $this->dbadmin->where("tb_tipocotizacion.idtipocotizacion ", $idtipocotizacion);
        $query = $this->dbadmin->get("tb_tipocotizacion");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updateTipocotizacion($idtipocotizacion, $post) {
        $this->dbadmin->where("idtipocotizacion ", $idtipocotizacion);
        $this->dbadmin->update("tb_tipocotizacion", $post);
    }

    public function insertTipocotizacion($post) {
        $this->dbadmin->insert("tb_tipocotizacion", $post);
		$idtipocotizacion = $this->dbadmin->insert_id();    
		return $idtipocotizacion;    
    }
	function eliminarTipocotizacion($idtipocotizacion = '')
	{
		$this->dbadmin->where('idtipocotizacion',$idtipocotizacion);
		return $this->dbadmin->delete('tb_tipocotizacion');
	}

}

?>
