<?php
require_once 'classes/Clients.php';
$client = new Client();
$client->supprimer($_GET["id"]);
header("location:clients.php");