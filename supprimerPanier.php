<?php
session_start();
require_once 'classes/Panier.php';

$panier = new panier();

if(isset($_GET['id_produit']))
{
    $panier->supprimer($_GET['id_produit']); 
    header("location: panier.php");
}
else
    header("location: panier.php");