<?php 

class Web_model extends CI_Model {

    private $dbadmin = "";	

    public function __construct() {
        parent::__construct();
        $this->dbadmin = $this->load->database("default", true);		
    }
	
	public function gridTipodocumento( ) { 
		$sql1 = "SELECT * from tbg_tipodocumento";            
		$query = $this->dbadmin->query($sql1); 
        return $query->result();
        $query->free_result();
    } 


    public function insertRazonSocial($post) {
        $this->dbadmin->insert("tb_razonsocial", $post);
		$id = $this->dbadmin->insert_id();    
		return $id;    
    }

    public function insertProyecto($post) {
        $this->dbadmin->insert("tb_proyecto", $post);
		$id = $this->dbadmin->insert_id();    
		return $id;    
    }
	
	 
	 public function gridPagina($codpagina=''){ 
		$this->dbadmin->select("*");	
		$this->dbadmin->join("sist_tb_area", "web_tb_pagina.IdArea = sist_tb_area.id_area", 'left');
		$this->dbadmin->from('web_tb_pagina'); 
		$this->dbadmin->where('CodPagina',$codpagina);
		$query = $this->dbadmin->get();
		if ($query->num_rows() > 0) {
            $data = $query->row();
        } else {
            $data = "";
        }
        return $data;
        $query->free_result();
		//return $query->result();
		//$query->free_result();
	 }

    public function buscar_registro($numdocumento){ 
		$this->dbadmin->select("p.*,inv.razonsocial,ase.razonsocial as asesor");	
		$this->dbadmin->join("tb_razonsocial inv", "p.id_investigador = inv.id_razonsocial");
        $this->dbadmin->join("tb_razonsocial ase", "p.id_asesor = ase.id_razonsocial","left");
		$this->dbadmin->from('tb_proyecto p'); 
		$this->dbadmin->where('inv.numdocumento',$numdocumento);
		$query = $this->dbadmin->get();
        return $query->result();
	 }
	 
	public function gridArchivo( ) { 
		$sql1 = "SELECT * from web_tb_archivo left join sist_tb_area on web_tb_archivo.id_area = sist_tb_area.id_area WHERE  web_tb_archivo.estadoarchivo = 1 order by 1 desc";            
		$query = $this->dbadmin->query($sql1); 
        return $query->result();
        $query->free_result();
    } 
 
	 
	  
	 public function selectAsidePagina($idmenu='') {
		
		$sql1 = "SELECT p.CodPagina, p.Titulo,p.SubTitulo, a.area, p.FPublicacion, p.FechaInicio, p.Imagen, SUBSTR(p.Contenido,1,150) as Contenido  FROM `web_tb_pagina` p
 LEFT JOIN `sist_tb_area` a ON p.`IdArea` = a.`id_area`
  WHERE p.`IdMenu` ='".$idmenu."' order by 5 desc";            
		$query = $this->dbadmin->query($sql1);		
		return $query->result();
        $query->free_result();
    }
	
	 public function selectMenuActivo() {
		$sql1 = "SELECT IdMenu AS id_primermenu,CONCAT( CASE IdMenu WHEN 6 THEN 'evento' ELSE 'pagina' END,'/',CodPagina) AS vinculo,
Titulo AS menu FROM web_tb_pagina p WHERE EstadoPublicacion = 1 
UNION ALL
SELECT id_primermenu, vinculo, menu FROM `web_tb_menu` m WHERE est_menu = 1";            
		$query = $this->dbadmin->query($sql1);		
		return $query->result();
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
	 
	 public function updateVisita($codpagina) {
		 
		$sql1 = "UPDATE web_tb_pagina SET CantVisita = IFNULL(CantVisita,0) + 1 WHERE CodPagina = '".$codpagina."'";     	
		$query = $this->dbadmin->query($sql1); 

		$post['cod_pagina'] = $codpagina;
		$post['url']		= $_SERVER['HTTP_HOST'] .  $_SERVER['REQUEST_URI'];//apache_getenv("HTTP_HOST") . apache_getenv("REQUEST_URI");
		$post['ip'] 		= $this->getRealIP();
		$post['nombrepc'] 		= gethostname();
		$post['fch_regcontador'] = date('Y-m-d h:i:s');
		$this->dbadmin->insert("web_tb_contador", $post);   
		 
    }
	
	 public function getRealIP(){

        if (isset($_SERVER["HTTP_CLIENT_IP"])){

            return $_SERVER["HTTP_CLIENT_IP"];

        }elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){

            return $_SERVER["HTTP_X_FORWARDED_FOR"];

        }elseif (isset($_SERVER["HTTP_X_FORWARDED"])){

            return $_SERVER["HTTP_X_FORWARDED"];

        }elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])){

            return $_SERVER["HTTP_FORWARDED_FOR"];

        }elseif (isset($_SERVER["HTTP_FORWARDED"])){

            return $_SERVER["HTTP_FORWARDED"];

        }else{

            return $_SERVER["REMOTE_ADDR"];

        }
    }
}

?>
