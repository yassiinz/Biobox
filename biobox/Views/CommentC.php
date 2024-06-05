<?php

require '../config.php';

class CommentC
{

    public function listComments()
    {
        $sql = "SELECT * FROM comment";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteComment($ide)
    {
        $sql = "DELETE FROM comment WHERE idComment = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addComment($comment)
    {
        $sql = "INSERT INTO comment  
        VALUES (NULL,:n,:e,:c,:d)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'n' => $comment->getnom(),
                'e' => $comment->getemail(),
                'c' => $comment->getComment(),
                'd' => $comment->getStars()
            ]);
           
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showComment($id)
    {
        $sql = "SELECT * from comment where idComment = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $comment = $query->fetch();
            return $comment;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateComment($comment, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE comment SET 
                    nom = :nom, 
                    email = :email, 
                    Comment = :Comment,
                    Stars= :Stars
                    
                WHERE idComment= :idComment'
            );
            $query->execute([
                'idComment' => $id,
                'nom' => $comment->getnom(),
                'email' => $comment->getemail(),
                'Comment' => $comment->getComment(),
                'Stars'=> $comment->getStars() 
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
class Comment
{
    private ?int $idComment = null;
    private ?string $nom = null;
    private ?string $email = null;
    private ?string $Comment = null;
    private ?int $Stars=null;


    public function __construct($id = null, $n, $e,$c,$d)
    {
        $this->idComment = $id;
        $this->nom = $n;
        $this->email = $e;
        $this->Comment = $c;
        $this->Stars=$d;
        
    }

    /**
     * Get the value of idcomment
     */
    public function getidComment()
    {
        return $this->idComment;
    }

    /**
     * Get the value of nom
     */
    public function getnom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setnom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getemail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setemail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of comment
     */
    public function getComment()
    {
        return $this->Comment;
    }

    /**
     * Set the value of comment
     *
     * @return  self
     */
    public function setComment($Comment)
    {
        $this->Comment = $Comment;

        return $this;
    }
    public function getStars()
    {
        return $this->Stars;
    }
    public function setStars()
    {
      $this->Stars=$Stars;
    }
}
?>
 <html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Yamifood Restaurant - Responsive HTML5 Template</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<!-- Start header -->
    <header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.php">
					<img src="images/logo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="index.php">Acceuil</a></li>
						<!-- <li class="nav-item"><a class="nav-link" href="menu.html">Menu</a></li> -->
						<li class="nav-item"><a class="nav-link" href="categorie.php">Restaurants</a></li>
                        <?php
						session_start();
						if(isset($_SESSION["login"]) && $_SESSION["login"]){
						?>
						<li class="nav-item"><a class="nav-link" href="reservation.php">Panier</a></li>
						<?php
						}else{}
						?>
						<?php
						if(isset($_SESSION["login"]) && $_SESSION["login"]){
						?>
						<li class="nav-item"><a class="nav-link" href="affichercommand.php">Commande</a></li>
						<?php
						}else{}
						?>
						<!-- <li class="nav-item active dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Pages</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="reservation.html">Reservation</a>
								<a class="dropdown-item" href="stuff.html">Stuff</a>
								<a class="dropdown-item" href="gallery.html">Gallery</a>
							</div>
						</li> -->
						<?php
						if(isset($_SESSION["login"]) && $_SESSION["login"]){
						?>
						<li class="nav-item dropdown active">
						 <a class="nav-link dropdown-toggle" href="CommentC.php" id="dropdown-a" data-toggle="dropdown">Reclamation</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="CommentC.php">Comments</a>
								<a class="dropdown-item" href="ReclamationC.php">Reclamtion</a>
							</div>
						</li>
						<?php
						}else{}
						?>
						<!-- <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Blog</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="blog.html">blog</a>
								<a class="dropdown-item" href="blog-details.html">blog Single</a>
							</div>
						</li> -->
						<?php
						if(isset($_SESSION["login"]) && $_SESSION["login"]){
						?>
						<!-- <li class="nav-item"><a class="nav-link" href="">Commande</a></li> -->
						<?php
						}else{}
						?>
						<?php
						if(isset($_SESSION["login"]) && $_SESSION["login"]){
						?>
						<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>	
						<?php
						}else{}
						?>
						<?php
						if(isset($_SESSION["login"]) && $_SESSION["login"]){}
						else{
						?>
						<li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
						<?php
						}
						?>
						<?php
						if(isset($_SESSION["login"]) && $_SESSION["login"]){
						?>
						<li class="nav-item"><a class="nav-link" href="logout.php">logout</a></li>
						<?php
						}
						else{
						?>
						<li class="nav-item"><a class="nav-link" href="login.php">login</a></li>
						<?php
						}
						?>
						<?php
						if(isset($_SESSION["login"]) && $_SESSION["login"] && $_SESSION["type"] == 'admin'){
						?>
						<li class="nav-item"><a class="nav-link" href="back/views/backend.php">Back-end</a></li>
						<?php
						}else{}
						?>	
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Comments</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start blog details -->
	<div class="blog-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Comments</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-8 col-lg-8 col-12">
					<div class="blog-inner-details-page">
						<div class="blog-inner-box">
							<div class="side-blog-img">
											
								<div class="date-blog-up">
									24 NOV
								</div>
							</div>
							
						</div>
						<div class="blog-comment-box">
							<h3>Comments</h3><?php
        
             
              
              $c = new CommentC();
              $tab = $c->listComments();
              $i=0;
             

              foreach ($tab as $comment) {
$i=$i+1;
?>
             <div class="comment-item">
								<div class="comment-item-left">
                <img src='images/avt-img.jpg' alt='' />
              </div>
              <div class='comment-item-right'>
                <div class='pull-left'>
                  <a href='#'><?= $comment["nom"]; ?></a>
                  </div>
                  
                  <div class='comment-item-right'>
                  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                 
<?php 
if ($comment["Stars"]==1){
    

echo '<span class="fa fa-star checked"></span>';}
elseif($comment["Stars"]==2){
    echo '<span class="fa fa-star checked"></span>';
    echo '<span class="fa fa-star checked"></span>';
}
elseif($comment["Stars"]==3){
    echo '<span class="fa fa-star checked"></span>';
    echo '<span class="fa fa-star checked"></span>';
    echo '<span class="fa fa-star checked"></span>';

}
elseif($comment["Stars"]==4){
    echo '<span class="fa fa-star checked"></span>';
    echo '<span class="fa fa-star checked"></span>';
    echo '<span class="fa fa-star checked"></span>';
    echo '<span class="fa fa-star checked"></span>';
}
else {
    echo '<span class="fa fa-star checked"></span>';
    echo '<span class="fa fa-star checked"></span>';
    echo '<span class="fa fa-star checked"></span>';
    echo '<span class="fa fa-star checked"></span>';
    echo '<span class="fa fa-star checked"></span>';
}
?>
                    
                    
                    
                    
                    




              </div>
                <div class='des-l'>
                  <p>
                  <?= $comment["comment"]; ?>
                  </p>
                  <br>
                </div>  
                
              </div>
              <?php
             if ($i==5){
                break;
              } 
             }
              ?>
              </div>
							
						<div class="comment-respond-box">
							<h3>Leave your comment </h3>

    
							<div class="comment-respond-form">
								<form id="commentrespondform"  class="comment-form-respond row" method="POST">
									<div class="col-lg-6 col-md-6 col-sm-6">
										<div class="form-group">
											<input id="name_com" class="form-control" name="nom" placeholder="Name" type="text"value ="">
                                            <p id="error1"> </p>
										</div>
										<div class="form-group">
											<input id="email_com" class="form-control" name="email" placeholder="name@gmail.com" type="email"value ="">
										</div>
                    <div class="form-group">
											<input id="Stars" class="form-control" name="Stars" placeholder="number of stars" type="number" value ="">
                                            <p id="error2"> </p>
										</div> 
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6">
										<div class="form-group">
											<textarea class="form-control" name="Comment" id="textarea_com" placeholder="Your Message" rows="2"value =""></textarea>
										</div>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12">
										<button class="btn btn-submit" name="insert" type="submit" value="insert" >Submit comment</button>
									</div>
                
 <script> src="js/controle.js"; </script>

								</form>
							</div>
						</div>
					</div>
				</div>
			
				
			
			</div>
		</div>
	</div>

	

    <?php
            
                  $comment = null;
                  $commentC = new CommentC();
                  if (
                      isset($_POST["nom"]) &&
                      isset($_POST["email"]) &&
                      isset($_POST["Comment"])&& isset($_POST["Stars"])
                  ) {
                     
                          $comment = new Comment(
                              null,
                              $_POST['nom'],
                              $_POST['email'],
                              $_POST['Comment'],
                              $_POST['Stars']
                          );
                          $commentC->addComment($comment);
                        
                          
                      
                  }
                  
  if (isset($_POST['insert'])){
           //the subject
           if ( $_POST['Stars']<3){
            
$sub = "About your review";
//the message
$msg = "Dear customer, we have noticed that you gave us a poor review,
thats why we are sending you this email to inform you that you can fill a reclamation letter.
 Making the costumer satisfied is our main goal,
this is why your feedback is appreciated as we will look into it and try improving for future orders
 Take care.";
//recipient email here
$rec =  $_POST["email"];
//send email

                  
                  $retval = mail($rec,$sub,$msg);
                  
                  if( $retval == true ) {
                     echo "Message sent successfully...";
                  }else {
                    echo $_POST["email"];
                     echo "Message could not be sent...";
                  }
                
                }
            }
                  ?>

	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

	<!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>