<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link href="login.css" rel="stylesheet">
</head>

<body>

    <h1>Login Form</h1>
    <div>
    <h3> register Here <a href="registration_form.php">Register</a></h3>

    <form action="valid.php" method="POST" name="login">
        <label for="email">Email:</label><br>
        <input type="text" name="email"><br>

        <label for="password">Password</label><br>
        <input type="password" name="password"><br>

        <button type="submit" name="login">login</button>


    </form>

    </div>
    

    <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <script src="login.js"></script>
</body>

</html>
