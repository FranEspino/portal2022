<?php 

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ayuda_sql
 *
 * @author USER
 */
class Ayuda_sql {

        function _echo_status($status) {
                switch ($status) {
                        case 'RE':$resultado = 'Registrado';
                                break;
                        case 'AS':$resultado = 'Aprobado para asesoramiento';
                                break;
                        case 'CA':$resultado = 'Culminado y Aprobado';
                                break;
                        case 'AC':$resultado = 'Activo';
                                break;
                        case 'AN':$resultado = 'Anulado';
                                break;
                }
                return $resultado;
        }

        public function getMeses() {
                $meses = array(
                    'todos' => 'Todos los Meses',
                    '1' => 'Enero',
                    '2' => 'Febrero',
                    '3' => 'Marzo',
                    '4' => 'Abril',
                    '5' => 'Mayo',
                    '6' => 'Junio',
                    '7' => 'Julio',
                    '8' => 'Agosto',
                    '9' => 'Septiembre',
                    '10' => 'Octubre',
                    '11' => 'Noviembre',
                    '12' => 'Diciembre'
                );
                return $meses;
        }

        public function get_nota($nota) {
                if (strlen($nota) == 1) {
                        $retornar = '0' . $nota;
                } else {
                        $retornar = $nota;
                }
                return $retornar;
        }

        public function getColorAsistencia($asistencia) {
                if ($asistencia == 'F') {
                        $rs = "<span style='color:red'>$asistencia</span>";
                } else {
                        $rs = "<span style='color:blue'>$asistencia</span>";
                }
                return $rs;
        }

}

?>