<?php
include 'menuM.php';
$menuM= new menuM();
$menuM->deletemenu($_GET["id_menu"]);
header('Location:listmenu.php');
?>