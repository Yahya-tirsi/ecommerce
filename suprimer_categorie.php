

<?php
    require_once "include/database.php";
    $id = $_GET["id"];
    $sqlState = $pdo->prepare("DELETE FROM categories WHERE id = ?");
    $sqlState->execute([$id]);
    header("location:listeCategory.php");
?>