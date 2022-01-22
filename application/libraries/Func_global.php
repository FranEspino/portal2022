<?php 

class Func_global {

 
	
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
		return $s; 
	}

  }

?>
