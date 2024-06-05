<?php
	include "../controller/commandeC.php";
		$r = new commandeC();	
	$servername = "localhost" ; 
    $username = "root" ;
    $password = "" ; 
    $db = "biobox" ;
    $conn = null ; 
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$db", $username , $password) ; 
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully <br/>";
    } 
	catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>

<!DOCTYPE html><html>
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
				<a class="navbar-brand" href="index.html">
					<img src="images/logo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a class="nav-link" href="menu1.html">retour</a></li>
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
					<h1>Commande</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start Contact -->
	<div class="contact-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>votre commande</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
						<button class="btn btn-common" id="submit" onclick="document.location='addCommande.php'">ajouter une autre commande</button>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<form id="contactForm">
						<div class="row">
							<?php
   								$start = 0;  $per_page = 2;
   								$page_counter = 0;
   								$next = $page_counter + 1;
   								$previous = $page_counter - 1;
   								if(isset($_GET['start'])){
    								$start = $_GET['start'];
    								$page_counter =  $_GET['start'];
    								$start = $start *  $per_page;
									$next = $page_counter + 1;
									$previous = $page_counter - 1;
   								}
   								// query to get messages from messages table
								$q = "SELECT * FROM commande LIMIT $start, $per_page";
								$query = $conn->prepare($q);
								$query->execute();   
								if($query->rowCount() > 0){
							?>
							<table border="2" align="center" width="70%">
								<tr> 
									<th>nom</th>
									<th>totale</th>
									<th>adresse</th>
									<th>date de commande</th>
									<th>liste de commande</th>
									<th>modifier</th>
									<th>supprimer</th>
								</tr>
								<?php
									$tab = $r->listeCommande();
									foreach ($query as $commande) {
    							?>
								<tr>
									<td><?= $commande['nom']; ?></td>
									<td><?= $commande['totale']; ?></td>
									<td><?= $commande['adresse']; ?></td>
									<td><?= $commande['date_commande']; ?></td>
									<td><?= $commande['liste']; ?></td>
									<td align="center">
										<a href="updateCommande.php?id=<?php echo $commande['id_commande']; ?>">modifier</a>
									</td>
									<td>
										<a href="deleteCommande.php?id=<?php echo $commande['id_commande']; ?> ">supprimer</a>
									</td>
        						</tr>
								<br>
								<br>
   								<?php
         							}
								?>
							</table>
							<?php				
         						$count_query = "SELECT * FROM commande";
								$query = $conn->prepare($count_query);
								$query->execute();
								$count = $query->rowCount();
								// calculate the pagination number by dividing total number of rows with per page.
								$paginations = ceil($count / $per_page);		
      							}
								else{
         							echo '<p class="empty">no accounts available!</p>';
      							}
							?>							
   							<center>            
            					<ul class="pagination_section">
            						<?php					
										if($page_counter == 0){                   
											for($j=1; $j < $paginations; $j++) { 
											echo "<a href=?start=$j>".$j."</a>";
										}
										}else{
											echo "<a href=?start=$previous>Previous</a>"; 
											for($j=0; $j < $paginations; $j++) {
												if($j == $page_counter) {
													echo "<a href=?start=$j class='active'>".$j."</a>";
												}
												else{
													echo "<a href=?start=$j>".$j."</a>";
												} 
											}
											if($j != $page_counter+1)
											echo "<a href=?start=$next>Next</a>"; 
										} 
									?>
								</ul>
            				</center>	
							<div class="col-md-12">
								<div class="submit-button text-center">
									<button class="btn btn-common" id="submit" type="submit" onclick="document.location='listeCommande.php'">confirmer</button>
									<button class="btn btn-common" id="submit" onclick="document.location='index.html'">annuler</button>
								</div>
							</div>							
						</div>            
					</form>
				</div>
			</div>
		</div>
	</div>
	<br>
	<!-- End Contact -->
	
	<!-- Start Contact info -->
	<div class="contact-imfo-box">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<i class="fa fa-volume-control-phone"></i>
					<div class="overflow-hidden">
						<h4>Phone</h4>
						<p class="lead">
							+01 123-456-4590
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-envelope"></i>
					<div class="overflow-hidden">
						<h4>Email</h4>
						<p class="lead">
							yourmail@gmail.com
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-map-marker"></i>
					<div class="overflow-hidden">
						<h4>Location</h4>
						<p class="lead">
							800, Lorem Street, US
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
</html>