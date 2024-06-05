<?php
include '../Controller/userC.php';
include '../model/user.php';
$error = "";

$user = null;

$userC = new userC();
if (
    isset($_POST["idUtilisateur"]) &&
    isset($_POST["firstName"]) &&
    isset($_POST["lastName"]) &&
    isset($_POST["email"]) &&
    isset($_POST["password"]) &&
    isset($_POST["confirmPassword"]) &&
    isset($_POST["type"])
) {
    if (
        !empty($_POST["idUtilisateur"]) &&
        !empty($_POST['firstName']) &&
        !empty($_POST["lastName"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["password"]) &&
        !empty($_POST["confirmPassword"]) &&
        !empty($_POST["type"])
    ) {
        $user = new user(
            $_POST['idUtilisateur'],
            $_POST['firstName'],
            $_POST['lastName'],
            $_POST['email'],
            $_POST['password'],
            $_POST['confirmPassword'],
            $_POST['type']
        );
        $userC->updateUser($user, $_POST["idUtilisateur"]);
       header('location:backend.php');
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
    <title>Document</title>
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST['idUtilisateur'])) {
        $user = $userC->showUser($_POST['idUtilisateur']);
        ?>
        <form action="" method="POST" id="myForm">
            <div class="form-input">
                <input type="text" name="idUtilisateur" id="idUtilisateur" value="<?php echo $user['idUtilisateur']; ?>" />
                <br>
                <span id="error"></span>
            </div>
            <div class="form-input">
                <input type="text" name="firstName" id="firstName" value="<?php echo $user['firstName']; ?>" />
                <br>
                <span id="error"></span>
            </div>
            <div class="form-input">
                <input type="text" name="lastName" id="lastName" value="<?php echo $user['lastName']; ?>"/>
                <span id="error1"></span>
            </div>
            <div class="form-input">
                <input type="email" name="email" id="email" value="<?php echo $user['email']; ?>"/>
                <span id="error2"></span>
            </div>
            <div class="form-input">
                <input type="password" name="password" id="password" value="<?php echo $user['password']; ?>" />
                <span id="error3"></span>
            </div>
            <div class="form-input">
                <input type="password" name="confirmPassword" id="confirmPassword" value="<?php echo $user['confirmPassword']; ?>"/>
                <span id="error4"></span>
            </div>
            <div class="form-input">
                <input type="text" name="type" id="type" value="<?php echo $user['type']; ?>"/>
                <span id="error4"></span>
            </div>
            <input type="submit" name="register" value="Update" class="btn-login"/>
        </form>
        <?php
        }
        ?>
    </div>
<script src="js/register.js"></script>
</body>
</html>