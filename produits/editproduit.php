<?php
session_start();
if (!isset($_SESSION['User'])) {
    header("Location:../page/connexion.php");
    exit;
}
if ($_SESSION['User']['profile'] != "BOUTIQUIER") {
    header("Location:../page/connexion.php");
    exit;
}
require('../DBTransaction.php');
$transaction = new DBTransaction();
$produit = $transaction->getProductById($_GET['idproduit']);

if (!$produit) {
    die("Produit non trouvé");
}

if (isset($_POST) && isset($_POST['click'])) {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prixU = $_POST['prixU'];
    $result = $transaction->updateproduit($produit['id'], $nom, $description, $prixU);
    header('location:listproduit.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produit</title>
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

<form action="editproduit.php?idproduit=<?=$produit['id']?>" method="POST" enctype="multipart/form-data" class="row g-3 boutiquierform">
  <div class="col-md-6">
    <label for="Nom" class="form-label">Nom</label>
    <input name="nom" value="<?=$produit['nom']?>" type="text" class="form-control" id="Nom">
  </div>
   <div class="mb-3">
     <label for="exampleFormControlTextarea1" class="form-label">Description</label>
     <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"><?=$produit['description']?></textarea>
   </div>
   <div class="col-md-6">
   <label for="prixU" class="form-label">Prix Unitaire</label>
    <input name="prixU" value="<?=$produit['prixU']?>" type="number" class="form-control" id="prixU">
  </div>
   <div class="mb-3">
      <label for="formFile" class="form-label">Image du produit</label>
      <input name="image" class="form-control" type="file" id="formFile">
  </div>
  <div class="col-12">
    <button name="click" type="submit" class="btn btn-primary">Modifier</button>
    <a href="listproduit.php" class="btn btn-danger">Annuler</a>
  </div>
</form><br><br>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
