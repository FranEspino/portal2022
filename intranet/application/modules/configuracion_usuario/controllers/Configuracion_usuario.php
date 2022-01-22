<?php
class Configuracion_usuario extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("usuario_model");
        //$this->load->model("evaluacion/evaluacion_model");
         $this->load->model("login_model");

    }
    public function verificartoken_pc(){
    	#token_pc
    $idusuario = $this->session->userdata('idusuario');
  	$usuario = $this->usuario_model->rowUsuario($idusuario);
      echo json_encode($usuario);
    }public function update_token_pc(){
    	#token_pc
      $token = $_POST['token_pc'];
      $idusuario= $_POST['idusuario'];
      $this->usuario_model->update_token_pc($token,$idusuario);

    }
    public function gridUsuario(){
        $data['grid'] = $this->usuario_model->gridUsuario();
        $data['titulotabla'] = 'Lista de usuarios (Administradores)';
        $this->load->view("grid_usuario_view",$data);
    }

    public function newUsuario(){
        $data['usuario_tipo'] = $this->usuario_model->selectUsuarioTipo();
		//$data['usuario_empresa'] = $this->usuario_model->selectEmpresa();
		//$data['usuario_ptoventa'] = $this->usuario_model->selectPtoventa();
	//	$data['usuario_profesion'] = $this->usuario_model->selectProfesion();

        $this->load->view("new_usuario_view",$data);
    }

    public function insertUsuario(){
		 $post['status_usuario'] = $this->input->post('status_usuario');
		 $post['username'] = $this->input->post('username');
		 $post['nombre_usuario'] = $this->input->post('nombre_usuario');
		 $post['email_usuario'] = $this->input->post('email_usuario');
		 $post['usu_tel'] = $this->input->post('usu_tel');

		 $pass = $this->input->post('password');
		 $post['password'] = password_hash($pass, PASSWORD_BCRYPT);

		  


		 $post['idusuario_tipo'] = $this->input->post('idusuario_tipo');
		 $post['id_ptoventa'] =1 ;//$this->input->post('id_ptoventa');
		 $post['id_profesion'] = '';//$this->input->post('id_profesion');
		 $post['usu_fch_ingreso'] = date('Y-m-d H:i:s');

		 //Verificar que no exista el usuario
		
		 	$existeusu = $this->usuario_model->verifUsuarioLocal($post['username']);
		
		 if($existeusu){//Existe ese usuario en las base de datos
		 	echo "<script>
		 		$.smallBox({
					title : 'Aviso ! ',
					content : 'Usuario no disponible, ingrese otro usuario',
					color : '#C46A69',
					timeout: 6000,
					icon : 'fa fa-bell'
				});
		 		$('#label_errorusuario').html('Ingrese otro usuario');
			</script>";
		 }else{

			$idusuario = $this->usuario_model->insertUsuario($post);
			// $this->usuario_model->insertUsuarioEmpresa($idempresa, $idusuario);

			 //Insertar todo los privilegios
			 if($post['idusuario_tipo']==1){
			 	$this->usuario_model->insertTodoPermiso($idusuario);
			 }else{
			 	$this->usuario_model->insertPermisoTipoUsuario($idusuario,$post['idusuario_tipo']);
			 }

	       // foreach ($this->input->post() as $campo => $fila) {
			//	$post['password'] =$this->encrypt->encode($this->input->post("password"));
	        //    $post[$campo] = $fila;
	       // }
			//$this->gridUsuario();
			echo "<script language='javascript'>  $.smallBox({
						title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
						content :'Registro correcto',
						color : '#739E73',
						timeout : 2000,
						icon : 'fa fa-check swing animated'
					});
					$( '#div_capa_pagina' ).load('".base_url()."configuracion_usuario/gridUsuario');
					$('#ModalMante').modal('hide');
			        if ($('.modal-backdrop').is(':visible')) {
			          $('body').removeClass('modal-open');
			          $('.modal-backdrop').remove();
			        };
					</script>";
		}
    }
    public function updateUserPass(){
      	//$post['username'] = $this->input->post('username');
      	//$post['password'] = $this->input->post('password');

      	$pass = $this->input->post('password');
		 $post['password'] = password_hash($pass, PASSWORD_BCRYPT);

      	$email = $this->input->post('email');
      	$razonsocial = $this->input->post('razonsocial');
      	$db = $this->ayuda_sql->decrypt($this->input->post('base'));
      	$idusuario = 1;
      	 if(X_MULTIEMPRESA){
  		 	$existeusu = $this->usuario_model->verifUsuarioUpdate($idusuario,$post['username']);
  		 }else{
  		 	$existeusu = $this->usuario_model->verifUsuarioUpdateLocal($idusuario,$post['username']);
  		 }
  		 if($existeusu){//Existe ese usuario en las base de datos
  		 	echo 0;
  		 }else{
  		 	$id = $this->usuario_model->updateUserPass($post,$db);

  		 	#Enviar Email
  		 	require_once APPPATH.'third_party/PHPMailer/Exception.php';
              require_once APPPATH.'third_party/PHPMailer/PHPMailer.php';
              //require_once APPPATH.'third_party/PHPMailer/SMTP.php';
             // require_once APPPATH.'third_party/PHPMailer/POP3.php';
              $mail = new PHPMailer\PHPMailer\PHPMailer();

             // $mail->IsSMTP();
              $mail->IsMAIL();
              $mail->isHTML(true);
              $correodesde = 'sporte@facturaperuana.com';
              $detalle = '';
               $mail->SetFrom($correodesde, utf8_decode('Datos de Acceso Factura Peruana'));
              $mail->AddAddress($email);
              //$mail->AddAddress('informespaul@gmail.com');
              $mail->Subject = utf8_decode('Datos de Acceso Actualizado');
  			$mail->Body = utf8_decode(
      '
  			<table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffffff" align="center" style="font-family:Helvetica neue,Helvetica,Arial,Verdana,sans-serif">
  			<h3>Hola : '.$razonsocial.'</h3>
  			<tbody>
  			<tr>
  			<td rowspan="1" colspan="1"><table width="620px" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff" align="center">
  			<tbody>
  			<tr>
  			<td valign="top" rowspan="1" colspan="1">
  			<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff">
  			<tbody>
  			<tr>
  			<td valign="top" style="color:#316ac5;font-size:20px;line-height:32px;text-align:left;font-weight:bold" align="left" rowspan="1" colspan="1">
  			<span>Datos de Acceso Actualizado</span>
  			</td>
  			</tr>
  			<tr>
  			<td style="color:#cccccc;padding-bottom:15px" valign="top" rowspan="1" colspan="1">
  			<hr color="#cccccc" size="1">
  			</td>
  			</tr>
  			<tr valign="top" align="left" rowspan="1" colspan="1">

  			</tr>
  			<tr valign="top" align="left" rowspan="1" colspan="1">
  			<td>

  				<ul>
  				<li><b>USUARIO : </b>'.$post['username'].'</li>
  				<li><b>CLAVE   : </b>'.$post['password'].'</li>
  				</ul>

  				<div style="margin:5px 0">
  				<br>
  				<a style="display:inline-block;padding:15px;background:#b51717;font-weight:bold;color:#ffffff;text-align:center;text-decoration:none;border-radius:18px" href="http://cpe.facturaperuana.com/" target="_blank">Iniciar Session</a></div>
  			</td></tr>
  			<tr valign="top" align="left" rowspan="1" colspan="1"><td><div><table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff">
  			<i>Si no solicito el cambio de contraseña por favor <b>Comunicate con SOPORTE</b></i>
  			</table></div></td></tr><tr><td rowspan="1" colspan="1"><table width="620px" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff" align="center"><tbody><tr><td style="color:#cccccc" valign="top" width="100%" rowspan="1" colspan="1"><hr color="#cccccc" size="1"></td></tr><tr><td rowspan="1" colspan="1"></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody>

  			</table>');

              //$mail->Send();
              $mensaje = "";
              if(!$mail->Send()) {
                  $mensaje = "Error: " . $mail->ErrorInfo;
              } else {
                  $mensaje = 1;
              }

             // echo $mail->Body ;
            //  $mensaje = 'Exito';
              echo $mensaje;
      }

    }
    public function editUsuario(){
		$idusuario=$this->input->post("idusuario");
        $data['usuario_tipo'] = $this->usuario_model->selectUsuarioTipo();
		
		 $data['usuario'] = $this->usuario_model->rowUsuario($idusuario);
        $this->load->view("edit_usuario_view",$data);
    }


	public function editPersona(){
		$id_cuenta=$this->input->post("id_cuenta");
        //$data['usuario_tipo'] = $this->usuario_model->selectUsuarioTipo();
		
		$data['persona'] = $this->usuario_model->rowPersona($id_cuenta);
        $this->load->view("edit_persona_view",$data);
		///var_dump($data['persona']);
    }

    public function updateUsuario(){
		$post['status_usuario'] = $this->input->post('status_usuario');
		 $post['username'] = $this->input->post('username');
		 $post['nombre_usuario'] = $this->input->post('nombre_usuario');
		 $post['email_usuario'] = $this->input->post('email_usuario');
		 $post['usu_tel'] = $this->input->post('usu_tel');

		 $pass = $this->input->post('contranueva');
		 if($pass!=''){
		 	$post['password'] = password_hash($pass, PASSWORD_BCRYPT);
		 }


		 $post['idusuario_tipo'] = $this->input->post('idusuario_tipo');
		 $post['id_ptoventa'] = $this->input->post('id_ptoventa');
		 $post['id_profesion'] = $this->input->post('id_profesion');
		 $idusuario = $this->input->post("idusuario");

		 
		 $existeusu = $this->usuario_model->verifUsuarioUpdateLocal($idusuario,$post['username']);
		 

		  if($existeusu){//Existe ese usuario en las base de datos
		 	echo "<script>
		 		$.smallBox({
					title : 'Aviso ! ',
					content : 'Usuario no disponible, ingrese otro usuario',
					color : '#C46A69',
					timeout: 6000,
					icon : 'fa fa-bell'
				});
		 		$('#label_errorusuario').html('Ingrese otro usuario');
			</script>";
		 }else{
		 

				 $this->usuario_model->updateUsuario($this->input->post("idusuario"),$post);
				// $idusuario = $this->usuario_model->insertUsuario($post);
				// foreach ($this->input->post('idempresa') as $fila) {
		         //   $idempresa[] = $fila;
		       //  }
			 


			echo "<script language='javascript'>  $.smallBox({
						title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
						content :'Registro correcto',
						color : '#739E73',
						timeout : 2000,
						icon : 'fa fa-check swing animated'
					});
					$( '#div_capa_pagina' ).load('".  base_url()."configuracion_usuario/gridUsuario');
					$('#ModalMante').modal('hide');
			        if ($('.modal-backdrop').is(':visible')) {
			          $('body').removeClass('modal-open');
			          $('.modal-backdrop').remove();
			        };
					</script>";
	        //foreach ($this->input->post() as $campo => $fila) {
			//	$post['password'] =$this->encrypt->encode($this->input->post("password"));
	        //  $post[$campo] = $fila;
	        //}
		}

        //$this->gridUsuario();
    }


	public function updatePersona(){
		$post['nombre'] = $this->input->post('nombre');
		 $post['apellido'] = $this->input->post('apellido');
		 $post['dni'] = $this->input->post('dni');
		 $post['telefono'] = $this->input->post('telefono');
		 $post['direccion'] = $this->input->post('direccion');
		 $post['correo'] = $this->input->post('correo');

		// $post['idusuario_tipo'] = $this->input->post('idusuario_tipo');

		// $idusuario = $this->input->post("idusuario");

		  if($existeusu){//Existe ese usuario en las base de datos
		 	echo "<script>
		 		$.smallBox({
					title : 'Aviso ! ',
					content : 'Usuario no disponible, ingrese otro usuario',
					color : '#C46A69',
					timeout: 6000,
					icon : 'fa fa-bell'
				});
		 		$('#label_errorusuario').html('Ingrese otro usuario');
			</script>";
		 }else{
		 

				 $this->usuario_model->updateUsuario($this->input->post("idusuario"),$post);
				// $idusuario = $this->usuario_model->insertUsuario($post);
				// foreach ($this->input->post('idempresa') as $fila) {
		         //   $idempresa[] = $fila;
		       //  }
			 


			echo "<script language='javascript'>  $.smallBox({
						title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
						content :'Registro correcto',
						color : '#739E73',
						timeout : 2000,
						icon : 'fa fa-check swing animated'
					});
					$( '#div_capa_pagina' ).load('".  base_url()."configuracion_usuario/gridUsuario');
					$('#ModalMante').modal('hide');
			        if ($('.modal-backdrop').is(':visible')) {
			          $('body').removeClass('modal-open');
			          $('.modal-backdrop').remove();
			        };
					</script>";
	        //foreach ($this->input->post() as $campo => $fila) {
			//	$post['password'] =$this->encrypt->encode($this->input->post("password"));
	        //  $post[$campo] = $fila;
	        //}
		}

        //$this->gridUsuario();
    }


	public function updateMisdatos(){
		 $post['nombre_usuario'] = $this->input->post('nombre_usuario');
		 $post['email_usuario'] = $this->input->post('email_usuario');
		 $post['usu_tel'] = $this->input->post('usu_tel');

		 $idusuario = $this->session->userdata('idusuario');

		$this->usuario_model->updateUsuario($idusuario,$post);
		echo "<script language='javascript'>  $.smallBox({
					title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
					content :'Se actualizó tus datos',
					color : '#739E73',
					timeout : 2000,
					icon : 'fa fa-check swing animated'
				});
				</script>";
				$this->gridMisdatos();
	}
	/*funciones para visualizar usuario anulados*/
	public function gridUsuarioInactivos(){
        $data['grid'] = $this->usuario_model->gridUsuarioInactivos();
        $this->load->view("grid_usuarioinactivo_view",$data);
    }
	/**/

	public function mantCambioClaveForm(){
		$data['usuario'] = $this->usuario_model->rowUsuario($this->session->userdata('idusuario'));
        $this->load->view("form_MantCambioClavel_view",$data);
    }

    public function mantCambioClave(){

		 $post['password'] =$this->input->post('nuevaclave');
		 $u_post['id_usuario'] = $this->session->userdata('idusuario');


		 $x_post['contraanterior'] =	$this->input->post('claveactual');
		 $x_post['contranueva'] =	$this->input->post('nuevaclave');
		 $x_post['motivocambio'] = 'Cambio de clave normal';
		 $x_post['idusuario'] = $this->input->post('id_usuario');
		 $x_post['idusuariocambio'] = $this->input->post('id_usuario');
		 $x_post['fregistro'] = date('Y-m-d H:i:s');



			$this->usuario_model->updateUsuario($u_post['id_usuario'],$post);
			$this->usuario_model->insertCambioClave($x_post);


		 echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'Se ha realizado el cambio de su clave de manera satisfactoria.',
								color : '#739E73',
								timeout : 5000,
								icon : 'fa fa-check swing animated'
							}); </script>";
		// $this->gridUsuario();
    }

    public function gridMisdatos(){
		$idusuario = $this->session->userdata('idusuario');
		
		$data['usuario'] = $this->usuario_model->rowUsuario($idusuario);
        $this->load->view("gridMisdatos_view",$data);
    }

	public function eliminarUsuario($idusuario = ''){
		$idusuario ='';
		$idusuario = $this->input->post('idtabla');
		if(strlen(trim($idusuario))>0){
        $mensajeEliminacion = $this->usuario_model->eliminarUsuario($idusuario);
		}
		//echo json_encode($mensajeEliminacion);
		echo json_encode('Eliminado');
    }

    ###Privilegio
    public function mantPrivilegioForm($idusuario = ''){

		if($idusuario !=""){
			$data['titulofrm'] = "Editar Privilegio";
			$data['usuario'] = $this->usuario_model->rowUsuario($idusuario);
		}
		$privilegioUsuario = $this->login_model->gridPrivilegioUsuario($idusuario);
        if($privilegioUsuario){
			foreach ($privilegioUsuario as $fila) {
				$data['PrivUser'][]=$fila->nomcontrol;
			}
		}else{
            $data['PrivUser'][] = 'Sin_privilegio';
        }
        $data['privilegio'] = $this->usuario_model->gridPrivilegio();
        $this->load->view("form_MantPrivilegio_view",$data);
    }

    public function updatePermiso(){
    	$estado = $this->input->post("estado");
        $this->usuario_model->updatePermiso(
        			$this->input->post("idusuario"),
        			$this->input->post("idprivilegio"),
        			$estado);

        if($estado==1){
        	echo json_encode('Activado');
        }else{
        	echo json_encode('Deshabilitado');
        }

    }

     //Asistencia
    public function asistencia(){
    	$idusuario = $this->session->userdata('idusuario');
    	$data['usuario'] = $this->usuario_model->rowUsuario($idusuario);
    	$data['gridasistencia'] = $this->usuario_model->gridAsistenciaHoy();
        $this->load->view("form_Asistencia_view",$data);
    }

    public function insertAsistencia(){
    	//Verificar ultima asistencia

    	$ultasistencia = $this->usuario_model->ultimaAsistencia();

    	$tipo = 'Ingreso';
    	if($ultasistencia){
    		if($ultasistencia->tipo=='Ingreso'){
    			$tipo ='Salida';
    		}else{
    			$tipo ='Ingreso';
    		}
    	}

		$post['id_personal'] = $this->session->userdata('idusuario');
    	$post['nota'] = $this->input->post('nota');
		$post['tipo'] = $tipo;

		$post['fch_asistencia'] = date('Y-m-d');
		$post['hr_asistencia'] = date('H:i:s');
		$post['idusu_rega'] = $this->session->userdata('idusuario');
		$post['fch_rega'] = date('Y-m-d H:i:s');

		$post['ip'] = $this->getRealIP();
        $post['hostname']       = gethostname();


		$this->usuario_model->insertAsistencia($post);
		echo "<script language='javascript'>  $.smallBox({
								title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
								content :'Se ha registrado la asistencia',
								color : '#739E73',
								timeout : 5000,
								icon : 'fa fa-check swing animated'
							}); </script>";

		$this->asistencia();

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


    public function gridOtrosUsuario(){
        $data['grid'] = $this->usuario_model->gridOtrosUsuario();
        $data['titulotabla'] = 'Lista de usuarios (Investigadores / Asesores)';
        $this->load->view("grid_OtrosUsuario_view",$data);
    }

    public function newOtroUsuario(){
       // $data['usuario_tipo'] = $this->usuario_model->selectUsuarioTipo();
        $this->load->view("form_MantUsuarioApi_view");
    }

       public function insertOtrosUsuario(){
		 $post['status_usuario'] = $this->input->post('status_usuario');
		 $post['username'] = $this->input->post('username');
		 $post['nombre_usuario'] = $this->input->post('nombre_usuario');
		 $post['email_usuario'] = $this->input->post('email_usuario');
		 $post['usu_tel'] = $this->input->post('usu_tel');

		 $pass = $this->input->post('password');
		 $post['password'] = password_hash($pass, PASSWORD_BCRYPT);

		  


		 $post['idusuario_tipo'] = $this->input->post('idusuario_tipo');
		 $post['id_ptoventa'] =1 ;//$this->input->post('id_ptoventa');
		 $post['id_profesion'] = '';//$this->input->post('id_profesion');
		 $post['usu_fch_ingreso'] = date('Y-m-d H:i:s');

		 //Verificar que no exista el usuario
		
		 	$existeusu = $this->usuario_model->verifUsuarioLocal($post['username']);
		
		 if($existeusu){//Existe ese usuario en las base de datos
		 	echo "<script>
		 		$.smallBox({
					title : 'Aviso ! ',
					content : 'Usuario no disponible, ingrese otro usuario',
					color : '#C46A69',
					timeout: 6000,
					icon : 'fa fa-bell'
				});
		 		$('#label_errorusuario').html('Ingrese otro usuario');
			</script>";
		 }else{

			$idusuario = $this->usuario_model->insertUsuario($post);
			// $this->usuario_model->insertUsuarioEmpresa($idempresa, $idusuario);

			 //Insertar todo los privilegios
			 if($post['idusuario_tipo']==1){
			 	$this->usuario_model->insertTodoPermiso($idusuario);
			 }else{
			 	$this->usuario_model->insertPermisoTipoUsuario($idusuario,$post['idusuario_tipo']);
			 }

	       // foreach ($this->input->post() as $campo => $fila) {
			//	$post['password'] =$this->encrypt->encode($this->input->post("password"));
	        //    $post[$campo] = $fila;
	       // }
			//$this->gridUsuario();
			echo "<script language='javascript'>  $.smallBox({
						title : '<i class=\'botClose fa fa-times\'></i> Aviso !',
						content :'Registro correcto',
						color : '#739E73',
						timeout : 2000,
						icon : 'fa fa-check swing animated'
					});
					$( '#div_capa_pagina' ).load('".base_url()."configuracion_usuario/gridUsuario');
					$('#ModalMante').modal('hide');
			        if ($('.modal-backdrop').is(':visible')) {
			          $('body').removeClass('modal-open');
			          $('.modal-backdrop').remove();
			        };
					</script>";
		}
    }

}

?>
