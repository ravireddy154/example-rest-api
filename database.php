<?php
class Database{
    private $hostname, 
            $username, 
            $password, 
            $connection, 
            $lastInsertId, 
            $affectedRows, 
            $database;
    
    public function __construct($hostname, $username, $password, $database){
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
	}
    
    private function openConnection(){
        $this->connection = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
        if (!$this->connection) {
            die('Could not connect: ' . mysqli_error());
            //error_log("coudl not connect db errro!", 3, $logfile);
        }else{
            //error_log("connection successful",3,$logfile);
			mysqli_set_charset( $this->connection,'utf8' );
            mysqli_select_db( $this->connection,$this->database);
        }
    }
    
    private function closeConnection(){
        mysqli_close($this->connection);
    }
    
    public function executeQuery($query)
	{
        $this->openConnection();
        $result = mysqli_query($this->connection, $query);
		$this->lastInsertId = mysqli_insert_id($this->connection);
		
        $this->affectedRows = mysqli_affected_rows($this->connection);
       // $this->closeConnection();
        return $result;
    }
    function getAffectedRows() {
        return $this->affectedRows;
    }
    function setAffectedRows($affectedRows) {
        $this->affectedRows = $affectedRows;
    }
    function getLastInsertId() 
	{
		$this->lastInsertId;
        return $this->lastInsertId;
    }
    function setLastInsertId($lastInsertId) 
	{
        $this->lastInsertId = $lastInsertId;
    }
	function fetchArray($data)
	{
		$result = @mysqli_fetch_array($data);
		return $result;
	}
	function fetchNumRow($data)
	{
		$result = mysqli_num_rows($data);
		return $result;
	}
	
	public function executeQueryReturnId($query)
	{
        $this->openConnection();
        $result = mysqli_query($this->connection, $query);
		$this->lastInsertId = mysqli_insert_id($this->connection);
        $this->affectedRows = mysqli_affected_rows($this->connection);
        return $this->lastInsertId;
    }
	
	function getConnection()
	{
		return mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
	}
	
	
	function update($table, $arFieldsValues, $strCondition=''){
	
		$formatedValues	=	array();
		foreach($arFieldsValues as $key => $val)
		{
			if(!is_numeric($val))
			{
				$val	=	'"'.mysqli_real_escape_string($this->connection,$val).'"';
			}
			$formatedValues[]	=	"$key = $val";
		}
		$sql = "UPDATE ".$table." SET ";
		$sql .=	join(", ",$formatedValues);
		if($strCondition != "") {
			$sql	.=	" WHERE ".$strCondition;
		}
		
		//exit;
		$value=$this->executeQuery($sql);
             //   echo $sql; die;
		return $value;
	}
	
	
	public function insert($table, $arFieldsValues){
		
		
		$fields	=	array_keys($arFieldsValues);
		$values	=	array_values($arFieldsValues);
		
		$formatedValues	=	array();
		foreach($values as $val){
			//if(!is_numeric($val) && $val !='now()'){
				//$val	=	"'".mysqli_real_escape_string($val)."'";
			//}
			//$formatedValues[]	=	$val;
		}
		
		$sql	=	"INSERT INTO ".$table." (";
		$sql	.=	join(", ",$fields).") ";
		$sql	.=	"VALUES( '";
		$sql	.=	join("','",$values);
		$sql	.=	"')";
     	//echo $sql; die;
		//exit;
		
		$value=$this->executeQuery($sql);
		return $this->lastInsertId;
	}
	public function delete($table, $strCondition='')
	{
		 $sql = "DELETE FROM ".$table;
		if($strCondition != "") {
			$sql	.=	" WHERE ".$strCondition;
		}
		
		$value=$this->executeQuery($sql);
                //echo $sql;die;
		return $value;
	}

	
}
?>