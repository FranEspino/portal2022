<?php 
class Menu extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("menu_model"); 
    }
    
    public function gridMenu(){
		
        $data['grid'] =  $this->menu_model->gridMenu();
		$data['titulotabla'] = 'Lista de Sub Menus';
        $this->load->view("gridMenu_view",$data);
    }   
 	
	public function mantMenuForm($idmenu = ''){	
		$data['menu'] = $this->menu_model->rowMenu($idmenu);
		$data['primermenu'] = $this->menu_model->gridPrimerMenu();
		
		
		if($idmenu ==""){
			$data['titulofrm'] = "Agregar Registros";
		}else{
			$data['titulofrm'] = "Editar Registros";
			}
        $this->load->view("form_MantMenu_view",$data);
    }
	
	public function mantMenu(){		 
		$post['menu'] = $this->input->post('menu');
		$post['id_primermenu'] = $this->input->post('id_primermenu');
		$post['vinculo'] = $this->input->post('vinculo');
		$post['nivel'] = 1; //1 Por defecto
		$estadop = $this->input->post('est_menu');
		$post['est_menu'] = ($estadop =='on')? 1: 0;
		
		
		 $x_post['id_menu'] = $this->input->post('id_menu');
		 $mensaje = '';
		 if ($x_post['id_menu']==''){
			$post['idusuario_regmenu'] = $this->session->userdata('idusuario');
			$post['fch_regmenu'] = date('Y-m-d H:i:s'); 
			$this->menu_model->insertMenu($post);
			$mensaje = 'Menu Registrado';		
		 }else{
			$this->menu_model->updateMenu($x_post['id_menu'],$post);
			$mensaje = 'Menu actualizado';	
		 }
		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'".$mensaje."',
								color : '#739E73',
								timeout : 2000,
								icon : 'fa fa-check swing animated'
							}); </script>";
			$this->gridMenu();
		    }
	
	public function eliminarMenu($idmenu = ''){	    
		$idmenu ='';
		$idmenu = $this->input->post('idtabla');	
		if(strlen(trim($idmenu))>0){
        $mensajeEliminacion = $this->menu_model->eliminarMenu($idmenu);
		}
		//echo json_encode($mensajeEliminacion);
		echo json_encode('Eliminado');
    }	
 
}

?>
