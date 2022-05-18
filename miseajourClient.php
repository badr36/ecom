<?php
session_start();
require_once "classes/Client.php";

if(isset($_POST['submit']))
{

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $adresse1 = $_POST['adresse1'];
    $adresse2 = $_POST['adresse2'];

    $client = new Client($email, null, $nom, $prenom, $adresse1, $adresse2);
    $client->modifier($_SESSION['id_client']);

    header("location: compte.php");
}
else
    header("location: index.php");