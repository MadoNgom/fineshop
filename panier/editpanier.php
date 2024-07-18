<?php
// CA permet de securiser
//session_start();
// $_SESSION['user']=user connecter toujour
//if (!isset($_SESSION['User'])){
//header("Location:../page/connexion.php");
//}
require('../DBTransaction.php');
$transaction = new DBTransaction();
$produit = $transaction->getPanierById($_GET['idproduit']);
if(isset($_POST) && isset($_POST['click'])){
  $nbr=$_POST['nbr'];
  $montantTOT=$produit['montantTOT']*$nbr;
  $transaction->updateNbrPanier($produit['id'],$nbr,$montantTOT);
  $transaction->updatePanier($produit['id_panier'],$montantTOT);
  header('location:panier.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editPanier</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/styles/form.css">
    <link rel="stylesheet" href="../assets/styles/list.css">
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
          <a class="nav-link active" href="panier.php"><i class="bi bi-cart4"></i>Panier</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="commande.php"><i class="bi bi-list-ul"></i>Commandes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../produits/listproduit.php"><i class="bi bi-cart4"></i> Produit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../commande/commandeclient.php"><i class="bi bi-cart-check-fill"></i> Commandes clients</a>
        </li>
        <li class="nav-item">
          <php if (isset($_SESSION['User']) && isset($_SESSION['User']['profile']) && $_SESSION['User']['profile'] != 'admin') : ?>
            <a class="nav-link" href="../users/listboutiquier.php"><i class="bi bi-person-check-fill"></i> Utilisateurs</a>
          <php endif; ?>
        </li>
      </ul>
    </div>
  </div>
</nav>-->

<form action="editpanier.php?idproduit=<?=$produit['id']?>" method="POST" class="row g-3 boutiquierform">
  <div class="col-md-6">
    <label for="nbr" class="form-label">Quantité</label>
    <input name="nbr" value="<?=$produit['nbr']?>" type="number" class="form-control" id="nbr"required>
  </div>
  <div class="col-12">
    <button name="click" type="submit" class="btn btn-primary">Modifier</button>
  </div>
</form><br><br>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>