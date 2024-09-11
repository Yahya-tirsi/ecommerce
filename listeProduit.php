<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Liste des categorie</title>
</head>

<body>
    <?php
    require_once("include/navbar.php");
    ?>

    <div class="container mt-5">
        <h2>Liste des produit</h2>
        <div class="d-flex justify-content-end">
            <a href="ajouter_produit.php" class="btn btn-success d-flex justify-content-end mb-1"><svg xmlns="http://www.w3.org/2000/svg"
                    width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill me-2 mt-1"
                    viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
                </svg> Ajouter produit</a>
        </div>

        <table class="table table-striped table-dark table-hover">
            <tr>
                <th>Id</th>
                <th>Nom de produit</th>
                <th>Prix</th>
                <th>Discout</th>
                <th>Nom categorie</th>
                <th>Date de creation</th>
                <th>Operation</th>
            </tr>
            <tr>
                <?php
                require_once("include/database.php");
                $sqlState = $pdo->query("SELECT *, produit.libelle AS nom_produit, produit.date_creation AS date_produit, categories.libelle AS nom_categorie
                            FROM produit
                            JOIN categories ON produit.id_category = categories.id;");

                if ($sql = $sqlState->fetchAll(PDO::FETCH_ASSOC)) {
                    foreach ($sql as $key) { ?>
                    <tr>
                        <td><?php echo $key["id"] ?></td>
                        <td><?php echo $key["nom_produit"] ?></td>
                        <td><?php echo $key["prix"] ?></td>
                        <td><?php echo $key["discount"] ?></td>
                        <td><?php echo $key["nom_categorie"] ?></td> 
                        <td><?php echo $key["date_produit"] ?></td>
                        <td>
                            <button class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-arrow-up-square mb-1" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm8.5 9.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707z" />
                                </svg> Modifier</button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash mb-1" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                    <path
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                </svg> Suprimmer</button>
                        </td>
                    </tr>
                    <?php
                    }
                }
                ?>
            </tr>
        </table>

    </div>


    <!-- Modal -->
    <div class="modal fade" tabindex="-1" id="exampleModal" data-bs-target="#exampleModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete categorie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Etes-vous sûr de vouloir supprimer de catégorie id :</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                    <button type="button" class="btn btn-primary">

                        Oui</button>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>