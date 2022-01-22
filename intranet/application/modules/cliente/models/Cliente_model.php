<?php 

class Cliente_model extends CI_Model {

    private $dbadmin = "";
	

    public function __construct() {
        parent::__construct();
		
        $this->dbadmin = $this->load->database("default", true);
    }

	public function gridCliente() {		 
		$sql1 = "
		SELECT * FROM `tb_razonsocial`
		LEFT JOIN `tb_ubigeo` ON `tb_razonsocial`.`ubigeo` = `tb_ubigeo`.`ubigeo`
		LEFT JOIN `tbg_tipodocumento` td ON td.`id_tipodocumento`=tb_razonsocial.`id_tipodocumento`";

		/*$this->dbadmin->join("tb_ubigeo", "tb_razonsocial.ubigeo = tb_ubigeo.ubigeo","left");
        $query = $this->dbadmin->get("tb_razonsocial");*/
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
	
	
	public function rowCliente($idcliente) { 
        $this->dbadmin->where("tb_razonsocial.id_razonsocial ", $idcliente);
        $query = $this->dbadmin->get("tb_razonsocial");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }

    public function updateCliente($idcliente, $post) {
        $this->dbadmin->where("id_razonsocial ", $idcliente);
        $this->dbadmin->update("tb_razonsocial", $post);
    }

    public function insertCliente($post) {
        $this->dbadmin->insert("tb_razonsocial", $post);
		$idcliente = $this->dbadmin->insert_id();    
		return $idcliente;    
    }
	function eliminarCliente($idcliente = '')
	{	
		$this->dbadmin->where("id_razonsocial", $idcliente);	
		return $this->dbadmin->delete('tb_razonsocial');
	}
	
	//Datos clinicos
	
	
	public function gridClienteMedico($id_razonsocial = ''){ 
		$this->dbadmin->select("*");			
		$this->dbadmin->join("medico", "clientemedico.medico_id = medico.medico_id");
		$this->dbadmin->where('clientemedico.id_razonsocial',$id_razonsocial);
		$this->dbadmin->from('clientemedico');
		$query = $this->dbadmin->get();
		return $query->result();
	 }
	 
	 public function gridClienteReceta($id_razonsocial = ''){ 
		$this->dbadmin->select("*");		 
		$this->dbadmin->where('clientereceta.id_razonsocial',$id_razonsocial);
		$this->dbadmin->from('clientereceta');
		$query = $this->dbadmin->get();
		return $query->result();
	 }
	 	 
	 public function gridClienteEnferm($id_razonsocial = ''){ 
		$this->dbadmin->select("*");		
		$this->dbadmin->join("enfermedad", "enfermedad.enfermedad_id = clienteenfermedad.enfermedad_id"); 
		$this->dbadmin->where('clienteenfermedad.id_razonsocial',$id_razonsocial);
		$this->dbadmin->from('clienteenfermedad');
		$query = $this->dbadmin->get();
		return $query->result();
	 }
	 
	 public function gridClienteMedicam($id_razonsocial = ''){ 
		$this->dbadmin->select("*");
		$this->dbadmin->join("producto", "producto.producto_id = clientemedicamento.medicamento_id");  	
		$this->dbadmin->join("unidadmedida", "unidadmedida.unidadmedida_id = producto.unidadmedida_id"); 
		$this->dbadmin->where('clientemedicamento.id_razonsocial',$id_razonsocial);
		$this->dbadmin->from('clientemedicamento');
		$query = $this->dbadmin->get();
		return $query->result();
	 }
	 
	 
	 
	public function insertClienteMedico($post) {
        $this->dbadmin->insert("clientemedico", $post);
		$idcliente = $this->dbadmin->insert_id();    
		return $idcliente;    
    }
	public function insertClienteReceta($post) {
        $this->dbadmin->insert("clientereceta", $post);
		$idcliente = $this->dbadmin->insert_id();    
		return $idcliente;    
    }
	
	public function insertClienteEnfermedad($post) {
        $this->dbadmin->insert("clienteenfermedad", $post);
		$idcliente = $this->dbadmin->insert_id();    
		return $idcliente;    
    }
		
	public function insertClienteMedicam($post) {
        $this->dbadmin->insert("clientemedicamento", $post);
		$idcliente = $this->dbadmin->insert_id();    
		return $idcliente;    
    }
	function eliminarClienteMedico($idclientemedico = '')
	{	
		$this->dbadmin->where("clientemedico_id", $idclientemedico);	
		return $this->dbadmin->delete('clientemedico');
	}
	function eliminarClienteReceta($idclientereceta = '')
	{	
		$this->dbadmin->where("clientereceta_id", $idclientereceta);	
		return $this->dbadmin->delete('clientereceta');
	}
	function eliminarClienteEnferm($idclienteenferm = '')
	{	
		$this->dbadmin->where("clienteenfermedad_id", $idclienteenferm);	
		return $this->dbadmin->delete('clienteenfermedad');
	}
	function eliminarClienteMedicam($idclientemedicam = '')
	{	
		$this->dbadmin->where("clientemedicamento_id", $idclientemedicam);	
		return $this->dbadmin->delete('clientemedicamento');
	}
	

 // === Razon social ===	 
	 function gridRazonSocial(){	 
		$sql = "SELECT * FROM `tb_razonsocial` r LEFT JOIN `tb_tiporazonsocial` tr ON r.id_tiporazonsocial = tr.id_tiporazonsocial"; 
		$query = $this->dbadmin->query($sql);
		return $query->result();	  
	 }
	 
	 function gridRazonSocialSelect2($parametro){	 
		$sql = "SELECT id_razonsocial AS id, CONCAT_WS(' ', numdocumento,'-',razonsocial) AS text 
 FROM tb_razonsocial WHERE numdocumento LIKE '%".$parametro."%' OR razonsocial LIKE '%".$parametro."%'  ";
 
		$query = $this->dbadmin->query($sql);
		return $query->result();	  
	 }
	 	  
	public function selectTipoRazonS() {
        $query = $this->dbadmin->get("tb_tiporazonsocial");
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
	  
	  public function rowRazonSocial($idrazonsocial) {
        $this->dbadmin->where("id_razonsocial", $idrazonsocial);
        $this->dbadmin->join("tb_ubigeo", "tb_razonsocial.ubigeo = tb_ubigeo.ubigeo","left");
        $this->dbadmin->join("tbg_tipodocumento", "tbg_tipodocumento.id_tipodocumento = tb_razonsocial.id_tipodocumento","left");
        $query = $this->dbadmin->get("tb_razonsocial");
        if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
    }


	/*Funcions de busquedas para verificar si existe dni, ruc, cmp, rne*/
	public function buscaRazonSocialDNI($dni)
    {
		$sql = "select * from tb_razonsocial where dni ='".$dni."'";
		$query = $this->dbadmin->query($sql);
		if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();

		//$numdni = $query->num_rows();
		//return $numdni;
	}
	public function buscaRazonSocialNumero($numdocumento)
    {
		$sql = "select * from tb_razonsocial where numdocumento ='".$numdocumento."'";
		$query = $this->dbadmin->query($sql);
		if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();

		//$numdni = $query->num_rows();
		//return $numdni;
	}
	public function buscaRazonSocialRUC($ruc)
    {
		$sql = "select * from tb_razonsocial where ruc ='".$ruc."'";
		$query = $this->dbadmin->query($sql);
	
		if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
		//$numruc = $query->num_rows();
		//return $numruc;
	}
	
	public function buscaRazonSocialCMP($cmp)
    {
		$sql = "select * from tb_razonsocial where cmp ='".$cmp."'";
		$query = $this->dbadmin->query($sql);
		$numcmp = $query->num_rows();
		return $numcmp;
	}
	
	public function buscaRazonSocialRNE($rne)
    {
		$sql = "select * from tb_razonsocial where rne ='".$rne."'";
		$query = $this->dbadmin->query($sql);
		$numrne = $query->num_rows();
		return $numrne;
	}
	public function buscaRazonSocial($razonsocial)
    {
		$sql = "select * from tb_razonsocial where razonsocial='".$razonsocial."'";
		$query = $this->dbadmin->query($sql);
		$numrs = $query->num_rows();
		return $numrs;
	}
	
			// - Verificar si existe RUC, DNI, CMP, RNE Pero cuando se edite
	public function buscaUpdtRazonSocialDNI($idrs, $dni)
    {
		$sql = "select * from tb_razonsocial where dni ='".$dni."' AND id_razonsocial != '".$idrs."'";
		$query = $this->dbadmin->query($sql);
		if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
		//$numdni = $query->num_rows();
		//return $numdni;
	}
	public function buscaUpdtRazonSocialRUC($idrs, $ruc)
    {
		$sql = "select * from tb_razonsocial where ruc ='".$ruc."' AND id_razonsocial != '".$idrs."'";
		$query = $this->dbadmin->query($sql);
		
		if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
        //$numruc = $query->num_rows();
		//return $numruc;
	}

	public function buscaUpdtRazonSocialNumero($idrs, $numdocumento)
    {
		$sql = "select * from tb_razonsocial where numdocumento ='".$numdocumento."' AND id_razonsocial != '".$idrs."'";
		$query = $this->dbadmin->query($sql);
		
		if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
        //$numruc = $query->num_rows();
		//return $numruc;
	}
	
	public function buscaUpdtRazonSocialCMP($idrs, $cmp)
    {
		$sql = "select * from tb_razonsocial where cmp ='".$cmp."' AND id_razonsocial != '".$idrs."'";
		$query = $this->dbadmin->query($sql);
		$numcmp = $query->num_rows();
		return $numcmp;
	}
	
	public function buscaUpdtRazonSocialRNE($idrs, $rne)
    {
		$sql = "select * from tb_razonsocial where rne ='".$rne."' AND id_razonsocial != '".$idrs."'";
		$query = $this->dbadmin->query($sql);
		$numrne = $query->num_rows();
		return $numrne;
	}
	public function buscaUpdtRazonSocial($idrs, $razonsocial)
    {
		$sql = "select * from tb_razonsocial where razonsocial='".$razonsocial."' AND id_razonsocial != '".$idrs."'";
		$query = $this->dbadmin->query($sql);
		$numrs = $query->num_rows();
		return $numrs;
	}
	/*Fin de funciones de busquedas para verificar si existe RUC; DNI, CMP, RNE*/
	 
	 
	public function insertRazonSocial($add_RazonSocial)
    {
		$this->dbadmin->insert("tb_razonsocial", $add_RazonSocial);
		$idrazons = $this->dbadmin->insert_id();    
		return $idrazons; 
	}
	
	public function updateRazonSocial($id_razonsocial, $add_RazonSocial)
    { 		
		$this->dbadmin->where('id_razonsocial',$id_razonsocial);
  	    $this->dbadmin->update("tb_razonsocial", $add_RazonSocial);  
	}
	
	
	public function insertDoctorEspecialidad($id_especialidad, $max_id)
    {
		$post['fecha_asignacion']=date("Y-m-d");
		$post['id_razonsocial']=$max_id;
		$post['id_especialidad']=$id_especialidad;
		$this->dbadmin->insert("tb_doctorespecialidad", $post);
		$this->dbadmin->insert_id();    
		//return $idusuario; 
	}
	
	public function updateDoctorEspecialidad($id_razonsocial, $id_espec)
    { 		 
		$sql = "UPDATE `tb_doctorespecialidad` SET `id_especialidad` = '".$id_espec."'
 WHERE `id_razonsocial` =  '".$id_razonsocial."' ORDER BY fecha_asignacion DESC LIMIT 1 ";
		$query = $this->dbadmin->query($sql);
	}


	//Medicos
	public function gridTodoMedico() {		 
		$this->dbadmin->where('id_tiporazonsocial','2');
        $this->dbadmin->join("tb_especialidad", "tb_especialidad.id_especialidad = tb_razonsocial.id_especialidad"); 
        $query = $this->dbadmin->get("tb_razonsocial");		
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

    public function gridMedico() {		 
		$this->dbadmin->where('id_tiporazonsocial','2');
		$this->dbadmin->where('flg_medico','1');
        //$this->dbadmin->join("tb_especialidad", "tb_especialidad.id_especialidad = tb_razonsocial.id_especialidad");
        $query = $this->dbadmin->get("tb_razonsocial");		 
		return $query->result();
    }

    public function gridTecnologo() {		 
		$this->dbadmin->where('id_tiporazonsocial','2');
		$this->dbadmin->where('flg_tecnologo','1');
        //$this->dbadmin->join("tb_especialidad", "tb_especialidad.id_especialidad = tb_razonsocial.id_especialidad");
        $query = $this->dbadmin->get("tb_razonsocial");		 
		return $query->result();
    }	

    function getMaxDNI(){	 
		$sql = "SELECT MAX(CAST(numdocumento AS SIGNED)) maxdni FROM `tb_razonsocial` c WHERE LENGTH(CAST(numdocumento AS SIGNED)) < 5";
		$query = $this->dbadmin->query($sql);
		if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();  
	 }

	 public function verifVentaCliente($id_razonsocial)
    {
		$sql = "SELECT COUNT(venta_id) cantventa FROM tb_comprobante WHERE id_razonsocial = '".$id_razonsocial."'";
		$query = $this->dbadmin->query($sql);
		if ($query->num_rows() > 0) {
            $data = $query->row('cantventa');
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
	}

}

?>
