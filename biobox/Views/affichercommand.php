<?php   
include '../model/commande.php';
include '../controller/commandeC.php';  
	session_start();
    
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
						echo '<script>window.location="menu.php"</script>';  
				   }  
			  }  
		 }  
	} 

    $commandeC = new commandeC();
    $listcommand=$commandeC->mycommands($_SESSION["email"]);
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
						<li class="nav-item "><a class="nav-link" href="categorie.php">Restaurants</a></li>
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
						<li class="nav-item active"><a class="nav-link" href="">Commande</a></li>
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
					<br><h1> Vos commmandes </h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
    </div>
				</div>
			</div>
			<div class="container">

    <div style="clear:both"></div>  
				   <br/> <h3>&nbsp; &nbsp; &nbsp;Vos commandes</h3>  
				   <div class="table-responsive">  
						<table class="table table-bordered">  
							 <tr>  
								  <th width="20%">&nbsp; &nbsp; &nbsp; Mail</th>  
								   
								  <th width="20%">Prix</th>  
                                  <th width="5%">Adresse</th>  
								   
								  <th width="5%">Date</th>  
							 </tr>  
                             <?php foreach ($listcommand as $key)  { ?>
                                <td>&nbsp; &nbsp; &nbsp;<?php echo $key["nom"]; ?></td>  
								 
								  <td><?php echo $key["totale"]; ?></td>  
								  <td><?php echo $key["adresse"];?></td>
								  <td><?php echo $key["date_commande"]; ?>
                                  </tr>  
							 <?php  
									    
								  }  
							 ?>  
                             </table> 
						
				   </div>  
			  </div>  
			  <br /> 
	