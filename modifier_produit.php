<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Modifier produit</title>
</head>

<body>



    <div class="container mt-5">
        <h2>Modifier produit</h2>
        <p><a class="link-opacity-100" href="listeProduit.php">Liste des produit</a></p>

        <?php
        require_once("include/database.php");
        $id = $_GET["id"];
        $sqlState = $pdo->prepare("SELECT * FROM produit WHERE id = ?");
        $sqlState->execute([$id]);
        $produit = $sqlState->fetch(PDO::FETCH_ASSOC);

        if (isset($_POST["modifierproduit"])) {
            $nomProduit = $_POST["nomProduit"];
            $prixProduit = $_POST["prixProduit"];
            $discountProduit = $_POST["discountProduit"];
            $dateCriation = date("Y-m-d H:i:s");

            $filename = "pexels-olly-3965406.jpg";
            if (!empty($_FILES["imageProduit"]["name"])) {
                $filename =  uniqid().$_FILES["imageProduit"]["name"];
                move_uploaded_file($_FILES["imageProduit"]["tmp_name"], "Upload/Produit/" . $filename);
            }

            if (!empty($nomProduit) && !empty($prixProduit) && !empty($discountProduit)) {
                $sqlState = $pdo->prepare("UPDATE produit SET  libelle = ?, prix = ?, discount = ?,images = ?, date_creation = ? WHERE id = ? ");
                $sqlState->execute([$nomProduit, $prixProduit, $discountProduit, $filename, $dateCriation, $id]);
                header("location:listeProduit.php");
                ?>
                <?php
            } else { ?>
                <div class="alert alert-danger" role="alert">
                    Veuillez remplir les champ!
                </div>
                <?php
            }
        }
        ?>

        <form method="post" class="mt-4" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="idproduit" class="form-label">Id</label>
                <input type="text" class="form-control" id="idproduit" name="idproduit" value="<?php echo $id ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="nomProduit" class="form-label">Nom de produit</label>
                <input type="text" class="form-control" id="nomProduit" name="nomProduit"
                    value="<?php echo $produit["libelle"] ?>">
            </div>
            <div class="mb-3">
                <label for="prixProduit" class="form-label">Prix</label>
                <input type="text" class="form-control" id="prixProduit" name="prixProduit"
                    value="<?php echo $produit["prix"] ?>">
            </div>
            <div class="mb-3">
                <label for="discountProduit" class="form-label">Discount</label>
                <input type="text" class="form-control" id="discountProduit" name="discountProduit" min="0" max="100"
                    value="<?php echo $produit["discount"] ?>">
            </div>
            <div class="mb-3">
                <label for="imageProduit" class="form-label">Images</label>
                <input type="file" class="form-control" id="imageProduit" name="imageProduit"
                    value="<?php echo $produit["images"] ?>">
            </div>
            
            <!-- <div class="mb-3">
                <label for="dateCriation" class="form-label">Date de criation</label>
                <input type="date" class="form-control" id="dateCriation" name="dateCriation"
                    aria-describedby="emailHelp">
            </div> -->
            <button type="submit" class="btn btn-primary" name="modifierproduit">Modifier produit</button>
        </form>
    </div>



</body>
</html>