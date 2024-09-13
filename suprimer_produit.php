<?php 
require_once("include/database.php");
$sqlState = $pdo->prepare("DELETE FROM produit WHERE id = ?");
$sqlState->execute([$_GET["id"]]);
header("location:listeProduit.php");