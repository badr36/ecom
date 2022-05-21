<?php
session_start();

require_once 'classes/Produit.php';
require_once 'classes/Panier.php';
$panier = new Panier();
$produit = new Produit();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/produit.css">
    <title>E-SHOP</title>
</head>

<body>
    <header>
        <nav class="header-top">
            <div class="container">
                <p>La première boutique gaming qui offre des produits sous License officielle</p>

                <ul class="navbar">
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="<?php if (isset($_SESSION['id_client'])) echo 'table.php';
                                    else echo 'conx-insc.php'; ?>">Mon Compte</a></li>
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
                    <a href="panier.php"><img src="public/images/cart.svg" alt="cart"><span><?= $panier->getNbrProduit() ?></span></a>
                </div>
            </div>
        </div>
    </header>
    <div class="wrapper">

        <div class="produit container">
            <div class="produit-img">
                <img src="uploads/10.jpg" alt="produit">
            </div>
            <div class="detail-produit">
                <h3>Cooler Master MWE 550W V2 Bronze</h3>
                <ul>
                    <li>Désignation : Cooler Master MWE Bronze 550W V2</li>
                    <li>Norme 80 PLUS : 80 Plus Bronze</li>
                    <li>Modulaire : Non</li>
                    <li>Modularité : Non Modulaire</li>
                    <li>Connecteur(s) alimentation :1 X +12V (Alimentation P8 – 2 x P4)</li>
                    <li>Format Alimentation : ATX/EPS</li>
                </ul>
                <p class="disponibilite">Disponibilité: <span>En Stock</span></p>
                <div class="ajouter-panier">
                    <input type="number">
                    <button type="submit">Ajouter au panier</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>