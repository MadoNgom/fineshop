<?php
session_start();
if (!isset($_SESSION['User'])){
    header("Location:connexion.php");
    exit();
}
if ($_SESSION['User']['profile'] != "BOUTIQUIER"){
    header("Location:connexion.php");
    exit();
}
require('../DBTransaction.php');
$transaction = new DBTransaction();
$msg = "";
if(isset($_POST['click'])){
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $id_boutiquier = $_SESSION['User']['id'];
    $result = $transaction->createCategorie($nom, $description, $id_boutiquier);
        if ($result == 1){
            header("Location:read.php");
            exit();
        } else {
            $msg = $result;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter les Categorie</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/styles/form.css">
    <link rel="stylesheet" href="../assets/styles/nave.css">
</head>
<body>
    <?php
    require('../page/header.php');
    ?> 
<!--<nav class="navbar navbar-expand-lg bg-white ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="../assets/image/logoo.png"class="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="../index.php"><i class="bi bi-house-door-fill"></i> Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../panier/panier.php"><i class="bi bi-cart4"></i>Panier</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../panier/commande.php"><i class="bi bi-list-ul"></i>Commandes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="listproduit.php"><i class="bi bi-cart4"></i> Produit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="commandeclient.php"><i class="bi bi-cart-check-fill"></i> Commandes clients</a>
        </li>
        <li class="nav-item">
          < if (isset($_SESSION['User']) && isset($_SESSION['User']['profile']) && $_SESSION['User']['profile'] != 'admin') : ?>
            <a class="nav-link" href="../users/listboutiquier.php"><i class="bi bi-person-check-fill"></i> Utilisateurs</a>
          < endif; ?>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../page/deconnection.php"><i class="bi bi-box-arrow-right"></i> Se deconnecte</a>
        </li>
      </ul>
    </div>
  </div>
</nav>-->
<form action="create.php" method="POST" enctype="multipart/form-data" class="row g-3 boutiquierform">
  <div class="col-md-6">
    <label for="Nom" class="form-label">Nom</label>
    <input name="nom" type="text" class="form-control" id="Nom" required>
  </div>
  <div class="col-md-6">
    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
  </div>
  <div class="col-12">
    <button name="click" type="submit" class="btn btn-primary">Ajouter</button>
    <a href="read.php" class="btn btn-danger">Annuler</a>
  </div>
  <?php if ($msg): ?>
    <div class="alert alert-danger" role="alert">
      <?php echo $msg; ?>
    </div>
  <?php endif; ?>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
