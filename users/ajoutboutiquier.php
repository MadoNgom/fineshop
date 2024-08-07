<?php
session_start();
 // $_SESSION['user']=user connecter toujour
if (!isset($_SESSION['User'])){
header("Location:../page/connexion.php");
}
if ($_SESSION['User']['profile']!="ADMIN"){
  header("Location:../page/connexion.php");
}
require('../DBTransaction.php');
$transaction = new DBTransaction();
$msg = "";
if(isset($_POST) && isset($_POST['click'])){
  $nomComplet=$_POST['nomComplet'];
  $email=$_POST['email'];
  $pwd=$_POST['pwd'];
  $profile=$_POST['profile'];
$result = $transaction->inscription($nomComplet,$email,$pwd,$profile);

if($result==0){
  $msg= "Donnees invalide";
}else{
  $msg= "Creer avec Success";
  header("location: listboutiquier.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Boutiquier</title>
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
          <a class="nav-link active" href="../produits/listproduit.php"><i class="bi bi-cart4"></i> Produit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="commandeclient.php"><i class="bi bi-cart-check-fill"></i> Commandes clients</a>
        </li>
        <li class="nav-item">
        < if (isset($_SESSION['User']) && isset($_SESSION['User']['profile']) && $_SESSION['User']['profile'] != 'admin') : ?>
          <a class="nav-link" href="listboutiquier.php"><i class="bi bi-person-check-fill"></i> Utilisateurs</a>
         < endif; ?>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../page/deconnection.php"><i class="bi bi-box-arrow-right"></i> Se deconnecte</a>
        </li>
      </ul>
    </div>
  </div>
</nav>-->

<form action="ajoutboutiquier.php" method="POST" class="row g-3 boutiquierform">
  <?=$msg?>
  <div class="col-md-6">
    <label for="nomComplet" class="form-label">NomComplet</label>
    <input name="nomComplet" type="texte" class="form-control" id="Nom" required> 
  </div>
  <div class="col-md-6">
    <label for="Email" class="form-label">Email</label>
    <input name="email"type="email" class="form-control" id="Téléphone"required>
  </div>
  <div class="col-md-6">
    <label for="password" class="form-label">Password</label>
    <input name="pwd" type="password" class="form-control" id="password"required>
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">Profil</label>
    <select name="profile" id="inputState" class="form-select">
      <option selected>Choisissez un profil</option>
      <option value=ADMIN>ADMIN</option>
      <option value=BOUTIQUIER>BOUTIQUIER</option>
      <option value=CLIENT>CLIENT</option>
    </select>
  </div>
  <div class="col-12">
    <button name="click" type="submit" class="btn btn-primary">ajouter</button>
    <a href="listboutiquier.php" class="btn btn-danger">Annuler</a>
  </div>
</form> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>