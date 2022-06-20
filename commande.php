 <?php

  session_start();
  require_once 'classes/Panier.php';
  require_once 'classes/Commande.php';

  if (!isset($_SESSION['id_client']))
    header("location: conx-insc.php");

  $panier = new Panier();
  $commande = new Commande();
  $commandes = $commande->getAll();

  require_once 'classes/Client.php';
  if (isset($_SESSION['id_client'])) {
    $client = new Client();
    $c = $client->get($_SESSION['id_client']);
  }
  ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
   <link rel="stylesheet" href="public/css/commande.css">
   <title>E-SHOP</title>
 </head>

 <body>
   <header>
     <nav class="header-top">
       <div class="container">
         <p>La première boutique gaming qui offre des produits sous License officielle</p>

         <ul class="navbar">
           <li><a href="contact.php">Contact</a></li>
           <li><a href="table.php"><?php if (!isset($_SESSION['id_client'])) echo 'Mon Compte';
                                    else echo $c['prenom'] . ' ' . $c['nom']; ?></a></li>
         </ul>
       </div>
     </nav>

     <div class="header-bottom">
       <div class="container">
         <div class="logo">
           <a href="index.php">E-<span style="color: #CA2E55;">SHOP</span></a>
         </div>

         <form class="search" action='produits.php'>
           <input type="text" name="search" placeholder="Rechercher un produit" autocomplete='off'>
           <button type="submit" name="submit">
             <img src="public/images/search.svg" alt="search">
           </button>
         </form>
         <div class="account">

         </div>
         <div class="cart">
           <a href="#"><img src="public/images/account.png" alt="account" class="account"></a>
           <a href="panier.php"><img src="public/images/cart.svg" alt="cart"><span><?= $panier->getNbrProduit() ?></span></a>
         </div>
       </div>
     </div>
   </header>
   <div class="clon container ">

     <h1 class="container"><a href="index.php">Accueil</a> <img src="public/images/right-arrow.svg" alt="" class="icon"> <a href="table.php">Mon Compte</a> <img src="public/images/right-arrow.svg" alt="" class="icon"> <a href="commande.php">Commandes</a></h1>

     <nav class="info">
       <ul>
         <li class="art">
           <a href="table.php">Tableau de bord</a>
         </li>
         <li class="art">
           <a href="commande.php">Commandes</a>
         </li>
         <li class="art">
           <a href="compte.php">Détails du compte</a>
         </li>
         <li class="art">
           <a href="deconnexion.php">Déconnexion</a>
         </li>
       </ul>
     </nav>
     <?php if ($commandes->rowcount() == 0) : ?>
       <div class="containe">
         <nav>
           <a href="produits.php" class="Parcourir-des-produits">Parcourir des produits</a>Aucune commande n’a encore été passée.
         </nav>
       </div>
     <?php else : ?>
       <!-- <header class="entry-header">
					    <h1>Commandes</h1>
					</header>  -->

       <div class="tableview">
         <table>
           <thead>
             <tr>
               <th class="scope">COMMANDE</th>
               <th class="scope">DATE</th>
               <th class="scope">STATUS</th>
               <th class="scope">TOTAL</th>
               <th class="scope">ACTIONS</th>

             </tr>
           </thead>
           <?php while ($cmd = $commandes->fetch()) : ?>
             <tr>
               <td>n°<?= $cmd['id'] ?></td>
               <td><?= $cmd['date'] ?></td>
               <td><?= $cmd['status'] ?></td>
               <td><?= number_format($commande->getTotal($cmd["id"]), 2, '.', ' ') ?> MAD</td>
               <td>
                 <form method="post" action="lignecommande.php">
                   <input type="hidden" name="id_commande" value="<?= $cmd['id'] ?>">
                   <button type="submit" class="view" name="view">
                     Voir
                     <i class="bi bi-eye-fill"></i>
                   </button>
                 </form>
               </td>
             </tr>
           <?php endwhile ?>
         </table>
       <?php endif; ?>
       </div>

   </div>


   <footer>
     <div class="container">
       <div class="presentation">
         <p>La boutique e-shop est un lieu où des experts de l’informatique et du high-tech conseillent et orientent les clients marocains. C’est également un espace où nous créons des machines sur-mesure et réparent des produits. Atlas Gaming est la première boutique gaming qui offre des produits sous License officielle provenant des plus grandes marques de gaming au monde. Cela, afin de garantir une qualité exceptionnelle, des produits authentiques sous garantie fabriquant et des prix imbattables.</p>
       </div>
       <div class="columns">
         <div class="footer-col">
           <h4>catégories</h4>
           <ul>
             <li><a href="produits.php?categorie=1">Laptops</a></li>
             <li><a href="produits.php?categorie=2">Composants</a></li>
             <li><a href="produits.php?categorie=3">Périphériques PC</a></li>
           </ul>
         </div>
         <div class="footer-col">
           <h4>Espace clients</h4>
           <ul>
             <li><a href="<?php if (isset($_SESSION['id_client'])) echo 'table.php';
                          else echo 'conx-insc.php'; ?>">Mon compte</a></li>
             <li><a href="contact.php">Contact</a></li>
           </ul>
         </div>
       </div>

     </div>
     <div class="copyright">
       <p class="container">2022 © E-SHOP - All Rights Reserved</p>
     </div>
   </footer>


 </body>

 </html>