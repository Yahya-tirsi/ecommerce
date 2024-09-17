<?php
    require_once("../include/database.php");
    $id = $_GET["id"];
    $sqlState = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
    $sqlState->execute([$id]);
    $categorie = $sqlState->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        <title>Categorie | <?php echo $categorie["libelle"] ?></title>
</head>

<body>
    <?php
    require_once("../include/nav_front.php");
    ?>
    <div class="container mt-5">
        <h2><?php echo $categorie["icon"] ?> <?php echo $categorie["libelle"] ?></h2>

        <div class="d-flex">
            <?php
            require_once("../include/database.php");
            $sqlState = $pdo->prepare("SELECT DISTINCT produit.* FROM produit 
            INNER JOIN categories ON produit.id_category = ?");
            $sqlState->execute([$id]);
            $produits = $sqlState->fetchAll(PDO::FETCH_ASSOC);
                foreach ($produits as $produit) { ?>
                    <div class="card mt-3" style="width: 18rem;">
                        <img src="../Upload/Produit/<?php echo $produit["images"] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $produit["libelle"] ?></h5>
                            <p class="card-text"><?php echo $produit["prix"] ?> DH</p>
                            <p class="card-text"><?php echo date_format(date_create($produit["date_creation"]),"d/m/Y")  ?> </p>
                            <a href="#" class="btn btn-primary">Ajouter au panier</a>
                        </div>
                    </div>
                    <?php
                }
            if(empty($produit)){ ?>
                <div class="alert alert-info">
                    Pas de produit disponible dans cette categorie
                </div>
                <?php
            }?>
        </div>

    </div>

</body>

</html>