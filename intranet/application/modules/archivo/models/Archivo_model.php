<?php 

class Archivo_model extends CI_Model {

    private $dbadmin = "";
	

    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridArchivo( ) {
		$sql1 = "SELECT * from web_tb_archivo left join sist_tb_area on web_tb_archivo.id_area = sist_tb_area.id_area
 order by 1 desc";            
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
	 
	public function rowArchivo($IdArchivo) {
        $this->dbadmin->where("id_archivo ", $IdArchivo);
        $query = $this->dbadmin->get("web_tb_archivo");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

	 

    public function updateArchivo($IdArchivo, $post) {
        $this->dbadmin->where("id_archivo ", $IdArchivo);
        $this->dbadmin->update("web_tb_archivo", $post);
    }

    public function insertArchivo($post) {
        $this->dbadmin->insert("web_tb_archivo", $post);
		$IdArchivo = $this->dbadmin->insert_id();    
		return $IdArchivo;    
    }
 

}

?>
