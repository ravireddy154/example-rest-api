<?php
session_start();
//error_reporting(E_ALL ^ E_NOTICE);
//ini_set("display_errors",1);
date_default_timezone_set('Asia/Calcutta');
include('database.php');
function getDatabase(){
    $HOSTNAME = "localhost";
    $USERNAME = "root";
    $PASSWORD = ""; 
    $DATABASE = "api_test";
    return  $db = new Database($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);
}
$db = getDatabase();


?>