<?php 
include_once("conn.php");
session_start();
if(isset($_POST['username']) && isset($_POST['password'])){
    $user = $_POST['username'];
    $pwd = $_POST['password'];

    $sql = "INSERT INTO users (username, password) VALUES ('$user', '$pwd')";  
    mysqli_query($conn,$sql);
    header('location:welacme.php');

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="" method="POST"> 
<input type="text" name="username" id="" placeholder="username">
<input type="password" name="password" id="" placeholder="password">
<button name="sbumit" id="sbumit" value="register">register</button>
</form>
</body>
</html>