<?php
session_start();
// $_SESSION['user']=user connecter toujour
if (!isset($_SESSION['User'])){
header("Location:../page/connexion.php");
}
if ($_SESSION['User']['profile']!="BOUTIQUIER"){
 header("Location:../page/connexion.php");
}
require('../DBTransaction.php');
$transaction = new DBTransaction();
$id_boutiquier = $_SESSION['User']['id'];
$produits = $transaction->getProductByIdBoutiquier($id_boutiquier);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listes des produits</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/styles/list.css">
    <link rel="stylesheet" href="../assets/styles/nave.css">
</head>
<body>
    <?php
    require('../page/header.php');
    ?>
<a href="ajoutproduit.php" class="btn btn-dark mb-3 test-class">Add New</a>
<!--<div class="container-fluid listproduit">
<div class="row">
  <php foreach($produits as $key =>$produit){ ?>
  <div class="card" style="width: 18rem;">
   <img src="../assets/image/<=$produit['image']?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h4 class="card-title"><=$produit['nom']?></h4>
     <p  text-align ="center"  class="card-text"><=$produit['description']?>
     <p><span class="prixU"><=$produit['prixU']?> cfa</span></p>
       <div class="col-md-12">
           <a class="btn btn-outline-success" href="editproduit.php?idproduit=<=$produit['id']?>"><i class="bi bi-pencil-square"></i></a>
           <a class="btn btn-outline-danger" href="deleteproduit.php?idproduit=<=$produit['id']?>"><i class="bi bi-trash"></i></a>
        </div>
     </div>
    </div>
  <php } ?>
</div>
</div>-->

<section>
        <div class="container-fluid">
            <div class="row">
            <?php foreach ($produits as $key => $produit) : ?>
                <div class="col-md-4">
                    <div class="d-flex justify-content-center align-items-center">
                        <div>
                            <img src="../assets/image/<?= $produit['image'] ?>" height="150px" alt="">
                            <h4 class="title">
                            <?= $produit['nom'] ?>
                            </h4>
                            <div class="rating text-warning">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                            </div>
                            <div class="d-flex my-3">
                                <a href="#"><i class="bi bi-heart text-black fs-5"></i></a>
                                <div class="mx-3">
                                    <span class="text-warning"><?= $produit['prixU'] ?></span> <br>
                                </div>
                                <a href="#"><i class="bi bi-cart4 text-black fs-5"></i></a>
                            </div>
                            <a class="btn btn-outline-success" href="editproduit.php?idproduit=<?=$produit['id']?>"><i class="bi bi-pencil-square"></i></a>
                            <a class="btn btn-outline-danger" href="deleteproduit.php?idproduit=<=$produit['id']?>"><i class="bi bi-trash"></i></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                </div>
        </div>
    </section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>