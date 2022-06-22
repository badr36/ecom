<?php
session_start();
require_once 'classes/Produits.php';
if (!isset($_GET["id"]))
    header("location:produits.php");



$produit = new Produit();
$p = $produit->get($_GET["id"]);
$description = $produit->getDescription($_GET["id"]);
if (isset($_POST["submit"])) {
    $produit->modifier($_GET["id"]);
    header("location: produits.php");
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
    <h1><a href="index.php">E-<span style="color: #CA2E55;">SHOP</span></a></h1>
        <ul>
            <li><a href="index.php">Tableau de Bord</a></li>
            <li class="active"><a href="produits.php">Produits</a></li>
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
                <tbody>
                    <tr>
                        <th>Description</th>
                        <th>Supprimer</th>
                    </tr>
                    <?php while ($d = $description->fetch()) : ?>
                        <tr>
                            <td><input type="text" name="description['<?= $d["id"] ?>']" value="<?= $d["contenu"] ?>"></td>
                            <td><input type="checkbox" name="tab['<?= $d["id"] ?>']"></td>
                        </tr>

                    <?php endwhile ?>
                </tbody>
                <tr>
                    <td style="text-align: center;"><button id="add-btn" class="button_plus" type="button">+</button></td>
                    <td></td>
                </tr>
            </table>

            <input type="submit" name="submit" value="Mettre a jour">
        </form>
    </main>

    <script type="text/javascript">
        let input = document.querySelector(".produit input[type='file']");
        let imageName = document.getElementById("imageName");

        input.addEventListener("change", () => {
            let inputImage = document.querySelector("input[type=file]").files[0];

            imageName.innerText = inputImage.name;
        })


        //------------------------
        let addBtn = document.querySelector('#add-btn');
        let tbody = document.querySelector('table tbody');
            addBtn.addEventListener('click', () => {
                let tr = document.createElement('tr');
                let td = document.createElement('td');
                let input = document.createElement('input');

                input.setAttribute('type', 'text');
                input.setAttribute('name', 'add[]');

                td.appendChild(input);
                tr.appendChild(td);

                tbody.appendChild(tr);

            });
    </script>

</body>



</html>