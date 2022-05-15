<?php

require_once __DIR__ . '/DB.php';

class Produit extends DB{
    public function getAll($min, $max){
        $produit= $this->query('SELECT * FROM produits WHERE prix BETWEEN ? AND ?', array($min, $max));
       if(isset($_GET['search'])){
           $recherche = htmlspecialchars($_GET['search']);
           $produit = $this->query("SELECT * FROM produits WHERE nom LIKE '%$recherche%' AND prix BETWEEN ? AND ?", array($min, $max));
       }
       return $produit;
    }

    public function getPrixMin()
    {
        return $this->query("SELECT MIN(prix) min from produits")->fetch()['min'];
    }

    public function getPrixMax()
    {
        return $this->query("SELECT MAX(prix) max from produits")->fetch()['max'];
    }
}
?>