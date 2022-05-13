<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="public/images/logo.png" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/produits.css">

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
                    <a href="#"><img src="public/images/account.png" alt="account" class="account"></a>
                    <a href="panier.php"><img src="public/images/cart.svg" alt="cart"><span>0</span></a>
                </div>
            </div>
        </div>
    </header>

    <div class="produits container">
        <div class="left">
            <h3>Par Prix</h3>
            <form class="wrapper" action="" method="POST">

                <div class="slider">
                    <div class="progress"></div>
                </div>
                <div class="range-input">
                    <input type="range" class="range-min" min="<?= $mi ?>" max="<?= $m ?>" value="<?= $min ?>" step="1">
                    <input type="range" class="range-max" min="<?= $mi ?>" max="<?= $m ?>" value="<?= $max ?>" step="1">
                </div>
                <div class="price-input">
                    <div class="field">
                        <span>Min</span>
                        <input type="number" class="input-min" value="<?= $min ?>" name="min">
                    </div>
                    <div class="separator">-</div>
                    <div class="field">
                        <span>Max</span>
                        <input type="number" class="input-max" value="<?= $max ?>" name="max">
                    </div>

                </div>
                <button type="submit" name="submitFilter">Filter</button>

            </form>
        </div>
        <div class="right">
            <h2>Produits E-SHOP</h2>
            <div class="grid">
                <form class="produit" method="get" action="ajoutpanier.php">
                    <img src="uploads/1.jpg" alt="">
                    <p>MSI MAG X570S TORPEDO MAX</p>
                    <span>3594 MAD</span>
                    <input type="hidden" value="1" name="id_produit" />
                    <button type="submit">Ajouter au panier</button>
                </form>
                <form class="produit" method="get" action="ajoutpanier.php">
                    <img src="uploads/2.jpg" alt="">
                    <p>Gigabyte Z690 AORUS PRO DDR5</p>
                    <span>4684 MAD</span>
                    <input type="hidden" value="2" name="id_produit" />
                    <button type="submit">Ajouter au panier</button>
                </form>
                <form class="produit" method="get" action="ajoutpanier.php">
                    <img src="uploads/3.jpg" alt="">
                    <p>Ducky Channel One 2 Mini RGB Noir – Brown Switch</p>
                    <span>9624 MAD</span>
                    <input type="hidden" value="4" name="id_produit" />
                    <button type="submit">Ajouter au panier</button>
                </form>
                <form class="produit" method="get" action="ajoutpanier.php">
                    <img src="uploads/4.jpg" alt="">
                    <p>Corsair Vengeance RGB PRO 16 Go (8×2) 3200Mhz Blanc</p>
                    <span>2474 MAD</span>
                    <input type="hidden" value="5" name="id_produit" />
                    <button type="submit">Ajouter au panier</button>
                </form>
                <form class="produit" method="get" action="ajoutpanier.php">
                    <img src="uploads/5.jpg" alt="">
                    <p>MSI Optix MAG251RX</p>
                    <span>3586 MAD</span>
                    <input type="hidden" value="6" name="id_produit" />
                    <button type="submit">Ajouter au panier</button>
                </form>
                <form class="produit" method="get" action="ajoutpanier.php">
                    <img src="uploads/6.jpg" alt="">
                    <p>Asus ROG STRIX GeForce RTX 3070 O8G Gaming V2 LHR</p>
                    <span>7536 MAD</span>
                    <input type="hidden" value="7" name="id_produit" />
                    <button type="submit">Ajouter au panier</button>
                </form>
                <form class="produit" method="get" action="ajoutpanier.php">
                    <img src="uploads/7.jpg" alt="">
                    <p>ASUS ROG Strix LC360</p>
                    <span>8654 MAD</span>
                    <input type="hidden" value="8" name="id_produit" />
                    <button type="submit">Ajouter au panier</button>
                </form>
                <form class="produit" method="get" action="ajoutpanier.php">
                    <img src="uploads/8.jpg" alt="">
                    <p>Asus DUAL GeForce RTX 3050 O8G LHR</p>
                    <span>2475 MAD</span>
                    <input type="hidden" value="9" name="id_produit" />
                    <button type="submit">Ajouter au panier</button>
                </form>
                <form class="produit" method="get" action="ajoutpanier.php">
                    <img src="uploads/1.jpg" alt="">
                    <p>MSI MAG X570S TORPEDO MAX</p>
                    <span>3594 MAD</span>
                    <input type="hidden" value="10" name="id_produit" />
                    <button type="submit">Ajouter au panier</button>
                </form>
                <form class="produit" method="get" action="ajoutpanier.php">
                    <img src="uploads/2.jpg" alt="">
                    <p>Gigabyte Z690 AORUS PRO DDR5</p>
                    <span>4684 MAD</span>
                    <input type="hidden" value="11" name="id_produit" />
                    <button type="submit">Ajouter au panier</button>
                </form>
                <form class="produit" method="get" action="ajoutpanier.php">
                    <img src="uploads/3.jpg" alt="">
                    <p>Ducky Channel One 2 Mini RGB Noir – Brown Switch</p>
                    <span>9624 MAD</span>
                    <input type="hidden" value="12" name="id_produit" />
                    <button type="submit">Ajouter au panier</button>
                </form>
                <form class="produit" method="get" action="ajoutpanier.php">
                    <img src="uploads/4.jpg" alt="">
                    <p>Corsair Vengeance RGB PRO 16 Go (8×2) 3200Mhz Blanc</p>
                    <span>2474 MAD</span>
                    <input type="hidden" value="13" name="id_produit" />
                    <button type="submit">Ajouter au panier</button>
                </form>
                <form class="produit" method="get" action="ajoutpanier.php">
                    <img src="uploads/5.jpg" alt="">
                    <p>MSI Optix MAG251RX</p>
                    <span>3586 MAD</span>
                    <input type="hidden" value="14" name="id_produit" />
                    <button type="submit">Ajouter au panier</button>
                </form>
                <form class="produit" method="get" action="ajoutpanier.php">
                    <img src="uploads/6.jpg" alt="">
                    <p>Asus ROG STRIX GeForce RTX 3070 O8G Gaming V2 LHR</p>
                    <span>7536 MAD</span>
                    <input type="hidden" value="15" name="id_produit" />
                    <button type="submit">Ajouter au panier</button>
                </form>
                <form class="produit" method="get" action="ajoutpanier.php">
                    <img src="uploads/7.jpg" alt="">
                    <p>ASUS ROG Strix LC360</p>
                    <span>8654 MAD</span>
                    <input type="hidden" value="16" name="id_produit" />
                    <button type="submit">Ajouter au panier</button>
                </form>
                <form class="produit" method="get" action="ajoutpanier.php">
                    <img src="uploads/8.jpg" alt="">
                    <p>Asus DUAL GeForce RTX 3050 O8G LHR</p>
                    <span>2475 MAD</span>
                    <input type="hidden" value="17" name="id_produit" />
                    <button type="submit">Ajouter au panier</button>
                </form>
            </div>
        </div>
    </div>
    <script src="public/js/slider.js"></script>

</body>

</html>