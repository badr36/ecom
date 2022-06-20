<?php
require_once 'classes/Produits.php';
if (!isset($_GET["id"]))
    header("location:produits.php");

$produit = new Produit();
$p=$produit->get($_GET["id"]);
$description=$produit->getDescription($_GET["id"]);
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
    <title>E-SHOP</title>
</head>

<body>
    <div class="side-bar">
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
    </div>
    <main>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="produit">
                <div class="input-box file">
                    <label for="image"> <img src="public/images/upload.svg" alt="">
                        Image</label>
                    <input type="file" id="image" name="image" id="inputTag">
                    <span id="imageName"></span>
                </div>

                <div class="flex">
                    <div class="input-box" style="margin-right: auto;">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" value="<?= $p["nom"] ?>" id="nom">
                    </div>

                    <div class="input-box">
                        <label for="prix">Prix</label>
                        <input type="text" name="prix" value="<?= $p["prix"] ?>" id="prix">
                    </div>
                </div>

                <div class="flex">
                    <div class="input-box" style="margin-right: auto;">
                        <label for="stock">Stock</label>
                        <input type="text" name="stock" value="<?= $p["stock"] ?>" id="stock">
                    </div>

                    <div class="input-box">
                        <label for="categorie">Categorie</label>
                        <input type="text" name="categorie" value="<?= $p["id_categorie"] ?>" id="categorie">
                    </div>
                </div>


            </div>
            <h1>Fiche Technique</h1>
            <table>
                <tr>
                    <th>Description</th>
                    <th>Supprimer</th>
                </tr>
                <?php while ($d = $description->fetch()) : ?>
            <tr>
                <td><input type="text" name="description['<?=$d["id"]?>']" value="<?=$d["contenu"]?>"></td>
                <td><input type="checkbox" name="tab['<?=$d["id"]?>']"></td>
            </tr>
            <?php endwhile ?>
            </table>
            <input type="submit" name="submit" value="Mettre à jour">
        </form>
    </main>

    <script type="text/javascript">
        let input = document.querySelector(".produit input[type='file']");
        let imageName = document.getElementById("imageName")

        input.addEventListener("change", () => {
            let inputImage = document.querySelector("input[type=file]").files[0];

            imageName.innerText = inputImage.name;
        })
    </script>

</body>



</html>