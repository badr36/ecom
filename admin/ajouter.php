<?php
require_once 'classes/Produits.php';
$produit = new Produit();
if(isset($_POST["submit"])){
$produit->ajouter();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/ajouter.css">
    <title>Document</title>
</head>

<body>
    <div class="side-bar">
    <h1><a href="index.php">E-<span style="color: #CA2E55;">SHOP</span></a></h1>
        <ul>
            <li><a href="index.php">Tableau de Bord</a></li>
            <li class="active"><a href="produits.php">Produits</a></li>
            <li><a href="commande.php">Commandes</a></li>
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
                    <input type="file" id="image" name="image" id="inputTag" required >
                    <span id="imageName"></span>
                </div>

                <div class="flex">
                    <div class="input-box" style="margin-right: auto;">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="nom" required>
                    </div>

                    <div class="input-box">
                        <label for="prix">Prix</label>
                        <input type="text" name="prix" id="prix" required>
                    </div>
                </div>

                <div class="flex">
                    <div class="input-box" style="margin-right: auto;">
                        <label for="stock">Stock</label>
                        <input type="text" name="stock" id="stock" required>
                    </div>

                    <div class="input-box">
                        <label for="categorie">Categorie</label>
                        <input type="text" name="categorie" id="categorie" required>
                    </div>
                </div>


            </div>
            <h1>Fiche Technique</h1>
            <table>
                <tbody>
                    <tr>
                        <th>Description</th>

                    </tr>

                    <tr>
                        <td><input type="text" name="description[]" required></td>

                    </tr>


                </tbody>
                <tr>
                    <td style="text-align: center;"><button id="add-btn" class="button_plus" type="button">+</button></td>
                    <td></td>
                </tr>
            </table>

            <input type="submit" name="submit" value="Terminer">
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
            input.setAttribute('required', 'required');

            td.appendChild(input);
            tr.appendChild(td);

            tbody.appendChild(tr);

        });
    </script>
</body>

</html>