<?php

require_once __DIR__ . '/DB.php';

class Produits extends DB{
    public function getProducts()
    {
        return $this->query("SELECT p.id,p.nom,p.image,p.stock,p.prix,c.nom as nom_categ FROM produits p,categories c WHERE p.id_categorie=c.id");
    }

    public function deleteproducts($id){
        $this->query("delete from paniers where id_produit=$id");
        $this->query("delete from ligne_commandes where id_produit=$id");
        $this->query("delete from favoris where id_produit=$id");
        $this->query("delete from descriptions where id_produit=$id");
        $this->query("delete from commentaires where id_produit=$id");
        $this->query("delete from produits where id=$id");
    }
}
