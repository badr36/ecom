<?php
session_start();

if(!isset($_SESSION['admin']))
  header("location: login.php");

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
            <li ><a href="index.php">Tableau de Bord</a></li>
            <li><a href="produits.php">Produits</a></li>
            <li class="active"><a href="commandes.php">Commandes</a></li>
            <li><a href="clients.php">Clients</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <main>
        <div class="bar">
        <ul>
          <li>Admin</li>
          <li> <a href="logout.php">Logout</a></li>
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
                    <td><?= $cmd['total'] ?> MAD</td>
                    <td>n° <?= $cmd['id_client'] ?></td>
                    <td>
                        <form class="dropdown" action="modifierstatus.php" method="POST">
                            <span class="label"><i class="fa-solid"></i>Actions</span>
                            <ul class="items">
                                <li><input type="submit" name="submit" value="Livrée"></li>
                                <li><input type="submit" name="submit" value="Annuler"></li>
                                <li><input type="submit" name="submit" value="En Cours"></li>
                                <li><input type="submit" name="submit" value="En Attente"></li>
                                <li><input type="submit" name="submit" value="Validé"></li>
                                <li><input type="submit" name="submit" value="Détails"></li>
                                <li><input type="submit" name="submit" value="Supprimer"></li>
                                <input type="hidden" name="id" value="<?= $cmd['id_commande'] ?>">
                               
                            </ul>
                        </form>
                    </td>
                </tr>
                <?php endwhile ?>
            </table>
        </div>
    </main>
</body>
</html>