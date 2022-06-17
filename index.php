<?php
session_start();

require_once 'classes/Panier.php';
require_once 'classes/Produit.php';

$panier = new Panier();
$produit = new Produit();

$popularProducts = $produit->getPopularProducts();
$popularProduct = $produit->getPopularProduct();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" href="public/images/logo.png" />
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="public/css/index.css">
  <title>E-SHOP</title>
</head>

<body onload="restoreScrollPos()">
  <header>
    <nav class="header-top">
      <div class="container">
        <p>La première boutique gaming qui offre des produits sous License officielle</p>

        <ul class="navbar">
          <li><a href="contact.php">Contact</a></li>
          <li><a href="<?php if (isset($_SESSION['id_client'])) echo 'table.php';
                        else echo 'conx-insc.php'; ?>">Mon Compte</a></li>
        </ul>
      </div>
    </nav>

    <div class="header-bottom">
      <div class="container">
        <div class="logo">
          <a href="index.php">E-<span style="color: #CA2E55;">SHOP</span></a>
        </div>

        <form class="search" action='produits.php'>
          <input type="text" name="search" placeholder="Rechercher un produit" autocomplete='off'>
          <button type="submit" name="submit">
            <img src="public/images/search.svg" alt="search">
          </button>
        </form>
        <div class="account">

        </div>
        <div class="cart">
          <a href="#"><img src="public/images/account.png" alt="account" class="account"></a>
          <a href="panier.php"><img src="public/images/cart.svg" alt="cart"><span><?= $panier->getNbrProduit() ?></span></a>
        </div>
      </div>
    </div>
  </header>


  <div class="banner">
    <div class="container">
      <div class="left">
        <h2 class="banner-title"><?= $popularProduct['nom'] ?></h2>
        <p class="price"><?= $popularProduct['prix'] ?> MAD</p>
        <button class="buy-now"><a style="color: white;" href="produit.php?id=<?= $popularProduct['id'] ?>">Buy Now</a></button>
      </div>
      <div class="right">
        <img src="uploads/<?= $popularProduct['image'] ?>" alt="">
      </div>
    </div>
  </div>

  <div class="categories">
    <h2 class="heading">Nos principales catégories</h2>

    <div class="container">
      <a class="categorie" href="produits.php?categorie=1">
        <img src="public/images/laptop.png" alt="">
        <p>Laptops</p>
      </a>
      <a class="categorie" href="produits.php?categorie=2">
        <img src="public/images/graphic-card.png" alt="">
        <p>Composants</p>
      </a>
      <a class="categorie" href="produits.php?categorie=3">
        <img src="public/images/keyboard.png" alt="">
        <p>Périphériques PC</p>
      </a>
    </div>
  </div>

  <div class="produits">
    <h2 class="heading">Produits populaires <a href="produits.php"> Tout les produits</a></h2>
    <div class="grid container">
      <?php while ($produit = $popularProducts->fetch()) : ?>
        <form class="produit" method="get" action="ajoutpanier.php">
          <a href="produit.php?id=<?= $produit['id'] ?>"><img src="uploads/<?= $produit['image'] ?>" alt=""></a>
          <p><a href="produit.php?id=<?= $produit['id'] ?>"><?= $produit['nom'] ?></a></p>
          <span><?= $produit['prix'] ?> MAD</span>
          <input type="hidden" value="<?= $produit['id'] ?>" name="id_produit" />
          <?php if ($produit['stock'] > 0) : ?>
            <?php if ($panier->exists($produit['id'])) : ?>
              <a href="panier.php"><button type="button">Voir le panier</button></a>
            <?php else : ?>
              <button type="submit" onclick="setScroll()" name="ajoutpanier">Ajouter au panier</button>
            <?php endif; ?>
          <?php else : ?>
            <button type="submit" onclick="setScroll()" disabled>Ajouter au panier</button>
          <?php endif; ?>


        </form>
      <?php endwhile ?>
    </div>

  </div>



  <!-- FOOTER -->
  <footer class="footer container">
    <div class="footer__addr">
      <h1 class="footer__logo">E-SHOP</h1>

      <h2>Contact</h2>

      <address>
        5534 Somewhere In. The World 22193-10212<br>

        <a class="footer__btn" href="mailto:example@gmail.com">Email Us</a>
      </address>
    </div>

    <ul class="footer__nav">
      <li class="nav__item">
        <h2 class="nav__title">Media</h2>

        <ul class="nav__ul">
          <li>
            <a href="#">Online</a>
          </li>

          <li>
            <a href="#">Print</a>
          </li>

          <li>
            <a href="#">Alternative Ads</a>
          </li>
        </ul>
      </li>

      <li class="nav__item nav__item--extra">
        <h2 class="nav__title">Technology</h2>

        <ul class="nav__ul nav__ul--extra">
          <li>
            <a href="#">Hardware Design</a>
          </li>

          <li>
            <a href="#">Software Design</a>
          </li>

          

        
        </ul>
      </li>

     
        </ul>
      </li>
    </ul>

    <div class="legal">
      <p>&copy; 2019 Something. All rights reserved.</p>

      <div class="legal__links">
        <span>Made with <span class="heart">♥</span> remotely from Anywhere</span>
      </div>
    </div>
  </footer>
  <script src="public/js/ajoutpanier.js"></script>
</body>

</html>