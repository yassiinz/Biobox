<?php
include '../Model/menu.php';
    include '../Controller/menuM.php';
    include '../Model/produit.php';
    include '../Controller/ProduitP.php';
    $error = "";

    // create course
    $menu = null;

    // create an instance of the controller
    $menuM = new menuM();
    $ProduitP= new ProduitP();
    if (  isset($_POST["id_menu"])&&
       isset($_POST["nom_menu"]) &&		
        isset($_POST["prix"])  &&
			
        isset($_POST["produit"]) 
		
      
    ) {
        if ( !empty($_POST["id_menu"])&&
            	!empty($_POST["nom_menu"]) &&

            !empty($_POST["prix"]) &&
            !empty($_POST["produit"])
			
           
        ) {
            $menu = new menu( $_POST['id_menu'],
               $_POST['nom_menu'],
				 
                $_POST['prix'] ,
                $_POST["produit"]
				
               
            );
        $menuM->updatemenu($menu, $_POST["id_menu"]);
        header('Location:listmenu.php');
    } else
        $error = "Missing information";
       
} $list=$ProduitP -> listProduit();
?>
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
                    <div class="container-fluid px-4">

                        </div>
                        <div class="card mb-4">
   
                            <div class="card-body">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wid_menuth=device-wid_menuth, initial-scale=1.0">
    <title>list Menu</title>
</head>

<body>
    <button><a href="listmenu.php">Back to list</a></button>
    <hr>

    <div id_menu="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_menu'])) {
        $menu = $menuM->showmenu($_POST['id_menu']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
            <tr>
                    <td>
                        <label for="id_menu">id_menu:
                        </label>
                    </td>
                    <td><input type="text" name="id_menu" id_menu="id_menu" value="<?php echo $menu['id_menu']; ?>" ></td>
                </tr>     
            <tr>
                    <td>
                        <label for="nom_menu">Nom menu:
                        </label>
                    </td>
                    <td><input type="text" name="nom_menu" id_menu="nom_menu" value="<?php echo $menu['nom_menu']; ?>" ></td>
                </tr>
            
            
				
                <tr>
                    <td>
                        <label for="prix">prix:
                        </label>
                    </td>
                    <td><input type="texte" name="prix" id_menu="prix" value="<?php echo $menu['prix']; ?>"></td>
                </tr>
                <tr>
                <select name="produit" class="form-control p-6">
                <option value="">Select produit</option>
                <?php foreach($list as $menu){ ?>
                <option value="<?php echo $menu['id_menu'] ?>"><?php echo $menu['id_menu'] ?></option>
                <?php } ?>
              </select>
                </tr> 
                
            
                
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Send"> 
                    </td>
                    <td>
                        <input type="reset" value="Reset" >
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

