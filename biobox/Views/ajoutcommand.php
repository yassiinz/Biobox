<?php 
session_start();
include '../model/commande.php';
    include '../controller/commandeC.php';  

    $commandeC = new commandeC();
    foreach($_SESSION["shopping_cart"] as $keys => $values)  
    {
        $mail=$_SESSION["email"];
        $produit_name=$values["item_name"];
        $prix=$values["item_price"];
        $date = date('Y-m-d H:i:s');
        $adress = "Tunis";
        $commande = new commande($mail,$prix,$adress,$date,$produit_name);
        $commandeC->addcommande($commande);
        header('Location:menu.php');
    }
								  
