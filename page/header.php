<?php
if (session_status() === PHP_SESSION_NONE) {
   session_start();
}
require('roles.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>
   <header class="bg-dark text-white shadow sticky-top py-2">
      <div class="container-fluid">
         <div class="d-flex justify-content-between align-items-center">
            <!-- FIRST ROW -->
            <div class=" d-none d-sm-none d-md-block">
               <div class="nav-brand d-flex justify-content-center lign-items-center">
                  <h4 class="nav-brand mx-2">
                     Finshop
                  </h4>
                  <img src="assets/image/logo.png" alt="">
               </div>
            </div>
            <!-- SEARCH BAR -->
            <div class=" my-auto">
               <form action="" role="Search">
                  <div class="form-group d-flex my-2">
                     <input type="search" placeholder="Rechercher un produit" class="form-control">
                     <button type="submit" class="btn bg-danger text-white mx-1">
                        <i class="bi bi-search"></i>
                     </button>
                  </div>
               </form>
            </div>
            <div class=" my-auto">
               <ul class="nav  justify-content-end">
                  <div class="dropdown show">
                     <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                     </a>

                     <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Home</a>
                        <a class="dropdown-item" href="#">Femmes</a>
                        <a class="dropdown-item" href="#">Nouveles Arrivages</a>
                     </div>
                  </div>
                  <li class="nav-item">
                     <a href="../panier/panier.php" class="nav-link text-white">
                        <i class="bi bi-cart4"></i> Panier
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link text-white" href="../panier/commande.php"><i class="bi bi-basket2-fill"></i> Commandes</a>

                     <?php if (isBoutiquier()) : ?>
                  <li class="nav-item">
                     <a class="nav-link text-white" href="produits/listproduit.php"><i class="bi bi-cart4"></i> Produits</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link text-white" href="Categorie/read.php"><i class="bi bi-cart4"></i> Categories</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link text-white" href="commande/commandeclient.php"><i class="bi bi-cart4"></i> Commande des clients</a>
                  </li>
               <?php endif; ?>

               <?php if (isAdmin()) : ?>
                  <li class="nav-item">
                     <a class="nav-link text-white" href="users/listboutiquier.php">
                        <i class="bi bi-heart"></i> gestion utilisateurs
                     </a>
                  </li>
               <?php endif; ?>
               <li class="nav-item">
                  <?php
                  if (!isLogin()) :
                  ?>
                     <a class="btn btn-danger" href="/fineShop/page/connexion.php">

                        <i class="bi bi-person-fill"></i> connexion
                     </a>
                  <?php else : ?>
                     <a class="btn btn-danger" href="/fineShop/page/deconnection.php">
                        <i class="bi bi-person-fill"></i> Déconnexion
                     </a>
                  <?php endif; ?>
               </li>
               <a class="navbar-brand  nav-link text-white d-block d-sm-block d-md-none d-lg-none" href="#">
                  Finshop
               </a>
               </ul>
            </div>
         </div>
         <nav class="navbar navbar-expand-lg">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                     <a class="nav-link text-white" href="../index.php">Home</a>
                  </li>
                  <li class="nav-item ">
                     <a class="nav-link text-white" href="#">All Categories</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link text-white" href="page/categorieByHomme.php"> Hommes</a>
                  </li>

                  <li class="nav-item">
                     <a class="nav-link text-white" href="page/categorieByFemme.php">Femmes</a>
                  </li>
               </ul>
            </div>
         </nav>
      </div>
   </header>
   <!-- jS LINK -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>

</html>