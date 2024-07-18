<?php
session_start();
// $_SESSION['user']=user connecter toujour
if (!isset($_SESSION) && !isset($_SESSION['User'])){
header("Location:../page/connexion.php");
}
if ($_SESSION['User']['profile']!="ADMIN"){
 header("Location:../page/connexion.php");
}
require('../DBTransaction.php');
$transaction = new DBTransaction();
$users = $transaction->getAlluser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Boutiquier</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/styles/list.css">
    <link rel="stylesheet" href="../assets/styles/user.css">
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
          <a class="nav-link" href="../page/profil.php"><i class="bi bi-person-check-fill"></i>Profil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../produits/listproduit.php"><i class="bi bi-cart4"></i> Produit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../commande/commandeclient.php"><i class="bi bi-cart-check-fill"></i> Commandes clients</a>
        </li>
        <li class="nav-item">
           if (isset($_SESSION['User']) && isset($_SESSION['User']['profile']) && $_SESSION['User']['profile'] != 'admin') : ?>
            <a class="nav-link" href="listboutiquier.php"><i class="bi bi-person-check-fill"></i> Utilisateurs</a>
           endif; ?>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../page/deconnection.php"><i class="bi bi-box-arrow-right"></i> Se deconnecte</a>
        </li>
      </ul>
    </div>
  </div>
</nav>-->

<div class="container">
<a href="ajoutboutiquier.php" class="btn btn-dark mb-3 test-class">Add New</a>

<table action="listboutiquier.php"method="POST" class="table1">
  <thead>
       <tr>
           <th>NomComplet</th>
           <th>Email</th>
           <th>Profile</th>
           <th>Action</th>

       </tr>
  </thead>
  <tbody>
  <?php
      foreach ($users as $key => $user) {?>
         <tr>
               <td><?= $user['nomComplet'] ?></td>
               <td><?= $user['email'] ?></td>
               <td><?= $user['profile'] ?></td>
               <td class="text-success"><a href="editUser.php?idUser=<?=$user['id']?>"><i class="bi bi-pencil-square"></i></a></td>
               <td class="text-danger"><a href="deleteuser.php?iduser=<?=$user['id']?>"><i class="bi bi-trash"></i></a></td>
         </tr>
  <?php } ?>
  </tbody>
</table><br><br>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>