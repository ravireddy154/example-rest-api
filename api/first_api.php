<?php
include('../db_connect.php');
include('../controller.php');
include('../serviceconstants.php');
$myData=new Data();
   
    //  echo "<pre>"; print_r($getData['id']); die;
	//print(json_encode($myData->get_users("2"),JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT)); 
     if($getData['id']!='')
        print(json_encode($myData->get_users($getData['id']),JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT)); 
       else 
     	print(json_encode($myData->get_alluser(),JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT)); 

     

?>