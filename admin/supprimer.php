<?php
require_once 'classes/Produits.php';
$produit = new Produit();
$produit->supprimer($_GET["id"]);
header("location:produits.php");