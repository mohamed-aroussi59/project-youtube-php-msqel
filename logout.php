<?php 
session_start();
include_once("conn.php");

session_unset();
session_destroy();

header('loction:login.php');

?>