<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>
<?php

class Panel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("login_model");
		//$this->load->library("encrypt");
		
    }

    public function index() {
        $this->panel();
    }
	
	
    public function panel() {
		//$this->session->unset_userdata('username');
        if ($this->input->post('username')) {
           $infousuario =   $this->login_model->rowUsuario($this->input->post('username'));

            if ($infousuario) {
              $hash_BD = $infousuario->password;
              if (password_verify($this->input->post("password"), $hash_BD)) {
                 //.Almacenar privilegios
                  $newdata['username'] = $infousuario->username;
                  $newdata['nombre_usuario'] = $infousuario->nombre_usuario;
                  $newdata['idusuario'] = $infousuario->idusuario;
                  $newdata['nombre_usuario_tipo'] = $infousuario->nombre_usuario_tipo;
                  $newdata['idusuario_tipo'] = $infousuario->idusuario_tipo;
          				$this->session->set_userdata($newdata);
          				redirect('panel');
                  
              } else {
  				      $mensaje['mensaje']='* Contraseña incorrecto';
                $this->load->view('login_view',$mensaje);
              }
            }else{
                $mensaje['mensaje']='* Usuario incorrecto';
                $this->load->view('login_view',$mensaje);
            }
        }else{
			
            $username = $this->session->userdata('username');			
            if ($username) { 
            	$this->load->view('panel_view');
            } else {
                $this->load->view('login_view');
            }
        }
    }
	
    public function cerrarLogin() {
        //$this->session->unset_userdata('username');
        $this->session->sess_destroy();
        redirect(base_url());
    }

   

}

?>