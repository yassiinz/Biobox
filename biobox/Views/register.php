<?php
include '../Controller/userC.php';
include '../model/user.php';

$error = "";

$user = null;


$userC = new userC();
if (
    isset($_POST["firstName"]) &&
    isset($_POST["lastName"]) &&
    isset($_POST["email"]) &&
    isset($_POST["password"]) &&
    isset($_POST["confirmPassword"])
) {
    if (
        !empty($_POST['firstName']) &&
        !empty($_POST["lastName"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["password"]) &&
        !empty($_POST["confirmPassword"])
    ) {
        $user = new user(
            null,
            $_POST['firstName'],
            $_POST['lastName'],
            $_POST['email'],
            $_POST['password'],
            $_POST['confirmPassword'],
            null,
        );
        $userC->register($user);
        header('Location:login.php');
    } else
        $error = "Missing information";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIOBOX / SIGN UP</title>
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <img src="image/registration.png">
        <form action="" method="POST" id="myf">
            <div class="form-input">
                <input type="text" name="firstName" id="firstName" placeholder="Enter your first name"/>
                <p style="color : red; text-align:center; " id="error1"></p>
            </div>
            <div class="form-input">
                <input type="text" name="lastName" id="lastName" placeholder="Enter your last name"/>
                <p  style="color : red; text-align:center; " id="error2"></p>
            </div>
            <div class="form-input">
                <input type="email" name="email" id="email" placeholder="name@example.com"/>
                <p  style="color : red; text-align:center; " id="error3"></p>
            </div>
            <div class="form-input">
                <input type="password" name="password" id="password" placeholder="Type Password"/>
                <p  style="color : red; text-align:center; " id="error4"></p>
            </div>
            <div class="form-input">
                <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm password"/>
                <p  style="color : red; text-align:center; " id="error5"></p>
            </div>
            <!-- <div class="form-input" colspan="9" style="text-align:center;">CAPTCHA CODE GENERATOR</div> -->
            <input type="submit" name="register" value="Create Account" class="btn-login" onclick=" passValidation()"/>
            <center>
            <div><a href="login.php">Have an account? Go to login</a></div>
            <center>
            <script src="js/register.js"></script>
        </form>
    </div>
</body>
</html>
