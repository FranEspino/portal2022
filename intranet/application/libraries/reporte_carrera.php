<?php 
if(!defined('BASEPATH'))
	exit('No direct script access allowed');
if(!class_exists('fpdf')) {
	require_once (BASEPATH . 'libraries/fpdf' . EXT);
}
class reporte_carrera extends FPDF {
	public function __construct() {
		parent::FPDF();
	}
	function Header() {
		$this -> Image("images/imprimir.png", 10, 8, 53);
		$this -> SetFont('Arial', '', 8);
		$this->cell(0,10,'Impreso '.date('m/d/Y h:i:s a'),0,0,'R');
		$this->SetXY(70,20);
		$this -> SetFont('Arial', 'B', 16);
		$this -> Cell(60, 10, utf8_decode('FICHA DE MATRICULAS DE 3 AÑOS'), 0, 1, 'C');
		$this -> Ln(5);
	}	
	function Footer() {	
		$this -> SetY(-15);		
		$this -> SetFont('Arial', 'I', 8);		
		$this -> Cell(0, 10, 'Pagina ' . $this -> PageNo() , 0, 0, 'C');
	}

}
?>