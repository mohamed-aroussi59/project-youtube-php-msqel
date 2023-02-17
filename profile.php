<?php 
session_start();


//echo $_SESSION["username"];

if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];

	include('header.php'); 
	include_once('conn.php'); 
}

if (empty( $_FILES["picture"]["name"])) {
    $errors[] = 'Picture is required';
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
                    $target = 'profile_picture/'.$image_new_name;
                    $sql = "UPDATE users SET picture ='$image_new_name' WHERE email = '$email'";
                    if(!empty($image)){
                        mysqli_query($conn,$sql);
                        if(move_uploaded_file($_FILES['picture']['tmp_name'],$target)){
                            header('location:profile.php');
                        }
                    } 
                }else{
                $errors[] = 'Your picture is to Big';
            }
    
            }
    
        }
}
	

$user_info = mysqli_query($conn,"SELECT `users' FROM  WHERE email='$email'");
while ($data = mysqli_fetch_array($user_info)) {

    

?>
<!------------باش معملش رلود لصفحة------->
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="../css/style.css" >
</head>
<html>
<body>
    
<div class="container">

<!---<h1>Welcame; <span><?php echo $_SESSION['username'] ;?></span></h1>--->


<div class="text-center">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Email</th>
      <th scope="col">Username</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"> <?php echo $_SESSION['id']; ?> </th>
      <td colpan="2"><?php echo $data['email']; ?></td>
      <td> <?php echo $_SESSION['username']; ?> </td>
    </tr>
  </tbody>
</table>
<h2>Welcome,<span><?php echo $_SESSION['username'] ;?></span></h2>

<?php echo "<img src='profile_picture/".$data['picture']."''width='200px'  class='rounded' >"; ?>


<!-----<img src="profile_picture/<?php #echo $_SESSION['picture']; ?>" width='150px'  class='rounded' >---->



</div>

<!----- هنا سكر سلاش } ريلود------->
<?php }; ?>
<form action="" method="POST" enctype="multipart/form-data">


<label for="formFile" class="form-label">Update Profile Picture</label>
  <p>use this dimensions <span>750x750</span> For looks nice</p>
  <input class="form-control" name="picture" type="file" id="formFile">



                               
                          
                 
                          <br> <button name="submit" type="submit" class="btn btn-primary">
                               Update
                           </button>
</form>                   
                      
                    
                 


</div>
</body>
</html>