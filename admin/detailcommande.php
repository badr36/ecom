<?php
session_start();
require_once 'classes/Commande.php';

if (!isset($_GET['id_commande']))
    header("location: commandes.php");

$commande = new Commande();
$commandes = $commande->get($_GET['id_commande']);

$total = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/detailcommande.css">
    <title>Document</title>
</head>

<body>

    <div class="side-bar">
        <h1><a href="index.php">E-<span style="color: #CA2E55;">SHOP</span></a></h1>
        <ul>
            <li class="active"><a href="index.php">Tableau de Bord</a></li>
            <li><a href="produits.php">Produits</a></li>
            <li><a href="commandes.php">Commandes</a></li>
            <li><a href="clients.php">Clients</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    
        <div class="bar">
            <ul>
                <li>Admin</li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <main>
        <table>
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Total</th>
                </tr>
            </thead>
            <?php while ($cmd = $commandes->fetch()) : ?>
                <?php //echo "La commande n° " .$cmd['id']. "  a été passée le  " .$cmd['date']. "  et est actuellement  " .$cmd['status']. ".";
                ?>

                <tbody>
                    <tr>
                        <td><?= $cmd['nom'] ?><span class="qty"> x <?= $cmd['qty'] ?></span></td>
                        <td><?= number_format($cmd['total_produit'], 2, '.', ' ') ?> MAD</td>
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
                    <td><?= number_format($commande->getTotal($_GET['id_commande']), 2, '.', ' ') ?> MAD</td>
                </tr>
            </tfoot>
        </table>

    </main>

</body>

</html>