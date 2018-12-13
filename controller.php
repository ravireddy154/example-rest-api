<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include_once('../view_function.php');

class Data
{
	public function get_users($data)
	{
     
      $objcc= new Users();
      $objcc->setUserId($data);
      $objcc->fetchDetails();
      $arr['response']=$objcc->get_array();
      return $arr;
    
}

  public function get_alluser()
  {
     
      $objcc= new Users();
     // $objcc->setUserId($data);
      $objcc->fetchAllDetails();
      $arr['response']=$objcc->get_array();
      return $arr;
    
}
 public function fetchnameandbranch(){
     
      $objcc= new Users();
     // $objcc->setUserId($data);
      $objcc->fetchnameandbranch();
      $arr['response']=$objcc->get_array();
      return $arr;
    
}

   public function getallheaders() 
    { 
       $headers = ''; 
       foreach ($_SERVER as $name => $value) 
       { 
           if (substr($name, 0, 5) == 'HTTP_') 
           { 
               $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value; 
           } 
       } 
       return $headers; 
    } 
   

}

?>

