<?php
defined("BASEPATH") OR die("El acceso directo al script está prohibido");
 
class Import extends CI_Controller
{
 
  public function __construct()
  {
    parent::__construct();
    $this->load->helper("url","form");
    $this->load->database();
    $this->load->library("form_validation");
  }
 
  public function index()
  {
    $this->load->view("import");
  }
 
  public function to_mysql()
  {
 
    //obtenemos el archivo subido mediante el formulario
    $file = $_FILES['excel']['name'];
 
    //comprobamos si existe un directorio para subir el excel
    //si no es así, lo creamos
    if(!is_dir("./excel_files/")) 
      mkdir("./excel_files/", 0777);
 
    //comprobamos si el archivo ha subido para poder utilizarlo
    if ($file && copy($_FILES['excel']['tmp_name'],"./excel_files/".$file))
    {
 
      //queremos obtener la extensión del archivo
      $trozos = explode(".", $file);
 
      //solo queremos archivos excel
      if($trozos[1] != "xlsx" && $trozos[1] != "xls") return;
 
      /** archivos necesarios */
      require_once APPPATH . 'libraries\PHPExcel\PHPExcel.php';
      require_once APPPATH . 'libraries\PHPExcel\PHPExcel\Reader\Excel2007.php';
 
      //creamos el objeto que debe leer el excel
      $objReader = new PHPExcel_Reader_Excel2007();
      $objPHPExcel = $objReader->load("./excel_files/".$file);
 
      //número de filas del archivo excel
      $rows = $objPHPExcel->getActiveSheet()->getHighestRow();   
 
      //obtenemos el nombre de la tabla que el usuario quiere insertar el excel
      $table_name = trim($this->security->xss_clean($this->input->post("table")));  
 
      //obtenemos los nombres que el usuario ha introducido en el campo text del formulario,
      //se supone que deben ser los campos de la tabla de la base de datos.
      $fields_table = explode(",", $this->security->xss_clean($this->input->post("fields")));
 
      //inicializamos sql como un array
      $sql = array();
 
      //array con las letras de la cabecera de un archivo excel
      $letras = array(
        "A","B","C","D","E","F","G",
        "H","I","J","Q","L","M","N",
        "O","P","Q","R","S","T","U",
        "V","W","X","Y","Z"
      );
 
      //recorremos el excel y creamos un array para después insertarlo en la base de datos
      for($i = 1;$i <= $rows; $i++)
      {
        //ahora recorremos los campos del formulario para ir creando el array de forma dinámica
        for($z = 0; $z < count($fields_table); $z++)
        {
          $sql[$i][trim($fields_table[$z])] = $objPHPExcel->getActiveSheet()->getCell($letras[$z].$i)->getCalculatedValue();
        }
      }   
 
      /*echo "<pre>";
      var_dump($sql); exit();
      */
 
      //cargamos el modelo
      $this->load->model("import_model");
      //insertamos los datos del excel en la base de datos
      $import_excel = $this->import_model->excel($table_name,$sql);
      
      //comprobamos si se ha guardado bien
      if($import_excel == TRUE)
      {
        echo "El archivo ha sido importado correctamente";
      }else{
        echo "Ha ocurrido un error";
      }
 
      //finalmente, eliminamos el archivo pase lo que pase
      unlink("./excel_files/".$file);
 
    }else{
      echo "Debes subir un archivo";
    }
  }
}