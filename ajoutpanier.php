<?php
  session_start();
  require 'classes/Panier.php';
  $panier = new panier();
  
  if(isset($_GET['id_produit']))
  {
    $panier->ajouter($_GET['id_produit']);
    header("location: produits.php");
  }
  else
  {
    header('location: produit.php');
  }
