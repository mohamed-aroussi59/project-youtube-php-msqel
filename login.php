<?php include('header.php'); ?>
<?php include_once('conn.php'); 
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   
    $email = $_POST['email'];
    $password = $_POST['password'];
    $error = [];

    if(!isset($errors)){
        $sql = "SELECT * FROM `users` WHERE email='$email' AND password='$password' limit 1";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $num_rows = mysqli_num_rows($result);
        if($num_rows != 0){
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['picture'] = $row['picture'];
            header('location:welacme.php');
    
    
        }else{
            $errors[] = 'Wrong Password or Email';
        }
    
    }
    



}




    ?>
<div class="container">

<div class="row justify-content-center">

<div class="col-md-8">
    <div class="card">

    <div class="card-header">Login</div>
<form action="" method="POST">
<div class="card-body">
    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

        <div class="col-md-6">
            <input id="email" type="text" name="email" class="form-control" autofocus>
        </div>
    </div>

    <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

        <div class="col-md-6">
            <input id="password" type="text" name="password" class="form-control" >
            <a href="signup.php">New Here sing up?</a>
        </div>
    </div>



    
    <div class="row mb-0">
                               
                               </form>
                       <div class="col-md-8 offset-md-4">
                           <button name="submit" type="submit" class="btn btn-primary">
                               Login
                           </button>
                         
                      
                       </div>
                   </div>