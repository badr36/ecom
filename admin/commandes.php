<?php
require_once 'classes/Commande.php';
$commande = new Commande();
$commandes=$commande->getCommande();






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/commande.css">

    <title>E-SHOP</title>
</head>
<body>

    <div class="side-bar">
    <h1><a href="index.php">E-<span style="color: #CA2E55;">SHOP</span></a></h1>
        <ul>
            <li class="active"><a href="index.php">Tableau de Bord</a></li>
            <li><a href="produits.php">Produits</a></li>
            <li><a href="commande.php">Commandes</a></li>
            <li><a href="index.html">Clients</a></li>
            <li><a href="index.html">Logout</a></li>
        </ul>
    </div>

    <main>
        <div class="bar">
        <ul>
          <li>Admin</li>
          <li>Logout</li>
        </ul>
        </div>
        <!-- gestion de la commande  -->
        <div class="commande">
            <table>
                <tr>
                    <th>COMMANDE</th>
                    <th>DATE</th>
                    <th>STATUS</th>
                    <th>TOTAL</th>
                    <th>CLIENT</th>
                    <th>GESTION DE LA COMMANDE</th>
                </tr>
                <?php while($cmd=$commandes->fetch()): ?>
                <tr>
                    <td>n° <?= $cmd['id_commande'] ?></td>
                    <td><?= $cmd['date'] ?></td>
                    <td><?= $cmd['status'] ?></td>
                    <td><?= $cmd['total'] ?>MAD</td>
                    <td>n° <?= $cmd['id_client'] ?></td>
                    <td>
                        <div class="dropdown">
                            <span class="label"><i class="fa-solid"></i>Actions</span>
                            <ul class="items">
                                <li><a href=""><i class="fa-brands"></i>Confirmer</a></li>
                                <li><a href=""><i class="fa-brands"></i>Livrée</a></li>
                                <li><a href=""><i class="fa-brands"></i>Retour</a></li>
                                <li><a href=""><i class="fa-brands"></i>Annuler</a></li>
                                <li><a href=""><i class="fa-brands"></i>Pas de reponse</a></li>
                                <li><a href=""><i class="fa-brands"></i>Va rappeler</a></li>
                                <li><a href=""><i class="fa-brands"></i>Destination</a></li>
                                <li><a href=""><i class="fa-brands"></i>Envoyée</a></li>
                                <li><a href=""><i class="fa-brands"></i>Details</a></li>
                                <li><a href=""><i class="fa-brands"></i>Modifier</a></li>
                                <li><a href=""><i class="fa-brands"></i>Supprimer</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <?php endwhile ?>
            </table>
        </div>
    </main>
</body>
</html>