<?php
session_start();
require_once 'classes/Panier.php';
require_once 'classes/Commande.php';

if (!isset($_POST['id_commande']))
  header("location: index.php");

$panier = new Panier();
$commande = new Commande();
$commandes = $commande->get($_POST['id_commande']);
$total = 0;


if (!isset($_SESSION['id_client']))
  header("location: conx-insc.php");

require_once 'classes/Client.php';
if (isset($_SESSION['id_client'])) {
  $client = new Client();
  $c = $client->get($_SESSION['id_client']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="public/css/lignecommande.css">
  <title>E-SHOP</title>
</head>

<body>
  <header>
    <nav class="header-top">
      <div class="container">
        <p>La première boutique gaming qui offre des produits sous License officielle</p>

        <ul class="navbar">
          <li><a href="contact.php">Contact</a></li>
          <li><a href="table.php"><?php if (!isset($_SESSION['id_client'])) echo 'Mon Compte';
                                  else echo $c['prenom'] . ' ' . $c['nom']; ?></a></li>
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
  <div class="clon container ">

    <h1 class="container"><a href="index.php">Accueil</a> <img src="public/images/right-arrow.svg" alt="" class="icon"> <a href="table.php">Mon Compte</a> <img src="public/images/right-arrow.svg" alt="" class="icon"> <a href="commande.php">Commandes</a></h1>

    <nav class="info">
      <ul>
        <li class="art">
          <a href="table.php">Tableau de bord</a>
        </li>
        <li class="art">
          <a href="commande.php">Commandes</a>
        </li>
        <li class="art">
          <a href="compte.php">Détails du compte</a>
        </li>
        <li class="art">
          <a href="deconnexion.php">Déconnexion</a>
        </li>
      </ul>
    </nav>
    <div class="containe">
      <table>
        <thead>
          <tr>
            <th>Produit</th>
            <th>Total</th>
          </tr>
        </thead>
        <?php while ($cmd = $commandes->fetch()) : ?>
          <?php //echo "La commande n° " .$cmd['id']. "  a été passée le  " .$cmd['date']. "  et est actuellement  " .$cmd['status']. ".";
          ?>

          <tbody>
            <tr>
              <td><?= $cmd['nom'] ?><span class="qty"> x <?= $cmd['qty'] ?></span></td>
              <td><?= number_format($cmd['total_produit'], 2, '.', ' ') ?> MAD</td>
            </tr>
          </tbody>

        <?php endwhile ?>
        <tfoot>
          <tr>
            <th>Mode de paiement</th>
            <td>Paiement à la livraison</td>
          </tr>
          <tr>
            <th>Total</th>
            <td><?= number_format($commande->getTotal($_POST['id_commande']), 2, '.', ' ') ?> MAD</td>
          </tr>
        </tfoot>
      </table>


    </div>
  </div>


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