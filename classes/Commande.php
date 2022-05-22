<?php
require_once __DIR__ . '/DB.php';

class Commande extends DB{
    public function getAll(){

        return $this->query("SELECT * from commandes 
                where  id_client=?",array ($_SESSION['id_client']));

    }
    public function get($id){

        return $this->query("SELECT *,(prix*qty) as total_produit from  ligne_commandes ligne, produits prod ,commandes cmd
        where prod.id=ligne.id_produit and cmd.id=ligne.id_commande and cmd.id_client=? and cmd.id=?",array ($_SESSION['id_client'],$id));
    }
    public function getTotal($id){

        return $this->query("SELECT SUM(prix*qty) as total from ligne_commandes ligne, produits prod 
                    where prod.id=ligne.id_produit and id_commande=? ",array($id))->fetch()["total"];
    }
}
