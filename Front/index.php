<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        <title>ecommerce</title>
</head>

<body>
    <?php require_once("../include/nav_front.php") ?>
    <div class="container mt-5 py-2">


        <h2 class="mb-4"><i class="fa-solid fa-layer-group"></i> Categorie</h2>
        <div class="list-group">
            <?php
            require_once("../include/database.php");
            $sqlState = $pdo->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_OBJ);
            foreach ($sqlState as $categorie) { ?>
                <a href="categorie.php?id=<?php echo $categorie->id ?>" class="list-group-item list-group-item-action list-group-item-primary"><?php echo $categorie->icon ?> <?php echo $categorie->libelle ?></a>
                <?php
            }
            ?>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>