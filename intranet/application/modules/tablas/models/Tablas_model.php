<?php 
class Tablas_model extends CI_Model {
    private $dbadmin = "";
    public function __construct() {
        parent::__construct();		
        $this->dbadmin = $this->load->database("default", true);
    }

    public function buscarUbigeo($ubigeo) {      
        $sql1 = "SELECT u.ubigeo as id, nomubigeo as text FROM (SELECT ubigeo, CONCAT_WS(' | ',ubigeo,`distrito`, provincia, CONCAT('DPTO DE ',departamento)) AS nomubigeo FROM `tb_ubigeo` ) u
WHERE u.nomubigeo LIKE '%$ubigeo%'";            
        $query = $this->dbadmin->query($sql1); 
        return $query->result();
        $query->free_result();
    }


    public function rowUbigeo($codigo) {      
        $sql1 = "SELECT *  FROM ".X_DBADMIN.".`tb_ubigeo`  u
WHERE u.ubigeo = '$codigo'";            
        $query = $this->dbadmin->query($sql1); 

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