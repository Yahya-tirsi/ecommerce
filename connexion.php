<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>ecommerce</title>
</head>

<body>
    <?php include "include/navbar.php"; ?>
    <div class="container mt-5 py-2">
        <?php
        if (isset($_POST["connection"])) {
            $login = $_POST["login"];
            $password = $_POST["password"];

            if (!empty($login) && !empty($password)) {
                require_once "include/database.php";
                $sqlState = $pdo->prepare("select * from utilusateur where(login=? and password=?)");
                $sqlState->execute([$login, $password]);
                if ($sqlState->rowCount() >= 1) {
                    session_start();
                    var_dump($sqlState->fetch());
                    $_SESSION["utilisateur"] = $sqlState->fetch();
                    header("location:admin.php");
                } else {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        Login ou password est incorect!
                    </div>
                    <?php
                }
            } else { ?>
                <div class="alert alert-danger" role="alert">
                    Login ou password sont obligatoire
                </div>
                <?php
            }
        }
        ?>
        <h2 class="mb-4">Connection</h2>
        <form method="post">
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Login</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="login"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                    <div id="emailHelp" class="form-text">We'll never share your password with anyone else.</div>
                </div>
                <button type="submit" class="btn btn-primary" name="connection">Connection</button>
            </form>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>