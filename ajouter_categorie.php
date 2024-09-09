<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <?php require_once("include/navbar.php") ?>


    <div class="container mt-5">
        <h2>Ajouter categorie</h2>
        <form method="post">
            <div class="mb-3">
                <label for="nomCategory" class="form-label">Nom de categorie</label>
                <input type="text" class="form-control" id="nomCategory" name="nomCategory"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="descriptionCategory" class="form-label">description</label>
                <textarea class="form-control" placeholder="Laissez un commentaire ici" name="descriptionCategory"
                    id="descriptionCategory"></textarea>
            </div>
            <div class="mb-3">
                <label for="dateCriation" class="form-label">Date de criation</label>
                <input type="date" class="form-control" id="dateCriation" name="dateCriation"
                    aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary" name="ajouterCategorie">Ajouter catégorie</button>
        </form>
    </div>

    <div class="container mt-3">
        <?php
        if (isset($_POST["ajouterCategorie"])) {
            $nomCategorie = $_POST["nomCategory"];
            $description = $_POST["descriptionCategory"];
            $dateCriation = $_POST["dateCriation"];
            if (!empty($nomCategorie) && !empty($description) && !empty($dateCriation)) {
                require_once "include/database.php";
                $sqlState = $pdo->prepare("insert into categories(libelle,description,date_creation) values(?,?,?)");
                $sqlState->execute([$nomCategorie, $description, $dateCriation]); ?>
                <div class="alert alert-success" role="alert">
                    Categorie <?php echo $nomCategorie ?> ajouter avec succès
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