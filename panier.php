<?php
session_start();

require_once 'classes/Panier.php';

$panier = new Panier();

$total = 0;

require_once 'classes/Client.php';
if(isset($_SESSION['id_client']))
{
  $client = new Client();
  $c = $client->get($_SESSION['id_client']);
}

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
          <li><a href="<?php if (isset($_SESSION['id_client'])) echo 'table.php';
                        else echo 'conx-insc.php'; ?>"><?php if (!isset($_SESSION['id_client'])) echo 'Mon Compte'; else echo $c['prenom'] . ' ' . $c['nom']; ?></a></li>
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
  <!-- fin header  -->
  <!-- body du page  -->
  <h1 class="container"><a href="index.php">Accueil</a> <img src="public/images/right-arrow.svg" alt="" class="icon"> <a href="panier.php">Panier</a> </h1>

  <div class="container cart-page">
    <?php if (!$panier->estVide()) :
      $paniers = $panier->get();
    ?>
      <form action='miseajourPanier.php' method='POST'>


        <table>
          <tr>
            <th colspan="2">Produit</th>
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
                <td><input required type="number" name="qty[<?= $panier['id'] ?>]" min="1" max="<?= $panier['stock'] ?>" value="<?php
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
                <button class="boutton boutton2"> 
                <a href="validation.php">Valider la commande</a>
                </button>
          </div>
      </form>
      <!-- section total  -->
      <div class="total">
        <p><span>Total panier: </span><?= number_format($total, 2, '.', ' ') ?> MAD</p>

      </div>
    </div>
    <?php else : ?>
      <h3 class='panier-vide'>Votre panier est actuellement vide.</h3>
    <?php endif ?>
  </div>



  <!-- footer de la page -->
  <footer>
    <div class="container">
      <div class="presentation">
        <p>La boutique e-shop est un lieu où des experts de l’informatique et du high-tech conseillent et orientent les clients marocains. C’est également un espace où nous créons des machines sur-mesure et réparent des produits. Atlas Gaming est la première boutique gaming qui offre des produits sous License officielle provenant des plus grandes marques de gaming au monde. Cela, afin de garantir une qualité exceptionnelle, des produits authentiques sous garantie fabriquant et des prix imbattables.</p>
      </div>
      <div class="columns">
        <div class="footer-col">
          <h4>catégories</h4>
          <ul>
            <li><a href="produits.php?categorie=1">Laptops</a></li>
            <li><a href="produits.php?categorie=2">Composants</a></li>
            <li><a href="produits.php?categorie=3">Périphériques PC</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Espace clients</h4>
          <ul>
            <li><a href="<?php if (isset($_SESSION['id_client'])) echo 'table.php';
                          else echo 'conx-insc.php'; ?>">Mon compte</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </div>
      </div>

    </div>
    <div class="copyright">
      <p class="container">2022 © E-SHOP - All Rights Reserved</p>
    </div>
  </footer>

</body>

</html>