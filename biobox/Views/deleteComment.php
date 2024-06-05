<?php
include '../Controller/CommentC.php';
$commentC = new CommentC();
$commentC->deleteComment($_GET["id"]);
header('Location:listComment.php');