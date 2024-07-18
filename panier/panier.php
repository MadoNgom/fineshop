<?php
require('../DBTransaction.php');
$transaction = new DBTransaction();
$fixedUserId = 1; // ID utilisateur fixe à des fins de démonstration

$panier = $transaction->getClientPanier($fixedUserId);
if ($panier === null) {
  $transaction->createPanier(0, $fixedUserId);
  $panier = $transaction->getClientPanier($fixedUserId);
}

// Vérifier si $panier est bien un tableau avant d'accéder à ses éléments
if ($panier && is_array($panier)) {
    $produitsPanier = $transaction->getProduitPanier($panier['id']);
} else {
    $produitsPanier = [];
}

if (isset($_GET['action'])) {
  $result = $transaction->createCommande(date('Y/m/d'), $panier['montantTOT'], "EN COURS", $fixedUserId);
  if ($result == 1) {
    $commandes = $transaction->getCommandeClient($fixedUserId);
    foreach ($produitsPanier as $key => $value) {
      $transaction->createProduitCommande($commandes[0]['id'], $value['id_produit'], $value['nbr'], $value['montantTOT']);
    }
    $transaction->resetPanier($panier['id']);
    $transaction->updatePanier($panier['id'], 0);
    header('Location: commande.php');
  }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/styles/list.css">
    <link rel="stylesheet" href="../assets/styles/nave.css">
</head>
<body>
    <?php
    require('../page/header.php');
    ?>
<!--<nav class="navbar navbar-expand-lg bg-white">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="../assets/image/logoo.png" class="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" aria-current="page" href="../index.php"><i class="bi bi-house-door-fill"></i> Accueil</a></li>
        <li class="nav-item"><a class="nav-link active" href="panier.php"><i class="bi bi-cart4"></i> Panier</a></li>
        <li class="nav-item"><a class="nav-link" href="../panier/commande.php"><i class="bi bi-list-ul"></i> Commandes</a></li>
        <li class="nav-item"><a class="nav-link active" href="../produits/listproduit.php"><i class="bi bi-cart4"></i> Produit</a></li>
        <li class="nav-item"><a class="nav-link" href="../commande/commandeclient.php"><i class="bi bi-cart-check-fill"></i> Commandes clients</a></li>
      </ul>
    </div>
  </div>
</nav>-->

<div class="container-fluid">
  <table action="panier.php" method="POST" class="table panierlist">
    <thead class="table-dark">
      <tr>
        <th>Nom</th>
        <th>Prix Unitaire</th>
        <th>Quantité</th>
        <th>Montant Total</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $valeurT = 0;
    if (is_array($produitsPanier) && count($produitsPanier) > 0) {
        foreach ($produitsPanier as $key => $produitPanier) {
          $nombre = $produitPanier['nbr'];
          $pU = $produitPanier['prixU'];
          $pT = $nombre * $pU;
    ?>
      <tr>
        <td><?= $produitPanier['nom'] ?></td>
        <td><?= $produitPanier['prixU'] ?></td>
        <td><?= $produitPanier['nbr'] ?></td>
        <td><?= $pT ?> CFA</td>
        <td class="img"><img src="../assets/image/<?= $produitPanier['image'] ?>" class="card-img-top" alt="..."></td>
        <td class="text-success"><a href="editpanier.php?idproduit=<?= $produitPanier['id'] ?>"><i class="bi bi-pencil-square"></i></a></td>
        <td class="text-danger"><a href="deletepanier.php?idproduit=<?= $produitPanier['id'] ?>"><i class="bi bi-trash"></i></a></td>
      </tr>
    <?php
          $valeur = $pT;
          $valeurT += $valeur;
        }
    }
    ?>
    </tbody>
  </table>
</div>
<div class="totalM">
  <div class="montantT">
    <p>Montant Total: <?= $valeurT ?> CFA</p>
  </div>
  <div class="butunV">
    <a class="btn btn-outline-info" href="panier.php?action=valider&montant=<?= $valeurT ?>">Valider</a>
  </div>
</div><br><br>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
