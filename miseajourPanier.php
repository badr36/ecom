<?php
session_start();
require 'classes/Panier.php';

if(isset($_POST['submit']))
{
    $panier = new Panier();
    $panier->mettreajour();
}
else
    header("location: panier.php");