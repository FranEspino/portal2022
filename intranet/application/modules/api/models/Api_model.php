<?php 

class Proyecto_model extends CI_Model {

    private $dbadmin = "";
	

    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridSolicitudProyecto( ) {
		$sql1 = "SELECT * FROM tb_proyecto p INNER JOIN `tb_razonsocial` r ON 
p.`id_investigador` = r.`id_razonsocial` where sts_proyecto ='RE' ORDER BY p.id_proyecto DESC";            
		$query = $this->dbadmin->query($sql1); 
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

    public function gridProyectoAsesoramiento( ) {
        $sql1 = "SELECT p.*, r.razonsocial, r.numdocumento,r.direccion, r.celular, r.email,r.carrera_profesional, a.razonsocial as asesor, a.numdocumento as doc_asesor
         FROM tb_proyecto p INNER JOIN `tb_razonsocial` r ON 
p.`id_investigador` = r.`id_razonsocial`
LEFT JOIN tb_razonsocial as a on a.id_razonsocial = p.id_asesor

 where sts_proyecto ='AS' ORDER BY p.id_proyecto DESC";            
        $query = $this->dbadmin->query($sql1); 
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

    public function gridProyectoCulminado( ) {
         $sql1 = "SELECT p.*, r.razonsocial, r.numdocumento,r.direccion, r.celular, r.email,r.carrera_profesional, a.razonsocial as asesor, a.numdocumento as doc_asesor
         FROM tb_proyecto p INNER JOIN `tb_razonsocial` r ON 
p.`id_investigador` = r.`id_razonsocial`
LEFT JOIN tb_razonsocial as a on a.id_razonsocial = p.id_asesor

 where sts_proyecto ='CA' ORDER BY p.id_proyecto DESC";       
        $query = $this->dbadmin->query($sql1); 
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

    public function gridAsesor( ) {
        $sql1 = "SELECT * FROM `tb_razonsocial` r where cb_asesor ='Asesor'";            
        $query = $this->dbadmin->query($sql1); 
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

     
	public function rowProyecto($id) {
       // $this->dbadmin->where("id_proyecto", $IdArchivo);
       // $query = $this->dbadmin->get("tb_proyecto");

        $sql1 = "SELECT p.*, r.razonsocial, r.numdocumento,r.direccion, r.celular, r.email,r.carrera_profesional, a.razonsocial as asesor, a.numdocumento as doc_asesor
         FROM tb_proyecto p INNER JOIN `tb_razonsocial` r ON 
p.`id_investigador` = r.`id_razonsocial`
LEFT JOIN tb_razonsocial as a on a.id_razonsocial = p.id_asesor

 where id_proyecto ='".$id."'"; 
        $query = $this->dbadmin->query($sql1); 
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

	 

    public function updateProducto($id, $post) {
        $this->dbadmin->where("id_proyecto", $id);
        $this->dbadmin->update("tb_proyecto", $post);
    }

    public function insertProducto($post) {
        $this->dbadmin->insert("tb_proyecto", $post);
		$id = $this->dbadmin->insert_id();    
		return $id;    
    }
 

}

?>
