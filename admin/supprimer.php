<?php
require_once 'classes/Produits.php';
$produit = new Produit();
$produit->delete($_GET["id"]);
header("location:produits.php");