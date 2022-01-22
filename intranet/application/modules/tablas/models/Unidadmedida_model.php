<?php 

class Unidadmedida_model extends CI_Model {

    private $dbadmin = "";
	

    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridUnidadmedida() {
		 
        $query = $this->dbadmin->get("unidadmedida");
		
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
	
	
		public function rowUnidadmedida($idunidadmedida) {
        $this->dbadmin->where("unidadmedida.unidadmedida_id ", $idunidadmedida);
        $query = $this->dbadmin->get("unidadmedida");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updateUnidadmedida($idunidadmedida, $post) {
        $this->dbadmin->where("unidadmedida_id ", $idunidadmedida);
        $this->dbadmin->update("unidadmedida", $post);
    }

    public function insertUnidadmedida($post) {
        $this->dbadmin->insert("unidadmedida", $post);
		$idunidadmedida = $this->dbadmin->insert_id();    
		return $idunidadmedida;    
    }
	function eliminarUnidadmedida($idunidadmedida = '')
	{
		$this->dbadmin->where('unidadmedida_id',$idunidadmedida);
		return $this->dbadmin->delete('unidadmedida');
	}

     public function verifUnidadMed($claseproducto_id){
        $query_str =" SELECT COUNT(p.`producto_id`) cant FROM `producto` p INNER JOIN detalleproducto dp ON p.`producto_id` = dp.`producto_id`
 INNER JOIN `precioproducto` pp ON pp.`producto_id` = p.`producto_id`
 WHERE status_producto ='AC' AND (p.unidadmedida_id = '$claseproducto_id' OR dp.`unidadmedida_id` = '$claseproducto_id' OR pp.`unidadmedida_id` = '$claseproducto_id')";
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
