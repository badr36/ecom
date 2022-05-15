<?php
require_once 'classes/Conx.php';
$Conx = new Conx_insc();
$Conx->get_conx();
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
    <body>
        <!--start header-->
        <header>
            <nav class="header-top">
                <div class="container">
                    <p>La première boutique gaming qui offre des produits sous License officielle</p>
    
                    <ul class="navbar">  
                        <li><a href="contact.php">Contact </a></li>
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
                        <a href="#"><img src="public/images/account.png" alt="account"  class="account"></a>
                        <a href="panier.php"><img src="public/images/cart.svg" alt="cart"><span>0</span></a>
                    </div>
                </div>
            </div>
        </header>

        <!-- start connexion -->
        <div id="content" class="contenu-site" tabindex="-1"> <!--contient tout-->
           <div class="container"> 
        <!-- fil acceuil> mon compte -->
               <nav class="breadcrumb">
                   <a href="index.php">Accueil</a>
                     <span class="delimiter">
                         <i class="bi bi-chevron-right"></i> <!--icon-->
                     </span>
                     <a href="conx-insc.php">Mon compte</a>
                </nav>
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
                                    <form class="login" method="post">
                                        <p class="before-login-text">Bienvenue! Connectez-vous à votre <br> compte.</p>
                                        <p class="paragraph">
        <!--email-->                      <label for="email"> E-mail<span class="required">*</span> </label> <!--required= champ obligatoire-->
                                          <input type="email" class="input-email" name="email" id="email" autocomplete="email" value="" required> 
                                        </p>
                                        <p class="paragraph">
                                          <label for="password"> Mot de passe<span class="required">*</span></label> 
                                          <span class="password-input">
        <!--mot de passe-->                 <input class="input-password" type="password" name="mdp" id="password" autocomplete="current-password" required>
                                            <span class="show-password-input"></span>
                                          </span>
                                        </p>
                                        <p class="lost_password">
        <!--password oublié-->            <a href="#">Mot de passe oublié ?</a>
                                        </p>
                                        <p class="form-row">
                                          <label class="remember-me">
        <!--se souvenir de mon compte-->  <input class="input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever">
                                            <span>Se souvenir de moi</span>
                                          </label>                                  		
        <!--bouton de conx -->            <button type="submit" class="button" name="connexion" value="connexion"> JE ME CONNECTE </button>
                                        </p>
                                    </form>
                                </div>
        <!-- colonne d'inscription-->     
                                <div class="u-column2">
                                  <h2>Créez votre compte</h2>
        <!--formulaire d'inscription-->                          
                                    <form  class="register" method="post">
                                      <p class="before-register-text"> Créez un nouveau compte dés aujourd'hui pour profiter 
                                        <br>des avantages d'une expérience d'achat personnalisée.
                                      </p>
                                      <p class="paragraph">
        <!--Nom-->                      <label for="Nom">Nom <span class="required">*</span></label>
                                        <input type="text" class="input-text" name="Nom" id="Nom"  value="" required>
                                      </p>
                                      <p class="paragraph">
        <!--Prénom-->                <label for="prenom">Prénom <span class="required">*</span></label>
                                        <input type="text" class="input-text" name="Prenom" id="prenom"  value="" required>
                                      </p>
                                      <p class="paragraph">
        <!--email-->                    <label for="email">E-mail<span class="required">*</span></label>
                                        <input type="email" class="input-email" name="email" id="e-mail" value=" " required>			
                                      </p>
                                      <p class="paragraph">
        <!--mot de passe-->             <label for="password">Mot de passe <span class="required">*</span></label>
                                        <input type="password" class="input-password" name="password" id="motdepasse" required>
                                      </p>                                                                                                                                                                                        
                                      <p class="form-row">                                      			
        <!--s'inscrire-->                <button type="submit" class="button" name="register" value="S’enregistrer">S’enregistrer</button>
                                      </p>                                        
                                      <div class="register-benefits">
                                        <h3>Inscrivez-vous dès aujourd’hui et vous pourrez :</h3>	
                                        <ul>
                                          <li><i class="bi bi-check-lg"></i>Accélérez votre passage à la caisse</li>
                                          <li><i class="bi bi-check-lg"></i>Suivez facilement vos commandes</li>
                                          <li><i class="bi bi-check-lg"></i>Gardez une trace de tous vos achats</li>
                                        </ul>
                                      </div>
                                    </form>                                         
                                </div>                                         
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