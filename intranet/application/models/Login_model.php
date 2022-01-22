<?php

class Login_model extends CI_Model {

    private $dbadmin = "";

    public function __construct() {
        parent::__construct();
        $this->dbadmin = $this->load->database("default", true);
		//$this->load->library("encrypt");
    }


    public function rowUsuario($username){
        $this->dbadmin->select('tb_usuario.*,tb_usuario_tipo.nombre_usuario_tipo, tb_usuario_tipo.nombre_area');
        $this->dbadmin->join("tb_usuario_tipo", "tb_usuario_tipo.idusuario_tipo=tb_usuario.idusuario_tipo");   
        $this->dbadmin->where("username", $username);
       // $this->dbadmin->where("password", $password);
        //$this->dbadmin->where_not_in("usuario_tipo.idusuario_tipo", array('7','8'));
        $this->dbadmin->where_in("tb_usuario.status_usuario", 'AC');
        $query = $this->dbadmin->get("tb_usuario");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
    }


    public function rowUsuariXSXXXo($username, $password) {	 
		$this->dbadmin->join("sist_tb_personal", "sist_tb_personal.id_personal = sist_tb_usuario.idpersona"); 
		$this->dbadmin->join("sist_tb_tipopersona", "sist_tb_tipopersona.id_tipopersona = sist_tb_usuario.id_tipopersona");
        $this->dbadmin->where("username", $username);
        $this->dbadmin->where("password", $password);
		$this->dbadmin->where("usu_estado", "1");
        $query = $this->dbadmin->get("sist_tb_usuario");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
    }

    public function gridPrivilegioUsuario($idusuario) {
        $query_str = "select * from 	sist_tb_privilegiousuario inner join sist_tb_privilegio on 	sist_tb_privilegiousuario.id_privilegio = 	sist_tb_privilegio.id_privilegio where id_usuario  =?";
        $query = $this->dbadmin->query($query_str, $idusuario);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $fila) {
                $data[] = $fila;
            }
        } else {
            $data = "";
        }
        return $data;
    }
	public function gridCargoPersonal($idpersonal) {
        $query_str = "select * from sist_tb_personal_cargo where id_personal  =?";
        $query = $this->dbadmin->query($query_str, $idpersonal);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $fila) {
                $data[] = $fila;
            }
        } else {
            $data = "";
        }
        return $data;
    }
	//------------------
    public function gridAccesoUsuario($idusuario_tipo) {
        $query_str = "SELECT tb_usuario_acceso.idusuario_tipo, tb_usuario_acceso.idmodulo, tb_usuario_acceso.permiso, tb_modulos.nombre_modulo 
					FROM dbjjsalud_admin.tb_modulos
					INNER JOIN dbjjsalud_admin.tb_usuario_acceso ON (tb_modulos.idmodulo = tb_usuario_acceso.idmodulo)
					WHERE tb_usuario_acceso.idusuario_tipo =?";
        $query = $this->dbadmin->query($query_str, $idusuario_tipo);
        if ($query->num_rows > 0) {
            foreach ($query->result() as $fila) {
                $data[] = $fila;
            }
        } else {
            $data = "";
        }
        return $data;
    }

    public function gridAccesoEmpresa($idusuario) {
        $query_str = "SELECT tb_usuario_corporacion.idempresa_corp, tb_corporacion.nombre_empresa
					FROM (`dbjjsalud_admin`.`tb_usuario`) 
					JOIN dbjjsalud_admin.tb_usuario_corporacion ON tb_usuario_corporacion.idusuario= tb_usuario.idusuario
					JOIN dbjjsalud_admin.tb_corporacion ON tb_corporacion.idempresa_corp = tb_usuario_corporacion.idempresa_corp
					WHERE tb_usuario.idusuario=$idusuario AND `tb_usuario`.`status_usuario` IN ('AC');";
        $query = $this->dbadmin->query($query_str, $idusuario);
        if ($query->num_rows > 0) {
            foreach ($query->result() as $fila) {
                $data[] = $fila;
            }
        } else {
            $data = "";
        }
        return $data;
    }

}

?>
