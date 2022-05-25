<?php 
session_start();
require "classes/Commentaire.php";
$commentaire = new Commentaire;
if(isset($_POST['submit']))
{
    
    $commentaire->ajouter($_POST['avis'],$_SESSION['id_client'],$_POST['id_produit']);
    header("location:produit.php?id={$_POST['id_produit']}");
}
