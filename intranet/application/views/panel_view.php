<?php	 include('head.php'); ?>	
	 
<body class="fixed-header">
	<!-- HEADER -->
	<?php include('header.php'); ?>
	<!-- END HEADER -->

	<?php  include('aside.php'); ?>
	<!-- END NAVIGATION -->

	<!-- MAIN PANEL -->
	<div id="main" role="main">

		<!-- RIBBON -->
		<?php  //include('ribbon.php'); ?>
		<!-- END RIBBON -->

		<!-- MAIN CONTENT -->
        <div id="div_capa_pagina"  >
	<?php  //include('plantilla.php'); ?>
    </div>
		<!-- END MAIN CONTENT -->
	<div id="div_cambioclave"  >
		<!--Aqui se carga el formulario cambio de clave-->
    </div>
    
	</div>
	<!-- END MAIN PANEL -->

	<!-- PAGE FOOTER -->
	<?php include('footer.php'); ?>
	<!-- END PAGE FOOTER -->

	<!-- SHORTCUT AREA -->
	<?php //include('shortcut.php'); ?>
	<!-- END SHORTCUT AREA -->

	<!--================================================== -->

	<?php include('script.php'); ?>

<script type="text/javascript"> 
$(document).ready(function() {

	$(".LinkPag").click(function(event){
		event.preventDefault(); 
		var url =  $(this).attr('href');
		//    $("#capa_tabulador_area").html("<p class='loading'></p>");
		$("#div_capa_pagina").load(url);
	});
	$(".LinkCamClave").click(function(event){
		event.preventDefault(); 
		var url =  $(this).attr('href');
		$("#div_cambioclave").load(url);
	});

	//Activar class active	
	$('li ul li').click(function(){
		$('li').removeClass("active");
		$(this).addClass("active");
	});
	$('li').click(function(){ 	
		$(this).addClass("active");
	});
	
	$(".sinsubmenu").click(function(event){
		$('li').removeClass("active");
		$(this).addClass("active");
		$("li ul").css({display: "none"});			
	});


	


});
function cargarPag(url)
 {
	$("#main").load(url);
 }

 function elimfile(idimput){
	$( "#"+idimput ).val('');
	$( "."+idimput ).addClass('hidden');
}

</script>	
<script type="text/javascript">
$(document).ready(function() {
			
			//pageSetUp();
		
		})
</script>		

</body>

</html>