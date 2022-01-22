<?php 

/**
 * Description of servicio_ipad
 *
 * @author Rommel Mercado
 */
class servicio_ipad
{

    public function colorMensaje($vStatus = '')
    {
        $html = "";

        if ($vStatus == 'P')
        {
            $html.=' class="mensaje_pendiente" ';
        }

        if ($vStatus == 'L')
        {
            $html.=' class="mensaje_leido" ';
        }

        return $html;
    }

    public function validarFechaPermiteAsistencia($fchAsistencia = '')
    {

        $fchAsistencia = strtotime($fchAsistencia);

        $fchNuevo = strtotime("+ " . IPAD_MAX_DIA_ASISTENCIA . " days ", $fchAsistencia);

        $fchActual = strtotime(date("Y-m-d "));

        if ($fchNuevo >= $fchActual
                && $fchAsistencia <= $fchActual
        )
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function getFechaInicioSemana()
    {
        $primer_dia = mktime();

        while (date("w", $primer_dia) != 1)
        {
            $primer_dia -= 3600;
        }

        return date("d/m/Y", $primer_dia);
    }

    public function getFechaFinSemana()
    {
        $ultimo_dia = mktime();

        while (date("w", $ultimo_dia) != 0)
        {
            $ultimo_dia += 3600;
        }

        return date("d/m/Y", $ultimo_dia);
    }

    public function getPeriodosBetween($fecha_inicio = '', $fecha_fin = '')
    {

        $fecha_inicio = strtotime($fecha_inicio);

        $fecha_fin = strtotime($fecha_fin);


        for ($indice = $fecha_inicio; $indice <= $fecha_fin; $indice+=86400)
        {

            $periodos[date("Ym", $indice)] = array('year'  => date("Y", $indice), 'month' => date("m", $indice));
        }

        return $periodos;
    }

    public function getDiasMes($Month, $Year)
    {
        //Si la extensión que mencioné está instalada, usamos esa.
        if (is_callable("cal_days_in_month"))
        {
            return cal_days_in_month(CAL_GREGORIAN, $Month, $Year);
        }
        else
        {
            //Lo hacemos a mi manera.
            return date("d", mktime(0, 0, 0, $Month + 1, 0, $Year));
        }
    }

    public function checkDiaSemanaPerido($year = 0, $month = 0, $day = 0)
    {

        $fecha = $this->getPeriodoUnificado($year, $month, $day);

        return date("N", strtotime($fecha));
    }

    public function getPeriodoUnificado($year = 0, $month = 0, $day = 0)
    {

        if (strlen($month) == 1)
        {
            $month = '0' . $month;
        }

        if (strlen($day) == 1)
        {
            $day = '0' . $day;
        }

        return intval($year . $month . $day);
    }

    public function getFechaBd($iNumero)
    {
        $year  = substr($iNumero, 0, 4);
        $month = substr($iNumero, 4, 2);
        $day   = substr($iNumero, 6, 2);
        return $year . '-' . $month . '-' . $day;
    }

}

?>
