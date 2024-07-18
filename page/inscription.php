<?php
session_start();
require('../DBTransaction.php');

$msg = "";
$transaction = new DBTransaction();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['click'])) {
    $nomComplet = trim($_POST['nomComplet']);
    $email = trim($_POST['email']);
    $pwd = trim($_POST['pwd']);

    // Validation des données
    if (empty($nomComplet) || empty($email) || empty($pwd)) {
        $msg = "Tous les champs sont obligatoires";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = "Adresse email invalide";
    } else {
        $result = $transaction->inscription($nomComplet, $email, $pwd, "CLIENT");
        if ($result == 0) {
            $msg = "Données invalides";
        } else {
            header('Location:connexion.php');
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/styles/form.css">
    <link rel="stylesheet" href="../assets/styles/inscription.css">
</head>

<body>
    <?php
    require('../page/header.php');
    ?>
    <div class="banner">
        <div class="container d-flex justify-content-center align-items-center ">
            <form action="inscription.php" method="POST" class="form shadow mt-3 bg-white">
                <?php if ($msg != "") { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= htmlspecialchars($msg) ?>
                    </div>
                <?php } ?>
                <div class="d-flex justify-content-center align-items-center ">
                    <h3 class="mx-2">S'inscrire</h3>
                    <img src="../assets/image/logo.png" alt="">
                </div>
                <div class="form-group my-2">
                    <label for="nomComplet">Nom complet</label> <br />
                    <input type="text" name="nomComplet" class="form-control mt-2" id="nomComplet" placeholder="Nom complet">
                </div>
                <div class="form-group my-2">
                    <label for="email">Email</label> <br />
                    <input type="email" name="email" class="form-control mt-2" id="email" placeholder="Entrez votre email">
                </div>
                <div class="form-group my-2">
                    <label for="pwd">Mot de passe</label>
                    <input type="password" name="pwd" class="form-control mt-2" id="pwd" placeholder="Entrez votre mot de passe">
                </div>
                <div class="form-group fs-6 text-black-50">
                    <input type="checkbox" name="checkbox" id="checkbox"> Se souvenir de moi
                    <button class="d-block w-100 btn-danger rounded-2 mt-3" name="click">S'inscrire</button>
                </div>
                <p class="text-black-50 text-center mt-1">Ou</p>
                <div class="d-flex justify-content-center align-items-center ">
                    <img src="../assets/image/face.png" alt="" width="30px">
                    <img src="../assets/image/google.png" alt="" width="30px" class="mx-3">
                </div>
                <p class="mt-2 text-black-50 fs-6">Vous avez déjà un compte ? <a href="connexion.php">Connectez-vous</a></p>
            </form>
        </div>
    </div>
</body>

</html>
