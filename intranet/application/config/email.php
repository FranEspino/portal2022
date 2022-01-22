<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['protocol'] = 'smtp';

//$config['smtp_host'] = '192.168.3.3';
//$config['smtp_host'] = 'mail.peruhostline.com';
$config['smtp_host'] = '190.81.61.132';

$config['smtp_user'] = 'informes@ipad.net.pe';
//$config['smtp_user'] = 'preguntanos@ipad.edu.pe';
//$config['smtp_user'] = 'test@peruhostline.com';
 
$config['smtp_pass'] = '21inf2016@mes';
//$config['smtp_pass'] = 'miclave';
$config['smtp_port'] = '25';


//$config['smtp_host'] = 'mail.medialabla.com';
//$config['smtp_user'] = 'cespejo@medialabla.com';
//$config['smtp_pass'] = '##########'; //pasword de la cuenta de correos a utilizar para los envios
//$config['smtp_port'] = '25';

$config['mailtype'] = 'html';
//$config['validate'] = true;
$config['_smtp_auth']  = TRUE;
/* End of file email.php */
/* Location: ./application/config/email.php */