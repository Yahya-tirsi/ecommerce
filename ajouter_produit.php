<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Ajouter produit</title>
</head>

<body>
    <?php require_once("include/navbar.php") ?>


    <div class="container mt-5">
        <h2>Ajouter produit</h2>
        <form method="post">
            <div class="mb-3">
                <label for="nomproduit" class="form-label">Nom de produit</label>
                <input type="text" class="form-control" id="nomproduit" name="nomproduit" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="prix" class="form-label">Prix</label>
                <input type="text" class="form-control" id="prix" name="prix" step="0.1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="discount" class="form-label">Discount</label>
                <input type="number" class="form-control" id="discount" step="0.1" name="discount" min="0" max="100"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="typeCategorie" class="form-label">Categorie</label>
                <select name="typeCategorie" id="typeCategorie" class="form-select">
                    <option value="">choisissez une categorie</option>
                    <?php
                    require_once "include/database.php";
                    $sqlState = $pdo->query("SELECT * FROM categories");
                        if ($eo = $sqlState->fetchAll(PDO::FETCH_ASSOC)) {
                            foreach ($eo as $categorie) {
                                ?>
                                <option value="id"><?php echo $categorie["libelle"] ?></option>
                                <?php
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="dateCriation" class="form-label">Date de criation</label>
                <input type="date" class="form-control" id="dateCriation" name="dateCriation"
                    aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary" name="ajouterProduit">Ajouter produit</button>
        </form>
    </div>

    <div class="container mt-3">
        <?php
        if (isset($_POST["ajouterProduit"])) {
            $nomproduit = $_POST["nomproduit"];
            $prix = $_POST["prix"];
            $discount = $_POST["discount"];
            $typeCategorie = $_POST["typeCategorie"];
            $dateCriation = $_POST["dateCriation"];
            if (!empty($nomproduit) && !empty($prix) && !empty($dateCriation) && !empty($discount) && !empty($typeCategorie)) {
                require_once "include/database.php";
                $sqlState = $pdo->prepare("INSERT INTO produit(libelle,prix,discount,id_category,date_creation) VALUES(?,?,?,?,?)");
                $sqlState->execute([$nomproduit, $prix, $discount, $dateCriation]); ?>
                <div class="alert alert-success" role="alert">
                    Produit <?php echo $nomproduit ?> ajouter avec succès
                </div>
                <?php
            } else { ?>
                <div class="alert alert-danger" role="alert">
                    Veuillez remplir les champ
                </div>
                <?php
            }
        }
        ?>
    </div>

</body>

</html>