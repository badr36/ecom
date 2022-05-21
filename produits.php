<?php
session_start();

require_once 'classes/Produit.php';
require_once 'classes/Panier.php';
$panier = new Panier();
$produit = new Produit();

$max = $produit->getPrixMax();
$min = $produit->getPrixMin();
$maxC = $max;
$minC = $min;


// filter
if(isset($_POST['submitFilter']))
{
    $min = $_POST['min'];
    $max = $_POST['max'];
}

$produits = $produit->getAll($min, $max);

?>

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

<body onload="restoreScrollPos()">
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

                <form class="search">
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

    <div class="produits container">
        <div class="left">
            <h3>Par Prix</h3>
            <form class="wrapper" action="" method="POST">

                <div class="slider">
                    <div class="progress"></div>
                </div>
                <div class="range-input">
                    <input type="range" class="range-min" min="<?= $minC ?>" max="<?= $maxC ?>" value="<?= $min ?>" step="1">
                    <input type="range" class="range-max" min="<?= $minC ?>" max="<?= $maxC ?>" value="<?= $max ?>" step="1">
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
            <?php while ($produit = $produits->fetch()) : ?>
                <form class="produit" method="get" action="ajoutpanier.php">
                    <img src="uploads/<?=$produit['image'] ?>" alt="">
                    <p><?=$produit['nom'] ?></p>
                    <span><?=$produit['prix'] ?> MAD</span>
                    <input type="hidden" value="<?=$produit['id'] ?>" name="id_produit" />
                    <?php if($panier->exists($produit['id'])): ?>
                    <a href="panier.php"><button type="button">Voir le panier</button></a>
                    
                    <?php else: ?>
                    <button type="submit" onclick="setScroll()">Ajouter au panier</button>
                    <?php endif; ?>
                    
                    
                </form>
               <?php endwhile ?>
                
            </div>
        </div>
    </div>
    <script src="public/js/slider.js"></script>
    <script src="public/js/ajoutpanier.js"></script>
    <script type="text/javascript">
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>

</html>