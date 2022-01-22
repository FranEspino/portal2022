<?php 

class Tipoproducto_model extends CI_Model {

    private $dbadmin = "";
	

    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridTipoproducto() {
		 
        $query = $this->dbadmin->get("tipoproducto");		
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
	
	
	public function rowTipoproducto($idtipoproducto) {
        $this->dbadmin->where("tipoproducto.tipoproducto_id ", $idtipoproducto);
        $query = $this->dbadmin->get("tipoproducto");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updateTipoproducto($idtipoproducto, $post) {
        $this->dbadmin->where("tipoproducto_id ", $idtipoproducto);
        $this->dbadmin->update("tipoproducto", $post);
    }

    public function insertTipoproducto($post) {
        $this->dbadmin->insert("tipoproducto", $post);
		$idtipoproducto = $this->dbadmin->insert_id();    
		return $idtipoproducto;    
    }
	function eliminarTipoproducto($idtipoproducto = '')
	{
		$this->dbadmin->where('tipoproducto_id',$idtipoproducto);
		return $this->dbadmin->delete('tipoproducto');
	}

    public function verifTipoProd($tipoproducto_id){
        $query_str ="SELECT COUNT(producto_id) cant FROM `producto` WHERE status_producto ='AC' AND tipoproducto_id = '$tipoproducto_id'";
        $query = $this->dbadmin->query($query_str);
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

}

?>
