<?php
session_start();
require_once 'classes/Client.php';

if(!isset($_SESSION['id_client']))
    header("location: conx-insc.php");
  
$client = new Client();
$infoClient = $client->get($_SESSION['id_client']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/compte.css" >
    <title>E-SHOP</title>
</head>
<body>
    <header>
        <nav class="header-top">
            <div class="container">
                <p>La première boutique gaming qui offre des produits sous License officielle</p>

                <ul class="navbar">  
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="Information.php">Mon Compte</a></li>
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
                    <a href="#"><img src="public/images/account.png" alt="account"  class="account"></a>
                    <a href="#"><img src="public/images/cart.svg" alt="cart"><span>0</span></a>
                </div>
            </div>
        </div>
    </header>
    <div class="clon container ">
    <h1 class="container"><a href="index.php">Accueil</a> <img src="public/images/right-arrow.svg" alt="" class="icon"> <a href="panier.php">Mon Compte</a> <img src="public/images/right-arrow.svg" alt="" class="icon"> <a href="compte.php">Détails du compte</a></h1>

    <nav class="info">
        <ul>
              <li  class="art">
            <a href="table.php">Tableau de bord</a>
          </li>
              <li class="art" >
            <a href="commande.php">Commandes</a>
          </li>
              <li  class="art">
            <a href="compte.php">Détails du compte</a>
          </li>
              <li  class="art">
            <a href="deconnexion.php">Déconnexion</a>
          </li>
        </ul>
    </nav>

    
    <form class="containe">
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
                <input type="text" id="mail" name="email" placeholder="saisir votre mail" value="<?= $infoClient['email'] ?>">
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
    
            <p>
                <label for="currentpass">Mot de passe actuel</label>
                <input type="password" id="currentpass" name="currentpass" placeholder="saisir votre mot de passe actuel">
            </p>
            <p>
                <label for="pass1">Nouveau mot de passe</label>
                <input type="password" id="pass1" name="pass1" placeholder="saisir le nouveau mot de passe">
            </p>
            <p>
                <label for="pass2">Confirmer le nouveau mot de passe</label>
                <input type="password" id="pass2" name="pass2" placeholder="Confirmer le nouveau mot de passe">
            </p><br>
          <input type="button" value="Enregistrer les modifications">
        
        
    </form>
</div>
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
    
      
</body>
</html>