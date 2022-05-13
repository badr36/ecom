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
<body>
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
                    <a href="#"><img src="public/images/account.png" alt="account"  class="account"></a>
                    <a href="panier.php"><img src="public/images/cart.svg" alt="cart"><span>0</span></a>
                </div>
            </div>
        </div>
    </header>

   
    <div class="banner">
        <div class="container">
            <div class="left">
                <h2 class="banner-title">Asus ROG <br>Zephyrus GA503Q</h2>
                <p class="price">4999 MAD</p>
                <button class="buy-now">Buy Now</button>
            </div>
            <div class="right">
                <img src="public/images/banner.png" alt="">
            </div>
        </div>
    </div>

    <div class="categories">
        <h2 class="heading">Nos principales catégories</h2>

        <div class="container">
            <div class="categorie">
                <img src="public/images/laptop.png" alt="">
                <p>Laptops</p>
            </div>
            <div class="categorie">
                <img src="public/images/graphic-card.png" alt="">
                <p>Composants</p>
            </div>
            <div class="categorie">
                <img src="public/images/keyboard.png" alt="">
                <p>Périphériques PC</p>
            </div>
        </div>
    </div>
    
    <div class="produits">
        <h2 class="heading">Produits populaires <a href="produits.php"> Tout les produits</a></h2>
          <div class="flex container">
           <form class="produit" method="get" action="ajoutpanier.php">
              <img src="uploads/1.jpg" alt="">
              <p>MSI MAG X570S TORPEDO MAX</p>
              <span>3594 MAD</span>
              <input type="hidden" value="1" name="id_produit" />
              <button type = "submit" >Ajouter au panier</button>
           </form>
          <form class="produit" method="get" action="ajoutpanier.php">
              <img src="uploads/2.jpg" alt="">
              <p>Gigabyte Z690 AORUS PRO DDR5</p>
              <span>4684 MAD</span>
              <input type="hidden" value="2" name="id_produit" />
              <button type = "submit">Ajouter au panier</button>
          </form>
          <form class="produit" method="get" action="ajoutpanier.php">
              <img src="uploads/3.jpg" alt="">
              <p>Ducky Channel One 2 Mini RGB Noir – Brown Switch</p>
              <span>9624 MAD</span>
              <input type="hidden" value="3" name="id_produit" />
              <button type = "submit">Ajouter au panier</button>
          </form>
          <form class="produit" method="get" action="ajoutpanier.php">
              <img src="uploads/4.jpg" alt="">
              <p>Corsair Vengeance RGB PRO 16 Go (8×2) 3200Mhz Blanc</p>
              <span>2474 MAD</span>
              <input type="hidden" value="4" name="id_produit" />
              <button type = "submit">Ajouter au panier</button>
          </form>
        </div>
       <div class="flex container" >
        <form class="produit" method="get" action="ajoutpanier.php">
            <img src="uploads/5.jpg" alt="">
            <p>MSI Optix MAG251RX</p>
            <span>3586 MAD</span>
            <input type="hidden" value="5" name="id_produit" />
            <button type = "submit">Ajouter au panier</button>
        </form>
        <form class="produit" method="get" action="ajoutpanier.php">
            <img src="uploads/6.jpg" alt="">
            <p>Asus ROG STRIX GeForce RTX 3070 O8G Gaming V2 LHR</p>
            <span>7536 MAD</span>
            <input type="hidden" value="6" name="id_produit" />
            <button type = "submit">Ajouter au panier</button>
        </form>
        <form class="produit" method="get" action="ajoutpanier.php">
            <img src="uploads/7.jpg" alt="">
            <p>ASUS ROG Strix LC360</p>
            <span>8654 MAD</span>
            <input type="hidden" value="7" name="id_produit" />
            <button type = "submit">Ajouter au panier</button>
        </form>
        <form class="produit" method="get" action="ajoutpanier.php">
            <img src="uploads/8.jpg" alt="">
            <p>Asus DUAL GeForce RTX 3050 O8G LHR</p>
            <span>2475 MAD</span>
            <input type="hidden" value="8" name="id_produit" />
            <button type = "submit">Ajouter au panier</button>
        </form>
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