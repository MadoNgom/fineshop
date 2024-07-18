<?php
session_start();
require('DBTransaction.php');
$transaction = new DBTransaction();
$produits = $transaction->getAllProduct();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finshop Store</title>
    <!-- BOOSTRAP Icons link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- BOOSTRAP CDN LINK -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="assets/styles/list.css"> -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <?php
    require('./page/header.php');
    ?>
    <!-- SHOW CASE SECTION -->
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center py-2">
            <div class="col-md-6 mt-0 slogan">
                <h2 class="mt-0 title">Brand NEW NIKE <br> COLLECTION!</h2>
                <h5>Toujours plus D'exclusivités <br>Pour Vous</h5>
                <div>
                    <a href="#" class="btn btn-danger">NOS PRODUITS</a>
                </div>
            </div>
            <div class="col-md-6 image">
                <img src="assets/image/shoes nike.png" class="img-fluid" alt="">
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="grid">
            <img src="assets/image/img5.png" alt="">
            <img src="assets/image/img4.png" alt="">
            <img src="assets/image/img0.png" alt="">
            <img src="assets/image/img1.png" alt="">
            <img src="assets/image/img2.png" alt="">
            <img src="assets/image/img3.png" alt="">

        </div>
    </div>
    <!-- PRODUCT SECTIONS -->
    <section>
        <div class="container-fluid">
            <div class="row">
            <?php foreach ($produits as $key => $produit) : ?>
                <div class="col-md-4">
                    <div class="d-flex justify-content-center align-items-center">
                        <div>
                            <img src="assets/image/<?= $produit['image'] ?>" height="150px" alt="">
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
                            <a class="btn btn-danger" href="panier/ajoutPanier.php?idProduit=<?= $produit['id'] ?>">Ajouter au Panier</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <!--<div class="col-md-4">
                    <div class="d-flex justify-content-center align-items-center">
                        <div>
                            <img src="assets/image/img0.png" width="150px" alt="">
                            <h4 class="title">
                                Nike Air 20
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
                                    <span class="text-warning">20.000 FCFA</span> <br>
                                    <span>25.000 FCFA</span>
                                </div>
                                <a href="#"><i class="bi bi-cart4 text-black fs-5"></i></a>
                            </div>
                            <button class="btn btn-danger">Ajouter au Panier</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex justify-content-center align-items-center">
                        <div>
                            <img src="assets/image/img2.png" height="150px" alt="">
                            <h4 class="title">
                                Nike Air 20
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
                                    <span class="text-warning">20.000 FCFA</span> <br>
                                    <span class="text-black-50"><del>25.000 FCFA</del> </span>
                                </div>
                                <a href="#"><i class="bi bi-cart4 text-black fs-5"></i></a>
                            </div>
                            <button class="btn btn-danger">Ajouter au Panier</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex justify-content-center align-items-center">
                        <div>
                            <img src="assets/image/img3.png" width="150px" alt="">
                            <h4 class="title">
                                Nike Air 20
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
                                    <span class="text-warning">25.000 FCFA</span> <br>
                                    <span><del>35.000 FCFA</del> </span>
                                </div>
                                <a href="#"><i class="bi bi-cart4 text-black fs-5"></i></a>
                            </div>
                            <button class="btn btn-danger">Ajouter au Panier</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex justify-content-center align-items-center">
                        <div>
                            <img src="assets/image/img8.png" width="150px" alt="">
                            <h4 class="title">
                                Nike Air 20
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
                                    <span class="text-warning">35.000 FCFA</span> <br>
                                    <span><del>45.000 FCFA</del> </span>
                                </div>
                                <a href="#"><i class="bi bi-cart4 text-black fs-5"></i></a>
                            </div>
                            <button class="btn btn-danger">Ajouter au Panier</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex justify-content-center align-items-center">
                        <div>
                            <img src="assets/image/img4.png" width="150px" alt="">
                            <h4 class="title">
                                Nike Air 20
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
                                    <span class="text-warning">50.000 FCFA</span> <br>
                                    <span><del>55.000 FCFA</del> </span>
                                </div>
                                <a href="#"><i class="bi bi-cart4 text-black fs-5"></i></a>
                            </div>
                            <button class="btn btn-danger">Ajouter au Panier</button>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </section>

    <section>
        <div class="container py-3">
            <div class="grid-container">
                <div class="card-item bg-dark">
                    <div class="imgBx">
                        <img src="assets/image/image1.png" alt="nike-air-shoe" height="150px">
                    </div>

                    <div class="contentBx">

                        <h2>Nike Shoes</h2>

                        <div class="size">
                            <h3>Size :</h3>
                            <span>7</span>
                            <span>8</span>
                            <span>9</span>
                            <span>10</span>
                        </div>

                        <div class="color">

                            <h3>Color :</h3>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <a href="#">Buy Now</a>
                    </div>

                </div>
                <div class="card-item bg-dark">
                    <div class="imgBx">
                        <img src="assets/image/imgR.png" alt="nike-air-shoe" height="150px">
                    </div>

                    <div class="contentBx">

                        <h2>Nike Shoes</h2>

                        <div class="size">
                            <h3>Size :</h3>
                            <span>7</span>
                            <span>8</span>
                            <span>9</span>
                            <span>10</span>
                        </div>

                        <div class="color">

                            <h3>Color :</h3>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <a href="#">Buy Now</a>
                    </div>

                </div>
                <div class="card-item bg-dark">
                    <div class="imgBx">
                        <img src="assets/image/shoes1.png" alt="nike-air-shoe" height="100px">
                    </div>

                    <div class="contentBx">

                        <h2>Nike Shoes</h2>

                        <div class="size">
                            <h3>Size :</h3>
                            <span>7</span>
                            <span>8</span>
                            <span>9</span>
                            <span>10</span>
                        </div>

                        <div class="color">

                            <h3>Color :</h3>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <a href="#">Add to Cart</a>
                    </div>

                </div>
                <div class="card-item bg-dark">
                    <div class="imgBx">
                        <img src="" alt="nike-air-shoe" height="150px">
                    </div>

                    <div class="contentBx">

                        <h2>Nike Shoes</h2>

                        <div class="size">
                            <h3>Size :</h3>
                            <span>7</span>
                            <span>8</span>
                            <span>9</span>
                            <span>10</span>
                        </div>

                        <div class="color">

                            <h3>Color :</h3>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <a href="#">Buy Now</a>
                    </div>

                </div>
                <div class="card-item bg-dark">
                    <div class="imgBx">
                        <img src="assets/image/shoes1.png" alt="nike-air-shoe" height="150px">
                    </div>

                    <div class="contentBx">

                        <h2>Nike Shoes</h2>

                        <div class="size">
                            <h3>Size :</h3>
                            <span>7</span>
                            <span>8</span>
                            <span>9</span>
                            <span>10</span>
                        </div>

                        <div class="color">

                            <h3>Color :</h3>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <a href="#">Buy Now</a>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <div class=" bg-black my-5">
        <footer class="container-fluid text-white text-center text-lg-start bg-dark">
            <!-- Grid container -->
            <div class="container p-4">
                <!--Grid row-->
                <div class="row mt-4">
                    <!--Grid column-->
                    <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase mb-4">A propos <img src="assets/image/logo.png" alt=""></a></h5>

                        <p>
                        Bienvenue sur FineShop, votre destination ultime pour trouver les dernières tendances en matière de chaussures de qualité.<br> Chez FineShop, nous nous engageons à vous offrir une sélection soigneusement choisie de chaussures qui allient style, confort et qualité.


                        </p>

                        <div class="mt-4">
                            <!-- Facebook -->
                            <img src="assets/image/face.png" width="30px" alt="">
                            <!-- Dribbble -->
                            <img src="assets/image/google.png" width="30px" alt="">
                            <img src="assets/image/insta.png" width="30px" alt="">
                            <img src="assets/image/linkdin.png" width="30px" alt="">

                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase mb-4 pb-1">Rechercher nous</h5>

                        <div class="form-outline form-white mb-4 d-flex">
                            <input type="text" id="formControlLg" class="form-control form-control-lg" placeholder="recherche" />
                            <button type="submit" class="btn btn-danger">Search</button>
                        </div>

                        <ul class="fa-ul" style="margin-left: 1.65em;">
                            <li class="mb-3">
                                <span class="fa-li"><i class="fas fa-home"></i></span><span class="ms-2">Dakar, villa 72, Sénégal</span>
                            </li>
                            <li class="mb-3">
                                <span class="fa-li"><i class="fas fa-envelope"></i></span><span class="ms-2">findshop@gmail.com</span>
                            </li>
                            <li class="mb-3">
                                <span class="fa-li"><i class="fas fa-phone"></i></span><span class="ms-2">+ 22133 567 88 45</span>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase mb-4">Heure d'ouverture</h5>

                        <table class="table text-center text-white rounded-3 shadow">
                            <tbody class="fw-normal">
                                <tr>
                                    <td>Lundi - Jeudi:</td>
                                    <td>8am - 9pm</td>
                                </tr>
                                <tr>
                                    <td>Ven - Dima:</td>
                                    <td>8am - 1am</td>
                                </tr>
                                <tr>
                                    <td>Sunday:</td>
                                    <td>9am - 10pm</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--Grid column-->
                </div>

            </div>


            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2024 Copyright:
                <a class="text-white" href="https://finshop.com/">Finshop.com
            </div>
            <!-- Copyright -->
        </footer>

    </div>
    <!-- End of .container -->
    <!-- Footer -->
    <!-- jS LINK -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>


<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FineShop</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2fXr4" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/nave.css">
    <link rel="stylesheet" href="assets/styles/list.css">
</head>

<body>
    <div class="header">
        <div class="conteneur">
            <div class="slogan">
                <h2>NIKE NEW <br> COLLECTION!</h2>
                <h5>Toujours plus <br> D'exclusivités <br>Pour Vous</h5>
                <div>
                    <a href="#" class="btn btn-outline-danger">NOS PRODUITS</a>
                </div>
            </div>
            <div class="image">
                <img src="assets/image/shoes nike.png" alt="">
            </div>
        </div>
    </div>

    <div class="middle">
        <div class="container listproduit">
            <?php foreach ($produits as $key => $produit) : ?>
                <div class="card" style="width: 18rem;">
                    <img src="assets/image/<?= $produit['image'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $produit['nom'] ?></h5>
                        <p class="card-text"><?= $produit['description'] ?></p>
                        <div class="prix">
                            <p><span class="prixU"><?= $produit['prixU'] ?> cfa</span></p>
                        </div>
                        <div class="col-md-12 cart@">
                            <a class="btn btn-outline-danger" href="panier/ajoutPanier.php?idProduit=<?= $produit['id'] ?>">Acheter</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div><br><br>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-V/8cL6wOimXvKJaczfwfwp6KLiGhP7T6ZwYWFHf7CSfMbmYspvPl5M5Cpjw2GWBF2VfVzpt+T6V
</body>
</html> -->