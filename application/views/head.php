<!DOCTYPE html>
<html class="no-js">
<head>
 


	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	 
<?php 
 $metaimagen = 'assets/img/sistemas.png';
 $metadescripcion = 'Parque cientítico - UNCP';
if (isset($pagina)) { 
if ($pagina) { 
	 
	 	$metaimagen ='imagenes/pagina/'.$pagina->Imagen;
		
		if(trim($pagina->Imagen)==''){
			$metaimagen = 'assets/img/sistemas.png';
		}
		
		$metadescripcion =  $pagina->SubTitulo;
		if(trim($metadescripcion)==''){
			$metadescripcion = substr(strip_tags($pagina->Contenido),0,250);
		}
	     }
}
 ?>	
	<title><?php echo $title_pag; ?></title>
 
<meta name="keywords" content="Parque Científico - UNCP">
<meta name="description" content="<?php echo $metadescripcion;?>">
<meta name="copyright" content="UNCP 2021">
<!--<meta name="robots" content="index, follow">-->
<meta http-equiv="content-type" content="text/html;UTF-8">
<meta http-equiv="cache-control" content="cache">
<meta http-equiv="content-language" content="es">

 <meta property="og:type"   content="article" /> 
 
 <meta property="og:image" content="<?php  echo base_url().$metaimagen ?>"/> 
	
    <link rel="shortcut icon" href="<?php  echo base_url() ?>assets/img/favicon.ico" type="image/vnd.microsoft.icon">
    
	<link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php  echo base_url() ?>assets/css/bootstrapv4.css">
    <link rel="stylesheet" href="<?php  echo base_url() ?>assets/css/font-awesome.css">
    <link rel="stylesheet" href="<?php  echo base_url() ?>assets/story-box/animate.css">
    <link rel="stylesheet" href="<?php  echo base_url() ?>assets/story-box/story-box-zen.css">
    <link rel="stylesheet" href="<?php  echo base_url() ?>assets/css/chrinteco.css">
    <script src="<?php  echo base_url() ?>assets/js/jquery-3.2.1.js"></script>  
  
 
</head>
<body>
 