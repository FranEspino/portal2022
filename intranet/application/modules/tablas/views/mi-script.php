<script >
$(document).ready(function() {
	//pageSetUp();
$.fn.modal.Constructor.prototype.enforceFocus = function() {};//Para que se pueda escribir en el select en mozilla 

	runAllForms();
	$('input[maxlength]').maxlength({
	warningClass: "label label-success",
	limitReachedClass: "label label-important"
	});		 
});
 function fn_SoloNumeros(e)
{
	var keynum = window.event ? window.event.keyCode : e.which;
	if ((keynum == 8))
	return true;
	
	return /\d/.test(String.fromCharCode(keynum));
}

function imprSelec(nombre) {
	var ficha = document.getElementById(nombre);
	var ventimp = window.open(' ', 'popimpr');
	ventimp.document.write( ficha.innerHTML );
	ventimp.document.close();
	ventimp.print( );
	ventimp.close();
}
function loadIframe(iframeName, url) {
    var $iframe = $('#' + iframeName);
    if ( $iframe.length ) {
        $iframe.attr('src',url);   
        return false;
    }
    return true;
}



function cerrarmodal(idmodal)
{
	var	idmodal = idmodal
	$('#'+idmodal).modal('hide');	 
}

var dias_semana = new Array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre", "Diciembre");

function redondear(value, decimals) {
  return Number(Math.round(value+'e'+decimals)+'e-'+decimals);
}


  $('.select2AjaxRS').select2({
	placeholder: "Buscar Cliente",
	minimumInputLength: 3,
	ajax: {
	  url: '<?php echo base_url() ?>cliente/getRazonSocialSelect2',
	  dataType: 'json', 
	  delay: 300,
	  processResults: function (data) {
		return {
		  results: data
		};
	  },
	  cache: true
	}
  });
  function recargarAjaxRS(){
	  $('.select2AjaxRS').select2({
	placeholder: "Buscar Cliente",
	minimumInputLength: 3,
	ajax: {
	  url: '<?php echo base_url() ?>cliente/getRazonSocialSelect2',
	  dataType: 'json', 
	  delay: 300,
	  processResults: function (data) {
		return {
		  results: data
		};
	  },
	  cache: true
	}
  });
  }
 
 $('.select2AjaxProd').select2({
	placeholder: "Buscar Producto por codigo - nombre , etc",
	minimumInputLength: 3,
	ajax: {
	  url: '<?php echo base_url() ?>producto/getProductoVentaSelect2',
	  dataType: 'json', 
	  delay: 300,
	  processResults: function (data) {
		return {
		  results: data
		};
	  },
	  cache: true
	}
  });
  function recargarAjaxProd(){
	  $('.select2AjaxProd').select2({
	placeholder: "Buscar Producto",
	minimumInputLength: 3,
	ajax: {
	  url: '<?php echo base_url() ?>producto/getProductoVentaSelect2',
	  dataType: 'json', 
	  delay: 300,
	  processResults: function (data) {
		return {
		  results: data
		};
	  },
	  cache: true
	}
  });
  }

  $('.select2AjaxProdPrecio').select2({
	placeholder: "Buscar Producto por codigo - nombre , etc",
	minimumInputLength: 2,
	ajax: {
	  url: '<?php echo base_url() ?>producto/getProductoVentaPrecioSelect2',
	  dataType: 'json', 
	  delay: 300,
	  processResults: function (data) {
		return {
		  results: data
		};
	  },
	  cache: true
	}
  });
  function recargarAjaxProd(){
	  $('.select2AjaxProdPrecio').select2({
	placeholder: "Buscar Producto",
	minimumInputLength: 2,
	ajax: {
	  url: '<?php echo base_url() ?>producto/getProductoVentaPrecioSelect2',
	  dataType: 'json', 
	  delay: 300,
	  processResults: function (data) {
		return {
		  results: data
		};
	  },
	  cache: true
	}
  });
  }
 
  $('.select2AjaxInfoProd').select2({
	placeholder: "Buscar Producto por codigo - nombre , etc",
	minimumInputLength: 2,
	ajax: {
	  url: '<?php echo base_url() ?>producto/getInfoProductoSelect2',
	  dataType: 'json', 
	  delay: 300,
	  processResults: function (data) {
		return {
		  results: data
		};
	  },
	  cache: true
	}
  });
  function recargarAjaxProd(){
	  $('.select2AjaxInfoProd').select2({
	placeholder: "Buscar Producto",
	minimumInputLength: 2,
	ajax: {
	  url: '<?php echo base_url() ?>producto/getInfoProductoSelect2',
	  dataType: 'json', 
	  delay: 300,
	  processResults: function (data) {
		return {
		  results: data
		};
	  },
	  cache: true
	}
  });
  }

  //Ubigeo
  $('.select2AjaxUbigeo').select2({
	placeholder: "Buscar Ubigeo",
	minimumInputLength: 3,
	ajax: {
	  url: '<?php echo base_url() ?>tablas/jsonUbigeoSelect2',
	  dataType: 'json', 
	  delay: 300,
	  processResults: function (data) {
		return {
		  results: data
		};
	  },
	  cache: true
	}
  });
  function recargarAjaxUbigeo(){
	  $('.select2AjaxUbigeo').select2({
	placeholder: "Buscar Ubigeo",
	minimumInputLength: 3,
	ajax: {
	  url: '<?php echo base_url() ?>tablas/jsonUbigeoSelect2',
	  dataType: 'json', 
	  delay: 300,
	  processResults: function (data) {
		return {
		  results: data
		};
	  },
	  cache: true
	}
  });
  }

   $('.select2AjaxProdCompra').select2({
	placeholder: "Buscar Producto por codigo - nombre , etc",
	minimumInputLength: 2,

	ajax: {
	  url: '<?php echo base_url() ?>producto/getProductoCompraPrecioSelect2',
	  data: function (params) {
		return {
		consulta: params.term,
		id_ptoventa: $("#id_ptoventa").val()
		};
	},
	  dataType: 'json', 
	  delay: 300,
	  processResults: function (data) {
		return {
		  results: data
		};
	  },
	  cache: true
	}
  });
  function recargarAjaxProdCompra(){
	  $('.select2AjaxProdCompra').select2({
	placeholder: "Buscar Producto",
	minimumInputLength: 2,
	data: function (params) {
		return {
		consulta: params.term,
		id_ptoventa: $("#id_ptoventa").val()
		};
	},
	ajax: {
	  url: '<?php echo base_url() ?>producto/getProductoCompraPrecioSelect2',
	  dataType: 'json', 
	  delay: 300,
	  processResults: function (data) {
		return {
		  results: data
		};
	  },
	  cache: true
	}
  });
  }
 
</script>
 