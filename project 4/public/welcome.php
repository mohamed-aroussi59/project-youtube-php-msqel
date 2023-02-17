<?php 
session_start();
include('./header.php');
include_once ('../private/conn.php');


echo $_SESSION['username'];


?>