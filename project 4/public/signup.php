<?php include('./header.php') ?>
<?php
include_once ('../private/conn.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = mysqli_real_escape_string($conn,$_POST['username']) ;
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $error = [];

$check_user = mysqli_query($conn,"SELECT * FROM `users` WHERE email='$email'");
if(mysqli_num_rows($check_user) != 0){
    $errors[] = 'This email has already been used. use another email';
}

if(!$email){
    $errors[] = 'Email is required';
} 


if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors[] = 'Enter validate email'; 
}


if (empty( $_FILES["picture"]["name"])) {
    $errors[] = 'Picture is required';
}


if(strlen($username) < 8){
    $errors[] = 'Username need to have a minimum of 8 letters';
}

if(strlen($password) < 8){
    $errors[] = 'Password need to have a minimum of 8 letters';
}

if(!isset($errors)){
    $image = $_FILES['picture']['name'];
    $image_size = $_FILES['picture']['size'];
    $image_error = $_FILES['picture']['error'];
    $file = explode('.',$image);
    $fileActual = strtolower(end($file));
    $allowed = array('png','jpg','jpge','svg');
    if(in_array($fileActual,$allowed)){
        if($image_error === 0){
            if($image_size < 4000000){
                    $image_new_name = uniqid('',true).'-'.$image;
                    $target = '../private/profile_picture/'.$image_new_name;
                    $sql = "INSERT INTO users (username,email,password,picture) VALUES ('$username','$email','$password','$image_new_name')";
                    if(!empty($image)){
                        mysqli_query($conn,$sql);
                        if(move_uploaded_file($_FILES['picture']['tmp_name'],$target)){
                            header('location:index.php');
                        }
                    } 
                }else{
                $errors[] = 'Your picture is to Big';
            }
    
            }
    
        }
}

}

?>


<div class="container">
<?php if(!empty($errors)): ?>

<div class="alert alert-danger">
<?php foreach($errors as $error): ?>
    <div><?php echo '- '.$error ;?></div>

<?php endforeach ?>
</div>

<?php endif; ?> 








<div class="row justify-content-center">

<div class="col-md-8">
    <div class="card">

    <div class="card-header">Sign Up</div>
    <form action="" method="POST" enctype="multipart/form-data">
<div class="card-body">
    <div class="row mb-3">
        <label for="username" class="col-md-4 col-form-label text-md-end">Username</label>

        <div class="col-md-6">
            <input id="username" type="text" name="username" class="form-control" autofocus>
        </div>
    </div>
    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

        <div class="col-md-6">
            <input id="email" type="email" name="email" class="form-control" >
        </div>
    </div>



    <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

        <div class="col-md-6">
            <input id="password" type="password" name="password" class="form-control" >
         
        </div>
    </div>    <div class="mb-3">
  <label for="formFile" class="form-label">Profile Picture</label>
  <input class="form-control" name="picture" type="file" id="formFile">
  
</div>

<a href="index.php">You Have account? login</a>


<div class="row mb-0">
                               
                               </form>
                       <div class="col-md-8 offset-md-4">
                           <button name="submit" type="submit" class="btn btn-primary">
                               Sign Up
                           </button>
                         
                      
                       </div>
                   </div>
