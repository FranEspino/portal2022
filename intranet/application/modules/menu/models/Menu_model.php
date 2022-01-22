<?php 

class Menu_model extends CI_Model {

    private $dbadmin = "";
	

    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridMenu() {
		$this->dbadmin->join("web_tb_primermenu", "web_tb_primermenu.id_primermenu = web_tb_menu.id_primermenu");
        $query = $this->dbadmin->get("web_tb_menu");
		
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
	
	public function gridPrimerMenu() { 
        $query = $this->dbadmin->get("web_tb_primermenu");
		
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
	
	public function rowMenu($idmenu) {
        $this->dbadmin->where("id_menu ", $idmenu);
        $query = $this->dbadmin->get("web_tb_menu");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updateMenu($idmenu, $post) {
        $this->dbadmin->where("id_menu ", $idmenu);
        $this->dbadmin->update("web_tb_menu", $post);
    }

    public function insertMenu($post) {
        $this->dbadmin->insert("web_tb_menu", $post);
		$idmenu = $this->dbadmin->insert_id();    
		return $idmenu;    
    }
	function eliminarMenu($idmenu = '')
	{
		$this->dbadmin->where('id_menu',$idmenu);
		return $this->dbadmin->delete('web_tb_menu');
	}

}

?>
