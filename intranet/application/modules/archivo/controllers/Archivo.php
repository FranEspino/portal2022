<?php 
class Archivo extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("archivo_model");
        $this->load->model("tablas/area_model");
	//	$this->load->library("encrypt");
    }
    
    public function gridArchivo($idactividad = ''){
		
        $data['grid'] =  $this->archivo_model->gridArchivo($idactividad);
		 
		$data['titulotabla'] = 'Lista de Archivos de descarga';
		
        $this->load->view("gridArchivo_view",$data);
		
    }   
 	
	public function mantArchivoForm($idarchivo = ''){	
		$data['archivo'] = $this->archivo_model->rowArchivo($idarchivo);
				 
		$tipousuario = $this->session->userdata('id_tipopersona');
		$idpersona = $this->session->userdata('idpersona_sist');
		 
		$data['area'] = $this->area_model->gridArea();
		 
		if($idarchivo ==""){
			$data['titulofrm'] = "Agregar archivos";
		}else{
			$data['titulofrm'] = "Editar archivos";
			}
       $this->load->view("form_MantArchivo_view",$data);
		
    }
 
	
	
	public function mantArchivo(){		 
		$post['comentario'] = $this->input->post('comentario');
		$post['id_area'] = $this->input->post('id_area');
		 
		$estadop = $this->input->post('estadoarchivo');
		$post['estadoarchivo'] = ($estadop =='on')? 1: 0;
		
		 $x_post['id_archivo'] = $this->input->post('id_archivo');
		 
		 $mensaje = '';
		 if ($x_post['id_archivo']==''){	
		 		 
			//$post['CodArchivo'] = $this->servicio_js->reemplazar($post['Titulo']);
			
			$post['idusuario_regarchivo'] = $this->session->userdata('idusuario');
			$post['fch_regarchivo'] = date('Y-m-d H:i:s'); 
			 
			  
		$nombrearchivo = 'ARCHIVO_EPIS_'.$post['idusuario_regarchivo'].'_'.date('d-m-Y').'_'.rand(5, 15);//.'_'.$_FILES['archivo']['name'];
		//$tempFile = $_FILES['file']['tmp_name']; 
		
        $mi_imagen = 'archivo';//$_FILES['archivo'];
        $config['upload_path'] = "../archivo/descarga/";
        $config['file_name'] = $nombrearchivo;
      $config['allowed_types'] = "*";
         $config['max_size'] = "50000000";
     //   $config['max_width'] = "2000";
    //    $config['max_height'] = "2000";

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
		
			if($data['upload_data']){ 
			 $post['archivo'] = $file_name;		 
			$this->archivo_model->insertArchivo($post);
			$mensaje = 'Archivo Registrado';	
			}
				
		 }else{
			
			
			 $post['fch_modarchivo'] = date('Y-m-d H:i:s'); 
			 
			$this->archivo_model->updateArchivo($x_post['id_archivo'],$post);
			$mensaje = 'Archivo actualizado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridArchivo();
		    }
 
 
 function cargar_archivo() {
		
		$idregistro = $this->input->post('id_archivo');
		$nombrearchivo = $idregistro.'_'.date('d-m-Y').'_'.rand(5, 15);
		//$tempFile = $_FILES['file']['tmp_name']; 
		
        $mi_imagen = 'mi_imagen';//$_FILES['file'];
        $config['upload_path'] = "../imagenes/archivo/";
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
		
		if($data['upload_data']){
			$post['Imagen'] = $file_name;
			$x_post['IdArchivo'] = $idregistro;
			$this->archivo_model->updateArchivo($x_post['IdArchivo'],$post);
		}
		//echo $data['uploadSuccess'];
		//$this->load->view("upload_success",$data);
		echo '<img width="100%" src="'.$this->config->item('web_url').'imagenes/archivo/'.$file_name.'" alt="">';
	}
}

?>
