<?php

$c = mysqli_connect('localhost', 'root', '');
mysqli_select_db($c, 'task');
$email = $_POST['email'];
$pass = $_POST['password'];
$name = $_POST['username'];


$s = "select * from data where email ='$email'&& password='$pass'";
$result = mysqli_query($c, $s);
$num = mysqli_fetch_array($result);

 if ($num['type'] =="user" ) {
   
    
     session_start();
      $_SESSION['username']=$name;
      $_SESSION['email']=$email;
      $_SESSION['mobile']=$mobile;
      $_SESSION['password']=$pass;
      $_SESSION['cpassword']=$cpass;

    
     header('location:result.php');
  



  } else {
     header('location:registration_form.php');
     echo "Please Register First";
  }
