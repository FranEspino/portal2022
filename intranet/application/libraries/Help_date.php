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

    public function fechaUsuario($datetime) {

       if ($datetime !='0000-00-00') {
            $datetime = date_create($datetime);
            $datetime = date_format($datetime,"d/m/Y");
            return $datetime;
        } else {
            return '00-00-0000';
        }
    }

    public function fechaUsuGuion($datetime) {

       if ($datetime) {
            $datetime = date_create($datetime);
            $datetime = date_format($datetime,"d-m-Y");
            return $datetime;
        } else {
            return '00-00-0000';
        }
    }
    
    public function fechaHoraUsu($datetime) {       
        /*
            Fecha: 03-02-2018
            Autor: Miki Lázaro
        */
        if ($datetime) {
            $datetime = date_create($datetime);
            $datetime = date_format($datetime,"d-m-Y H:i:s");
            return $datetime;
        } else {
            return '00-00-0000 00:00:00';
        }
    }

    public function fechaHora($datetime) {       
        /*
            Fecha: 03-02-2018
            Autor: Miki Lázaro
        */
        if ($datetime) {
            $datetime = date_create($datetime);
            $datetime = date_format($datetime,"d/m/Y H:i");
            return $datetime;
        } else {
            return '00-00-0000 00:00';
        }
    }

    public function fechaHoraInput($datetime) {       
        /*
            Fecha: 03-02-2018
            Autor: Miki Lázaro
        */
        if ($datetime) {
            $datetime = date_create($datetime);
            $fecha = date_format($datetime,"Y-m-d");
            $hora = date_format($datetime,"H:i:s");
            return $fecha.'T'.$hora;
        } else {
            return date('Y-m-d').'T'.date('H:i:s');
        }
    }

    public function mesLetra($mes) {
        switch ($mes) {
            /*
            Fecha: 01-09-2017<br>
            Autor: Miki Lázaro<br>
            Código: Agregado 00 y 13 para deifinir apertura y cierre
            */
            
            case 0:$fecha = "Apertura";
                break;
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
            case 13:$fecha = "Cierre";
                break;
        }
        return $fecha;
    }

    public function mesLetraCorto($mes) {
        $fecha ='';
        switch ($mes) {
            case 1:$fecha = "Ene";
                break;
            case 2:$fecha = "Feb";
                break;
            case 3:$fecha = "Mar";
                break;
            case 4:$fecha = "Abr";
                break;
            case 5:$fecha = "May";
                break;
            case 6:$fecha = "Jun";
                break;
            case 7:$fecha = "Jul";
                break;
            case 8:$fecha = "Ago";
                break;
            case 9:$fecha = "Set";
                break;
            case 10:$fecha = "Oct";
                break;
            case 11:$fecha = "Nov";
                break;
            case 12:$fecha = "Dic";
                break;
        }
        return $fecha;
    }

    public function get_mes($fecha) {
        list($anio, $mes, $dia) = split("-", $fecha);
        return $mes;
    }

    public function get_dia($fecha) {
        list($anio, $mes, $dia) = split("-", $fecha);
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
        return $dia .'-'.$this->mesLetraCorto($mes).'-'. $ani;
    }

    public function getNombreFecha($fecha) {
        $ani = substr($fecha, 0, 4);
        $mes = substr($fecha, 5, 2);
        $dia = substr($fecha, 8, 2);
        return $dia .' de '.$this->mesLetra($mes).' del '. $ani;
    }

    public function getFechaCortaJunto($fecha) {
        $ani = substr($fecha, 0, 4);
        $mes = substr($fecha, 5, 2);
        $dia = substr($fecha, 8, 2);
        return $dia . '/' . $mes;
    }


    public function getMesAnio($fecha) {
        $str_mes = substr($fecha, 5, 2);
        $str_anio = substr($fecha, 0, 4);
        return $str_mes . '/' . $str_anio;
    }
    
    public function getPeriodos() {
        $periodo = array();

        $anio = date("Y");

        $mes = date("m");

        $periodo_final = intval($anio) * 100 + intval($mes);

        for ($indice = 201803; $indice <= $periodo_final; $indice++) {
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
        $dia = $dias[date('N', strtotime($fecha))-1];
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

    public function edad($fecha_nacimiento) { 
        $tiempo = strtotime($fecha_nacimiento); 
        $ahora = time(); 
        $edad = ($ahora-$tiempo)/(60*60*24*365.25); 
        $edad = floor($edad); 
        return $edad; 
    }


    public function fchMysql($date){
        if(trim($date)==''){
            return '0000-00-00';
        }

        if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/", $date)) {
            list($dia, $mes, $anio) = explode("/", $date);
            if(strlen($anio)==4){
                return $anio . '-' . $mes . '-' . $dia;    
            }else{
                return $dia . '-' . $mes . '-' . $anio;
            }
            
        }

        if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/", $date)) {
            list($dia, $mes, $anio) = explode("-", $date);           
            if(strlen($anio)==4){
                return $anio . '-' . $mes . '-' . $dia;    
            }else{
                return $dia . '-' . $mes . '-' . $anio;
            }
        }
        
        $slash   = '/';
        $slash_coincidencia = strpos($date, $slash); 

        $guion   = '-';
        $guion_coincidencia = strpos($date, $guion); 

        if ($slash_coincidencia === false and $guion_coincidencia === false){
            if(strlen($date) <= 6){
                //Si son numeros cortos es del excel en texto
                $UNIX_DATE = ($date - 25569) * 86400;
                return gmdate("Y-m-d H:i:s", $UNIX_DATE);
            }else{
                return date("Y-m-d", $date);
            }
        }

        return '0000-00-00';
    }


}

?>
