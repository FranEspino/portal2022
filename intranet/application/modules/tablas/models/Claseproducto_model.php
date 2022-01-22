<?php 

class Claseproducto_model extends CI_Model {

    private $dbadmin = "";
	

    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridClaseproducto() {
		 
        $query = $this->dbadmin->get("claseproducto");		
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
	
	
	public function rowClaseproducto($idclaseproducto) {
        $this->dbadmin->where("claseproducto.claseproducto_id ", $idclaseproducto);
        $query = $this->dbadmin->get("claseproducto");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updateClaseproducto($idclaseproducto, $post) {
        $this->dbadmin->where("claseproducto_id ", $idclaseproducto);
        $this->dbadmin->update("claseproducto", $post);
    }

    public function insertClaseproducto($post) {
        $this->dbadmin->insert("claseproducto", $post);
		$idclaseproducto = $this->dbadmin->insert_id();    
		return $idclaseproducto;    
    }
	function eliminarClaseproducto($idclaseproducto = '')
	{
		$this->dbadmin->where('claseproducto_id',$idclaseproducto);
		return $this->dbadmin->delete('claseproducto');
	}

    public function verifClaseProd($claseproducto_id){
        $query_str ="SELECT COUNT(producto_id) cant FROM `producto` WHERE status_producto ='AC' AND claseproducto_id = '$claseproducto_id'";
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
