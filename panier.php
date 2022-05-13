<?php
session_start();

require_once 'classes/Panier.php';
$panier = new Panier();
$paniers = $panier->get();

$total = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="icon" href="public/images/logo.png" />
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="public/css/panier.css">
  <title>E-SHOP</title>
</head>

<body>
  <!-- Header de la page -->
  <header>
    <nav class="header-top">
      <div class="container">
        <p>La première boutique gaming qui offre des produits sous License officielle</p>

        <ul class="navbar">
          <li><a href="contact.php">Contact</a></li>
          <li><a href="conx-insc.php">Mon Compte</a></li>
        </ul>
      </div>
    </nav>

    <div class="header-bottom">
      <div class="container">
        <div class="logo">
          <a href="index.php">E-<span style="color: #CA2E55;">SHOP</span></a>
        </div>

        <form class="search">
          <input type="text" name="search" placeholder="Rechercher un produit">
          <button type="submit" name="submit">
            <img src="public/images/search.svg" alt="search">
          </button>
        </form>
        <div class="account">

        </div>
        <div class="cart">
          <a href="#"><img src="public/images/account.png" alt="account" class="account"></a>
          <a href="panier.php"><img src="public/images/cart.svg" alt="cart"><span>2</span></a>
        </div>
      </div>
    </div>
  </header>
  <!-- fin header  -->
  <!-- body du page  -->
  <h1 class="container"><a href="index.php">Accueil</a> <img src="public/images/right-arrow.svg" alt="" class="icon"> <a href="panier.php">Panier</a> </h1>

  <div class="container cart-page">
    <form action='miseajourPanier.php' method='POST'>
      <?php if (!$panier->estVide()) : ?>
        <table>
          <tr>
            <th></th>
            <th>Produit</th>
            <th>Quantité</th>
            <th>Sous-total</th>
          </tr>
          <tbody>

            <?php while ($panier = $paniers->fetch()) : ?>
              <tr>
                <td><a href="supprimerPanier.php?id_produit=<?= $panier['id'] ?>"><img src="public/images/cross.svg" alt="" class="icon"></a></td>
                <td>
                  <div class="cart-info">

                    <img src="uploads/<?= $panier['image'] ?>" alt="" class="photo">
                    <div class="info-product">
                      <p><?= $panier['nom'] ?></p>
                      <small>Price: <?= number_format($panier['prix'], 2, '.', ' ');  ?> MAD</small><br>
                    </div>
                  </div>
                </td>
                <td><input required type="number" name="qty[<?= $panier['id'] ?>]" min="1"  max="<?= $panier['stock'] ?>" value="<?php
                                                                                          if (isset($_SESSION['id_client']))
                                                                                            echo $panier['qty'];
                                                                                          else
                                                                                            echo $_SESSION['panier'][$panier['id']]; ?>"></td>
                <td><?php if (isset($_SESSION['id_client'])) {
                      $sous_total = $panier['prix'] * $panier['qty'];
                      $total += $sous_total;
                      echo number_format($sous_total, 2, '.', ' ');
                    } else {
                      $sous_total = $panier['prix'] * $_SESSION['panier'][$panier['id']];
                      $total += $sous_total;
                      echo number_format($sous_total, 2, '.', ' ');
                    }
                    ?> MAD</td>
              </tr>
            <?php endwhile ?>

          </tbody>
        </table>
        <!-- boutton de validation de commande -->
        <div class="actions">
          <div class="btn-group">
            <button type="submit" name="submit" class="boutton boutton1">Mettre à jour le panier</button>
            <button class="boutton boutton2">Valider la commande </button>

          </div>
    </form>
    <!-- section total  -->
    <div class="total">
      <p><span>Total panier: </span><?= number_format($total, 2, '.', ' ') ?> MAD</p>

    </div>
  </div>

  </div>
<?php else : ?>
  <h3 class='panier-vide'>Votre panier est actuellement vide.</h3>
<?php endif ?>

<!-- footer de la page -->
<footer class="footer">
  <div class="footer__addr">
    <h1 class="footer__logo">Something</h1>

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

        <li>
          <a href="#">Digital Signage</a>
        </li>

        <li>
          <a href="#">Automation</a>
        </li>

        <li>
          <a href="#">Artificial Intelligence</a>
        </li>

        <li>
          <a href="#">IoT</a>
        </li>
      </ul>
    </li>

    <li class="nav__item">
      <h2 class="nav__title">Legal</h2>

      <ul class="nav__ul">
        <li>
          <a href="#">Privacy Policy</a>
        </li>

        <li>
          <a href="#">Terms of Use</a>
        </li>

        <li>
          <a href="#">Sitemap</a>
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
<script src="js/jquery.js"></script>
</body>

</html>