<?php
// $host="localhost";
// $user="root";
// $password="";
// $db="biobox";

// mysql_connect($host,$user,$password);
// mysql_select_db($db);
// $con=mysqli_connect("localhost","root","","biobox");

// if(isset($_POST['email'])){
//     $uname=$_POST['email'];
//     $password=$_POST['password'];

//     $sql="select * from utilisateur where email='".$uname."' AND password='".$password."' limit 1";

//     $result=mysqli_query($con,$sql);
//     if(mysqli_num_rows($result)==1){
//         // echo " You have successfully logged in";
//         header('Location:backend.php');
//         exit();
//     }else{
//         echo " you Have entered incorrect password";
//         exit();
//     }
// }
?>
<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "biobox";
$message = "";
$confirmcaptcha = "";
$captcha = "";
try{
     $connect = new PDO("mysql:host=$host; dbname=$database",$username,$password);

     $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     if(isset($_POST["login"]))
     {
        $captcha = $_POST["captcha"];
        $confirmcaptcha = $_POST["confirmcaptcha"];
        if(empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["confirmcaptcha"]))
        {
            $message = '<label>all field is required</label>';
        }
        else
        {
          $query = "SELECT * FROM utilisateur WHERE email = :email AND password = :password";
          $statement = $connect->prepare($query);
          $statement->execute( array( 'email' => $_POST["email"] , 'password' => $_POST["password"] ));
            $count = $statement->rowCount();
            if($count > 0 && $captcha == $confirmcaptcha)
            {
                $_SESSION["email"] = $_POST["email"];
                $_SESSION["login"] = true;
                    $x=$statement->fetch();
                    $_SESSION["id"]= $x['idUtilisateur'];
                    $_SESSION["firstName"]=$x['firstName'];
                    $_SESSION["lastName"]=$x['lastName'];
                    $_SESSION["email"]=$x['email'];
                    $_SESSION["password"]=$x['password'];
                    $_SESSION["confirmPassword"]=$x['confirmPassword'];
                    $_SESSION["type"] = $x['type'];
                if($_SESSION["type"] == 'client' ){
                    header("location:index.php");
                }else if($_SESSION["type"] == 'admin'){
                    header("location:back/views/backend.php");
                }else if($_SESSION["type"] == 'livreur'){
                header("location:back/views/listCommande.php");
                }
               
            }
            else
            {
                $message = '<label>Email , Password or captcha is wrong</label>';
            }
        }
     }
    }
    catch(PDOException $error)
    {
        $message =$error->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<style media="screen">
    input.captcha{
        pointer-events: none;
        letter-spacing: 30px;
        text-decoration-line: line-through;
        text-decoration-thickness: 0.1rem;
    }
</style>
<body>
    <div class="container">
        <img src="image/user.png">
        <?php
        if(isset($message))
        {
             echo '<label class="text-danger">'.$message.'</label>'; 
        }
        ?>
        <form action="" method="POST">

            <div class="form-input">
              <input type="email" name="email" placeholder="name@example.com"/>
            </div>
            <div class="form-input">
              <input type="password" name="password" placeholder="Type Password"/>
            </div>
            <div class="form-input">
              <input type="text" class="captcha" name="captcha" value="<?php echo substr(uniqid(), 5);?>"/> <br>
            </div>
            <div class="form-input">
              <input type="text" name="confirmcaptcha" placeholder="captcha" value=""/> <br>
            </div>
            <input type="submit" name="login" value="LOGIN" class="btn-login"/>
            <br><br>
            <center>
            <div class="form-input"><a href="register.php">Need an account? Sign up!</a></div>
            <center>
        </form>
    </div>

</body>
</html>