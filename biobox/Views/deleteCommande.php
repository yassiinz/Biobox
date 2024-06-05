<?php
    include '../controller/commandeC.php';
    $commandeC= new commandeC();
    $commandeC->deleteCommande($_GET["id"]);
    header('Location:listecommande.php');
?>