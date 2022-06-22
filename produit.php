<?php
session_start();

require_once 'classes/Produit.php';
require_once 'classes/Panier.php';
require_once 'classes/Commentaire.php';

if (!isset($_GET['id']))
    header("location: index.php");

$panier = new Panier();
$produit = new Produit();
$commentaire = new Commentaire();
$commentaires = $commentaire->getAll($_GET['id']);

$infos_produit = $produit->get($_GET["id"]);
$desc_produit = $produit->getDesc($_GET["id"]);

if (isset($_POST['ajoutqty'])) {
    $panier->ajoutqty($_POST['id'], $_POST['qty']);
}

require_once 'classes/Client.php';
if(isset($_SESSION['id_client']))
{
  $client = new Client();
  $c = $client->get($_SESSION['id_client']);
}

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
                                    else echo 'conx-insc.php'; ?>"><?php if (!isset($_SESSION['id_client'])) echo 'Mon Compte'; else echo $c['prenom'] . ' ' . $c['nom']; ?></a></li>
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
        <?php if(isset($_SESSION['qty indispo'])): ?>
            <div class="error container">
                <p>Vous ne pouvez pas ajouter cette quantité dans le panier — nous en avons <?= $infos_produit['stock'] ?> en stock et vous en avez déjà <?= $panier->produitdispo($infos_produit['id'])?> dans votre panier.</p>
            </div>
            <?php unset($_SESSION['qty indispo']) ?>
        <?php endif ?>
        <form class="produit container" action="" method="POST">

            <div class="produit-img">
                <img src="uploads/<?= $infos_produit['image'] ?>" alt="produit">
            </div>
            <div class="detail-produit">
                <h3><?= $infos_produit['nom'] ?></h3>
                <ul>
                    <?php while ($desc = $desc_produit->fetch()) : ?>
                        <li><?= $desc['contenu'] ?></li>
                    <?php endwhile; ?>
                </ul>
                <?php if ($infos_produit['stock'] > 0) : ?>
                    <p class="disponibilite">Disponibilité: <span>En Stock</span></p>
                    <div class="ajouter-panier">
                        <input type="number" name="qty" min="1" max="<?= $infos_produit['stock'] ?>" required>
                        <input type="hidden" value="<?= $infos_produit['id'] ?>" name="id">
                        <button type="submit" name="ajoutqty">Ajouter au panier</button></a>
                    </div>
                <?php else : ?>
                    <p class="disponibilite">Disponibilité: <span style="color: #f04545;">Rupture de stock</span></p>
                <?php endif ?>
            </div>
        </form>
    </div>

    <div class="les-avis wrapper">
        <h2>Avis</h2>
        <?php while ($com = $commentaires->fetch()) : ?>

            <div class="avis container">
                <h4><?= $com['prenom'] . ' ' . $com['nom'] ?></h4>
                <p><?= $com['contenu'] ?></p>
            </div>

        <?php endwhile ?>
        <?php if(isset($_SESSION['id_client'])):?>
            <?php if($produit->estAcheterPar($_GET['id'], $_SESSION['id_client'])):?>

        <form action="ajoutavis.php" method="POST" class="container">
            <label for="avis">Votre Avis</label>
            <textarea name="avis" id="avis" cols="30" rows="10"></textarea>
            <button type="submit" name="submit">Envoyer</button>
            <input type="hidden" name="id_produit" value="<?= $infos_produit['id'] ?>">
        </form>
            <?php endif ?>
        <?php endif ?>
    </div>
</body>

</html>