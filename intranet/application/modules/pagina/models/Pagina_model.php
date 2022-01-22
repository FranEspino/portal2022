<?php 

class Pagina_model extends CI_Model {

    private $dbadmin = "";
	

    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridPagina($idmenu='') {
		  if($idmenu>0){
			$sql1 = "SELECT * from web_tb_pagina left join web_tb_primermenu on web_tb_pagina.IdMenu = web_tb_primermenu.id_primermenu
WHERE IdMenu = '".$idmenu."'";     
}else{
    $sql1 = "SELECT * from web_tb_pagina left join web_tb_primermenu on web_tb_pagina.IdMenu = web_tb_primermenu.id_primermenu
";     
}
		 


       
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
	
	public function gridMenu() {  ///gridCategoria
		$this->dbadmin->where('est_primermenu',1);
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
	
	public function gridArea() { 
        $query = $this->dbadmin->get("sist_tb_area");
		
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
	
	public function gridPersonalArea($idpersonal = ''){ 
		$this->dbadmin->select("sist_tb_personal_cargo.id_area, sist_tb_area.area");			
		$this->dbadmin->join("sist_tb_area", "sist_tb_area.id_area = sist_tb_personal_cargo.id_area");
		$this->dbadmin->where('sist_tb_personal_cargo.id_personal',$idpersonal);
		$this->dbadmin->from('sist_tb_personal_cargo');
		$query = $this->dbadmin->get();
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
	
	
	public function rowPagina($IdPagina) {
        $this->dbadmin->where("IdPagina ", $IdPagina);
        $query = $this->dbadmin->get("web_tb_pagina");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

	public function getExistCodpaginaUpdate($codPagina, $idPagina = '') {
		
		$sql1 = "SELECT * from web_tb_pagina
WHERE CodPagina = '".$codPagina."' and IdPagina != '".$idPagina."'";            
		$query = $this->dbadmin->query($sql1); 		
		$numeroRow = $query->num_rows();        
        return $numeroRow;
        $query->free_result();
    }
	
	public function getExistCodpagina($codPagina) {		
        $this->dbadmin->where("CodPagina", $codPagina);
        $query = $this->dbadmin->get("web_tb_pagina");
		$numeroRow = $query->num_rows();        
        return $numeroRow;
        $query->free_result();
    }
		
	public function rowMenu($id) {
        $this->dbadmin->where("id_primermenu ", $id);
        $query = $this->dbadmin->get("web_tb_primermenu");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updatePagina($IdPagina, $post) {
        $this->dbadmin->where("IdPagina ", $IdPagina);
        $this->dbadmin->update("web_tb_pagina", $post);
    }

    public function insertPagina($post) {
        $this->dbadmin->insert("web_tb_pagina", $post);
		$IdPagina = $this->dbadmin->insert_id();    
		return $IdPagina;    
    }
	function eliminarPagina($IdPagina = '')
	{
		$this->dbadmin->where('IdPagina',$IdPagina);
		return $this->dbadmin->delete('web_tb_pagina');
	}

}

?>
