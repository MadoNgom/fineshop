<?php
session_start();
require('../DBTransaction.php');
$transaction = new DBTransaction();
$msg = "";
if (isset($_POST['click'])) {
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $result = $transaction->connexion($email, $pwd);
    if ($result != null) {
        $_SESSION['User'] = $result;
        header("Location: ../index.php");
        exit();
    }
    $msg = "Votre email ou mot de passe est invalide";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/styles/inscription.css">
</head>

<body>
    <?php
    require('../page/header.php');
    ?>
    <div class="banner">
        <div class="container d-flex justify-content-center align-items-center">
            <form action="connexion.php" method="POST" class="form shadow mt-4 bg-white">
                <?php if ($msg != "") { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $msg ?>
                    </div>
                <?php } ?>
                <div class="d-flex justify-content-center align-items-center p-6">
                    <h3 class="mx-2">Connexion</h3>
                    <img src="../assets/image/logo.png" alt="">
                </div>
                <div class="form-group my-4">
                    <label for="email">Votre Email</label> <br />
                    <input type="email" name="email" class="form-control mt-2" placeholder="Entrez votre email">
                </div>
                <div class="form-group my-3">
                    <label for="pwd">Votre mot de passe</label>
                    <input type="password" name="pwd" class="form-control mt-2" placeholder="Entrez votre mot de passe">
                </div>
                <div class="fs-6 text-left">
                    <a href="#">Mot de passe oublié?</a>
                </div>
                <div class="form-group fs-6 text-black-50">
                    <!-- <input type="checkbox" name="checkbox" id=""> Se souvenir de moi -->
                    <button class="d-block w-100 btn-danger rounded-2 mt-3" name="click">Se connecter</button>
                </div>
                <p class="text-black-50 text-center mt-1">Ou</p>
                <div class="d-flex justify-content-center align-items-center">
                    <img src="../assets/image/face.png" alt="" width="30px">
                    <img src="../assets/image/google.png" alt="" width="30px" class="mx-3">
                </div>
                <p class="mt-2 text-black-50 fs-6">Vous n'avez pas de compte? <a href="inscription.php">Inscrivez-vous</a></p>
            </form>
        </div>
    </div>
</body>

</html>