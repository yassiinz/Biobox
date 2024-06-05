<?php
include 'ProduitP.php';
$ProduitP= new ProduitP();
$ProduitP->deleteprod($_GET["id"]);
header('Location:listProduit.php');
?>