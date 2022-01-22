<?php 
class Elemento extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("elemento_model");
		
    }
    
    public function gridMateriales(){
        $data['grid'] =  $this->elemento_model->gridMateriales();
		$data['titulotabla'] = 'Lista de materiales';
		$data['idtipoelemento'] = '1';
        $this->load->view("gridElemento_view",$data);
    }   
       	
	/*funciones para visualizar usuario anulados*/
	public function gridHerramientas(){
        $data['grid'] =  $this->elemento_model->gridHerramientas();
		$data['titulotabla'] = 'Lista de herramientas';
		$data['idtipoelemento'] = '2';
        $this->load->view("gridElemento_view",$data);
    } 
	
	public function mantElementoForm($tipoelemento = '',$idelemento = ''){	
		$data['marca'] = $this->elemento_model->selectMarca();
		$data['estado'] = $this->elemento_model->selectEstado();		
        $data['elemento'] = $this->elemento_model->rowElemento($idelemento);
		$data['tipoelemento'] = $tipoelemento;
		if($idelemento ==""){
			$data['titulofrm'] = "Agregar Registros";
		}else{
			$data['titulofrm'] = "Editar Registros";
			}
        $this->load->view("form_MantElemento_view",$data);
    }
	    public function mantElemento(){		 
		 $post['elem_descripcion'] = $this->input->post('elem_descripcion');
		 $post['elem_desc_accesorios'] = $this->input->post('elem_desc_accesorios');
		 $post['elem_medida'] = $this->input->post('elem_medida');
		 $post['elem_cantidad'] = $this->input->post('elem_cantidad');
		 $post['elem_foto'] = $this->input->post('elem_foto');
		 $post['telemento_id'] = $this->input->post('telemento_id');
		 $post['marca_id'] = $this->input->post('marca_id');
		 $post['est_id'] = $this->input->post('est_id');
		  
		 $x_post['elemento_id'] = $this->input->post('elemento_id');
		 $mensaje = '';
		 if ($x_post['elemento_id']==''){
			$post['elemento_id'] = $x_post['elemento_id'];
			$this->elemento_model->insertElemento($post);
			$mensaje = 'Elemento Registrado';		
		 }else{
			$this->elemento_model->updateElemento($x_post['elemento_id'],$post);
			$mensaje = 'Elemento actualizado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
		if($post['telemento_id']=='1'){
			 $this->gridMateriales();
		}else{
			$this->gridHerramientas();
		}
    }
	
	public function eliminarElemento($idelemento = ''){	    
		$idelemento ='';
		$idelemento = $this->input->post('idtabla');	
		if(strlen(trim($idelemento))>0){
        $mensajeEliminacion = $this->elemento_model->eliminarElemento($idelemento);
		}
		//echo json_encode($mensajeEliminacion);
		echo json_encode('Eliminado');
    }	
 
}

?>
