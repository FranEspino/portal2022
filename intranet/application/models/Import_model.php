<?php
defined("BASEPATH") OR exit("El acceso directo al script no está permitido!!!");
 
class Import_model extends CI_Model
{
   
  private $dbadmin = "";

    public function __construct() {
        parent::__construct();
        $this->dbadmin = $this->load->database("default", true);
		//$this->load->library("encrypt");
    }

 
  public function excel($table_name,$sql)
  { 
    //si existe la tabla
    if ($this->dbadmin->table_exists("$table_name"))
    {
      //si es un array y no está vacio
      if(!empty($sql) && is_array($sql))
      {
        //si se lleva a cabo la inserción
        if($this->dbadmin->insert_batch("$table_name", $sql))
        {
          return TRUE;
        }else{
          return FALSE;
        }
      }
    }
  }
}