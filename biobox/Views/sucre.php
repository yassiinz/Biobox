<?php   
    include '../Model/produit.php';
    include '../controller/produitP.php';  
	
	$produitP = new produitP();
	$listproduit = $produitP->listproduits();
	?>
<!DOCTYPE html>
<html lang="fr"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Bio-Box</title>  
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
						<li class="nav-item active"><a class="nav-link" href="categorie.php">Restaurants</a></li>
						<!-- <li class="nav-item active dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Pages</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="reservation.html">Reservation</a>
								<a class="dropdown-item" href="stuff.html">Stuff</a>
								<a class="dropdown-item" href="gallery.html">Gallery</a>
							</div>
						</li> -->
						<?php
						session_start();
						if(isset($_SESSION["login"]) && $_SESSION["login"]){
						?>
						<li class="nav-item"><a class="nav-link" href="reservation.php">Panier</a></li>
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
						<li class="nav-item"><a class="nav-link" href="affichercommand.php">Commande</a></li>
						<?php
						}else{}
						?>
						<?php
						if(isset($_SESSION["login"]) && $_SESSION["login"]){
						?>
						<li class="nav-item dropdown">
						 <a class="nav-link dropdown-toggle" href="CommentC.php" id="dropdown-a" data-toggle="dropdown">Reclamation</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="CommentC.php">Comments</a>
								<a class="dropdown-item" href="ReclamationC.php">Reclamtion</a>
							</div>
						</li>
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
						<li class="nav-item"><a class="nav-link" href="backend.php">Back-end</a></li>
						<?php
						}else{}

						$connect = mysqli_connect("localhost", "root", "", "biobox");  
						
if(isset($_SESSION["login"]) && $_SESSION["login"]){}else{
	if(isset($_POST["add_to_cart"]))  
	{  
		 if(isset($_SESSION["shopping_cart"]))  
		 {  
			  $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
			  if(!in_array($_GET["id"], $item_array_id))  
			  {  
				   $count = count($_SESSION["shopping_cart"]);  
				   $item_array = array(  
						'item_id'               =>     $_GET["id"],  
						'item_name'               =>     $_POST["hidden_name"],  
						'item_price'          =>     $_POST["hidden_price"]  
						
				   );  
				   $_SESSION["shopping_cart"][$count] = $item_array;  
			  }  
			  else  
			  {  
				   echo '<script>alert("Item Already Added")</script>';  
				   echo '<script>window.location="categorie.php"</script>';  
			  }  
		 }  
		 else  
		 {  
			  $item_array = array(  
				   'item_id'               =>     $_GET["id"],  
				   'item_name'               =>     $_POST["hidden_name"],  
				   'item_price'          =>     $_POST["hidden_price"]  
				    
			  );  
			  $_SESSION["shopping_cart"][0] = $item_array;  
		 }  
	} 
	if(isset($_GET["action"]))  
	{  
		 if($_GET["action"] == "delete")  
		 {  
			  foreach($_SESSION["shopping_cart"] as $keys => $values)  
			  {  
				   if($values["item_id"] == $_GET["id"])  
				   {  
						unset($_SESSION["shopping_cart"][$keys]);  
						echo '<script>alert("Item Removed")</script>';  
						echo '<script>window.location="formation.php"</script>';  
				   }  
			  }  
		 }  
	}
} 
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
					<br><h1> Le Menu </h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start Détails -->
	
			
					</div>
				</div>
			</div>
				
			<div class="row special-list">
			<?php foreach ($listproduit as $key)  { ?>
				<form method="post" action="menu.php?action=add&id=<?php echo $key["id_produit"]; ?>"> 
				<div class="col-lg-4 col-md-6 special-grid healthy box">
					<div class="gallery-single fix">
					<img src="<?php echo $key['img']; ?>" width="350" height="250" alt="image" />
						<div class="why-text">
						<h4><a href=""><?php echo $key['nom_produit']; ?> </a></h4>
                            </h4>
							<h3> &nbsp; &nbsp; &nbsp; <?php echo $key['prix_produit']; ?> DT &nbsp; &nbsp; &nbsp;</h3>
							<h2> &nbsp; &nbsp; &nbsp; <?php echo $key['desc_produit']; ?>  &nbsp; &nbsp; &nbsp;</h2>
							<input type="hidden" name="hidden_name" value="<?php echo $key["nom_produit"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $key["prix_produit"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:2px;" class="btn btn-success" value="ajouter au Panier" />
						
						</div>
			</form>
			 
			</div>
				</div>
				<?php		
			}
				?>
				
			</div>
		</div>
	</div>
	<!-- End Détails -->
	
	<!-- Start QT -->
	<div class="qt-box qt-background">
		<div class="container">
			<div class="row">
				<div class="col-md-8 ml-auto mr-auto text-left">
					<p class="lead ">
						" « Un esprit sain dans un corps sain. » "
					</p>
				</div>
			</div>
		</div>
	</div>
	<!-- End QT -->

	<!-- Start Contact info -->
	<div class="contact-imfo-box">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<i class="fa fa-volume-control-phone"></i>
					<div class="overflow-hidden">
						<h4>Phone</h4>
						<p class="lead">
							78204831
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-envelope"></i>
					<div class="overflow-hidden">
						<h4>Email</h4>
						<p class="lead">
							biobox@gmail.com
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-map-marker"></i>
					<div class="overflow-hidden">
						<h4>Location</h4>
						<p class="lead">
							El Ghazala,Tunis
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact info -->
	
	<!-- Start Footer -->
	<footer class="footer-area bg-f">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3>Vous étes les bienvenue </h3>
					
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Horaires d'ouverture</h3>
					<p><span class="text-color">Lundi: </span>11:Am - 9PM</p>
					<p><span class="text-color">Mardi-Mercredi :</span> 9:Am - 10PM</p>
					<p><span class="text-color">-Jeudi-Vendredi :</span> 9:Am - 10PM</p>
					<p><span class="text-color">Samedi-Dimanche:</span> 5:PM - 10PM</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Contact information</h3>
					<p class="lead"> 1, 2 rue André Ampère - 2083 - Pôle Technologique - El Ghazala, 55999483</p>
					<p class="lead"><a href="#">78204831</a></p>
					<p><a href="#"> bibox@outlook.com</a></p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Subscribe</h3>
					<div class="subscribe_form">
						<form class="subscribe_form">
							<input name="EMAIL" id="subs-email" class="form_input" placeholder="Address Email..." type="email">
							<button type="submit" class="submit">S'inscrire</button>
							<div class="clearfix"></div>
						</form>
					</div>
					<ul class="list-inline f-social">
						<li class="list-inline-item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">All Rights Reserved. &copy; 2018 <a href="#"><Bio-Box></Bio-Box></a> Design By : 
					<a href="https://html.design/">html design</a></p>
					</div>
				</div>
			</div>
		</div>
		
	</footer>
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