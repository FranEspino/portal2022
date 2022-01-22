<?php 

/**
 * Description of servicio_js
 *
 * @author Rommel Mercado
 */
class servicio_js {

    private $_oCI;

    public function __construct() {
        $this->_oCI = & get_instance();
    }

    public function locationLogOut() {

        ##Obtener el Perfil de Usuario
        $_sPerfil = $this->_oCI->session->userdata("idusuario");
        if (!$_sPerfil) {
            echo "<script>location.href = '".base_url()."panel/cerrarLogin'</script>";
        }
    }
	public function reemplazar($s) 
	{ 


		$s = str_replace('á', 'a', $s); 
		$s = str_replace('Á', 'A', $s); 
		$s = str_replace('é', 'e', $s); 
		$s = str_replace('É', 'E', $s); 
		$s = str_replace('í', 'i', $s); 
		$s = str_replace('Í', 'I', $s); 
		$s = str_replace('ó', 'o', $s); 
		$s = str_replace('Ó', 'O', $s); 
		$s = str_replace('Ú', 'U', $s); 
		$s= str_replace('ú', 'u', $s); 
		
		//Quitando Caracteres Especiales 
		$s= str_replace('"', '', $s); 
		$s= str_replace(':', '', $s); 
		$s= str_replace('.', '', $s); 
		$s= str_replace(',', '', $s); 
		$s= str_replace(';', '', $s); 
		$s= str_replace(' ', '-', $s); 

        $s = preg_replace('([^A-Za-z0-9])', '-', $s);
        $s = str_replace('--', '-', $s);
      
		return $s; 
	}
	
	public function cicloRomano($numciclo) {
        switch ($numciclo) {
            case 1:$ciclo = "I";
                break;
            case 2:$ciclo = "II";
                break;
            case 3:$ciclo = "III";
                break;
            case 4:$ciclo = "IV";
                break;
            case 5:$ciclo = "V";
                break;
            case 6:$ciclo = "VI";
                break;
            case 7:$ciclo = "VII";
                break;
            case 8:$ciclo = "VIII";
                break;
            case 9:$ciclo = "IX";
                break;
            case 10:$ciclo = "X";
                break; 
        }
        return $ciclo;
    }

}

?>
