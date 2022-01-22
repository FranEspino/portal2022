<?php  //include('ribbon.php'); ?>

<script>
$(function(){
	var options_frm_misdatos = {
		target:        '#div_ModalMant',
		beforeSubmit:  showRequestMisdatos,
		success:       showResponse
	};
		$('#frm_empresa').ajaxForm(options_frm_misdatos);
	});
function showRequestMisdatos(formData, jqForm){

	};
function showResponse(responseText, statusText){

};
</script>
<style type="text/css">
    #frm_empresa section {
        margin-bottom: 5px;
    }
    #frm_empresa .onoffswitch{
        margin-top: 10px;
    }
</style>
<div id="content">

  <div class="alert alert-warning fade in no-margin">
    <button class="close" data-dismiss="alert">
        ×
    </button>
    <i class="fa-fw fa fa-warning"></i>
    <strong>.: AVISO!:</strong> Estimado cliente, si necesita <strong>modificar el RUC o desea ayuda en las configuraciones</strong> por favor <strong>Contáctate con <a  href="<?php  echo base_url() ?>informe/ayuda" class="LinkPagina" title="Ver Canales de Ayuda">Soporte</a></strong>, gracias.
</div>

    <!-- widget grid -->
    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">
            <form id="frm_empresa" method="post" class="" action="<?php echo base_url().'tablas/Corporacion/mantCorporacion'; ?>" name="frm_"  >
            <!-- Columna 1 -->
            <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">




               <!-- Widget ID (each widget will need unique ID)-->

                <div class="jarviswidget jarviswidget-color-teal" id="wid-id-0" data-widget-editbutton="false" data-widget-sortable="false" data-widget-deletebutton="false">
                    <header>
                        <span class="padding-gutter titulo-jarvis" style="line-height: normal;">
                            <i class="fa fa-cog"></i> Datos de la empresa
                        </span>
                    </header>
                    <!--<header>
                        <h2><strong>Datos</strong> <i>de empresa</i></h2>
                    </header>
                -->

                    <!-- widget div-->
                    <div>
                        <!-- widget content -->
                        <div class="widget-body no-padding">


                            <div class="panel panel-default smart-form ">

                                 <?php
				$editar = '';
				if(isset($empresa))
				{	if($empresa){
					$editar = 'SI';
					}
				}
				?>



                <fieldset class="smart-form" >

                <section>
                    <div class="row">
                        <label class="label col col-3">RUC</label>
                        <div class="col col-9">

                               <input  name="ruc" min="10000000000" max="20999999999" required="" type="number" <?php if(X_MULTIEMPRESA){ echo 'readonly=""'; } ?>  value="<?php  echo $empresa->ruc;  ?>"  class="form-control">

                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Razon Social</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-home"></i>
                               <input  required="" type="text" name="nombre_empresa" placeholder="Tal como está en SUNAT" value="<?php  echo $empresa->nombre_empresa;  ?>"  class="form-control" >
                            </label>
                        </div>
                    </div>
                </section>

                    <div class="row">
                        <label class="label col col-3">Nombre Comercial</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-home"></i>
                               <input autofocus="" type="text" name="nomcomercial_emp" required="" value="<?php  echo $empresa->nomcomercial_emp;  ?>"  class="form-control">
                            </label>
                        </div>
                    </div>


                    <div class="row hidden">
                        <label class="label col col-3">Nombre Corto</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-home"></i>
                               <input  type="text" name="nombre_small"  value="<?php echo $empresa->nombre_small;  ?>"   class="form-control">
                            </label>
                        </div>
                    </div>



                <section>
                    <div class="row">
                        <label class="label col col-4">Tipo de empresa</label>
                        <div class="col col-8">
                            <select class="form-control" name="system">
                                <option value="MOBILE" <?php  if($empresa->system == 'MOBILE'){ echo 'selected';} ?>>Enfocado a Celulares</option>
                                <option value="FARMACIA" <?php  if($empresa->system == 'FARMACIA'){ echo 'selected';} ?>>Farmacia/Botica</option>

                                <option value="BODEGA" <?php  if($empresa->system == 'BODEGA'){ echo 'selected';} ?>>Bodega/MiniMarket</option>
                                <option value="FERRETERIA" <?php  if($empresa->system == 'FERRETERIA'){ echo 'selected';} ?>>Ferreteria</option>
                                 <option value="LIBRERIA" <?php  if($empresa->system == 'LIBRERIA'){ echo 'selected';} ?>>Librería</option>
                                <option value="RESTAURANT" <?php  if($empresa->system == 'RESTAURANT'){ echo 'selected';} ?>>Comida/Restaurant</option>
                                 <option value="DISCOTECA" <?php  if($empresa->system == 'DISCOTECA'){ echo 'selected';} ?>>Discoteca</option>
                                <option value="HOTEL" <?php  if($empresa->system == 'HOTEL'){ echo 'selected';} ?>>Hotel</option>
                                <option value="SERVICIO" <?php  if($empresa->system == 'SERVICIO'){ echo 'selected';} ?>>Servicio</option>
                                <option value="TRANSPORTE" <?php  if($empresa->system == 'TRANSPORTE'){ echo 'selected';} ?>>Transporte</option>
                                <option value="MOTORS" <?php  if($empresa->system == 'MOTORS'){ echo 'selected';} ?>>Motors</option>
                                <option value="FUNERARIA" <?php  if($empresa->system == 'FUNERARIA'){ echo 'selected';} ?>>Funeraria</option>
                                <option value="OTRO" <?php  if($empresa->system == 'OTRO'){ echo 'selected';} ?>>Otros</option>
                            </select>
                        </div>
                    </div>
                </section>

                  <h3 ><small class="text-primary">Direción y Contacto</small></h3>
                            <section>
                            <div class="row">
                                        <div class="col col-3 ">
                                            Dirección
                                        </div>
                                        <div class="col col-9 ">
                                            <label class="input"><i class="icon-append fa fa-map-marker"></i>
                                                <input type="text" class="form-control" name="direccion_fiscal" name="direccion_fiscal" placeholder="Dirección"  value="<?php  echo $empresa->direccion_fiscal;  ?>">
                                            </label>
                                        </div>
                                    </div>
                                </section>
                                    <div class="row hidden">
                                        <div class="col col-3 ">
                                            Referencia:
                                        </div>
                                        <div class="col col-9 ">
                                            <label class="input"><i class="icon-append fa fa-map-signs"></i>
                                                <input type="text" class="form-control" name="referencia" placeholder="Referencia" value="<?php  echo $empresa->referencia;  ?>">
                                            </label>
                                        </div>
                                    </div>
                                    <section>
                                    <div class="row">
                                        <div class="col col-3 ">
                                            Slogan o desc.
                                        </div>
                                        <div class="col col-9 ">
                                            <label class="input"><i class="icon-append fa fa-file"></i>
                                                <input type="text" class="form-control" name="descripcion_emp" placeholder="Slogan o descripción" value="<?php  echo $empresa->descripcion_emp;  ?>">
                                            </label>
                                        </div>
                                    </div>
                                </section>
                                    <div class="row">
                                        <div class="col col-3 ">
                                            Teléfono
                                        </div>
                                        <div class="col col-3 ">
                                            <label class="input"><i class="icon-append fa fa-phone"></i>
                                                <input type="text"  placeholder="Teléfono" name="telefono_emp" class="form-control" value="<?php  echo $empresa->telefono_emp;  ?>">
                                            </label>
                                        </div>
                                        <div class="col col-2 ">
                                            Celular
                                        </div>
                                        <div class="col col-4 ">
                                            <label class="input"><i class="icon-append fa fa-mobile"></i>
                                                <input type="text"  placeholder="Celular" name="cel_emp" class="form-control" value="<?php  echo $empresa->cel_emp;  ?>">
                                            </label>
                                        </div>
                                    </div>
                                   <section>
                                    <div class="row">
                                        <div class="col col-3 ">
                                            E-mail
                                        </div>
                                        <div class="col col-9 ">
                                            <label class="input"><i class="icon-append fa fa-envelope-open-o"></i>
                                                <input type="email" class="form-control"  id="email_emp" name="email_emp" placeholder="E-mail" value="<?php  echo $empresa->email_emp;  ?>">
                                            </label>
                                        </div>
                                    </div>
                                </section>
                                    <div class="row">
                                        <div class="col col-3 ">
                                            Página Web
                                        </div>
                                        <div class="col col-9 ">
                                            <label class="input"><i class="icon-append fa fa-globe"></i>
                                                <input type="url" class="form-control"  id="pagweb" name="pagweb" placeholder="Ejm: https://minegocio.com" value="<?php  echo $empresa->pagweb;  ?>">
                                            </label>
                                        </div>
                                    </div>

                                    <section>
                    <div class="row">
                        <legend class=" no-margin"></legend><br>
                        <label class="label col col-3">F. Registro</label>
                        <div class="col col-3">

                               <input  type="text" disabled="" id="usu_fch_ingreso" name="usu_fch_ingreso" value="<?php  echo $this->load->help_date->fechaUsuario($empresa->fch_regemp);  ?>"  class="form-control">

                        </div>
                        <label class="label col col-3 no-padding-r">Inicio Operación</label>
                        <div class="col col-3">

                               <input  type="text" disabled="" id="usu_fch_ingreso" name="usu_fch_ingreso" value="<?php  echo @$this->load->help_date->fechaUsuario($cliente->fch_inioper);  ?>"  class="form-control">

                        </div>
                    </div>
                </section>


                <section>
                    <div class="row">
                        <label class="label col col-3">Estado</label>
                        <div class="col col-9">

                        <label>
                            <input  type="radio" checked="checked" id="usu_estado1" class="radiobox style-0"  value="AC" name="usu_estado" checked="">
                            <span>Activo</span>
                        </label>
                        <label>
                            <input type="radio" id="usu_estado2" class="radiobox style-0"  value="DS"  name="usu_estado" disabled>
                            <span>Desactivado</span>
                        </label>
                    </div>
                    </div>
                </section>






                </fieldset>
                <footer>

                    <!--Campos ocultos-->
                <input type="hidden"  name="idempresa_corp" value="<?php  echo $empresa->idempresa_corp;  ?>">
                                                <button type="submit" class="btn btn-primary">
                                                    Guardar
                                                </button>

                                            </footer>

                            </div>



                        </div>
                        <!-- end widget content -->
                    </div>
                    <!-- end widget div -->
                </div>
                <!-- end widget -->



            </article>
            <!-- Fin colummna 1 -->

            <!-- Columna 2 -->
            <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-teal" id="wid-id-93" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-sortable="false" data-widget-deletebutton="false" style="
    margin-bottom: 5px;
">
                    <header>
                        <h2><strong>Otras</strong> <i> configuraciones</i></h2>
                    </header>

                    <!-- widget div-->
                    <div>
                        <!-- widget content -->
                        <div class="widget-body no-padding">
                           <div class="panel panel-default smart-form ">

                        <fieldset >

                <h3 ><small class="text-primary">Producto</small></h3>
                <section>
                    <div class="row">
                        <label class="label col col-4">Precio:</label>
                        <div class="col col-8">
                            <select class="form-control" id="displayprice" name="displayprice">
                                <option value="1" <?php  if($empresa->displayprice == '1'){ echo 'selected';} ?>>Público</option>
                                <option value="3" <?php  if($empresa->displayprice == '3'){ echo 'selected';} ?>>Público, Tec. y Distribuidor</option>
                            </select>
                    </div>
                </section>
                <section id="div_preciodefecto">
                    <div class="row">
                        <label class="label col col-4">Precio por defecto:</label>
                        <div class="col col-8">
                            <select class="form-control" id="defaultprice" name="defaultprice">
                                <option value="PUBLICO" <?php  if($empresa->defaultprice == 'PUBLICO'){ echo 'selected';} ?>>Público</option>
                                <option value="TECNICO" <?php  if($empresa->defaultprice == 'TECNICO'){ echo 'selected';} ?>>Técnico</option>
                                <option value="DISTRIBUIDOR" <?php  if($empresa->defaultprice == 'DISTRIBUIDOR'){ echo 'selected';} ?>>Distribuidor</option>
                            </select>
                        </div>
                    </div>
                </section>
								<!--<section id="div_preciodefecto">
                    <div class="row">
                        <label class="label col col-4">Código de Producto:</label>
                        <div class="col col-8">

                            <input type="text" class="col-4 input-codigo" name="pref_cod" id="pref_cod" value="<?php echo $empresa->pref_cod;?>" placeholder="Prefijo (Opcional)"<?php if($empresa->flg_codprod == 0){ echo 'hidden';} ?>><span <?php if($empresa->flg_codprod == 0){ echo 'hidden';} ?> id="espaciado_guion"> - </span>
                            <select class="col-7  <?php if($empresa->flg_codprod == 1){ echo 'input-codigo';}else{echo 'form-control';} ?>"  id="flg_codprod" name="flg_codprod">
                                <option value="0" <?php  if($empresa->flg_codprod == 0){ echo 'selected';} ?>>GENERA EL SISTEMA</option>
                                <option value="1" <?php  if($empresa->flg_codprod){ echo 'selected';} ?>>CÓDIGO PROPIO, BARRA o QR</option>
                            </select>
                        </div>
                    </div>
                </section>-->
								<section id="div_preciodefecto">
								                    <div class="row">
								                        <label class="label col col-4">Código de Producto:</label>
								                        <div class="col col-8">
								                            <select class="col col-8  <?php if($empresa->flg_codprod == 1){ echo 'input-codigo';}else{echo 'form-control';} ?>"  id="flg_codprod" name="flg_codprod">
								                                <option value="0" <?php  if($empresa->flg_codprod == 0){ echo 'selected';} ?>>GENERA EL SISTEMA</option>
								                                <option value="1" <?php  if($empresa->flg_codprod){ echo 'selected';} ?>>CÓDIGO PROPIO, BARRA o QR</option>
								                            </select>
								                             <input type="text" class="col col-3 input-codigo" name="pref_cod" id="pref_cod" value="<?php echo $empresa->pref_cod;?>" placeholder="Prefijo (Opcional)"<?php if($empresa->flg_codprod == 0){ echo 'hidden';} ?>>


								                        </div>
								                    </div>
								                </section>


                                    <h3 ><small class="text-primary">Formulario de venta</small>
                                        <legend class="no-padding no-margin"></legend>
                                    </h3>

                                    <section>
                                        <div class="row">
                                            <label class="label col col-7">Comprobante predeterminado:</label>
                                            <div class="col col-5">

                                    <?php
                                        $opciones_TC['']=' --Seleccione -- ';
                                        if($gridTipoComprobanteAct){
                                            foreach ($gridTipoComprobanteAct as $fila) {
                                                $opciones_TC[$fila->id_tipocomprobante] = $fila->id_tipocomprobante . ' '.$fila->tipocomprobante;
                                            }
                                        }
                                        echo form_dropdown("defaultcomp", $opciones_TC,$empresa->defaultcomp ,  ' class="form-control valid" required ');
                                    ?>
                                            </div>
                                        </div>
                                    </section>
                                    <section>
                                        <div class="row">
                                            <label class="label col col-5">Tamaño predeterminado:</label>
                                            <div class="col col-5">
                                                <select class="form-control" name="defaultformat">
                                                    <option value="TICKET" <?php  if($empresa->defaultformat == 'TICKET'){ echo 'selected';} ?>>TICKET</option>
                                                    <option value="A5" <?php  if($empresa->defaultformat == 'A5'){ echo 'selected';} ?>>A5 (Mitad de A4)</option>
                                                    <option value="A4" <?php  if($empresa->defaultformat == 'A4'){ echo 'selected';} ?>>A4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </section>


                                    <section>
                                        <div class="row">
                                            <label class="label col col-3">Tipo de Afectacion IGV:</label>
                                            <div class="col col-3 no-padding-l">
                                                <select class="form-control" name="tipoigv">
                                                    <option value="10" <?php  if($empresa->tipoigv == '10'){ echo 'selected';} ?>>GRAVADO (18%)</option>
                                                    <option value="20" <?php  if($empresa->tipoigv == '20'){ echo 'selected';} ?>>EXONERADO (0%)</option>
                                                    <option value="30" <?php  if($empresa->tipoigv == '30'){ echo 'selected';} ?>>INAFECTO (0%)</option>
                                                    <option value="40" <?php  if($empresa->tipoigv == '40'){ echo 'selected';} ?>>EXPORTACIÓN (0%)</option>
                                                    <option value="00" <?php  if($empresa->tipoigv == '00'){ echo 'selected';} ?>>MIXTO</option>
                                                </select>
                                            </div>
                                             <?php
                    $monedadef = $empresa->tipomoneda;

                 ?>
                <label class="label col col-3" >Tipo de Moneda:</label>
                <div class="col col-3">
                    <select class="form-control" name="tipomoneda" id="tipomoneda">
                        <option value="PEN" <?php echo ($monedadef=='PEN')?'selected':''; ?>>SOLES</option>
                        <option value="USD" <?php echo ($monedadef=='USD')?'selected':''; ?>>DOLARES</option>
                        <option value="MIXTO" <?php echo ($monedadef=='MIXTO')?'selected':''; ?>>MIXTO</option>
                    </select>
                </div>
                                        </div>
                                    </section>
                                     <section>
                                        <?php $TipoDescVenta = value_config('TipoDescVenta',$config) ?>
                                        <div class="row">
                                            <label class="label col col-3">Tipo de descuento:</label>
                                            <div class="col col-3 no-padding-l">
                                                <select class="form-control" name="TipoDescVenta">
                                                    <option value="D" <?php  if($TipoDescVenta == 'D'){ echo 'selected';} ?>>Dinero</option>
                                                    <option value="P" <?php  if($TipoDescVenta == 'P'){ echo 'selected';} ?>>Porcentaje (%)</option>
                                                </select>
                                            </div>
                                             
               
                                        </div>
                                    </section>
                                    <section>
                                        <div class="row">

                <?php
                    $flg_boletaruc = $empresa->flg_boletaruc;
                 ?>
                <label class="label col col-4" >Permitir Boletas con RUC:</label>
                <div class="col col-2">
                    <span class="onoffswitch">
                      <input type="checkbox" name="flg_boletaruc" class="onoffswitch-checkbox" id="flg_boletaruc" value="1" <?php echo ($flg_boletaruc=='1')?'checked=""':''; ?>>
                        <label class="onoffswitch-label" for="flg_boletaruc">
                            <span class="onoffswitch-inner" data-swchon-text="SI" data-swchoff-text="NO"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </span>
                </div>
                <?php
                    $flg_duplicaritem = $empresa->flg_duplicaritem;
                 ?>
                <label class="label col col-4" >Duplicar item del mismo prod. al vender:</label>
                <div class="col col-2">
                    <span class="onoffswitch">
                      <input type="checkbox" name="flg_duplicaritem" class="onoffswitch-checkbox" id="flg_duplicaritem" value="1" <?php echo ($flg_duplicaritem=='1')?'checked=""':''; ?>>
                        <label class="onoffswitch-label" for="flg_duplicaritem">
                            <span class="onoffswitch-inner" data-swchon-text="SI" data-swchoff-text="NO"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </span>
                </div>

                                        </div>
                                    </section>

                                    <section>
                                        <div class="row">
                                            <?php
                    $flg_ventafchpasada = $empresa->flg_ventafchpasada;

                 ?>
                <label class="label col col-4" >Ventas con fecha pasada:</label>
                <div class="col col-2">
                    <span class="onoffswitch">
                      <input type="checkbox" name="flg_ventafchpasada" class="onoffswitch-checkbox" id="flg_ventafchpasada" value="1" <?php echo ($flg_ventafchpasada=='1')?'checked=""':''; ?>>
                        <label class="onoffswitch-label" for="flg_ventafchpasada">
                            <span class="onoffswitch-inner" data-swchon-text="SI" data-swchoff-text="NO"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </span>
                </div>

                                            <?php
                    $flg_ventaconcero = $empresa->flg_ventaconcero;

                 ?>
                <label class="label col col-4" >Permitir ventas con monto cero:</label>
                <div class="col col-2">
                    <span class="onoffswitch">
                      <input type="checkbox" name="flg_ventaconcero" class="onoffswitch-checkbox" id="flg_ventaconcero" value="1" <?php echo ($flg_ventaconcero=='1')?'checked=""':''; ?>>
                        <label class="onoffswitch-label" for="flg_ventaconcero">
                            <span class="onoffswitch-inner" data-swchon-text="SI" data-swchoff-text="NO"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </span>
                </div>
                                        </div>
                                    </section>
                                    <section>
                                        <div class="row">
                                            <?php
                    $flg_reststock = $empresa->flg_reststock;

                 ?>
                <label class="label col col-4" >Restricción de Stock:</label>
                <div class="col col-2">
                    <span class="onoffswitch">
                      <input type="checkbox" name="flg_reststock" class="onoffswitch-checkbox" id="flg_reststock" value="1" <?php echo ($flg_reststock=='1')?'checked=""':''; ?>>
                        <label class="onoffswitch-label" for="flg_reststock">
                            <span class="onoffswitch-inner" data-swchon-text="SI" data-swchoff-text="NO"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </span>
                </div>

                                            <?php
                    $flg_restprecmin = $empresa->flg_restprecmin;

                 ?>
                <label class="label col col-4" >Restricción de precio mínimo:</label>
                <div class="col col-2">
                    <span class="onoffswitch">
                      <input type="checkbox" name="flg_restprecmin" class="onoffswitch-checkbox" id="flg_restprecmin" value="1" <?php echo ($flg_restprecmin=='1')?'checked=""':''; ?>>
                        <label class="onoffswitch-label" for="flg_restprecmin">
                            <span class="onoffswitch-inner" data-swchon-text="SI" data-swchoff-text="NO"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </span>
                </div>
                                        </div>
                                    </section>
                                    <section>
                                        <div class="row"> 
                <?php $CantDelTotalVenta = value_config('CantDelTotalVenta',$config) ?>
                <label class="label col col-4" >Calcular cantidad al ingresar el P. Total:</label>
                <div class="col col-2">
                    <span class="onoffswitch">
                      <input type="checkbox" name="CantDelTotalVenta" class="onoffswitch-checkbox" id="CantDelTotalVenta" value="1" <?php echo ($CantDelTotalVenta=='1')?'checked=""':''; ?>>
                        <label class="onoffswitch-label" for="CantDelTotalVenta">
                            <span class="onoffswitch-inner" data-swchon-text="SI" data-swchoff-text="NO"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </span>
                </div>
 
                <?php $BuscarPrecioVenta = value_config('BuscarPrecioVenta',$config) ?>
                <label class="label col col-4" >Buscar precio y promo. al ingresar cantidad:</label>
                <div class="col col-2">
                    <span class="onoffswitch">
                      <input type="checkbox" name="BuscarPrecioVenta" class="onoffswitch-checkbox" id="BuscarPrecioVenta" value="1" <?php echo ($BuscarPrecioVenta=='1')?'checked=""':''; ?>>
                        <label class="onoffswitch-label" for="BuscarPrecioVenta">
                            <span class="onoffswitch-inner" data-swchon-text="SI" data-swchoff-text="NO"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </span>
                </div>
                                        </div>
                                    </section>
                                       <section>
                                        <div class="row">
                                            <?php
                    $flg_guiamanual = $empresa->flg_guiamanual;

                 ?>
                <label class="label col col-4" >Utiliza guía de remisión manual:</label>
                <div class="col col-2">
                    <span class="onoffswitch">
                      <input type="checkbox" name="flg_guiamanual" class="onoffswitch-checkbox" id="flg_guiamanual" value="1" <?php echo ($flg_guiamanual=='1')?'checked=""':''; ?>>
                        <label class="onoffswitch-label" for="flg_guiamanual">
                            <span class="onoffswitch-inner" data-swchon-text="SI" data-swchoff-text="NO"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </span>
                </div>

                                            <?php
                    $flg_impulsador = $empresa->flg_impulsador;

                 ?>
                <label class="label col col-4" >Maneja Vendedor o Impulsador:</label>
                <div class="col col-2">
                    <span class="onoffswitch">
                      <input type="checkbox" name="flg_impulsador" class="onoffswitch-checkbox" id="flg_impulsador" value="1" <?php echo ($flg_impulsador=='1')?'checked=""':''; ?>>
                        <label class="onoffswitch-label" for="flg_impulsador">
                            <span class="onoffswitch-inner" data-swchon-text="SI" data-swchoff-text="NO"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </span>
                </div>
                                        </div>
                                    </section>

                                     <section>
                                        <div class="row"> 
                <?php $PermitirAgIGV = value_config('PermitirAgIGV',$config) ?>
                <label class="label col col-4" >Permitir Agregar IGV:</label>
                <div class="col col-2">
                    <span class="onoffswitch">
                      <input type="checkbox" name="permitir_agigv" class="onoffswitch-checkbox" id="permitir_agigv" value="1" <?php echo ($PermitirAgIGV=='1')?'checked=""':''; ?>>
                        <label class="onoffswitch-label" for="permitir_agigv">
                            <span class="onoffswitch-inner" data-swchon-text="SI" data-swchoff-text="NO"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </span>
                </div>
 
                <?php $DetraccionVenta = value_config('DetraccionVenta',$config) ?>
                <label class="label col col-4" >Ventas con Detracción:</label>
                <div class="col col-2">
                    <span class="onoffswitch">
                      <input type="checkbox" name="detraccion_venta" class="onoffswitch-checkbox" id="detraccion_venta" value="1" <?php echo ($DetraccionVenta=='1')?'checked=""':''; ?>>
                        <label class="onoffswitch-label" for="detraccion_venta">
                            <span class="onoffswitch-inner" data-swchon-text="SI" data-swchoff-text="NO"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </span>
                </div>
                                        </div>
                                    </section>

                                    <section>
                                         <legend class="no-padding no-margin"></legend><br>
                                        <div class="row">
                                            <label class="label col col-2">Logo:</label>
                                            <div class="col col-6">

                                    <div id="div_imagen">
                                        <?php
                                        if($empresa->logocorp==''){
                                            $nombre_fichero = base_url().'assets/img/logo.png';
                                        }else{
                                            $nombre_fichero = base_url().'file/img/'.$empresa->logocorp;
                                        }
                                       // echo $nombre_fichero;
                                        //$AgetHeaders = @get_headers($nombre_fichero);
                                        //if (@GetImageSize($nombre_fichero)) {
                                        ?>
                                        <a href="<?php  echo $nombre_fichero ;?>" target="_blank" title="Ver imagen">   <img width="100%" src="<?php  echo $nombre_fichero ;?>" alt=""></a>
                                        <?php //}?>
                                        </div>
                                         <a href="javascript:void(0);" rel="tooltip"  data-placement="left" data-original-title="Cambiar imagen" class="" id="btnsubirimagen" onclick="subirimagen('<?php echo $empresa->idempresa_corp; ?>','<?php echo $empresa->logocorp; ?>');"><i class="glyphicon glyphicon-undo"></i> Cambiar logo</a>

                                         </div>
                                        </div>
                                    </section>

                         </fieldset>
                        </div>

                        </div>
                        <!-- end widget content -->
                    </div>
                    <!-- end widget div -->
                </div>
                <!-- end widget -->




            </article>
            <!--Fin columna 2-->
             <!-- Columna FE-->
            <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="jarviswidget jarviswidget-color-teal    " id="wid-id-94" data-widget-colorbutton="false" data-widget-editbutton="false" ata-widget-fullscreenbutton="false" data-widget-sortable="false" data-widget-deletebutton="false">
                    <header>
                        <h2><strong>Facturación</strong> <i> Electrónica</i></h2>
                    </header>

                    <!-- widget div-->
                    <div>
                        <!-- widget content -->
                        <div class="widget-body no-padding">
                           <div class="panel panel-default smart-form ">

                        <fieldset >
                                         <h3 ><small class="text-primary">Facturación Electrónica</small></h3>
                <section>
                    <div class="row">
                        <?php
                        $serv = 'Sin Conexión';
                        if($api){
                            if($api->soap_type_id=='01'){
                               $serv = 'Prueba' ;
                            }else{
                                $serv = 'Producción' ;
                            }

                        }
                         ?>
                        <label class="label col col-3 no-padding-r">Servidor SUNAT
                            <?php if(@$api->soap_type_id != ""){?>
                                <i class="fa fa-check text-success"></i>
                            <?php }else{ ?>
                                <i class="fa fa-warning text-warning"></i>
                            <?php } ?>
                        </label>
                        <div class="col col-9">
                            <input readonly="" type="text" value="<?php echo $serv;  ?>"  class="form-control">
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Usuario Sec.
                            <?php if(@$api->soap_username != ""){?>
                                <i class="fa fa-check text-success"></i>
                            <?php }else{ ?>
                                <i class="fa fa-warning text-warning"></i>
                            <?php } ?>
                        </label>
                        <div class="col col-9">
                            <input readonly="" type="text" value="<?php echo @substr($api->soap_username,11,20);  ?>"  class="form-control">
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">Certificado
                        <?php if($cert){?>
                            <i class="fa fa-check text-success"></i>
                        <?php }else{ ?>
                            <i class="fa fa-warning text-warning"></i>
                        <?php } ?></label>
                        <div class="col col-4">
                           <small>F. Inicio</small>
                               <input  type="date" readonly="" name="iduser_apirest"  value="<?php echo @$cert->fch_inicio;  ?>"  class="form-control">
                        </div>

                        <div class="col col-5">
                           <small> F. Vencimiento</small>

                               <input  type="date" readonly="" name="token_apirest"  value="<?php echo @$cert->fch_fin;  ?>"  class="form-control">

                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-3">ID
                            <?php if(@$api->company_number == $empresa->ruc){?>
                                <i class="fa fa-check text-success"></i>
                            <?php }else{ ?>
                                <i class="fa fa-warning text-warning"></i>
                            <?php } ?>
                        </label>
                        <div class="col col-2 no-padding-r">

                               <input  type="text" readonly="" name="iduser_apirest"  value="<?php echo $empresa->iduser_apirest;  ?>"  class="form-control">

                        </div>
                        <label class="label col col-2 no-padding-r text-right">Token
                        <?php if(@$api->api_token == $empresa->token_apirest){?>
                                <i class="fa fa-check text-success"></i>
                            <?php }else{ ?>
                                <i class="fa fa-warning text-warning"></i>
                            <?php } ?>
                        </label>
                        <div class="col col-5">

                               <input  type="text" readonly="" name="token_apirest"  value="<?php echo $empresa->token_apirest;  ?>"  class="form-control">

                        </div>
                    </div>
                </section>
                                    </fieldset>
                        </div>

                        </div>
                        <!-- end widget content -->
                    </div>
                    <!-- end widget div -->
                </div>
                <!-- end widget -->
            <!-- Fin Columna FE -->
        </form>


        </div>
        <!-- end row -->

    </section>
    <!-- end widget grid -->

<!-- Modal -->
<div id="div_ModalMant">
</div><!-- /.modal -->

</div>

<!--================================================== -->
<script>
LinkPagina();

pageSetUp();
$('#displayprice').change(function() {
    selectpreciodefecto();
})
$("#flg_codprod").change(function(){
      var valor = $("#flg_codprod").val();
      if (valor==1){
        $("#flg_codprod").removeClass('form-control');
        $("#flg_codprod").addClass('input-codigo');
        $("#pref_cod").attr("hidden",false);
        $("#espaciado_guion").show();

      }else{
        $("#pref_cod").val('<?php echo $empresa->pref_cod;?>');
        $("#pref_cod").attr("hidden",true);
        $("#espaciado_guion").hide();
        $("#flg_codprod").removeClass('input-codigo');
        $("#flg_codprod").addClass('form-control');
      }
    });
function selectpreciodefecto(){
    if($("#displayprice").val()>'1')
    {
        $("#div_preciodefecto").show(300);
    }else{
        $("#div_preciodefecto").hide(300);
        $("#defaultprice").val('PUBLICO');
    }
}
selectpreciodefecto();
function subirimagen(idtabla, nomimagen){
    var url = "<?php  echo base_url() ?>tablas/Corporacion/mantSubirImagen/"+idtabla+"/"+nomimagen;
    $( "#div_ModalMant").load(url);
};
</script>
<style>
	 .select2-dropdown
	 {
		 width:400px !important;
	 }
 </style>
