<?php

require_once __DIR__ . '/DB.php';

class Produit extends DB{
    public function getAll($min, $max, $cat = false){
        $produit= $this->query('SELECT * FROM produits WHERE prix BETWEEN ? AND ?', array($min, $max));
        $recherche = '';
        if(isset($_GET['search'])){
            $recherche = htmlspecialchars($_GET['search']);
        }
        if($cat)
            return $this->query("SELECT * FROM produits WHERE nom LIKE '%$recherche%' AND prix BETWEEN ? AND ? AND id_categorie=?", array($min, $max, $cat));

        return $this->query("SELECT * FROM produits WHERE nom LIKE '%$recherche%' AND prix BETWEEN ? AND ?", array($min, $max));
    
    }

    public function getPopularProducts()
    {
        return $this->query("SELECT *, count(*) nb from ligne_commandes lc, produits p WHERE lc.id_produit=p.id GROUP by p.id ORDER BY nb DESC LIMIT 8");
    }

    public function getPopularProduct()
    {
        return $this->query("SELECT *, count(*) nb from ligne_commandes lc, produits p WHERE lc.id_produit=p.id GROUP by p.id ORDER BY nb DESC LIMIT 1")->fetch();
    }

    public function getPrixMin()
    {
        return $this->query("SELECT MIN(prix) min from produits")->fetch()['min'];
    }

    public function getPrixMax()
    {
        return $this->query("SELECT MAX(prix) max from produits")->fetch()['max'];
    }
    public function get($id)
    {
        return $this->query("SELECT * FROM produits WHERE id=?",array($id))->fetch();
    }
    public function getDesc($id)
    {
        return $this->query("SELECT contenu FROM descriptions WHERE id_produit=?",array($id));
    }
    public function estAcheterPar($id_produit,$id_client)
    {
        return $this->query('SELECT * FROM ligne_commandes ligne,commandes cmd WHERE ligne.id_commande=cmd.id AND ligne.id_produit=? AND cmd.id_client=?',array($id_produit,$id_client))->rowCount()>0;
    }
    
}
?>