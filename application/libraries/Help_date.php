<?php 

class help_date {

    public function sumDateUser($date, $numberDate) {

        if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/", $date)) {
            list($dia, $mes, $anio) = split("/", $date);
        }

        if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/", $date)) {
            list($dia, $mes, $anio) = split("-", $date);
        }
        $nueva = mktime(0, 0, 0, $mes, $dia, $anio) + $numberDate * 24 * 60 * 60;
        $nuevafecha = date("d-m-Y", $nueva);
        return ($nuevafecha);
    }

    public function sumDateMysql($date, $numberDate) {

        if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/", $date)) {
            list($anio, $mes, $dia) = split("/", $date);
        }

        if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/", $date)) {
            list($anio, $mes, $dia) = split("-", $date);
        }
        $nueva = mktime(0, 0, 0, $mes, $dia, $anio) + $numberDate * 24 * 60 * 60;
        $nuevafecha = date("Y-m-d", $nueva);
        return ($nuevafecha);
    }

    public function fechaMysql($date) {
        if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/", $date)) {
            list($dia, $mes, $anio) = explode("/", $date);
        }

        if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/", $date)) {
            list($dia, $mes, $anio) = explode("-", $date);
        }
        return $anio . '-' . $mes . '-' . $dia;
    }

    public function fechaUsuario($date) {

        if ($date) {
            list($anio, $mes, $dia) = explode("-", $date);
            return $dia . '-' . $mes . '-' . $anio;
        } else {
            return '00-00-0000';
        }
    }
	public function fechaHoraUsu($datetime) {		
        if ($datetime) {
            $datetime = date_create($datetime);
			$datetime = date_format($datetime,"d-m-Y h:i:s");
			return $datetime;
        } else {
            return '00-00-0000';
        }
    }

    public function mesLetra($mes) {
        switch ($mes) {
            case 1:$fecha = "Enero";
                break;
            case 2:$fecha = "Febrero";
                break;
            case 3:$fecha = "Marzo";
                break;
            case 4:$fecha = "Abril";
                break;
            case 5:$fecha = "Mayo";
                break;
            case 6:$fecha = "Junio";
                break;
            case 7:$fecha = "Julio";
                break;
            case 8:$fecha = "Agosto";
                break;
            case 9:$fecha = "Septiembre";
                break;
            case 10:$fecha = "Octubre";
                break;
            case 11:$fecha = "Noviembre";
                break;
            case 12:$fecha = "Diciembre";
                break;
        }
        return $fecha;
    }
	
    public function mesLetraFecha($fecha) {
		$fecha = date_create($fecha);
		$mes = date_format($fecha,"m");
        switch ($mes) {
            case 1:$fecha = "Enero";
                break;
            case 2:$fecha = "Febrero";
                break;
            case 3:$fecha = "Marzo";
                break;
            case 4:$fecha = "Abril";
                break;
            case 5:$fecha = "Mayo";
                break;
            case 6:$fecha = "Junio";
                break;
            case 7:$fecha = "Julio";
                break;
            case 8:$fecha = "Agosto";
                break;
            case 9:$fecha = "Setiembre";
                break;
            case 10:$fecha = "Octubre";
                break;
            case 11:$fecha = "Noviembre";
                break;
            case 12:$fecha = "Diciembre";
                break;
        }
        return $fecha;
    }

    public function mesLetraCortoFecha($fecha) {
		$fecha = date_create($fecha);
		$mes = date_format($fecha,"m");
        switch ($mes) {
            case 1:$fecha = "ENE";
                break;
            case 2:$fecha = "FEB";
                break;
            case 3:$fecha = "MAR";
                break;
            case 4:$fecha = "ABR";
                break;
            case 5:$fecha = "MAY";
                break;
            case 6:$fecha = "JUN";
                break;
            case 7:$fecha = "JUL";
                break;
            case 8:$fecha = "AGO";
                break;
            case 9:$fecha = "SET";
                break;
            case 10:$fecha = "OCT";
                break;
            case 11:$fecha = "NOV";
                break;
            case 12:$fecha = "DIC";
                break;
        }
        return $fecha;
    }
	
    public function mesLetraCorto($mes) {
        switch ($mes) {
            case 1:$fecha = "ENE";
                break;
            case 2:$fecha = "FEB";
                break;
            case 3:$fecha = "MAR";
                break;
            case 4:$fecha = "ABR";
                break;
            case 5:$fecha = "MAY";
                break;
            case 6:$fecha = "JUN";
                break;
            case 7:$fecha = "JUL";
                break;
            case 8:$fecha = "AGO";
                break;
            case 9:$fecha = "SET";
                break;
            case 10:$fecha = "OCT";
                break;
            case 11:$fecha = "NOV";
                break;
            case 12:$fecha = "DIC";
                break;
        }
        return $fecha;
    }

    public function get_mes($fecha) {
        list($anio, $mes, $dia) = split("-", $fecha);
        return $mes;
    }

    public function get_dia($fecha) {
		$fecha = date_create($fecha);
		$dia = date_format($fecha,"d");
        //list($anio, $mes, $dia) = split("-", $fecha);
        return $dia;
    }

    public function get_mes_dia($fecha) {
        list($anio, $mes, $dia) = split("-", $fecha);
        return $dia . '-' . $mes;
    }

    public function get_anio($fecha) {
        list($anio, $mes, $dia) = split("-", $fecha);
        return $anio;
    }

    public function getFechaCorta($fecha) {
        $ani = substr($fecha, 0, 4);
        $mes = substr($fecha, 5, 2);
        $dia = substr($fecha, 8, 2);
        return $dia . '<br/>/' . $mes;
    }

    public function getFechaCortaJunto($fecha) {
        $ani = substr($fecha, 0, 4);
        $mes = substr($fecha, 5, 2);
        $dia = substr($fecha, 8, 2);
        return $dia . '/' . $mes;
    }

    public function getPeriodos() {
        $periodo = array();

        $anio = date("Y");

        $mes = date("m");

        $periodo_final = intval($anio) * 100 + intval($mes);

        for ($indice = 201101; $indice <= $periodo_final; $indice++) {
            $str_mes = substr($indice, 4, 2);
            if ($str_mes >= 1 && $str_mes <= 12) {
                $periodo[$indice] = $this->getFormatoPeriodo($indice);
            }
        }
        return $periodo;
    }

    public function getFormatoPeriodo($periodo) {
        $str_mes = substr($periodo, 4, 2);
        $str_anio = substr($periodo, 0, 4);
        return $str_mes . '-' . $str_anio;
    }


	public function getDiaSemana($fecha){
		$dias = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
		$dia = $dias[date(N, strtotime($fecha))-1];
		//$diasemana=date(N); 
    	/*switch ($diasemana) {
            case 1:$dia = "Lunes";
                break;
            case 2:$dia = "Martes";
                break;
            case 3:$dia = "Miercoles";
                break;
            case 4:$dia = "Jueves";
                break;
            case 5:$dia = "Viernes";
                break;
            case 6:$dia = "Sabado";
                break;
            case 7:$dia = "Domingo";
                break;
           
        }*/
        return $dia;
	}
}

?>
