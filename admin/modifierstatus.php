<?php

require_once 'classes/Commande.php';
$commande = new Commande();

if(isset($_POST['submit']))
{
    if($_POST['submit'] == 'Supprimer')
    {
        $commande->query("DELETE FROM ligne_commandes WHERE id_commande=?", array($_POST['id']));
        $commande->query("DELETE FROM commandes WHERE id=?", array($_POST['id']));
        header("location: commandes.php");
    }
    else if($_POST['submit'] == 'Détails')
    {
        header("location: detailcommande.php?id_commande={$_POST['id']}");
    }
    else
    {
        $commande->query("UPDATE commandes set status=? WHERE id=?", array($_POST['submit'], $_POST['id']));
        header("location: commandes.php");
    }
    
}