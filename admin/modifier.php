<?php
require_once 'classes/Produits.php';
if(!isset($_GET["id"]))
header("location:produits.php");

$produit = new Produit();
$p=$produit->get($_GET["id"]);
if(isset($_POST["submit"])){
$produit->modifier($_GET["id"]);
header("location:produits.php");
} 




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/modifier.css">
    <title>Page de modification</title>
</head>
<body>
     <!-- <div class="side-bar">
        <h1>E-<span style="color: #CA2E55;">SHOP</span></h1>
        <ul>
            <li><a href="index.html">Tableau de Bord</a></li>
            <li class="active"><a href="produits.php">Produits</a></li>
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
    </div>  -->
    <form action="" method="POST" enctype="multipart/form-data">
        <h1>produit</h1>
        <div class="produit">
        <label for="image">Image</label>
        <input type="file" id="image" name="image" >
        <label for="nom">Nom</label>
        <input type="text" name="nom" value="<?=$p["nom"]?>" id="nom">
        <label for="prix">Prix</label>
        <input type="text" name="prix" value="<?=$p["prix"]?>" id="prix">
        <label for="stock">Stock</label>
        <input type="text" name="stock" value="<?=$p["stock"]?>" id="stock">
        <label for="categorie">Categorie</label>
        <input type="text" name="categorie" value="<?=$p["id_categorie"]?>" id="categorie">
        </div>
        <h1>descr</h1>
        <table>
            <tr>
                <th>Description</th>
                <th>Supprimer</th>
            </tr>
            <tr>
                <td><input type="text" name="description" value=""></td>
                <td><input type="checkbox" name="" id=""></td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Mettre à jour">
    </form>
</body>
</html>