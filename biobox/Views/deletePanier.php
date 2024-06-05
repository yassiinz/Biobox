<?php
    include '../controller/panierC.php';
    $panierC= new panierC();
    $panierC->deletePanier($_GET["id"]);
    header('Location:listepanier.php');
?>