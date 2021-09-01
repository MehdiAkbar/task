<?php


$c = mysqli_connect('localhost', 'root', '');
mysqli_select_db($c, 'task');        
    
    

        $name = $_POST['username'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $pass = $_POST['password'];
        $cpass = $_POST['cpassword'];

    

        $s = "select * from data where email ='$email'";
        $result = mysqli_query($c, $s);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            echo "user already exist";
        } else {
            $reg = "insert into data(username,email,mobile,password,confirmpass)values('$name','$email','$mobile','$pass','$cpass')";
            mysqli_query($c, $reg);


            echo " Registration sucessfull";

            session_start();
            $_SESSION['username'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['mobile'] = $mobile;
            $_SESSION['password'] = $pass;
            $_SESSION['cpassword'] = $cpass;




            header('location:login_form.php');
        }
 
