<?php
include '../controller/CategorieC.php';
$categorieC= new CategorieC();
$categorieC->deleteCategorie($_GET["id"]);
header('Location:listeCategories.php');
?>