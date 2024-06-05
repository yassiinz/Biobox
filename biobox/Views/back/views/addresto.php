


<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        session_start();
        ?>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">BIO <b>BOX</b></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="../../index.php">Front-End</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../../logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="backend.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Gestion Utilisateur
                            </a>
                            <div class="sb-sidenav-menu-heading"></div>


                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Gestion Commande
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="listCommande.php">Commande</a>
                                    <!-- <a class="nav-link" href="listPanier.php">panier</a> -->
                                </nav>
                            </div>


                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Gestion Reclamations
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="listReclamation.php">Reclamations</a>
                                    <a class="nav-link" href="listComment.php">Comments</a>
                                </nav>
                            </div>


                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Gestion Restaurant
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="listeresto.php">Restaurant</a>
                                    <a class="nav-link" href="listeCategories.php">Categorie</a>
                                </nav>
                            </div>



                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Gestion Menu
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="listmenu.php">Menu</a>
                                    <a class="nav-link" href="listproduit.php">Produit</a>
                                </nav>
                            </div>



                           
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php
                        echo $_SESSION["lastName"]; 
                        ?> 
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>

                                <!DOCTYPE html><html>
    <head>
<link rel="styleesheet" href="style.css">
<script src="js/jquery-3.2.1.min.js" ></script>
<script src="js/ctr_saisie.js"></script>
</head>
</html>

<?php
    include '../model/resto.php';
    include '../controller/restoC.php';
    include "../controller/CategorieC.php";

    $r = new CategorieC();
    $tab = $r->listeCategorie();

  
    $error = "";

    // create course
    $resto = null;

    // create an instance of the controller
    $restoC = new restoC();
    if (  
       isset($_POST["nameresto"]) &&
		isset($_POST["adresse"]) &&	
        isset($_POST["email"]) &&
		isset($_POST["num"]) &&
        isset($_POST["id_cat"]) && isset($_FILES["image"]["name"])
        
    ) {
        if ( 
            	!empty($_POST["nameresto"]) &&
		 !empty($_POST["adresse"]) &&
            !empty($_POST["email"]) && 
			!empty($_POST["num"]) &&
            !empty($_POST["id_cat"]) && !empty($_FILES["image"]["name"])
            
           
           
        ) {

        $targetDir = "../images/";
		$fileName = basename($_FILES["image"]["name"]);
		$targetFilePath = $targetDir . $fileName;
		$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
		$allowTypes = array('jpg', 'png', 'jpeg');
        if (in_array($fileType, $allowTypes)) {
			
			if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            $resto = new resto(
               $_POST['nameresto'],
				 $_POST['adresse'],
                $_POST['email'], 
				$_POST['num'],
                $fileName,
                $_POST['id_cat']

                
                
               
            );
            $restoC->addresto($resto);
            header('Location:listeresto.php',TRUE,307);
        } else {
            $error = "Sorry, there was an error uploading your file.";
        }
    } else {
        $error = "Sorry, only JPG, JPEG, PNG files are allowed to upload.";
    }
} else
    $error = "please fill the blanks";
}

    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendez-vouz list </title>
</head>
    <body>
        <button><a href="listeresto.php">Return to resto list </a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form id="resto-form" action="" method="POST" enctype="multipart/form-data">
            <table border="2" align="center">    
            <tr>
                    <td>
                        <label for="nameresto"> Name resto:
                        </label>
                    </td>
                    <td><input type="text" name="nameresto" id="nameresto" required>
                    <h5 id="nameresto-error" style="color: red;display: none;">
                    </h5>
                </td>
                           
                </tr>
            
            
            <tr>
                    <td>
                        <label for="adresse"> adresse:
                        </label>
                    </td>
                    <td><input type="text" name="adresse" id="adresse" required>
                    <h5 id="adresse-error" style="color: red;display: none;">
                    </h5> 
                </td>
                    
                </tr>
				
                <tr>
                    <td>
                        <label for="email">Email:
                        </label>
                    </td>
                    <td><input type="email" name="email" id="email" required>
                    <h5 id="email-error" style="color: red;display: none;">
                    </h5> 
                </td>
                    
                </tr>
            
                <tr>
                    <td>
                        <label for="num">num:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="num" id="num" required>
                        <h5 id="num-error" style="color: red;display: none;">
                    </h5> 
                    </td>
                    
                </tr> 
                <tr>
							<td>
								<label for="image">Image:
								</label>
							</td>
							<td><input type="file" name="image" id="image" required>
                            <h5 id="image-error" style="color: red;display: none;">
                            </h5> 
                        </td>
                            
						</tr>
                <tr>
                    <td>
                        <label for="id_cat">category name:
                        </label>
                    </td>
                    <td>
                    
                     
                        <select name="id_cat" id="id_cat" required>
                        <?php
                        foreach ($tab as $categorie) {
                        ?>
                        <option value=<?php echo $categorie['id']; ?>> <?= $categorie['nom'];?> </option>
                        <?php } ?>
                        </select>
                        
                    </td>
                </tr> 
                <tr>
                   
                    <td>
                        <input type="submit"  value="Send"> 
                    </td>
                    <td>
                        <input type="reset" value="Reset" >
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>


</table>

                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <!-- <div class="text-muted">Copyright &copy; Your Website 2022</div> -->
                            <div>
                                <!-- <a href="#">Privacy Policy</a> -->
                                &middot;
                                <!-- <a href="#">Terms &amp; Conditions</a> -->
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>






