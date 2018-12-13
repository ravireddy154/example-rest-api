<?php
$data = file_get_contents("php://input");
$postData = json_decode($data,true); 
$query_str = parse_url($_SERVER['REQUEST_URI'],PHP_URL_QUERY); 
parse_str($query_str, $getData);

?>
