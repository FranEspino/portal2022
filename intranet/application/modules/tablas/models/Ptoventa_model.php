<?php 
class Ptoventa_model extends CI_Model {

    private $dbadmin = "";	
    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridPtoventa() {
		$this->dbadmin->join("tb_ubigeo u", "u.ubigeo = pt.id_ubigeopto",'left');  
        $query = $this->dbadmin->get("tb_puntoventa pt");		
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
	
	
	public function rowPtoventa($idbodega) {
        $this->dbadmin->join("tb_ubigeo u", "u.ubigeo = pt.id_ubigeopto",'left');  
        $this->dbadmin->where("pt.id_ptoventa ", $idbodega);
        $query = $this->dbadmin->get("tb_puntoventa pt");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updatePtoventa($idbodega, $post) {
        $this->dbadmin->where("id_ptoventa ", $idbodega);
        $this->dbadmin->update("tb_puntoventa", $post);
    }

    public function insertPtoventa($post) {
        $this->dbadmin->insert("tb_puntoventa", $post);
		$idbodega = $this->dbadmin->insert_id();    
		return $idbodega;    
    }

	function eliminarPtoventa($idbodega = '')
	{
		$this->dbadmin->where('id_ptoventa',$idbodega);
		return $this->dbadmin->delete('tb_puntoventa');
	}

    public function verifPtoVenta($id_ptoventa){
        $query_str ="SELECT SUM(t.cant) AS cant FROM (SELECT COUNT(id_ptoventa) cant FROM `tb_usuario` WHERE status_usuario !='EL' AND id_ptoventa =$id_ptoventa
 UNION ALL 
-- SELECT COUNT(id_ptoventa) cant FROM `detalleproducto` WHERE id_ptoventa =$id_ptoventa UNION ALL
SELECT COUNT(id_ptoventa) cant FROM `tb_comprobante` WHERE id_ptoventa =$id_ptoventa and status_comprobante != 'AN'
                  ) t ";
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
