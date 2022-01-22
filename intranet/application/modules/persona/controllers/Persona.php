<?php
class Cliente extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("cliente_model");
	//	$this->load->model("productos/producto_model");
		$this->load->model("tablas/tablas_model");
        //$this->load->model("tablas/especialidad_model");
        $this->load->model("configuracion_usuario/usuario_model");

	}

	public function ruc($ruc){
		  echo file_get_contents("http://ruc.aqpfact.pe/sunat/".$ruc);
	}

	public function eldni($dni){

        //LA LOGICA DE LA PAGINAS ES APELLIDO PATERNO | APELLIDO MATERNO | NOMBRES
		//while(!feof($fp)) {
		//$dni = $_POST['doc'];
		$fp = fopen("https://eldni.com/buscar-por-dni?dni=$dni","r");
		//$fp = fopen($doc, "r");
	    for ($i = 0; $i <= 150; $i++) {
	        $EstWebs[$i] = fgets($fp);
	    }
	    fclose($fp);

		$a1= trim(strip_tags($EstWebs[139])) ;
		$a2= trim(strip_tags($EstWebs[140])) ;
		$a3= trim(strip_tags($EstWebs[141])) ;
		$a4= trim(strip_tags($EstWebs[142])) ;
		$a5=trim($a1." ".$a2." ".$a3." ".$a4);
		echo "$a5";
	}

	public function loretosoft($dni){
		echo 'sadsad';
		$curl = curl_init();
		curl_setopt_array($curl, array(
		 // CURLOPT_URL => "https://www.loretosoft.com/consulta/reniec/consulta.php?ndni=".$dni."&source=EsSalud&=",
			CURLOPT_URL => "https://www.loretosoft.com/consulta/reniec/consulta.php?ndni=71094603&source=EsSalud&=",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		));
		$response = curl_exec($curl);
		var_dump($response);
		curl_close($curl);
		echo $response;
	}


	public function apiperu_dni($dni =""){


		if($dni==''){
			echo json_encode('Ingrese DNI');
			return;
		}
		if(!is_numeric($dni)){
			echo json_encode('No es DNI');
			return;
		}

	$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://consulta.api-peru.com/api/dni/".$dni,
  //CURLOPT_URL => "http://www.unfv.edu.pe/eupg/index.php/servicios/oficina-de-grados-y-titulos",

  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer 8967c1bcf85a2b59917d6ab9ffc557065662f1ec27c7e60bb834e96973dd9eca",
    "Content-Type: application/json"
  ),
));

		$response = curl_exec($curl);
		echo $response;
		curl_close($curl);
		/*$obj =  json_decode($response, true);

		if(isset($obj['data'])){
			$ubigeo = $obj['data']['ubigeo']['2'];
			$infoubigeo['infoubigeo'] = $this->tablas_model->rowUbigeo($ubigeo);
			$resultado = array_merge($obj, $infoubigeo);

			echo json_encode($resultado);
		}else{
			echo $response;
		}*/

	}


	public function apiperu_ruc($ruc =""){
		if($ruc==''){
			echo json_encode( 'Ingrese RUC');
			return;
		}
		if(!is_numeric($ruc)){
			echo json_encode( 'No es RUC');
			return;
		}


	$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://consulta.api-peru.com/api/ruc/".$ruc,
  CURLOPT_SSL_VERIFYPEER => false,

  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer 8967c1bcf85a2b59917d6ab9ffc557065662f1ec27c7e60bb834e96973dd9eca",
    "Content-Type: application/json"
  ),
));

		$response = curl_exec($curl);

		curl_close($curl);
		$obj =  json_decode($response, true);

		if(isset($obj['data'])){
			$ubigeo = $obj['data']['ubigeo']['2'];
			$infoubigeo['infoubigeo'] = $this->tablas_model->rowUbigeo($ubigeo);
			$resultado = array_merge($obj, $infoubigeo);

		echo json_encode($resultado);
		}else{
			echo $response;
		}

	}

	public function apidev_dni($dni =""){
		if($dni==''){
			echo 'Ingrese DNI';
			return;
		}
		if(!is_numeric($dni)){
			echo 'No es DNI';
			return;
		}


	$curl = curl_init();


curl_setopt_array($curl, array(
  CURLOPT_URL => "https://apiperu.dev/api/dni/".$dni,
  //CURLOPT_URL => "http://www.unfv.edu.pe/eupg/index.php/servicios/oficina-de-grados-y-titulos",

  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer b22b9c1906f468ae9f89c3afbad7b0e1b41620688595c40b3a6ad414597ab0a4",
    "Content-Type: application/json"
  ),
));
	$response = curl_exec($curl);
	//	var_dump($response);
		curl_close($curl);
		echo $response;

	}


	public function apidev_ruc($ruc =""){
		if($ruc==''){
			echo 'Ingrese DNI';
			return;
		}
		if(!is_numeric($ruc)){
			echo 'No es DNI';
			return;
		}


	$curl = curl_init();


curl_setopt_array($curl, array(
  CURLOPT_URL => "https://apiperu.dev/api/ruc/".$ruc,
  //CURLOPT_URL => "http://www.unfv.edu.pe/eupg/index.php/servicios/oficina-de-grados-y-titulos",
CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer b22b9c1906f468ae9f89c3afbad7b0e1b41620688595c40b3a6ad414597ab0a4",
    "Content-Type: application/json"
  ),
));


		$response = curl_exec($curl);
		curl_close($curl);

		$obj =  json_decode($response, true);

		if(isset($obj['data'])){
			$ubigeo = $obj['data']['ubigeo']['2'];
			$infoubigeo['infoubigeo'] = $this->tablas_model->rowUbigeo($ubigeo);
			$resultado = array_merge($obj, $infoubigeo);

		echo json_encode($resultado);
		}else{
			echo $response;
		}

	}

	public function apisutran_dni($dni =""){
		if($dni==''){
			echo 'Ingrese DNI';
			return;
		}
		if(!is_numeric($dni)){
			echo 'No es DNI';
			return;
		}


	$curl = curl_init();


curl_setopt_array($curl, array(
  CURLOPT_URL => "http://www.sutran.gob.pe/programas/librerias/wsreniec/cliente.php?numero=".$dni,
  //CURLOPT_URL => "http://www.unfv.edu.pe/eupg/index.php/servicios/oficina-de-grados-y-titulos",

  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
  //  "Authorization: Bearer 4c84f6fa5e11bb14240d06ba627dd7a7e77ec77900dd025c39014d6006364dab",
    "Content-Type: application/json"
  ),
));
	$response = curl_exec($curl);
	//	var_dump($response);
		curl_close($curl);
		echo $response;

	}
    public function gridCliente(){
        $data['grid'] =  $this->cliente_model->gridCliente();
       // var_dump($data['grid'] );
		$data['titulotabla'] = 'Lista de Personas';

        $this->load->view("gridCliente_view",$data);
    }

	public function mantClienteForm($idcliente = ''){
		$data['pers_autoretiro_id'] = $this->cliente_model->gridCliente();
		$data['tb_razonsocial'] = $this->cliente_model->rowCliente($idcliente);
				if($idcliente ==""){
			$data['titulofrm'] = "Agregar Registros";
		}else{
			$data['titulofrm'] = "Editar Registros";
			}
        $this->load->view("form_MantCliente_view",$data);
    }

	public function mantCliente(){

		 //Cedula
		$nombrearchivo = 'Cedula_'.$this->input->post('id_razonsocial').'_'.$this->input->post('cliente_ruc').'-'.rand(5, 15);
        $mi_imagen = 'cedula';
        $config['upload_path'] = "cedula/";
        $config['file_name'] = $nombrearchivo;
        $config['allowed_types'] = "gif|jpg|jpeg|png";
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";

		$this->load->library('upload', $config);
        if (!$this->upload->do_upload($mi_imagen)) {
            $data['uploadError'] = $this->upload->display_errors();
        }else{
			 $data['upload_data'] = $this->upload->data();
		$file_name = $data['upload_data']['file_name'];
		 $post['cedula'] = $file_name;
		}

		 //Comprobante de domicilio
		$nombrearchivo = 'Comp_Domicilio_'.$this->input->post('id_razonsocial').'_'.$this->input->post('cliente_ruc').'-'.rand(5, 100);

         $mi_imagen = 'compdomicilio';
        $config['upload_path'] = "cedula/";
        $config['file_name'] = $nombrearchivo;
        $config['allowed_types'] = "gif|jpg|jpeg|png";
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";

		$this->load->library('upload', $config);
        if (!$this->upload->do_upload($mi_imagen)) {
            $data['uploadError'] = $this->upload->display_errors();
        }else{
			 $data['upload_data'] = $this->upload->data();
		$file_name = $data['upload_data']['file_name'];
		 $post['compdomicilio'] = $file_name;
		}

		$nombrearchivo = 'Comp_Contrato_'.$this->input->post('id_razonsocial').'_'.$this->input->post('cliente_ruc').'-'.rand(5, 100);
        $mi_imagen = 'compcontrato';//$_FILES['file'];
        $config['upload_path'] = "cedula/contrato";
        $config['file_name'] = $nombrearchivo;
        $config['allowed_types'] = "gif|jpg|jpeg|png";
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";

		$this->load->library('upload', $config);
        if (!$this->upload->do_upload($mi_imagen)) {
            $data['uploadError'] = $this->upload->display_errors();
        }else{
			 $data['upload_data'] = $this->upload->data();
		$file_name = $data['upload_data']['file_name'];
		 $post['compcontrato'] = $file_name;
		}

		 $post['id_razonsocial'] = $this->input->post('id_razonsocial');
		 $post['cliente_ruc'] = $this->input->post('cliente_ruc');
		 $post['nombres'] = $this->input->post('nombres');
		 $post['appaterno'] = $this->input->post('appaterno');
		 $post['apmaterno'] = $this->input->post('apmaterno');

		 $post['fechanacimiento'] = $this->input->post('fechanacimiento');
		 $post['sexo'] = $this->input->post('sexo');
		 $post['nacionalidad'] = $this->input->post('nacionalidad');
		 $post['correo'] = $this->input->post('correo');
		 $post['poblacion'] = $this->input->post('poblacion');
		 $post['direccion'] = $this->input->post('direccion');
		 $post['comuna'] = $this->input->post('comuna');
		 $post['municipalidad'] = $this->input->post('municipalidad');
		 $post['referencias'] = $this->input->post('referencias');
		 $post['telefonos'] = $this->input->post('telefonos');
		 $post['sistemasalud_id'] = $this->input->post('sistemasalud_id');
		 $post['pers_autoretiro_id'] = $this->input->post('pers_autoretiro_id');
		 $post['carrera_profesional'] = $this->input->post('carrera_profesional');
		 $post['cb_asesor'] = $this->input->post('cb_asesor');
		 $post['cb_investigador'] = $this->input->post('cb_investigador');

		 $x_post['id_razonsocial'] = $this->input->post('id_razonsocial');
		 $mensaje = '';
		 if ($x_post['id_razonsocial']==''){
			$post['id_razonsocial'] = $x_post['id_razonsocial'];
			$this->cliente_model->insertCliente($post);
			$mensaje = 'Cliente Registrado';
		 }else{
			$this->cliente_model->updateCliente($x_post['id_razonsocial'],$post);
			$mensaje = 'Cliente actualizado';
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridCliente();
		    }

	public function eliminarCliente($idcliente = ''){
		$idcliente ='';
		$idcliente = $this->input->post('idtabla');


		if(strlen(trim($idcliente))>0){
       	 $mensajeEliminacion = $this->cliente_model->eliminarCliente($idcliente);
       	}
		//echo json_encode($mensajeEliminacion);
		echo json_encode('Eliminado');
    }

 //Datos clinicos

	 public function gridDatosClinicos($id_razonsocial = ''){

		$data['medicos'] =  $this->medico_model->gridMedico();
		//$data['medicocliente'] =  $this->cliente_model->gridMedicoCliente($id_razonsocial);

		$data['enfermedad'] =  $this->enfermedad_model->gridEnfermedad();
		$data['infocliente'] = $this->cliente_model->rowCliente($id_razonsocial);
        $data['gridClienteMedico'] =  $this->cliente_model->gridClienteMedico($id_razonsocial);
		$data['gridClienteReceta'] =  $this->cliente_model->gridClienteReceta($id_razonsocial);
		$data['gridClienteEnfermedad'] =  $this->cliente_model->gridClienteEnferm($id_razonsocial);
		$data['gridClienteMedicam'] =  $this->cliente_model->gridClienteMedicam($id_razonsocial);

		$data['id_razonsocial'] = $id_razonsocial;
        $this->load->view("gridDatosClinicos_view",$data );
    }

	public function insertClienteMedico(){

		 $post['id_razonsocial'] = $this->input->post('id_razonsocial');
		 $post['medico_id'] = $this->input->post('nuevomedico_id');
		 $post['idusuario_reg'] = $this->session->userdata('idusuario');
		 $post['fch_regpacmed'] = date('Y-m-d H:i:s');


		 $this->cliente_model->insertClienteMedico($post);

		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'Se agregó médico que prescribe',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridDatosClinicos($post['id_razonsocial']);
		    }

	public function insertClienteReceta(){
		$nombrearchivo = 'Receta_'.$this->input->post('id_razonsocial').'_'.date('d-m-Y').'-'.rand(5, 15);
        $mi_imagen = 'mi_imagen';//$_FILES['file'];
        $config['upload_path'] = "recetas/";
        $config['file_name'] = $nombrearchivo;
        $config['allowed_types'] = "gif|jpg|jpeg|png";
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";

		$this->load->library('upload', $config);
		/*foreach ($_FILES as $key => $value) {
		 $this->upload->do_upload($key);
		}*/
        if (!$this->upload->do_upload($mi_imagen)) {
           // *** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;
        }

        $data['upload_data'] = $this->upload->data();
		$file_name = $data['upload_data']['file_name'];

		 $post['id_razonsocial'] = $this->input->post('id_razonsocial');
		 $post['medico_id'] = $this->input->post('recetamedic_id');
		 $post['clientereceta'] = $file_name;/// $this->input->post('pr_receta');
		 $post['idusuario_reg'] = $this->session->userdata('idusuario');
		 $post['fch_registro'] = date('Y-m-d H:i:s');


		 $this->cliente_model->insertClienteReceta($post);

		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'Se receta medica',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridDatosClinicos($post['id_razonsocial']);
		    }

	public function insertClienteEnfermedad(){

		 $post['id_razonsocial'] = $this->input->post('id_razonsocial');
		 $post['medico_id'] = $this->input->post('enfermedic_id');
		 $post['enfermedad_id'] = $this->input->post('enf_enfermedad_id');
		 $post['idusuario_reg'] = $this->session->userdata('idusuario');
		 $post['fch_registro'] = date('Y-m-d H:i:s');


		 $this->cliente_model->insertClienteEnfermedad($post);

		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'Se agregó enfermedad',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridDatosClinicos($post['id_razonsocial']);
		    }
	public function insertClienteMedicamento(){

		 $post['id_razonsocial'] = $this->input->post('id_razonsocial');
		 $post['medico_id'] = $this->input->post('medicamemedic_id');
		 $post['medicamento_id'] = $this->input->post('ppr_producto_id');
		 $post['idusuario_reg'] = $this->session->userdata('idusuario');
		 $post['fch_registro'] = date('Y-m-d H:i:s');


		 $this->cliente_model->insertClienteMedicam($post);

		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'Se agregó medicamento',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridDatosClinicos($post['id_razonsocial']);
		    }


	public function eliminarClienteMedico($idClienteMedico = ''){
		$idClienteMedico ='';
		$idClienteMedico = $this->input->post('idtabla');
		if(strlen(trim($idClienteMedico))>0){
        $mensajeEliminacion = $this->cliente_model->eliminarClienteMedico($idClienteMedico);
		}
		echo json_encode('Eliminado');
    }

	public function eliminarClienteReceta($idClienteReceta = ''){
		$idClienteReceta ='';
		$idClienteReceta = $this->input->post('idtabla');
		if(strlen(trim($idClienteReceta))>0){
        $mensajeEliminacion = $this->cliente_model->eliminarClienteReceta($idClienteReceta);
		}
		echo json_encode('Eliminado');
    }
	public function eliminarClienteEnferm($idClienteEnf = ''){
		$idClienteEnf ='';
		$idClienteEnf = $this->input->post('idtabla');
		if(strlen(trim($idClienteEnf))>0){
        $mensajeEliminacion = $this->cliente_model->eliminarClienteEnferm($idClienteEnf);
		}
		echo json_encode('Eliminado');
    }
	public function eliminarClienteMedicam($idClienteMedicam = ''){
		$idClienteMedicam ='';
		$idClienteMedicam = $this->input->post('idtabla');
		if(strlen(trim($idClienteMedicam))>0){
        $mensajeEliminacion = $this->cliente_model->eliminarClienteMedicam($idClienteMedicam);
		}
		echo json_encode('Eliminado');
    }


 /* Razon social */
 	//=== Razón Social ===
	public function gridRazonSocial($idempresa_corp = ''){
		$data['grid'] = $this->cliente_model->gridRazonSocial();
        $this->load->view("grid_razonsocial_view",$data );
    }

	public function formRazonSocial($id_razons = ''){
		$data['TipoRazonSocial'] = '';//$this->contable_tablas_model->selectTipoRazonS();
		$data['especialidad'] = "";//$this->especialidad_model->selectEspecialidad();

		$data['vendedor'] = $this->usuario_model->selectUsuarioAct();
		$data['cantventa'] = '';
		if( $id_razons!=''){
			$data['tituloform'] = 'Editar Persona';
			$data['rs'] = $this->cliente_model->rowRazonSocial($id_razons);
			$data['cantventa'] = 0;// $this->cliente_model->verifVentaCliente($id_razons);

		}else{
			$data['tituloform'] = 'Crear Persona';
		}
        $this->load->view("form_MantRazonsocial_view",$data );
    }

	public function getRazonSocialSelect2() {
		$razonsocial = $this->cliente_model->gridRazonSocialSelect2($this->input->get('term'));
		echo json_encode($razonsocial);
    }

    public function getInfoRazonSocial($id_razonsocial) {
		$razonsocial = $this->cliente_model->rowRazonSocial($id_razonsocial);
		echo json_encode($razonsocial);
    }

    //Validar y registrar Razón social
    public function insertRazonSocial(){
		//strtoupper(preg_replace('/\s+/', ' ', ' hola  peru ')) Eliminar espacios y convertir a mayuscula
		//$post['cmp']=strtoupper(preg_replace('/\s+/', ' ',$this->input->post('cmp')));
		//$post['rne']=strtoupper(preg_replace('/\s+/', ' ',$this->input->post('rne')));
		//$post['dni']= strtoupper(preg_replace('/\s+/', ' ',$this->input->post('dni')));
		//$post['ruc'] = strtoupper(preg_replace('/\s+/', ' ',$this->input->post('ruc')));
		$post['razonsocial'] = str_replace("'"," ", strtoupper(preg_replace('/\s+/', ' ',$this->input->post('razonsocial'))));

		$rs_post['numdocumento']	=  strtoupper(preg_replace('/\s+/', ' ',$this->input->post('numdocumento')));
		$rs_post['id_tipodocumento']	=  strtoupper(preg_replace('/\s+/', ' ',$this->input->post('id_tipodocumento')));


		$idtipors = preg_replace('/\s+/', ' ',$this->input->post('id_tiporazonsocial'));
		$idrazons = preg_replace('/\s+/', ' ',$this->input->post('id_razonsocial'));


		$mensaje_error = '';
		$numdni = '';	$numruc = '';	$numrs = '';	$numcmp = '';	$numrne = '';
		if($idrazons==''){ //validar cuando registramos uno nuevo

			if (strlen($rs_post['numdocumento']) >0){
				$numruc = $this->cliente_model->buscaRazonSocialNumero($rs_post['numdocumento']);
			}
			if (strlen($post['razonsocial']) >0){
				$numrs = $this->cliente_model->buscaRazonSocial($post['razonsocial']);
			}
		}else{
			//Validar cuando se va a modificar la razon social

			if (strlen($rs_post['numdocumento']) >0){
				$numruc = $this->cliente_model->buscaUpdtRazonSocialNumero($idrazons, $rs_post['numdocumento']);
			}
			if (strlen($post['razonsocial']) >0){
				$numrs = $this->cliente_model->buscaUpdtRazonSocial($idrazons, $post['razonsocial']);
			}
		}

		//$mensaje_error =  ($numcmp >0)? "El N. de CMP ya existe en el sistema.<br>":"";
		//$mensaje_error .= ($numrne >0)? "El N. de RNE ya existe en el sistema.<br>":"";
		//$mensaje_error .= ($numdni)? "El N. de DNI ya existe en el sistema.<br>":"";
		$mensaje_error .= ($numruc)? "El N. de Documento ya existe en el sistema.<br>":"";
		$mensaje_error .= ($numrs >0)? "El nombre de ".$post['razonsocial']." ya existe en el sistema.":"";

		if(strlen($mensaje_error)==0){
		//Generar el id
		//	$max_id = $this->voucher_model->getIdRazonSocial();

				$rs_post['id_tiporazonsocial']	= $idtipors;

				$rs_post['nombre']	=  strtoupper(preg_replace('/\s+/', ' ',$this->input->post('nombre')));

				$rs_post['appaterno']	=  strtoupper(preg_replace('/\s+/', ' ',$this->input->post('appaterno')));
				$rs_post['apmaterno']	=  strtoupper(preg_replace('/\s+/', ' ',$this->input->post('apmaterno')));
				$rs_post['razonsocial']	=  strtoupper(preg_replace('/\s+/', ' ',$post['razonsocial']));
				$direccion	=  strtoupper(preg_replace('/\s+/', ' ',$this->input->post('direccion')));

					$rs_post['direccion'] = $direccion;

				$referencia	=  strtoupper(preg_replace('/\s+/', ' ',$this->input->post('referencia')));

					$rs_post['referencia']	= $referencia;

				$telefono	=  strtoupper(preg_replace('/\s+/', ' ', $this->input->post('telefono')));

					$rs_post['telefono']	= $telefono;

				$celular = strtoupper(preg_replace('/\s+/', ' ',$this->input->post('celular')));

					$rs_post['celular']	= $celular;

				$contacto	=  strtoupper(preg_replace('/\s+/', ' ',$this->input->post('contacto')));

					$rs_post['contacto']	= $contacto;

				$email	=  strtoupper($this->input->post('email'));

					$rs_post['email']	= $email;

				$rs_post['fechanacimiento']	=  $this->input->post('fechanacimiento');

				$rs_post['sexo']	=  strtoupper($this->input->post('sexo'));
				$edad	=  strtoupper(preg_replace('/\s+/', ' ',$this->input->post('edad')));

					$rs_post['edad']	= $edad;

				$numafiliciacionsis	=  strtoupper(preg_replace('/\s+/', ' ',$this->input->post('numafiliciacionsis')));

					$rs_post['numafiliciacionsis']	= $numafiliciacionsis;


				$rs_post['id_especialidad']	=  $this->input->post('id_especialidad');
				$rs_post['flg_medico']	=  $this->input->post('flg_medico');
				$rs_post['flg_tecnologo']	=  $this->input->post('flg_tecnologo');

				$rs_post['id_coordinador']	=  $this->input->post('id_coordinador');
				$rs_post['id_vendedor']	=  $this->input->post('id_vendedor');
				$rs_post['direccion2']	=  $this->input->post('direccion2');
				$rs_post['id_vendedor2']	=  $this->input->post('id_vendedor2');
				$rs_post['direccion3']	=  $this->input->post('direccion3');
				$rs_post['id_vendedor3']	=  $this->input->post('id_vendedor3');

			 	$rs_post['ubigeo']	=  $this->input->post('ubigeo');

				 $rs_post['carrera_profesional'] = $this->input->post('carrera_profesional');
				 $rs_post['cb_asesor'] = $this->input->post('cb_asesor');
				 $rs_post['cb_investigador'] = $this->input->post('cb_investigador');

			if($idrazons==''){
				$rs_post['idusuario_regrazons']	= $this->session->userdata('idusuario');
				$rs_post['fch_regrazonsocial']	= date('Y-m-d H:i:s');
				$idrazonsoc = $this->cliente_model->insertRazonSocial($rs_post);
				$mensaje_error = 'Registrado'.$idrazonsoc;
			}else{
				//$idrazons = ''; //Modificar registros
				$rs_post['fch_modrazonsocial']	= date('Y-m-d H:i:s');
				$this->cliente_model->updateRazonSocial($idrazons, $rs_post);
				$mensaje_error = 'Modificado'.$idrazons;
			}

			/*
			$id_especialidad = $this->input->post('id_especialidad');
			if($idtipors =='2' and $id_especialidad !=''){
				if($idrazons ==''){
					$this->cliente_model->insertDoctorEspecialidad($id_especialidad, $idrazonsoc);
				}else{
					$this->cliente_model->updateDoctorEspecialidad($idrazons, $id_especialidad);
				}
			}
			*/


		}
	      echo json_encode ($mensaje_error);
    }


    //Para médicos
    public function gridTodoMedico(){
        $data['grid'] =  $this->cliente_model->gridTodoMedico();
       // var_dump($data['grid'] );
		$data['titulotabla'] = 'Lista de Médicos y Tecólogos';

        $this->load->view("gridMedicos_view",$data);
    }

    public function formRazonSocialM($id_razons = ''){
		$data['TipoRazonSocial'] = '2';//$this->contable_tablas_model->selectTipoRazonS(); //2 Es Doctor

		$data['especialidad'] = $this->especialidad_model->selectEspecialidad();

		if( $id_razons!=''){
			$data['tituloform'] = 'Editar Medico / Tecnologo';
			$data['rs'] = $this->cliente_model->rowRazonSocial($id_razons);
		}else{
			$data['tituloform'] = 'Crear Medico / Tecnologo';
		}
        $this->load->view("form_MantRazonsocial_view",$data );
    }
    //.Para médicos

### Descargar
     public function xls_gridCliente(){
        $data['grid'] =  $this->cliente_model->gridCliente();
       // var_dump($data['grid'] );
		$data['titulotabla'] = 'Lista de Clientes';

        $data['descExcel'] = 'SI';

        $this->load->view("gridCliente_view",$data);


 		header("Content-type: application/vnd.ms-excel; name='excel'");
	//	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

		header("Content-Disposition: filename=ReporteClientes.xls");
		header("Pragma: no-cache");
		header("Expires: 0");

		echo "\xEF\xBB\xBF"; //UTF-8 BOM PARA QUE DESCARGEN CON CARACTERES ESPECIALES EXCEL

    }

	public function jsonMaxDNI() {
		$maxdni = $this->cliente_model->getMaxDNI();

		$nuevodni = $maxdni->maxdni+1;
		$dni = substr('1230000000'.$nuevodni,-8);
		echo json_encode($dni);
    }
}

?>
