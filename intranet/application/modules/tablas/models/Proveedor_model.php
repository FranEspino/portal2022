<?php 

class Proveedor_model extends CI_Model {

    private $dbadmin = "";
	

    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridProveedor() {
		 $this->dbadmin->where("proveedor.status_proveedor ", "AC");
        $query = $this->dbadmin->get("proveedor");
		
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
	
	
		public function rowProveedor($idproveedor) {
        $this->dbadmin->where("proveedor.proveedor_id ", $idproveedor);
        $query = $this->dbadmin->get("proveedor");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updateProveedor($idproveedor, $post) {
        $this->dbadmin->where("proveedor_id ", $idproveedor);
        $this->dbadmin->update("proveedor", $post);
    }

    public function insertProveedor($post) {
        $this->dbadmin->insert("proveedor", $post);
		$idproveedor = $this->dbadmin->insert_id();    
		return $idproveedor;    
    }
	function eliminarProveedor($idproveedor = '')
	{
		//$this->dbadmin->where('proveedor_id',$idproveedor);
		//return $this->dbadmin->delete('proveedor');
        $post['status_proveedor'] = 'EL';
        $this->dbadmin->where("proveedor_id ", $idproveedor);
        $this->dbadmin->update("proveedor", $post);
	}

}

?>
