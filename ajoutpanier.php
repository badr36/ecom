<?php
  session_start();
  require 'classes/Panier.php';
  $panier = new panier();
  
  if(isset($_GET['id_produit']))
  {
    $panier->ajouter($_GET['id_produit']);
    header("location: {$_SERVER['HTTP_REFERER']}");
  }
  else
  {
    header('location: produit.php');
  }
