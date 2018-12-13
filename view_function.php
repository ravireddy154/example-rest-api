<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
$params = 'modules/';
include_once('db_connect.php');
include_once($params.'users.php'); 
include_once($params.'ListUser.php'); 
?>