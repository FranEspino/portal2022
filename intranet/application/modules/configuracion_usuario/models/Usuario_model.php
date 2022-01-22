<?php

class Usuario_model extends CI_Model {

    private $dbadmin = "";

    public function __construct() {
        parent::__construct();

        $this->dbadmin = $this->load->database("default", true);
    }
     public function update_token_pc($token,$idusuario)
    {
      $post['token_pc'] = $token;
      $this->dbadmin->where("idusuario", $idusuario);
      $this->dbadmin->update("tb_usuario", $post);
    }
    public function selectUsuarioTipo() {
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


	public function rowUsuario($idusuario) {
        $this->dbadmin->join("tb_usuario_tipo", "tb_usuario_tipo.idusuario_tipo=tb_usuario.idusuario_tipo");
       // $this->dbadmin->join("tb_profesiones", "tb_profesiones.id_profesion=tb_usuario.id_profesion","left");
      //  $this->dbadmin->join("tb_puntoventa", "tb_puntoventa.id_ptoventa = tb_usuario.id_ptoventa");
        //$this->dbadmin->where_not_in("tb_usuario.idusuario_tipo", array(7, 8));
        $this->dbadmin->where("tb_usuario.idusuario", $idusuario);
        $query = $this->dbadmin->get("tb_usuario");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }


    public function rowPersona($id_cuenta) {
       $this->dbadmin->join("usuario", "usuario.id_persona=persona.id_persona");
       // $this->dbadmin->join("tb_profesiones", "tb_profesiones.id_profesion=tb_usuario.id_profesion","left");
      //  $this->dbadmin->join("tb_puntoventa", "tb_puntoventa.id_ptoventa = tb_usuario.id_ptoventa");
        //$this->dbadmin->where_not_in("tb_usuario.idusuario_tipo", array(7, 8));
        $this->dbadmin->where("usuario.id_cuenta", $id_cuenta);
        $query = $this->dbadmin->get("persona");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }



    public function gridUsuario() {
        $this->dbadmin->join("tb_usuario_tipo", "tb_usuario_tipo.idusuario_tipo=tb_usuario.idusuario_tipo");
      //  $this->dbadmin->join("tb_puntoventa", "tb_puntoventa.id_ptoventa = tb_usuario.id_ptoventa");
       // $this->dbadmin->where_not_in("usuario.idusuario_tipo", array(7, 8,13));
		$this->dbadmin->where_not_in("tb_usuario.status_usuario","EL");
        $this->dbadmin->order_by("tb_usuario.idusuario");
        $query = $this->dbadmin->get("tb_usuario");
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

	public function gridUsuarioCorrelativo() {
        $this->dbadmin->join("tb_usuario_tipo", "tb_usuario_tipo.idusuario_tipo=tb_usuario.idusuario_tipo");
        //$this->dbadmin->where_in("tb_usuario.idusuario_tipo", array(1,5)); SOLO LOS VENDEDORES
		$this->dbadmin->where_not_in("tb_usuario.status_usuario","AN");
        $this->dbadmin->order_by("tb_usuario.idusuario");
        $query = $this->dbadmin->get("tb_usuario");
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

/*
    public function gridUsuarioSinCaja($id_ptoventa) {
        $sql1 = "SELECT *
FROM `tb_usuario` u
JOIN `tb_usuario_tipo` ON `tb_usuario_tipo`.`idusuario_tipo`=u.`idusuario_tipo`
LEFT JOIN `tb_usuariocaja` uc ON u.`idusuario` = uc.`id_usucaja` AND uc.`status_u` = 'AC'
WHERE u.`status_usuario` != 'AN' AND u.`id_ptoventa` = '".$id_ptoventa."'  AND uc.id IS NULL
ORDER BY u.`idusuario`";
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
    */

    public function updateUsuario($idusuario, $post) {
        $this->dbadmin->where("idusuario", $idusuario);
        $this->dbadmin->update("tb_usuario", $post);
    }

    public function updatePersona($idcuenta, $post) {
        $this->dbadmin->where("id_cuenta", $idcuenta);
        $this->dbadmin->update("persona", $post);
    }
    public function updateUserPass($post,$db){
        #EDISON
        $this->dbadmin->where("idusuario", '1');//Por defecto el usuario es 1
        $id = $this->dbadmin->update($db.".tb_usuario", $post);
        return $id;
    }
    public function insertUsuario($post) {
        $this->dbadmin->insert("tb_usuario", $post);
		$idusuario = $this->dbadmin->insert_id();
		return $idusuario;
    }

	public function insertUsuarioEmpresa($idempresa, $idusuario) {
//		$this->dbadmin->delete("tb_usuario_corporacion", $idusuario);
		$this->dbadmin->where('idusuario', $idusuario);
		$this->dbadmin->delete('tb_usuario_corporacion');
		$nro_registros = count($idempresa);
		for ($incremento = 0; $incremento < $nro_registros; $incremento++) {
		 	$insert = array(
				'idusuario' => $idusuario,
                'idempresa_corp' => $idempresa[$incremento]
            );

        $this->dbadmin->insert("tb_usuario_corporacion", $insert);
		unset($insert);
		}
    }

	public function selectEmpresa() {
        $query = $this->dbadmin->get("tb_corporacion");
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

	public function selectEmpresaUsuario($idusuario) {
		 $this->dbadmin->where("idusuario", $idusuario);
        $query = $this->dbadmin->get("tb_usuario_corporacion");
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

	public function selectPtoventa() {
        //$query = $this->dbadmin->get("tb_puntoventa");
        if (!in_array("admintodo_ptoventa", $_SESSION['PrivUsuario'])) {
            $this->dbadmin->where("pv.id_ptoventa",$this->session->userdata('id_ptoventa'));
        }
        $this->dbadmin->join("tb_unidadnegocio as un", "un.id_unidadnegocio=pv.id_unidadnegocio");
        $query = $this->dbadmin->get("tb_puntoventa as pv");
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

	public function selectProfesion() {
        $query = $this->dbadmin->get("tb_profesiones");
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

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function selectPtoventaUnidadNegocioXEmpresa($idempresa_corp) {  //saca todos los puntos de venta por Empresa
		$this->dbadmin->where("idempresa_corp",$idempresa_corp);
		$this->dbadmin->join("tb_unidadnegocio", "tb_unidadnegocio.id_unidadnegocio=tb_puntoventa.id_unidadnegocio");
        $query = $this->dbadmin->get("tb_puntoventa");
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


	public function selectPtoventaUnidadNegocioXEmpresaAdmin($idempresa_corp) {  //saca todos los puntos de venta por Empresa
	//	$this->dbadmin->where("idempresa_corp",$idempresa_corp);
		$this->dbadmin->join("tb_unidadnegocio", "tb_unidadnegocio.id_unidadnegocio=tb_puntoventa.id_unidadnegocio");
        $query = $this->dbadmin->get("tb_puntoventa");
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
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function selectUsuario() {
        $query = $this->dbadmin->get("tb_usuario");
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

    public function selectUsuarioAct() {
        $this->dbadmin->where("status_usuario","AC");
        $query = $this->dbadmin->get("tb_usuario");
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

    public function gridUsuarioPtoVenta($id_ptoventa) {
        $this->dbadmin->where("id_ptoventa", $id_ptoventa);
        $this->dbadmin->where_not_in("tb_usuario.status_usuario","EL");
        $query = $this->dbadmin->get("tb_usuario");

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

    public function insertCambioClave($post) {
        $this->dbadmin->insert("historialcambiocontra", $post);
        $idcambio = $this->dbadmin->insert_id();
        return $idcambio;
    }


    function eliminarUsuario($idusuario = '')
    {
        /*$this->dbadmin->where("idusuario", $idusuario);
        return $this->dbadmin->delete('tb_usuario');
        */
        $post['status_usuario'] = 'EL';

        $this->dbadmin->where("idusuario", $idusuario);
        $this->dbadmin->update("tb_usuario", $post);
    }

    ##Privilegio
    public function gridPrivilegio() {
       $this->dbadmin->order_by("numposicion", "asc");
       $query = $this->dbadmin->get("sist_tb_privilegio");
       return $query->result();
       $query->free_result();
    }

    public function updatePermiso($idusuario,$idprivilegio,$estado){
        if($estado=='1'){
            //Registrar o dar privilegio
            $data = array(
                    'idusuario' => $idusuario,
                    'idprivilegio' => $idprivilegio,
                    'idusu_regpriv' => $this->session->userdata('idusuario'),
                    'fch_privusuario' => date('Y-m-d H:i:s')
            );
            $this->dbadmin->insert("sist_tb_privilegiousuario", $data);
            $idusuario = $this->dbadmin->insert_id();
        }else{
            //Eliminar o quitar permiso
            $this->dbadmin->where("idusuario", $idusuario);
            $this->dbadmin->where("idprivilegio", $idprivilegio);
            $this->dbadmin->delete('sist_tb_privilegiousuario');
        }
    }

    public function insertTodoPermiso($idusuario){
        $sql1 = "SELECT idprivilegio FROM sist_tb_privilegio";
        $query = $this->dbadmin->query($sql1);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $fila) {
                $data = array(
                    'idusuario' => $idusuario,
                    'idprivilegio' => $fila->idprivilegio,
                    'idusu_regpriv' => $this->session->userdata('idusuario'),
                    'fch_privusuario' => date('Y-m-d H:i:s')
                );
                $this->dbadmin->insert("sist_tb_privilegiousuario", $data);
            }
        } else {
           // $data = "";
        }
        return ;//'' $existe;
        $query->free_result();
    }

    public function insertPermisoTipoUsuario($idusuario){
        //Cajero
        $permisos = array(1,2,3,4,5, 6,11,12,13,14,15,16, 20,21, 25,26, 63,64,67, 70, 79,80,82,83,84,86);

        //saco el numero de elementos
        $longitud = count($permisos);
        //Recorro todos los elementos
        for($i=0; $i<$longitud; $i++){
            $data = array(
                'idusuario' => $idusuario,
                'idprivilegio' => $permisos[$i],
                'idusu_regpriv' => $this->session->userdata('idusuario'),
                'fch_privusuario' => date('Y-m-d H:i:s')
            );
            $this->dbadmin->insert("sist_tb_privilegiousuario", $data);
        }
        return ;//'' $existe;
        $query->free_result();
    }

    //Verificar que el username no exista en todos los base de datos
    public function verifUsuario($username){
        $existe = false;
        $username = strtoupper($username);
        $sql1 = "SELECT db_empresa FROM ".X_DBADMIN.".`tb_cliente` WHERE status_cliente != 'EL'";
        $query = $this->dbadmin->query($sql1);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $fila) {
                $db_empresa = $fila->db_empresa;
                $sqlu = "SELECT idusuario, email_usuario FROM ".$db_empresa.".`tb_usuario` WHERE UPPER(username) = '$username'";
                $queryu = $this->dbadmin->query($sqlu);
                if($queryu->result()){
                    $existe = true;
                }
            }
        } else {
           // $data = "";
        }
        return $existe;
        $query->free_result();
    }

    public function verifUsuarioUpdate($idusuario,$username){
        $existe = false;
        $username = strtoupper($username);
        $sql1 = "SELECT db_empresa FROM ".X_DBADMIN.".`tb_cliente` WHERE status_cliente != 'EL'";
        $query = $this->dbadmin->query($sql1);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $fila) {
                $db_empresa = $fila->db_empresa;
                $sqlu = "SELECT idusuario, email_usuario FROM ".$db_empresa.".`tb_usuario` WHERE UPPER(username) = '$username' and idusuario != '$idusuario'";
                $queryu = $this->dbadmin->query($sqlu);
                if($queryu->result()){
                    $existe = true;
                }
            }
        } else {
           // $data = "";
        }
        return $existe;
        $query->free_result();
    }

    public function verifUsuarioLocal($username){
        $existe = false;
        $username = strtoupper($username);
        $sqlu = "SELECT idusuario, email_usuario FROM `tb_usuario` WHERE UPPER(username) = '$username'";
        $queryu = $this->dbadmin->query($sqlu);
        if($queryu->result()){
            $existe = true;
        }
        return $existe;
        $query->free_result();
    }

    public function verifUsuarioUpdateLocal($idusuario,$username){
        $existe = false;
        $username = strtoupper($username);
        $sqlu = "SELECT idusuario, email_usuario FROM `tb_usuario` WHERE UPPER(username) = '$username' and idusuario != '$idusuario'";
        $queryu = $this->dbadmin->query($sqlu);
        if($queryu->result()){
            $existe = true;
        }
        return $existe;
        $query->free_result();
    }


    public function gridAsistenciaHoy() {
       $this->dbadmin->where('id_personal',  $this->session->userdata('idusuario'));
       $this->dbadmin->where('fch_asistencia', date('Y-m-d'));
       $this->dbadmin->order_by("id_asistencia", "desc");
       $query = $this->dbadmin->get("tb_asistencia");
       return $query->result();
       $query->free_result();
    }

    public function ultimaAsistencia() {
       $this->dbadmin->where('id_personal',  $this->session->userdata('idusuario'));
       $this->dbadmin->where('fch_asistencia', date('Y-m-d'));
       $this->dbadmin->order_by("id_asistencia", "desc");
       $query = $this->dbadmin->get("tb_asistencia");
       if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function insertAsistencia($post) {
        $this->dbadmin->insert("tb_asistencia", $post);
    }


    public function gridOtrosUsuario() {
        $sqlu = "SELECT p.*,u.*,tc.`nombre` AS tipocuenta FROM `usuario` u 
INNER JOIN `persona` p ON u.id_persona =  p.id_persona
INNER JOIN `tipo_cuenta` tc ON u.`id_tipocuenta` = tc.`id_tipocuenta`";
        $query = $this->dbadmin->query($sqlu);
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
}
?>
