<?php
session_start();
require "classes/Client.php";
require_once 'classes/Panier.php';
$panier = new Panier();

if (isset($_POST['login'])) {
  $client = new Client($_POST['email'], $_POST['mdp']);
  $client->connexion();
}
if (isset($_POST['register'])){
  $client = new Client($_POST['email'], $_POST['mdp'], $_POST['nom'], $_POST['prenom'] );
  $client->inscription();
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" href="public/images/logo.png" />
  <title>E-SHOP</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" href="public/css/conx-insc.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body onload="restoreScrollPos()">
  <!--start header-->
  <header>
    <nav class="header-top">
      <div class="container">
        <p>La première boutique gaming qui offre des produits sous License officielle</p>

        <ul class="navbar">
          <li><a href="contact.php">Contact </a></li>
          <li><a href="<?php if(isset($_SESSION['id_client'])) echo 'table.php' ; else echo 'conx-insc.php'; ?>">Mon Compte</a></li>
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
          <a href="panier.php"><img src="public/images/cart.svg" alt="cart"><span><?= $panier->getNbrProduit()?></span></a>
        </div>
      </div>
    </div>
  </header>

  <!-- start connexion -->
  <div id="content" class="contenu-site" tabindex="-1">
    <!--had div haza kolchi-->
    <div class="container">
      <!-- had div haza nav o conx inscription  -->

      <!-- fil acceuil> mon compte -->
      <h1 class="container"><a href="index.php">Accueil</a> <img src="public/images/right-arrow.svg" alt="" class="icon"> <a href="conx-insc.php">Mon Compte</a> </h1>


      <!-- conx inscription-->
      <div class="contenu-interne">
        <div id="primary" class="zone-contenu">
          <main id="main" class="site-main">
            <article id="post-9" class="post-9 page type-page status-publish hentry">
              <div class="contenu-entrée">
                <div class="contenu">
                  <div class="login-form">
                    <span class="or-text">or</span>
                    <div class="av"></div>
                    <!--2 colonnes-->
                    <div class="u-columns" id="conx-client">
                      <!--colonne de connexion-->
                      <div class="u-column1">
                        <h2> SE CONNECTER </h2>
                        <!--formulaire de connexion-->
                        <form class="login" method="post" action="">
                          <p class="before-login-text">Bienvenue! Connectez-vous à votre <br> compte.</p>
                          <p class="paragraph  <?php if (isset($_POST['login']) && array_key_exists('emailetmdp', $client->errors)) echo 'error'  ?>">
                            <label for="email"> E-mail<span class="required">*</span> </label>
                            <!--required= champ obligatoire-->
                            <input type="email" class="input-email" name="email" id="email" value="" required>
                          </p>
                          <p class="paragraph  <?php if (isset($_POST['login']) && array_key_exists('emailetmdp', $client->errors)) echo 'error'  ?>">
                            <label for="password"> Mot de passe<span class="required">*</span></label>
                            <span class="password-input">
                              <input class="input-password" type="password" name="mdp" id="password" required>
                              <span class="show-password-input"></span>
                            </span>
                          </p>
                          <?php if (isset($_POST['login']) && array_key_exists('emailetmdp', $client->errors)) :  ?>
                            <p class="error-message"><?= $client->errors['emailetmdp'] ?></p>
                          <?php endif; ?>
                         
                          <p class="form-row">
                           
                            <button type="submit" class="button" name="login" value="connexion" onclick="setScroll()"> JE ME CONNECTE </button>
                          </p>
                        </form>
                      </div>
                      <!-- colonne d'inscription-->
                      <div class="u-column2">
                        <h2>Créez votre compte</h2>
                        <form class="register" method="post" action="">
                          <p class="before-register-text"> Créez un nouveau compte dés aujourd'hui pour profiter <br>des avantages d'une expérience d'achat personnalisée.</p>
                          <p class="paragraph <?php if (isset($_POST['register']) && array_key_exists('nom', $client->errors)) echo 'error'  ?>">
                            <label for="Nom">Nom <span class="required">*</span></label>
                            <input type="text" class="input-text" name="nom" id="Nom" value="" required>
                            <?php if (isset($_POST['register']) && array_key_exists('nom', $client->errors)) :  ?>
                            <p class="error-message"><?= $client->errors['nom'] ?></p>
                          <?php endif; ?>
                          </p>
                          <p class="paragraph <?php if (isset($_POST['register']) && array_key_exists('prenom', $client->errors)) echo 'error'  ?>">
                            <label for="prenom">Prénom <span class="required">*</span></label>
                            <input type="text" class="input-text" name="prenom" id="prenom" value="" required>
                            <?php if (isset($_POST['register']) && array_key_exists('prenom', $client->errors)) :  ?>
                            <p class="error-message"><?= $client->errors['prenom'] ?></p>
                          <?php endif; ?>
                          </p>
                          <p class="paragraph <?php if (isset($_POST['register']) && array_key_exists('email', $client->errors)) echo 'error'  ?>">
                            <label for="email">E-mail<span class="required">*</span></label>
                            <input type="email" class="input-email" name="email" id="e-mail" value=" " required>
                            <?php if (isset($_POST['register']) && array_key_exists('email', $client->errors)) :  ?>
                            <p class="error-message"><?= $client->errors['email'] ?></p>
                          <?php endif; ?>
                          </p>
                          <p class="paragraph <?php if (isset($_POST['register']) && array_key_exists('mdp', $client->errors)) echo 'error'  ?>">
                            <label for="password">Mot de passe <span class="required">*</span></label>
                            <input type="password" class="input-password" name="mdp" id="motdepasse" required>
                            <?php if (isset($_POST['register']) && array_key_exists('mdp', $client->errors)) :  ?>
                            <p class="error-message"><?= $client->errors['mdp'] ?></p>
                          <?php endif; ?>
                          </p>



                          <p class="form-row">
                            
                            <button type="submit" class="button" name="register" value="S’enregistrer" onclick="setScroll()">S’enregistrer</button>
                          </p>

                          <div class="register-benefits">
                            <h3>Sign up today and you will be able to :</h3>
                            <ul>
                              <li><i class="bi bi-check-lg"></i>Speed your way through checkout</li>
                              <li><i class="bi bi-check-lg"></i>Track your orders easily</li>
                              <li><i class="bi bi-check-lg"></i>Keep a record of all your purchases</li>
                            </ul>
                          </div>
                        </form>

                      </div>

                    </div>
                  </div>
                </div>
              </div>

        
        </article>
        </main>
      </div>
    </div>
  </div>
  </div>
  <!-- FOOTER -->
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

  <script src="public/js/ajoutpanier.js"></script>

</body>

</html>