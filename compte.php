<?php
session_start();
require_once 'classes/Client.php';
require_once 'classes/Panier.php';

$panier = new Panier();

if (!isset($_SESSION['id_client']))
  header("location: conx-insc.php");

$client = new Client();

if (isset($_POST['submit'])) {
  $client = new Client($_POST['email'], $_POST['mdp'], $_POST['nom'], $_POST['prenom'], $_POST['adresse1'], $_POST['adresse2']);
  $client->miseajour($_SESSION['id_client']);
}

$infoClient = $client->get($_SESSION['id_client']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="public/css/compte.css">
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
                                  else echo $infoClient['prenom'] . ' ' . $infoClient['nom']; ?></a></li>
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
    <h1 class="container"><a href="index.php">Accueil</a> <img src="public/images/right-arrow.svg" alt="" class="icon"> <a href="table.php">Mon Compte</a> <img src="public/images/right-arrow.svg" alt="" class="icon"> <a href="compte.php">Détails du compte</a></h1>

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


    <form class="containe" action="" method="POST">
      <p>
        <label for="fname">Nom</label>
        <input type="text" id="fname" name="nom" placeholder="saisir votre nom" value="<?= $infoClient['nom'] ?>">
      </p>
      <p>
        <label for="lname">Prénom</label>
        <input type="text" id="lname" name="prenom" placeholder="saisir votre prénom" value="<?= $infoClient['prenom'] ?>">
      </p>
      <p>
        <label for="mail">E-mail</label>
        <input type="text" id="mail" name="email" placeholder="saisir votre mail" value="<?= $infoClient['email'] ?>" required>
      </p>
      <p>
        <label for="map1">Adresse 1</label>
        <input type="text" id="map1" name="adresse1" placeholder="saisir votre adresse" value="<?= $infoClient['adresse_1'] ?>" required>
      </p>
      <p>
        <label for="map2">Adresse 2</label>
        <input type="text" id="map2" name="adresse2" placeholder="saisir votre adresse" value="<?= $infoClient['adresse_2'] ?>">
      </p><br>
      <p class="inset">Changement de mot de passe</p>

      <p class="<?php if (array_key_exists('mdp', $client->errors)) echo 'error' ?>">
        <label for="currentpass">Mot de passe actuel</label>
        <input type="password" id="currentpass" name="mdp" placeholder="saisir votre mot de passe actuel">
        <?php if (array_key_exists('mdp', $client->errors)) :  ?>
      <p class="error-message"><?= $client->errors['mdp'] ?></p>
    <?php endif; ?>
    </p>
    <p class="<?php if (array_key_exists('mdp1', $client->errors)) echo 'error' ?>">
      <label for="pass1">Nouveau mot de passe</label>
      <input type="password" id="pass1" name="mdp1" placeholder="saisir le nouveau mot de passe">

    </p>
    <p class="<?php if (array_key_exists('mdp1', $client->errors)) echo 'error' ?>">
      <label for="pass2">Confirmer le nouveau mot de passe</label>
      <input type="password" id="pass2" name="mdp2" placeholder="Confirmer le nouveau mot de passe">
      <?php if (array_key_exists('mdp1', $client->errors)) :  ?>
    <p class="error-message"><?= $client->errors['mdp1'] ?></p>
  <?php endif; ?>
  </p><br>
  <input type="submit" value="Enregistrer les modifications" name="submit">


    </form>
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