<?php
session_start();
require 'classes/Panier.php';

if(isset($_POST['submit']))
{
    $panier = new Panier();
    $panier->mettreajour();
    header("location: panier.php");
}
else
    header("location: panier.php");