<?php
session_start();
require "classes/Validation.php";
require "classes/Panier.php";
require "classes/Commande.php";

$validation = new validation();

require_once 'classes/Client.php';

if (isset($_SESSION['id_client'])) {
    $valid = $validation->info();
    $valide = $valid->fetch();

    $client = new Client();
    $c = $client->get($_SESSION['id_client']);
}

$paniers = new Panier();
$panier = $paniers->get();

$total = 0;
///////////////////////////
$commande = new Commande();

if(isset($_POST['commander']))
{

    $commande->valider();

    $paniers->clear();
    $_SESSION['v'] = "Commande effectué avec succès";
    header("location: index.php");

}

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
                    <li><a href="<?php if (isset($_SESSION['id_client'])) echo 'table.php';
                                    else echo 'conx-insc.php'; ?>"><?php if (!isset($_SESSION['id_client'])) echo 'Mon Compte';
                                                                    else echo $c['prenom'] . ' ' . $c['nom']; ?></a></li>
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
                    <a href="panier.php"><img src="public/images/cart.svg" alt="cart"><span><?= $paniers->getNbrProduit() ?></span></a>
                </div>
            </div>
        </div>
    </header>
    <!-- validation de la commande -->
    <h1 class="container"><a href="index.php">Accueil</a> <img src="public/images/right-arrow.svg" alt="" class="icon"> <a href="panier.php">Panier</a> </h1>
    <div class="container">

        <form action="" method="POST" class="porte2col flex">
            <div class=detail>
                <h2> Détails de facturation </h2>
                <div class="formulaire">
                    <div>

                        <p class="nom">
                            <label for="nom"> NOM
                                <input type="text" class="input-nom" name="nom" id="nom" value="<?php if (isset($_SESSION['id_client'])) echo $valide['nom'] ?>" required></label>
                        </p>
                        <p class="prenom">
                            <label for="prenom"> PRENOM
                                <input type="text" class="input-prenom" name="prenom" id="prenom" value="<?php if (isset($_SESSION['id_client'])) echo $valide['prenom'] ?>" required></label>
                        </p>
                        <p class="adresse1">
                            <label for="adr1"> Adresse1
                                <input type="text" name="adr1" id="adr1" value="<?php if (isset($_SESSION['id_client'])) echo $valide['adresse_1'] ?>" required></label>
                        </p>
                        <p class="adresse2">
                            <label for="adr2"> Adresse2
                                <input type="text" name="adr2" id="adr2" value="<?php if (isset($_SESSION['id_client'])) echo $valide['adresse_2'] ?>"></label>
                        </p>
                        <p class="tel">
                            <label for="tel"> Telephone
                                <input type="number" name="tel" id="tel" value="<?php if (isset($_SESSION['id_client'])) echo $valide['telephone'] ?>" required></label>
                        </p>
                        <p class="email">
                            <label for="email"> Email
                                <input type="email" name="email" id="email" value="<?php if (isset($_SESSION['id_client'])) echo $valide['email'] ?>" required></label>
                        </p>

                    </div>
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
                                <td><?= $pan['nom'] ?><span class="qty"> x <?php if (isset($_SESSION['id_client'])) echo $pan['qty'];
                                                                            else echo $_SESSION['panier'][$pan['id']]; ?></span></td>
                                <td><?php if (isset($_SESSION['id_client'])) echo $pan['qty'] * $pan['prix'];
                                    else echo $_SESSION['panier'][$pan['id']] * $pan['prix'] ?> MAD</td>
                            </tr>
                            <?php if (isset($_SESSION['id_client'])) $total = $total + ($pan['prix'] * $pan['qty']);
                            else $total = $total + ($pan['prix'] * $_SESSION['panier'][$pan['id']]); ?>
                        <?php endwhile ?>
                        <tr>
                            <th>TOTAL</th>
                            <td><?= $total; ?> MAD</td>
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
        </form>
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
</body>

</html>