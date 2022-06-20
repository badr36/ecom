<?php
session_start();
require "classes/Validation.php";
require "classes/Panier.php";

$validation= new validation();

if(isset($_SESSION['id_client'])){
    $valid=$validation->info();
    $valide=$valid->fetch();
}

$paniers= new Panier();
$panier=$paniers->get();

$total=0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/validation.css">
    <title>E-SHOP</title>
</head>
<body>
    <!-- header -->
    <header>
        <nav class="header-top">
            <div class="container">
                <p>La première boutique gaming qui offre des produits sous License officielle</p>

                <ul class="navbar">  
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="<?php if(isset($_SESSION['id_client'])) echo 'table.php' ; else echo 'conx-insc.php'; ?>">Mon Compte</a></li>
                </ul>
            </div>
        </nav>

        <div class="header-bottom">
            <div class="container">
                <div class="logo">
                    <a href="index.php">E-<span style="color: #CA2E55;">SHOP</span></a>
                </div>

                <form class="search" action='produits.php' >
                    <input type="text" name="search" placeholder="Rechercher un produit" autocomplete='off'>
                    <button type="submit" name="submit">
                        <img src="public/images/search.svg" alt="search">
                    </button>
                </form>
                <div class="account">
                  
                </div>
                <div class="cart">
                    <a href="#"><img src="public/images/account.png" alt="account"  class="account"></a>
                    <a href="panier.php"><img src="public/images/cart.svg" alt="cart"></a>
                </div>
            </div>
        </div>
    </header>
    <!-- validation de la commande -->
    <div class="container">
        <h1 class="container"><a href="index.php">Accueil</a> 
            <img src="public/images/right-arrow.svg" alt="" class="icon"> 
            <a href="validation.php">Validation</a> 
        </h1>
        <div class="porte2col">
            <div class=detail>
                <h2> Détails de facturation </h2>
                    <div class="formulaire">
                        <form action="Validation.php" method="POST">
                            
                            <p class="nom">
                                <label for="nom"> NOM 
                                <input type="text" class="input-nom" name="nom" id="nom" value="<?php if(isset($_SESSION['id_client'])) echo $valide['nom'] ?>"></label></p>
                            <p class="prenom">
                                <label for="prenom"> PRENOM 
                                <input type="text" class="input-prenom" name="prenom" id="prenom" value="<?php if(isset($_SESSION['id_client'])) echo $valide['prenom'] ?>"></label></p>
                            <p class="adresse1">
                                <label for="adr1"> Adresse1 
                                <input type="text" name="adr1" id="adr1" value="<?php if(isset($_SESSION['id_client'])) echo $valide['adresse_1'] ?>"></label></p>
                            <p class="adresse2">   
                                <label for="adr2"> Adresse2 
                                <input type="text" name="adr2" id="adr2" value="<?php if(isset($_SESSION['id_client'])) echo $valide['adresse_2'] ?>"></label></p>
                            <p class="tel">   
                                <label for="tel"> Telephone 
                                <input type="text" name="tel" id="tel" value="<?php if(isset($_SESSION['id_client'])) echo $valide['telephone'] ?>"></label></p>
                            <p class="email">
                            <label for="email"> Email 
                                <input type="text" name="email" id="email"value="<?= $valide['email'] ?>"></label></p>
                                
                        </form>
                    </div>
            </div>   
            <div class="commande">
                <h2> Votre commande </h2>
                <div class="contenu-cmd">
                    <table>
                        <tr>
                            <th>Produit</th>
                            <th>Sous-total</th>
                        </tr>
                        <?php while ($pan = $panier->fetch()) : ?>
                        <tr>
                            <td><?=$pan['nom']?><span class="qty"> x <?= $pan['qty']?></span></td>
                            <td><?=$pan['prix']*$pan['qty'] ?> MAD</td>
                        </tr>
                        <?php $total=$total+($pan['prix']*$pan['qty']);?> 
                        <?php endwhile ?>
                        <tr>
                            <th>TOTAL</th>
                            <td><?= $total;?> MAD</td>
                        </tr>
                    </table>
                    <br><br>
                    <div class="paiement">
                        <p>Paiement à la livraison</p>
                    </div>
                    <br>       
                    <input type="submit" name="commander" value="Commander">
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
</body>
</html>