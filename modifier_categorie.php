<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Modifier categorie</title>
</head>

<body>
    <div class="container mt-5">
        <h2>Modifier categorie</h2>

        <form method="get">
            <div class="mb-3">
                <label for="nomCategory" class="form-label">Nom de categorie</label>
                <input type="text" class="form-control" id="nomCategory" name="nomCategory" placeholder="<?php $_GET["id"] ?>" >
            </div>
            <div class="mb-3">
                <label for="descriptionCategory" class="form-label">description</label>
                <textarea class="form-control" placeholder="Laissez un commentaire ici" name="descriptionCategory"
                    id="descriptionCategory"></textarea>
            </div>
            <!-- <div class="mb-3">
                <label for="dateCriation" class="form-label">Date de criation</label>
                <input type="date" class="form-control" id="dateCriation" name="dateCriation"
                    aria-describedby="emailHelp">
            </div> -->
            <button type="submit" class="btn btn-primary" name="ajouterCategorie">Modifier catégorie</button>
        </form>
    </div>



</body>

</html>