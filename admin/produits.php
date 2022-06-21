<?php
require_once 'classes/Produits.php';
$produit = new Produit();
$produits=$produit->getAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/produits.css">
    <title>E-SHOP</title>
</head>
<body>
    <div class="side-bar">
        <h1>E-<span style="color: #CA2E55;">SHOP</span></h1>
        <ul>
            <li><a href="index.html">Tableau de Bord</a></li>
            <li class="active"><a href="index.html">Produits</a></li>
            <li><a href="index.html">Commandes</a></li>
            <li><a href="index.html">Clients</a></li>
            <li><a href="index.html">Logout</a></li>
        </ul>
    </div>
    <div class="bar">
        <ul>
            <li>Admin</li>
            <li>Logout</li>
        </ul>
    </div>
    <main>
    <table>
        <tr>
            <th>Produit</th>
            <th>Prix</th>
            <th>Stock</th>
            <th>Categorie</th>
            <th colspan="2">Actions</th>
            
        </tr>
        <?php while ($p = $produits->fetch()) : ?>
        <tr>
            <td>
                <div class="cart-info">
                  <img src="../uploads/<?= $p['image'] ?>" alt="" class="photo">
                    <div class="info-product">
                      <p><?= $p['nom'] ?></p>
                     </div>
                </div>
             </td>
             <td><?= $p['prix'] ?></td>
             <td><?= $p['stock'] ?></td>
             <td><?= $p['nom_categ'] ?></td>
             <td><a href="modifier.php?id=<?= $p['id'] ?>">Modifier</a></td>
             <td><a href="supprimer.php?id=<?= $p['id'] ?>">Supprimer</a></td>
        </tr>
        <?php endwhile ?>
    </table>
    
    <a href="ajouter.php"><input type="submit" name="submit" value="Ajouter"></a>
    
    </main>
    
</body>
</html>