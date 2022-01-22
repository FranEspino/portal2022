<?php 

class Usuario_tipo_model extends CI_Model {

    private $dbadmin = "";
	

    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridUsuario_tipo() {
		 
        $query = $this->dbadmin->get("tb_usuario_tipo");
		
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
	
	
		public function rowUsuario_tipo($idusuario_tipo) {
        $this->dbadmin->where("tb_usuario_tipo.idusuario_tipo ", $idusuario_tipo);
        $query = $this->dbadmin->get("tb_usuario_tipo");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updateUsuario_tipo($idusuario_tipo, $post) {
        $this->dbadmin->where("idusuario_tipo", $idusuario_tipo);
        $this->dbadmin->update("tb_usuario_tipo", $post);
    }

    public function insertUsuario_tipo($post) {
        $this->dbadmin->insert("tb_usuario_tipo", $post);
		$idusuario_tipo = $this->dbadmin->insert_id();    
		return $idusuario_tipo;    
    }
	function eliminarUsuario_tipo($idusuario_tipo = '')
	{
		$this->dbadmin->where('idusuario_tipo',$idusuario_tipo);
		return $this->dbadmin->delete('tb_usuario_tipo');
	}

    public function verifTipoUs($claseproducto_id){
        $query_str ="SELECT COUNT(idusuario) cant FROM `tb_usuario` WHERE idusuario_tipo = '$claseproducto_id'";
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
