<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
  
<main class="container">


<?php
include('conn.php');

if(isset($_POST['send'])){
$Title = $_POST['Title'];
$Content = $_POST['Content'];
$Date = $_POST['Date'];
$Time = $_POST['Time'];

$addData = $database->prepare("INSERT INTO articles(Title,Content,Date,Time)
 VALUES('$Title', '$Content' , '$Date', '$Time')");

if($addData->execute()){
  echo   'تم اضافة بينات ';
}else{
  echo   'فشل اضفة بينات';
}

}
?>

<form method="POST">
Title : <input class="form-control" type="text" name="Title" required/>
<br>
Content : <input class="form-control" type="text" name="Content" required/>
<br>
Date : <input class="form-control" type="date" name="Date" required/>
<br>
Time : <input class="form-control" type="time" name="Time" required/>
<br>
<button class="btn btn-danger mt-3" type="submit" name="send">ارسال - Send</button>
</form>

</main>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>