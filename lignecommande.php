<?php
session_start();
require_once 'classes/Panier.php';
require_once 'classes/Commande.php';

if(!isset($_POST['id_commande']))
  header("location: index.php");

$panier = new Panier();
$commande = new Commande();
$commandes = $commande->get($_POST['id_commande']);
$total=0;


if(!isset($_SESSION['id_client']))
    header("location: conx-insc.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="public/css/lignecommande.css" >
    <title>E-SHOP</title>
</head>
<body>
    <header>
        <nav class="header-top">
            <div class="container">
                <p>La première boutique gaming qui offre des produits sous License officielle</p>

                <ul class="navbar">  
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="table.php">Mon Compte</a></li>
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
                    <a href="panier.php"><img src="public/images/cart.svg" alt="cart"><span><?= $panier->getNbrProduit()?></span></a>
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
        <th >Total</th>
            </tr>
        </thead>
      <?php while ($cmd = $commandes->fetch()) : ?>
        <?php //echo "La commande n° " .$cmd['id']. "  a été passée le  " .$cmd['date']. "  et est actuellement  " .$cmd['status']. ".";?> 
    
        <tbody>
            <tr>
                <td><?=$cmd['nom']?><span class="qty"> x <?= $cmd['qty']?></span></td>
                <td><?=$cmd['total_produit']?> MAD</td>
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
                <td><?=$commande->getTotal($_POST['id_commande'])?> MAD</td>
            </tr>
        </tfoot>
</table>


</div>
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
          
          <li class="nav_item nav_item--extra">
            <h2 class="nav__title">Technology</h2>
            
            <ul class="nav_ul nav_ul--extra">
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