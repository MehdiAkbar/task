<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link href="registration.css" rel="stylesheet">
</head>

<body>
    <h1>Registration Form</h1>
    <div>

    <h3>Already have Account? Login Here <a href="login_form.php">Login</a></h3>

        <form action="registration.php" method="POST" name="registration">
            <label for="username">Username</label><br>
            <input type="text" name="username" id="username"><br>

            <label for="email">Email</label><br>
            <input type="text" name="email" id="email"><br>

            <label for="mobile">Mobile</label><br>
            <input type="text" name="mobile" id="mobile"><br>

            <label for="password">Password</label><br>
            <input type="password" name="password" id="password"><br>

            <label for="cpassword">Confirm Password</label><br>
            <input type="password" name="cpassword" id="conpassword"><br>
            


            <button type="submit" id="submit" name="submit">Register</button>


        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <script src="register.js"></script>
</body>

</html>