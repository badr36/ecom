<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/commande.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare/ajax/libs/font-awesome/6.1.1/css/all.min.css"> -->

    <title>E-SHOP</title>
</head>
<body>

    <div class="side-bar">
        <h1>E-<span style="color: #CA2E55;">SHOP</span></h1>
        <ul>
            <li ><a href="index.php">Tableau de Bord</a></li>
            <li><a href="produits.php">Produits</a></li>
            <li class="active"><a href="commande.php">Commandes</a></li>
            <li><a href="clients.php">Clients</a></li>
            <li><a href="index.php">Logout</a></li>
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
                <tr>
                    <td>n°</td>
                    <td>xx-yy-zzzz</td>
                    <td>Livré</td>
                    <td>MAD</td>
                    <td>n°</td>
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
            </table>
        </div>
    </main>
</body>
</html>