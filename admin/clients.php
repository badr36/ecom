<?php
session_start();

if(!isset($_SESSION['admin']))
  header("location: login.php");

require_once 'classes/Clients.php';
$client = new Client();
$clients=$client->getAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/clients.css">
    <title>E-SHOP</title>
</head>
<body>
    <div class="side-bar">
        <h1>E-<span style="color: #CA2E55;">SHOP</span></h1>
        <ul>
            <li><a href="index.php">Tableau de Bord</a></li>
            <li ><a href="produits.php">Produits</a></li>
            <li><a href="commandes.php">Commandes</a></li>
            <li class="active"><a href="clients.php">Clients</a></li>
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
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Adresse_1</th>
            <th>Adresse_2</th>
            <th>Telephone</th>
            <th>E_mail</th>
            <th>Actions</th>
            
        </tr>
        <?php while ($c = $clients->fetch()) : ?>
        <tr>
             <td><?= $c['nom'] ?></td>
             <td><?= $c['prenom'] ?></td>
             <td><?= $c['adresse_1'] ?></td>
             <td><?= $c['adresse_2'] ?></td>
             <td><?= $c['telephone'] ?></td>
             <td><?= $c['email'] ?></td>
             <td><a href="supprimerr.php?id=<?= $c['id'] ?>">Supprimer</a></td>
        </tr>
        <?php endwhile ?>
    </table>
    
    </main>
    
</body>
</html>