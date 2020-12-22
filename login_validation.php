<?php
   
  session_start();

    $servername = "localhost";
    $username = "phpmyadmin";
    $password = "admin";
    $dbname = "mini_project";

    $email=$_POST['email'];
    $pass=md5($_POST['pass']);
    $error_msg='';

    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT * FROM registration WHERE email='$email' && pass='$pass'";
    $result = mysqli_query($conn, $sql);

    
    $num=mysqli_num_rows($result);
    if($num==1){
      $_SESSION['email']=$email;
      $_SESSION['pass']=$pass;
      header('location:home.php');
    }else{
      echo "<script>alert('No User Found Please Enter Valid Credentials'); window.location.href='login_form.php';</script> ";
      exit();
    }
?>