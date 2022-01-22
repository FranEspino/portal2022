

//Funcion para cerrar modal
function cerrarmodal(idmodal)
{
	var	idmodal = idmodal
	$('#'+idmodal).modal('hide');	 
}

//localStorage.clear();

// creamos la variable para el de jarviswidget, si no existe para el color de los header 
var jsonData = {}
	jsonData.widget = [] 
	jsonData.widget.push(
		{
			"id":"wid-id-0","style":"jarviswidget-color-green","title":"","hidden":0,"collapsed":0
		}
	); 
	
if(localStorage.getItem('jarvisWidgets_settings_/senatol/panel_widget-grid') == null){ 
	localStorage.setItem('jarvisWidgets_settings_/senatol/panel_widget-grid', JSON.stringify(jsonData));
 }
if(localStorage.getItem('jarvisWidgets_settings_/senatol/_widget-grid') == null){ 
	localStorage.setItem('jarvisWidgets_settings_/senatol/_widget-grid', JSON.stringify(jsonData));
 }
 
 
 //Para los textos de datetime
 
	$.datepicker.regional['es'] = {
		 closeText: 'Cerrar',
		 prevText: '< Ant',
		 nextText: 'Sig >',
		 currentText: 'Hoy',
		 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
		 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
		 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
		 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
		 weekHeader: 'Sm',
		 dateFormat: 'dd/mm/yy',
		 firstDay: 1,
		 isRTL: false,
		 showMonthAfterYear: false,
		 yearSuffix: ''
		 };
		 $.datepicker.setDefaults($.datepicker.regional['es']);
		$(function () {
		$("#fecha").datepicker();
	});