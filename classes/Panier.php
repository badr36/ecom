<?php

require_once __DIR__ . '/DB.php';

class Panier extends DB{
    public function __construct()
    {
        if(!isset($_SESSION['panier']) && !isset($_SESSION['id_client'])){
          $_SESSION['panier']= array();
        }
    } 
    public function ajouter($id)
    {
        if($this->query(' SELECT stock FROM produits WHERE id=?' , array($id))->fetch()['stock'] > 0 && !$this->exists($id)){ 
            if(isset($_SESSION['id_client']))
            {
                   
                  $this->query('INSERT INTO paniers VALUES(NULL,?,?,?)', array(1,$_SESSION['id_client'],$id) ) ;
            }
            else
            {
                if(!array_key_exists($id,$_SESSION['panier']))
                {
                     $_SESSION['panier'][$id] = 1;
                }

            }
        }
        
       

    }

    public function get()
    {
        if(isset($_SESSION['id_client']))
        {
            return $this->query('SELECT * FROM paniers pa, produits pr WHERE id_client=? AND pa.id_produit=pr.id', array(
                $_SESSION['id_client']
            ));
        }
        else if(isset($_SESSION['panier']))
        {
            $id_produits = implode(',', array_keys($_SESSION['panier']));
            
            return $this->query("SELECT * FROM produits WHERE id IN ($id_produits)");
        }
    }

    public function supprimer($id)
    {
        if(isset($_SESSION['id_client']))
        {
           $this->query("DELETE FROM paniers WHERE id_client=? AND id_produit=?", array(
               $_SESSION['id_client'],
               $id
           )); 
           
        }
        else if(isset($_SESSION['panier']))
        { 
            unset($_SESSION['panier'][$id]);
        }
    }

    public function estVide()
    
    {   
        
        if(isset($_SESSION['id_client']))
        {
           return $this->query("SELECT * FROM paniers WHERE id_client=?", array($_SESSION['id_client']))->rowCount() <= 0;           
        }
        else if(isset($_SESSION['panier']))
        { 
            return count($_SESSION['panier']) <= 0;
        }
        return true;
    }

    public function mettreajour()
    {
        if(!isset($_SESSION['id_client']))
        {
            foreach($_POST['qty'] as $produit_id => $qty)
            {
                    $_SESSION['panier'][$produit_id] = $qty;
            }
        }
        else
        {
            foreach($_POST['qty'] as $produit_id => $qty)
            {

                    $this->query("UPDATE paniers set qty=? WHERE id_client=? AND id_produit=?", array(
                        $qty,
                        $_SESSION['id_client'],
                        $produit_id
                    ));
            }
        }
    }

    public function getNbrProduit()
    {
        if(isset($_SESSION['id_client']))
        {
            $sum = $this->query("SELECT SUM(qty) sum FROM paniers WHERE id_client=?", array($_SESSION['id_client']))->fetch()['sum'];
            if($sum != NULL)
            {
                return $sum;
            }
            else 
                return 0;
        }

        else{
            return array_sum($_SESSION['panier']);
        }
    }
    public function exists($id_produit){
        if(isset($_SESSION['id_client']))
        {
           return $this->query('SELECT id_produit FROM paniers WHERE id_produit=?', array($id_produit))->rowCount()>0 ;
        }
        else
        {
            return (array_key_exists($id_produit,$_SESSION['panier']));
        }

    }
}

