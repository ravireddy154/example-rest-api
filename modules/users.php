<?php

class Users {

    private $user_id;
    const ID="id";
    const NAME = "student name";
    const BRANCH = "branch";
    const POSTE_ON = "Joined";

    public function __construct()
    {
        
    }
	
	
	  public function fetchDetails()
    {
        $db = getDatabase();
	    $query = "SELECT name AS '".STATIC::NAME."',id AS '".STATIC::ID."', branch AS '".STATIC::BRANCH."', poste_on AS '".STATIC::POSTE_ON."' from users where id = '".$this->user_id."' ";
		$result = $db->executeQuery($query);  
               // echo $query; 
        $this->setValues($result);
        $this->loadDetail();    

 }
     public function fetchAllDetails(){
        $db = getDatabase();
        $query = "SELECT * from users ";
        $result = $db->executeQuery($query);  
               // echo $query; 
        $this->setValues($result);
        $this->loadDetail();    

    }
	
     public function fetchnameandbranch(){
        $db = getDatabase();
        $query = "SELECT  name AS '".STATIC::NAME."',id AS '".STATIC::ID."' from users ";
        $result = $db->executeQuery($query);  
               // echo $query; 
        $this->setValues($result);
        $this->loadDetail();    

    }
     public function setValues($result)
    {
        $db = getDatabase();
        while($row = $db->fetchArray($result))
        {
            $this->ids[] = $row;
        }  
    }

    function loadDetail()
    {
        for($i=0;$i<sizeof($this->ids);$i++)
        {
            $obj = new ListUser();
            $obj->setValues($this->ids[$i]);
            $this->list[] = serialize($obj);
        }
    }
    public function get_array()
    {
        $arr=array();
        for($i=0;$i<sizeof($this->list);$i++)
        {
            $obj = unserialize($this->list[$i]);
            $arr[] = $obj->get_array();
        }
        
        return $arr;
    }
   
        public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }
}


?>