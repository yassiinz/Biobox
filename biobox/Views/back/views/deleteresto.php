<?php
include '../controller/restoC.php';
$rdvC= new restoC();
$rdvC->deleteresto($_GET["id"]);
header('Location:listeresto.php');
?>