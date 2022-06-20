<?php
require_once 'classes/Produits.php';
$produits = new Produits();
$produits->deleteproducts($_GET["id"]);
header("location:produits.php");