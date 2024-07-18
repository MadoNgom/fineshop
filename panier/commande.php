<?php
// Suppression de la gestion des sessions comme demandé
require('../DBTransaction.php');
$transaction = new DBTransaction();
$fixedUserId = 1; // ID utilisateur fixe à des fins de démonstration
$commandes = $transaction->getCommandeClient($fixedUserId);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commandes</title>
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
        <li class="nav-item"><a class="nav-link" href="commande.php"><i class="bi bi-list-ul"></i> Commandes</a></li>
        <li class="nav-item"><a class="nav-link active" href="../produits/listproduit.php"><i class="bi bi-cart4"></i> Produit</a></li>
        <li class="nav-item"><a class="nav-link" href="../commande/commandeclient.php"><i class="bi bi-cart-check-fill"></i> Commandes clients</a></li>
      </ul>
    </div>
  </div>
</nav>-->
<div class="container-fluid">
  <table action="commande.php" method="POST" class="table commandelist">
    <thead class="table-dark">
      <tr>
        <th>Date</th>
        <th>Montant Total</th>
        <th>État</th>
        <th>Détail</th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach ($commandes as $key => $commande) { ?>
        <tr>
          <td><?= $commande['date'] ?></td>
          <td><?= $commande['montantTOT'] ?> CFA</td>
          <td><?= $commande['etat'] ?></td>
          <td><a href="detailCommande.php?idcommande=<?= $commande['id'] ?>"><i class="bi bi-eye-fill"></i></a></td>
        </tr>
    <?php } ?>
    </tbody>
  </table>
</div><br><br>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
