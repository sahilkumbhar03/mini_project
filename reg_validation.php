<?php

include("connection.php");
?>



<?php



if (isset($_POST['email_check'])) {
  $fname = $_POST['email'];
  $sql = "SELECT * FROM registration WHERE email='$fname'";
  $results = mysqli_query($conn, $sql);
  if (mysqli_num_rows($results) > 0) {
    echo 'taken';
    $email_state=0;	
  }else{
    echo 'not taken';
  }
  exit();
}
if(isset($_POST["submit"])){
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $contact = $_POST['contact'];
  $age = $_POST['age'];
  $email = $_POST['email'];
  $pass =md5( $_POST['pass']);
  $cpass=md5( $_POST['cpass']);


  $sql1 = "SELECT * FROM registration WHERE email='$email'";
  $results = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($results) > 0) {
    echo "<script>alert('Enter valid email');window.location.href='registration_form.php;";	
    exit();
  }else{
    $query = "INSERT INTO registration
           VALUES ('$fname', '$lname','$contact','$age','$email', '$pass','$target_file')";
    $results1 = mysqli_query($conn, $query);
    header('location:login_form.php');
  }
}



$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["profile_photo"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["profile_photo"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "<script>alert('File is not an image.')</script>";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "<script>alert('Sorry, file already exists.')</script>";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["profile_photo"]["size"] > 500000) {
  echo "<script>alert('Sorry, your file is too large.')</script>";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
  $uploadOk = 0;
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "<script>alert('Sorry, your file was not uploaded.');window.location.href='registration_form.php';</script>";
  
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $target_file)) {
  }else {
    echo "<script>alert('Sorry, there was an error uploading your file.');window.location.href='registration_form.php';</script>";
    
  }
 
}





?>