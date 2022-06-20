<?php
require_once 'classes/Produits.php';
if(isset($_POST["submit"]))
{
    $produit = new Produit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="image">Image</label>
        <input type="file" id="image" name="image" >
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom">
        <label for="prix">Prix</label>
        <input type="text" name="prix" id="prix">
        <label for="stock">Stock</label>
        <input type="text" name="stock" id="stock">
        <label for="categorie">Categorie</label>
        <input type="text" name="categorie" id="categorie">
        <label for="description">description</label>
        <input type="text" name="description" id="desc">
        <input type="submit" name="submit" value="Valider">
    </form>
</body>
</html>