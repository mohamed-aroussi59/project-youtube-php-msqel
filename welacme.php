<?php 
session_start();


//echo $_SESSION["username"];

if(isset($_SESSION['email'])){

	include('header.php'); 
	include_once('conn.php'); 
	$id =$_SESSION['id'];

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$text =$_POST['text'] ;
		
		$error = [];

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
							$created_at	 = date('Y-m-d H:i:s');
							$sql = "INSERT INTO posts (text	,picture,user_id,created_at) VALUES ('$text','$image_new_name','$id','$created_at')";
							if(!empty($image)){
								mysqli_query($conn,$sql);
								if(move_uploaded_file($_FILES['picture']['tmp_name'],$target)){
									header('location:welacme.php');
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

	<?php 
	
	

	$user_info = mysqli_query($conn,"SELECT * FROM `posts`"); 
	while ($data = mysqli_fetch_array($user_info)) {

echo "<img src='profile_picture/".$data['picture']."''width='200px'  class='rounded' >";
echo '<p>' .$data['text'].'</p>';
echo'<span>'.$data['created_at'].'</span>';
}
	?>

	
	<form action="" method="POST" enctype="multipart/form-data">
	<h1>Posts And Comments</h1>
	<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">textarea</label>
  <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
<label for="formFile" class="form-label">Update Profile Picture</label>
  <p>use this dimensions <span>750x750</span> For looks nice</p>
  <input class="form-control" name="picture" type="file" id="formFile">
	</div>
	<br> <button name="submit" type="submit" class="btn btn-primary">
                               poste
                           </button>
</form>
	<?php
	}else{
		header('location:index.php');
	}
	
	?>

