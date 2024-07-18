<?php
session_start();
require('../DBTransaction.php');

$transaction = new DBTransaction();
$produitsHomme = $transaction->getALLproductByHomme();

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

<section>
        <div class="container-fluid">
            <div class="row">
            <?php foreach ($produitsHomme as $produit) : ?>
                <div class="col-md-4">
                    <div class="d-flex justify-content-center align-items-center">
                        <div>
                            <img src="../assets/image/<?= htmlspecialchars($produit['image']) ?>" height="150px" alt="">
                            <h4 class="title">
                            <?= htmlspecialchars($produit['nom']) ?>
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
                                    <span class="text-warning"><?= htmlspecialchars($produit['prixU']) ?></span> <br>
                                </div>
                                <a href="#"><i class="bi bi-cart4 text-black fs-5"></i></a>
                            </div>
                            <a class="btn btn-danger" href="../panier/ajoutPanier.php?idProduit=<?= $produit['id'] ?>">Ajouter au Panier</a>
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
