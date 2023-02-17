<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.0.2/cyborg/bootstrap.min.css"  rel="stylesheet" >
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Project</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">

<?php

if(isset($_SESSION['email'])){
  echo ' <li class="nav-item">
  <a class="nav-link active" aria-current="page" href="welacme.php">home</a>
</li>


<li class="nav-item">
  <a class="nav-link active" aria-current="page" href="profile.php">profile</a>
</li>

<li class="nav-item">
  <a class="nav-link active" aria-current="page" href="login.php">Loug Out</a>
</li>';
}else{
  echo ' <li class="nav-item">
  <a class="nav-link active" aria-current="page" href="login.php">Log In</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="index.php">Sign Up</a>
</li>';
}







?>



     




       
       

      </ul>
    </div>
  </div>
</nav>



</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>