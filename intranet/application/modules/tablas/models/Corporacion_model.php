<?php 
class Corporacion_model extends CI_Model {

    private $dbadmin = "";
    public function __construct() {
        parent::__construct();		
        $this->dbadmin = $this->load->database("default", true);
    }
	
	public function rowCorporacion($idempresa_corp) {
        $this->dbadmin->where("idempresa_corp ", $idempresa_corp);
        $query = $this->dbadmin->get("tb_corporacion");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function infoCertificado($ruc) {
        $this->dbadmin->where("ruc ", $ruc);        
        $query = $this->dbadmin->get(X_DBADMIN.".tb_certificado");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function infoCliente($ruc) {
        $this->dbadmin->where("ruc ", $ruc);        
        $query = $this->dbadmin->get(X_DBADMIN.".tb_cliente");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function infoApirest($user_id) {
        $this->dbadmin->where("user_id ", $user_id);
        $this->dbadmin->join(X_DBAPI.".users u", "u.id = clients.user_id","left");
        $query = $this->dbadmin->get(X_DBAPI.".clients");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }
    

    public function updateCorporacion($idempresa_corp, $post) {
        $this->dbadmin->where("idempresa_corp", $idempresa_corp);
        $this->dbadmin->update("tb_corporacion", $post);
    }


    public function gridConfig() {        
        $sql1 = "SELECT * from tb_config";               
        $query = $this->dbadmin->query($sql1);
        return $query->result(); 
    } 

    public function rowConfig($name) {
        $this->dbadmin->where("name ", $name);
        $query = $this->dbadmin->get("tb_config");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updateConfig($name, $post) {
        $this->dbadmin->where("name", $name);
        $this->dbadmin->update("tb_config", $post);
    } 
    
    public function insertConfig($post) {
        $this->dbadmin->insert("tb_config", $post);
       // $dres_id = $this->dbadmin->insert_id();    
       // return $dres_id;    
    }
    public function eliminarPlantilla ($tipo,$plantilla){
        
        $sql1 = "UPDATE tb_corporacion SET ".$tipo." = '' WHERE idempresa_corp = 1";
         $this->dbadmin->query($sql1);
        /*$this->dbadmin->where("plantillafact", $tipo);
        $this->dbadmin->update("tb_config", $plantillas);*/

    }
}
?>
