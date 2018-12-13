<?php
class ListUser
{
    private $id;
    private $name;
    private $branch;
    private $poste_on;

    const ID="id";
    const NAME = "student name";
    const BRANCH = "branch";
    const POSTE_ON = "Joined";

    
    public function setValues($row)
	{
        $this->id = $row[static::ID];
        $this->name = $row[static::NAME];
        $this->branch = $row[static::BRANCH];
        $this->poste_on = $row[static::POSTE_ON]; 
    }

      public function get_array()
    { 
	
        $arr = array();        
        $arr[static::ID]        = $this->id;
        $arr[static::NAME]     = $this->name;
        // $arr[static::BRANCH]     = $this->branch;
        // $arr[static::POSTE_ON]  =   $this->poste_on ;
//        $arr[static::DESCRIPTION]     = $this->description;
//        $arr[static::IMAGE]     = serviceconstants::CATEGORY_PATH.$this->image;
		
        return $arr;
	
    }
}