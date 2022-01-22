<?php 
class Plantilla extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("plantilla_model");		
        $this->load->model("corporacion_model");
    }


    public function mantPlantillaForm(){	
    	$idempresa_corp = $this->session->userdata('idempresa_corp');
		$data['empresa'] = $this->corporacion_model->rowCorporacion($idempresa_corp);
		$data['config'] = $this->corporacion_model->gridConfig();
        //$data['grid'] =  $this->plantilla_model->gridPlantilla();
		//$data['titulotabla'] = 'Lista de Plantilla';
        $this->load->view("form_MantPlantillaFact_view",$data);
    }  
    /***********************Eliminar Plantilla*************************/
    public function elimPlantilla(){	
    	$plantilla = $this->input->post('plantilla');
    	$tipo = $this->input->post('tipo');
		$actualizar = $this->corporacion_model->eliminarPlantilla($tipo,$plantilla);
		echo $actualizar;
    }
    /******************************************************************/

    public function mantFacturaA4(){
    	//Config 
    	$namec = 'nota_pdfventaA4';    	
    	$postc['value'] = $this->validarValue($this->input->post('nameconfig'));
    	
    	$infoconfig = $this->corporacion_model->rowConfig($namec);
    	if($infoconfig){
    		$this->corporacion_model->updateConfig($namec,$postc);
    	}else{
    		$postc['name'] = $namec;
    		$this->corporacion_model->insertConfig($postc);
    	}

    	$namec = 'FillColor_VentaA4';    	
    	$postc['value'] = validarrgb($this->input->post('FillColor'));
    	$infoconfig = $this->corporacion_model->rowConfig($namec);
    	if($infoconfig){
    		$this->corporacion_model->updateConfig($namec,$postc);
    	}else{
    		$postc['name'] = $namec;
    		$this->corporacion_model->insertConfig($postc);
    	}

    	$namec = 'TextColor_VentaA4';    	
    	$postc['value'] = validarrgb($this->input->post('TextColor'));    	
    	$infoconfig = $this->corporacion_model->rowConfig($namec);
    	if($infoconfig){
    		$this->corporacion_model->updateConfig($namec,$postc);
    	}else{
    		$postc['name'] = $namec;
    		$this->corporacion_model->insertConfig($postc);
    	}

    	//Archivos
    	$ruc_corp =  $this->session->userdata('ruc_corp');
    	$nombregeneral = $this->input->post('plantillafact');
    	if($nombregeneral==''){
    		$nombregeneral = 'factA4_'.$ruc_corp;//.'_'.date('d-m-Y').'';
    	}

		$registrado = false;
	       if (isset($_FILES['plantillafact_pdf']['name']) && !empty($_FILES['plantillafact_pdf']['name'])) {
			$nombre_FactA4 = $nombregeneral.'.pdf';

			$uploadFileDir = "file/plantilla/";
			$dest_path = $uploadFileDir . $nombre_FactA4;
			$fileTmpPath = $_FILES['plantillafact_pdf']['tmp_name'];

			// Damos permiso al archivo anterior 
			//chmod("/directorio/fichero", 0755);

			if (file_exists($dest_path)) {
				rename('/var/www/html/'.$dest_path, '/var/www/html/file/plantilla/'.$nombregeneral.date('d-m-Y_H-i-s').'.pdf');
			}

			if(move_uploaded_file($fileTmpPath, $dest_path))
			{
			  $registrado = true;
			  chmod($dest_path, 0777);
			}
			else
			{
				$msg ='';
			  echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'No se ha subido el PDF<br>".$msg."',
								color : '#C46A69',
								timeout : 3500,
								icon : 'fa fa-check swing animated'
							}); </script>";
			} 
	    }

	     if (isset($_FILES['plantillafact_php']['name']) && !empty($_FILES['plantillafact_php']['name'])) {
			$nombre_FactA4 = $nombregeneral.'.php';

			$uploadFileDir = "application/modules/reporte/controllers/plantilla/";
			$dest_path = $uploadFileDir . $nombre_FactA4;
			$fileTmpPath = $_FILES['plantillafact_php']['tmp_name'];

			if (file_exists($dest_path)) {
				rename('/var/www/html/'.$dest_path, 'application/modules/reporte/controllers/plantilla/'.$nombregeneral.date('d-m-Y_H-i-s').'.php');
			}
			if(move_uploaded_file($fileTmpPath, $dest_path))
			{
			  $registrado = true;
			  chmod($dest_path, 0777);
			}
			else
			{
				$msg ='';
			  echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'No se ha subido el PHP<br>".$msg."',
								color : '#C46A69',
								timeout : 3500,
								icon : 'fa fa-check swing animated'
							}); </script>";
			} 
	    }
 
		 //.Logo

		 $mensaje = '';
		 if ($registrado == true){
			//$post['id_ptoventa'] = $x_post['id_ptoventa'];
			//$this->ptoventa_model->insertPtoventa($post);
			 $post['plantillafact'] = $nombregeneral; 
		 	
		$x_post['idempresa_corp'] = $this->input->post('idempresa_corp');
		 
		$this->corporacion_model->updateCorporacion($x_post['idempresa_corp'],$post);
		
			$mensaje = 'Plantilla actualizada';		
		 }else{
			//$this->ptoventa_model->updatePtoventa($x_post['id_ptoventa'],$post);
			$mensaje = 'No hay plantillas para registrar';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->mantPlantillaForm();
    }


    public function mantGuiaA4(){
    	$ruc_corp =  $this->session->userdata('ruc_corp');
    	$nombregeneral = $this->input->post('plant_guiaA4');
    	if($nombregeneral==''){
    		$nombregeneral = 'guiaA4_'.$ruc_corp;//.'_'.date('d-m-Y').'';
    	}

		$registrado = false;		 
	       if (isset($_FILES['plantilla_pdf']['name']) && !empty($_FILES['plantilla_pdf']['name'])) {
			$nombre_FactA4 = $nombregeneral.'.pdf';

			$uploadFileDir = "file/plantilla/";
			$dest_path = $uploadFileDir . $nombre_FactA4;
			$fileTmpPath = $_FILES['plantilla_pdf']['tmp_name'];
			if(move_uploaded_file($fileTmpPath, $dest_path))
			{
			  $registrado = true;
			}
			else
			{
				$msg ='';
			  echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'No se ha subido el PDF<br>".$msg."',
								color : '#C46A69',
								timeout : 3500,
								icon : 'fa fa-check swing animated'
							}); </script>";
			} 
	    }

	     if (isset($_FILES['plantilla_php']['name']) && !empty($_FILES['plantilla_php']['name'])) {
			$nombre_FactA4 = $nombregeneral.'.php';

			$uploadFileDir = "application/modules/reporte/controllers/plantilla/";
			$dest_path = $uploadFileDir . $nombre_FactA4;
			$fileTmpPath = $_FILES['plantilla_php']['tmp_name'];
			if(move_uploaded_file($fileTmpPath, $dest_path))
			{
			  $registrado = true;
			  chmod($dest_path, 0777);
			}
			else
			{
				$msg ='';
			  echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'No se ha subido el PHP<br>".$msg."',
								color : '#C46A69',
								timeout : 3500,
								icon : 'fa fa-check swing animated'
							}); </script>";
			} 
	    }

		 $mensaje = '';
		 if ($registrado == true){
			 $post['plant_guiaA4'] = $nombregeneral; 		 	
			$x_post['idempresa_corp'] = $this->input->post('idempresa_corp');	 
			$this->corporacion_model->updateCorporacion($x_post['idempresa_corp'],$post);		
			$mensaje = 'Plantilla actualizada';		
		 }else{
			//$this->ptoventa_model->updatePtoventa($x_post['id_ptoventa'],$post);
			$mensaje = 'No hay plantillas para registrar';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->mantPlantillaForm();
    }
 public function validarValue($value){
 	$value = str_replace('style="font-weight: 700;"','',$value);
	$value = str_replace('style="text-align: center; "','align="center"',$value);
	$value = str_replace('style="text-align: center;"','align="center"',$value);
	$value = str_replace('div','p',$value);
	$value = str_replace("&nbsp;",' ',$value);
	return $value;
 }

 public function mantVentaT(){
 	//Config 
 		$namec = 'TipoVenta_NotaVentaT';    	
    	$postct['value'] = $this->input->post('TipoVenta_NotaVentaT');
    	$infoconfig = $this->corporacion_model->rowConfig($namec);
    	if($infoconfig){
    		$this->corporacion_model->updateConfig($namec,$postct);
    	}else{
    		$postct['name'] = $namec;
    		$this->corporacion_model->insertConfig($postct);
    	}

    	$namec = 'TCocina_VentaT';    	
    	$posttc['value'] = $this->input->post('TCocina_VentaT');
    	$infoconfig = $this->corporacion_model->rowConfig($namec);
    	if($infoconfig){
    		$this->corporacion_model->updateConfig($namec,$posttc);
    	}else{
    		$posttc['name'] = $namec;
    		$this->corporacion_model->insertConfig($posttc);
    	}

 		$namec = 'RUC_NotaVentaT';    	
    	$postc0['value'] = $this->input->post('RUC_NotaVentaT');
    	$infoconfig = $this->corporacion_model->rowConfig($namec);
    	if($infoconfig){
    		$this->corporacion_model->updateConfig($namec,$postc0);
    	}else{
    		$postc0['name'] = $namec;
    		$this->corporacion_model->insertConfig($postc0);
    	}

    	$namec = 'QR_NotaVentaT';    	
    	$postc1['value'] = $this->input->post('QR_NotaVentaT');
    	$infoconfig = $this->corporacion_model->rowConfig($namec);
    	if($infoconfig){
    		$this->corporacion_model->updateConfig($namec,$postc1);
    	}else{
    		$postc1['name'] = $namec;
    		$this->corporacion_model->insertConfig($postc1);
    	}


    	$namec = 'nota_pdfventaT';
    	$postc['value'] = $this->validarValue($this->input->post('nameconfig'));
    	

    	$infoconfig = $this->corporacion_model->rowConfig($namec);
    	if($infoconfig){
    		$this->corporacion_model->updateConfig($namec,$postc);
    		$mensaje ='Nota de ticket registrado';
    	}else{
    		$mensaje ='Nota de ticket actualizado';
    		$postc['name'] = $namec;
    		$this->corporacion_model->insertConfig($postc);
    	}

    	echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->mantPlantillaForm();

 	}
 public function mantCotA4(){
 		//Config 
    	$namec = 'nota_pdfcotA4';

    	$postc['value'] = $this->validarValue($this->input->post('nameconfig'));
    	
    	$infoconfig = $this->corporacion_model->rowConfig($namec);
    	if($infoconfig){
    		$this->corporacion_model->updateConfig($namec,$postc);
    	}else{
    		$postc['name'] = $namec;
    		$this->corporacion_model->insertConfig($postc);
    	}

    	$namec = 'FillColor_CotA4';    	
    	$postc1['value'] = validarrgb($this->input->post('FillColor'));    	
    	$infoconfig = $this->corporacion_model->rowConfig($namec);
    	if($infoconfig){
    		$this->corporacion_model->updateConfig($namec,$postc1);
    	}else{
    		$postc1['name'] = $namec;
    		$this->corporacion_model->insertConfig($postc1);
    	}

    	$namec = 'TextColor_CotA4';    	
    	$postc2['value'] = validarrgb($this->input->post('TextColor'));    	
    	$infoconfig = $this->corporacion_model->rowConfig($namec);
    	if($infoconfig){
    		$this->corporacion_model->updateConfig($namec,$postc2);
    	}else{
    		$postc2['name'] = $namec;
    		$this->corporacion_model->insertConfig($postc2);
    	}

    	$namec = 'ColorCabecera1_CotA4';    	
    	$postc3['value'] = validarrgb($this->input->post('ColorCabecera1_CotA4'));    	
    	$infoconfig = $this->corporacion_model->rowConfig($namec);
    	if($infoconfig){
    		$this->corporacion_model->updateConfig($namec,$postc3);
    	}else{
    		$postc3['name'] = $namec;
    		$this->corporacion_model->insertConfig($postc3);
    	}

    	$namec = 'DirCabecera_CotA4';    	
    	$postc4['value'] = $this->input->post('DirCabecera_CotA4');    	
    	$infoconfig = $this->corporacion_model->rowConfig($namec);
    	if($infoconfig){
    		$this->corporacion_model->updateConfig($namec,$postc4);
    	}else{
    		$postc4['name'] = $namec;
    		$this->corporacion_model->insertConfig($postc4);
    	}

    	$namec = 'ColorCabecera2_CotA4';    	
    	$postc5['value'] = validarrgb($this->input->post('ColorCabecera2_CotA4'));    	
    	$infoconfig = $this->corporacion_model->rowConfig($namec);
    	if($infoconfig){
    		$this->corporacion_model->updateConfig($namec,$postc5);
    	}else{
    		$postc5['name'] = $namec;
    		$this->corporacion_model->insertConfig($postc5);
    	}

    	$namec = 'ImgProd_CotA4';    	
    	$postc6['value'] = $this->input->post('ImgProd_CotA4');    	
    	$infoconfig = $this->corporacion_model->rowConfig($namec);
    	if($infoconfig){
    		$this->corporacion_model->updateConfig($namec,$postc6);
    	}else{
    		$postc6['name'] = $namec;
    		$this->corporacion_model->insertConfig($postc6);
    	}

 	

    	$ruc_corp =  $this->session->userdata('ruc_corp');
    	$nombregeneral = $this->input->post('plant_cotA4');
    	if($nombregeneral==''){
    		$nombregeneral = 'cotA4_'.$ruc_corp;//.'_'.date('d-m-Y').'';
    	}

		$registrado = false;		 
	       if (isset($_FILES['plantilla_pdf']['name']) && !empty($_FILES['plantilla_pdf']['name'])) {
			$nombre_FactA4 = $nombregeneral.'.pdf';

			$uploadFileDir = "file/plantilla/";
			$dest_path = $uploadFileDir . $nombre_FactA4;
			$fileTmpPath = $_FILES['plantilla_pdf']['tmp_name'];
			if(move_uploaded_file($fileTmpPath, $dest_path))
			{
			  $registrado = true;
			  chmod($dest_path, 0777);
			}
			else
			{
				$msg ='';
			  echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'No se ha subido el PDF<br>".$msg."',
								color : '#C46A69',
								timeout : 3500,
								icon : 'fa fa-check swing animated'
							}); </script>";
			} 
	    }

	     if (isset($_FILES['plantilla_php']['name']) && !empty($_FILES['plantilla_php']['name'])) {
			$nombre_FactA4 = $nombregeneral.'.php';

			$uploadFileDir = "application/modules/reporte/controllers/plantilla/";
			$dest_path = $uploadFileDir . $nombre_FactA4;
			$fileTmpPath = $_FILES['plantilla_php']['tmp_name'];
			if(move_uploaded_file($fileTmpPath, $dest_path))
			{
			  $registrado = true;
			  chmod($dest_path, 0777);
			}
			else
			{
				$msg ='';
			  echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'No se ha subido el PHP<br>".$msg."',
								color : '#C46A69',
								timeout : 3500,
								icon : 'fa fa-check swing animated'
							}); </script>";
			} 
	    }

		 $mensaje = '';
		 if ($registrado == true){
			 $post['plant_cotA4'] = $nombregeneral; 		 	
			$x_post['idempresa_corp'] = $this->input->post('idempresa_corp');	 
			$this->corporacion_model->updateCorporacion($x_post['idempresa_corp'],$post);		
			$mensaje = 'Plantilla actualizada';		
		 }else{
			//$this->ptoventa_model->updatePtoventa($x_post['id_ptoventa'],$post);
			$mensaje = 'No hay plantillas para registrar';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->mantPlantillaForm();
    }

    public function downloadphp($file){
    	 //Logo    
			$namefile = $file.'.php';
			$uploadFileDir = "/var/www/html/application/modules/reporte/controllers/plantilla/";
			$fileTmpPath = $uploadFileDir . $namefile;

			$dest_path = 'file/pdfdownload/'.$file.'_'.date('H-i-s').'.zip';//En realidad es .php
			if (!file_exists($fileTmpPath)) {
			    exit("Archivo no existente");
			}

			if(!copy($fileTmpPath, $dest_path))
			{				
			    echo 'No existe archivo para descargar';
			}
			else
			{ 
 		header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$namefile");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        
        // Read the file
        readfile(base_url().$dest_path);
        exit;

			} 
	     
    }

        /*
    public function gridPlantilla(){		
        $data['grid'] =  $this->plantilla_model->gridPlantilla();
		$data['titulotabla'] = 'Lista de Plantilla';
        $this->load->view("gridPlantilla_view",$data);
    }   
 	
	public function mantPlantillaForm($idplantilla = ''){	
		$data['plantilla'] = $this->plantilla_model->rowPlantilla($idplantilla);
				if($idplantilla ==""){
			$data['titulofrm'] = "Agregar Registros";
		}else{
			$data['titulofrm'] = "Editar Registros";
		}
        $this->load->view("form_MantPlantilla_view",$data);
    }
	    public function mantPlantilla(){		 
		 $post['plantilla'] = $this->input->post('plantilla');
		
		 $x_post['plantilla_id'] = $this->input->post('plantilla_id');
		 $mensaje = '';
		 if ($x_post['plantilla_id']==''){
			$post['plantilla_id'] = $x_post['plantilla_id'];
			$this->plantilla_model->insertPlantilla($post);
			$mensaje = 'Plantilla Registrado';		
		 }else{
			$this->plantilla_model->updatePlantilla($x_post['plantilla_id'],$post);
			$mensaje = 'Plantilla actualizado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridPlantilla();
	}
	
	public function eliminarPlantilla($idplantilla = ''){	    
		$idplantilla ='';
		$idplantilla = $this->input->post('idtabla');	
		if(strlen(trim($idplantilla))>0){
        $mensajeEliminacion = $this->plantilla_model->eliminarPlantilla($idplantilla);
		}
		//echo json_encode($mensajeEliminacion);
		echo json_encode('Eliminado');
    }	
    */
 
}

?>
