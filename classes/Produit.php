<?php

require_once __DIR__ . '/DB.php';

class Produit extends DB{
    public function get(){
        $produit= $this->query('SELECT * FROM produits'  );
       if(isset($_GET['search'])){
           $recherche = htmlspecialchars($_GET['search']);
           $produit = $this->query("SELECT * FROM produits WHERE nom LIKE '%$recherche%'");
       }
       return $produit;
    }
}
?>